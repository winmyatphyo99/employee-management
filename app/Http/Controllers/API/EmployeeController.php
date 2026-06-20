<?php

namespace App\Http\Controllers\API;

use App\Services\ExcelService;
use App\Http\Controllers\Controller;
use App\Services\EmployeeService;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Requests\ImportEmployeeRequest;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    private EmployeeService $service;
    private ExcelService $excelService;

    public function __construct(EmployeeService $service, ExcelService $excelService)
    {
        $this->service = $service;
        $this->excelService = $excelService;
    }

    public function index(Request $request)
    {
        return response()->json([
            'status' => true,
            'data' => $this->service->getAll($request->search)
        ]);
    }

    public function store(StoreEmployeeRequest $request)
    {
        return response()->json([
            'status' => true,
            'data' => $this->service->create($request->validated())
        ], 201);
    }

    public function show($id)
    {
        $employee = $this->service->find($id);

        if (!$employee) {
            return response()->json([
                'status' => false,
                'message' => 'Employee not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $employee
        ]);
    }

    public function update(UpdateEmployeeRequest $request, $id)
    {
        $updated = $this->service->update($id, $request->validated());

        if (!$updated) {
            return response()->json([
                'status' => false,
                'message' => 'Employee not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $updated
        ]);
    }

    public function destroy($id)
    {
        $deleted = $this->service->delete($id);

        return response()->json([
            'status' => $deleted,
            'message' => $deleted ? 'Deleted successfully' : 'Employee not found'
        ], $deleted ? 200 : 404);
    }

    public function export()
    {
        return $this->excelService->exportEmployees();
    }

    public function import(ImportEmployeeRequest $request)
    {
        $this->excelService->importEmployees($request->file('file'));

        return response()->json([
            'status' => true,
            'message' => 'Imported successfully'
        ]);
    }
}
