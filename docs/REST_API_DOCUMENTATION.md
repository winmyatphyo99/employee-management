# 📘 REST API Documentation

## Employee Management System

Laravel 11 + Passport Authentication + Laravel Excel

---

# Base URL

```http
http://127.0.0.1:8000/api
```

---

# Authentication

Protected routes require:

```http
Authorization: Bearer {token}
```

---

# Auth Endpoints

## Register

```http
POST /register
```

Request:

```json
{
  "username": "john",
  "email": "john@example.com",
  "password": "password123"
}
```

---

## Login

```http
POST /login
```

Request:

```json
{
  "username": "john",
  "password": "password123"
}
```

---

## Logout

```http
POST /logout
```

---

# User Endpoints

## Get All Users

```http
GET /users
```

---

## Get User By ID

```http
GET /users/{id}
```

Example:

```http
GET /users/1
```

---

## Update User

```http
PUT /users/{id}
```

Example:

```json
{
  "username": "updateduser",
  "email": "updated@example.com"
}
```

---

# Employee Endpoints

## Get All Employees

```http
GET /employees
```

---

## Get Employee By ID

```http
GET /employees/{id}
```

Example:

```http
GET /employees/1
```

---

## Create Employee

```http
POST /employees
```

Request:

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

---

## Update Employee

```http
PUT /employees/{id}
```

Request:

```json
{
  "first_name": "Updated Name",
  "salary": 3500
}
```

---

## Delete Employee

```http
DELETE /employees/{id}
```

Example:

```http
DELETE /employees/1
```

---

## Search Employee

```http
GET /employees/search?search=john
```

---

## Export Employees

```http
GET /employees/export
```

Response:

```text
Excel File Download
```

---

## Import Employees

```http
POST /employees/import
```

Content-Type:

```http
multipart/form-data
```

Body:

```text
file: employees.xlsx
```

Supported:

```text
.xlsx
.xls
.csv
```

---

# Validation

Supported validations:

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

# Security

Authentication:

```text
Laravel Passport
```

Header:

```http
Authorization: Bearer {token}
```

---

# Notes

* Repository Pattern
* Service Layer Pattern
* Passport Authentication
* Employee Search
* Pagination Support
* Excel Import
* Excel Export
* Faker Seeders
* Approximately 10,000 employee records
