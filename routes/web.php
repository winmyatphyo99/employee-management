<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Nuwave\Lighthouse\GraphQL;
use GraphQL\Server\OperationParams;


Route::get('/', function () {
    return view('welcome');
});
Route::post('/graphql-docs', function (Request $request) {
    $graphql = app(GraphQL::class);

    return $graphql->executeOperation(
        OperationParams::create([
            'query' => $request->input('query'),
            'variables' => $request->input('variables'),
        ]),
        app(\Nuwave\Lighthouse\Execution\HttpGraphQLContext::class)
    );
});
