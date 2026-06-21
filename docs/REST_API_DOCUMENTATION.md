# REST API Documentation

## Base URL

```text
http://localhost:8000/api
```

---

# Authentication

## Register

Endpoint

```http
POST /register
```

Request

```json
{
  "username": "john",
  "email": "john@example.com",
  "password": "password123"
}
```

Success Response

```json
{
  "status": true,
  "message": "User registered successfully",
  "data": {
    "id": 1,
    "username": "john",
    "email": "john@example.com"
  }
}
```

---

## Login

Endpoint

```http
POST /login
```

Request

```json
{
  "username": "testuser",
  "password": "password"
}
```

Response

```json
{
  "status": true,
  "message": "Login successful",
  "token": "passport_access_token"
}
```

---

## Logout

Endpoint

```http
POST /logout
```

Headers

```http
Authorization: Bearer TOKEN
```

---

# User APIs

All routes require authentication.

---

## Get All Users

```http
GET /users
```

---

## Get User By ID

```http
GET /users/{id}
```

Example

```http
GET /users/1
```

---

## Update User

```http
PUT /users/{id}
```

Request

```json
{
  "username":"updateduser",
  "email":"updated@example.com"
}
```

---

# Employee APIs

All routes require authentication.

---

## Get Employees

```http
GET /employees
```

Optional Query Parameters

```http
?page=1

?search=john
```

Returns paginated employees.

---

## Get Employee By ID

```http
GET /employees/{id}
```

Example

```http
GET /employees/100
```

---

## Create Employee

```http
POST /employees
```

Request

```json
{
  "first_name":"John",
  "last_name":"Doe",
  "email":"john@example.com",
  "phone":"09123456789",
  "address":"Yangon",
  "salary":2500
}
```

---

## Update Employee

```http
PUT /employees/{id}
```

Request

```json
{
  "salary":3000
}
```

---

## Delete Employee

```http
DELETE /employees/{id}
```

---

## Import Employees

```http
POST /employees/import
```

Content-Type

```text
multipart/form-data
```

Body

```text
file = employees.xlsx
```

Response

```json
{
  "status": true,
  "message": "Imported successfully"
}
```

---

## Export Employees

```http
GET /employees/export
```

Downloads

```text
employees.xlsx
```

---

# Authorization Header

All protected routes require:

```http
Authorization: Bearer {token}
```

---

# HTTP Status Codes

| Status | Meaning          |
| ------ | ---------------- |
| 200    | Success          |
| 201    | Created          |
| 401    | Unauthorized     |
| 404    | Not Found        |
| 422    | Validation Error |
| 500    | Server Error     |
