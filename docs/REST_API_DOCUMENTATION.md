# 📘 REST API Documentation

## Employee Management System API

A RESTful API built with **Laravel 11**, **Laravel Passport**, and **Laravel Excel** for managing users and employees with secure authentication, search, pagination, and Excel import/export functionality.

---

# 🌐 Base URL

```http
http://127.0.0.1:8000/api
```

---

# 🔐 Authentication

This API uses **Laravel Passport Bearer Token Authentication**.

For protected endpoints, include the access token in the request header:

```http
Authorization: Bearer {access_token}
Accept: application/json
```

---

# 📋 API Overview

| Module               | Endpoint Count |
| -------------------- | -------------- |
| Authentication       | 3              |
| Users                | 3              |
| Employees            | 8              |
| Total REST Endpoints | 14             |

---

# 🔑 Authentication APIs

## Register User

Create a new user account.

### Endpoint

```http
POST /register
```

### Request Body

```json
{
    "username": "john",
    "email": "john@example.com",
    "password": "password123"
}
```

### Success Response

```json
{
    "message": "User registered successfully"
}
```

---

## Login

Authenticate a user and receive an access token.

### Endpoint

```http
POST /login
```

### Request Body

```json
{
    "username": "john",
    "password": "password123"
}
```

### Success Response

```json
{
    "token": "access_token_here"
}
```

---

## Logout

Revoke the authenticated user's token.

### Endpoint

```http
POST /logout
```

### Headers

```http
Authorization: Bearer {access_token}
```

### Success Response

```json
{
    "message": "Logged out successfully"
}
```

---

# 👤 User APIs

All User APIs require Passport Authentication.

---

## Get Authenticated User

Returns the currently logged-in user.

### Endpoint

```http
GET /me
```

### Headers

```http
Authorization: Bearer {access_token}
```

### Success Response

```json
{
    "id": 1,
    "username": "john",
    "email": "john@example.com",
    "created_at": "2025-06-21T10:00:00.000000Z",
    "updated_at": "2025-06-21T10:00:00.000000Z"
}
```

---

## Get All Users

Retrieve all users with pagination support.

### Endpoint

```http
GET /users
```

### Query Parameters

| Parameter | Type    | Description         |
| --------- | ------- | ------------------- |
| page      | integer | Current page number |
| per_page  | integer | Records per page    |

### Example

```http
GET /users?page=1&per_page=10
```

### Success Response

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "username": "john",
            "email": "john@example.com"
        }
    ],
    "total": 100
}
```

---

## Get User By ID

Retrieve a specific user.

### Endpoint

```http
GET /users/{id}
```

### Example

```http
GET /users/1
```

### Success Response

```json
{
    "user": {
        "id": 1,
        "username": "john",
        "email": "john@example.com"
    }
}
```

---

## Update User

Update an existing user.

### Endpoint

```http
PUT /users/{id}
```

### Request Body

```json
{
    "username": "updateduser",
    "email": "updated@example.com"
}
```

### Success Response

```json
{
    "message": "User updated successfully",
    "user": {
        "id": 1,
        "username": "updateduser",
        "email": "updated@example.com"
    }
}
```

---

## Delete User

Delete a user account.

### Endpoint

```http
DELETE /users/{id}
```

### Example

```http
DELETE /users/1
```

### Success Response

```json
{
    "message": "User deleted successfully"
}
```


### Authentication

Required

---

# 👨‍💼 Employee APIs

## Get All Employees

Retrieve employee records with pagination support.

### Endpoint

```http
GET /employees
```

### Authentication

Required

### Example

```http
GET /employees?page=1
```

---

## Get Employee By ID

Retrieve a single employee record.

### Endpoint

```http
GET /employees/{id}
```

### Example

```http
GET /employees/1
```

### Authentication

Required

---

## Create Employee

Create a new employee.

### Endpoint

```http
POST /employees
```

### Request Body

```json
{
    "first_name": "John",
    "last_name": "Doe",
    "email": "john@example.com",
    "phone": "091111111",
    "address": "Yangon",
    "salary": 2500
}
```

### Authentication

Required

---

## Update Employee

Update an existing employee.

### Endpoint

```http
PUT /employees/{id}
```

### Example Request

```json
{
    "first_name": "Updated Name",
    "salary": 3500
}
```

### Authentication

Required

---

## Delete Employee

Remove an employee record.

### Endpoint

```http
DELETE /employees/{id}
```

### Example

```http
DELETE /employees/1
```

### Authentication

Required

---

## Search Employees

Search employees by name, email, employee ID, or other supported fields.

### Endpoint

```http
GET /employees/search
```

### Example

```http
GET /employees/search?search=john
```

### Authentication

Required

---

## Export Employees

Export employee records to an Excel file.

### Endpoint

```http
GET /employees/export
```

### Response

```text
Excel file download (.xlsx)
```

### Authentication

Required

---

## Import Employees

Import employee records from an Excel or CSV file.

### Endpoint

```http
POST /employees/import
```

### Content Type

```http
multipart/form-data
```

### Form Data

| Key  | Type | Required |
| ---- | ---- | -------- |
| file | File | Yes      |

### Supported Formats

```text
.xlsx
.xls
.csv
```

### Authentication

Required

---

# ✅ Validation Rules

The API validates incoming requests using Laravel Form Request validation.

Common validation rules include:

```text
required
string
email
unique
numeric
min
max
```

---

# 🔒 Security

Authentication Provider:

```text
Laravel Passport
```

Authorization Header:

```http
Authorization: Bearer {access_token}
```

---

# 🚀 Features

* Laravel 11 REST API
* Laravel Passport Authentication
* User Management
* Employee CRUD Operations
* Employee Search Functionality
* Pagination Support
* Excel Import (Laravel Excel)
* Excel Export (Laravel Excel)
* Repository Pattern
* Service Layer Architecture
* Faker Seeders
* Large Dataset Support (~10,000 Employee Records)

---

# 🧪 Postman Collection Structure

```text
Auth
├── Register
├── Login
└── Logout

Users
├── Get Authenticated User
├── Get All Users
├── Get User By ID
├── Update User
└── Delete User

Employees
├── Get All Employees
├── Get Employee By ID
├── Create Employee
├── Update Employee
├── Delete Employee
├── Search Employee
├── Export Employee
└── Import Employee
```

