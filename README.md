# 🚀 Employee Management System API

A backend system built with **Laravel 11** providing both **REST API** and **GraphQL API** for managing employees and users with authentication, search, pagination, and Excel operations.

---

# 📌 Overview

This system provides:

* 🔐 Authentication (Laravel Passport)
* 👤 User Management
* 👨‍💼 Employee CRUD Operations
* 🔎 Advanced Search + Pagination
* 📊 Excel Import / Export
* 📡 GraphQL API (Lighthouse)
* 🧱 Clean Architecture (Service + Repository Pattern)

---

# 🧰 Tech Stack

| Technology         | Version |
| ------------------ | ------- |
| PHP                | 8.2+    |
| Laravel            | 11      |
| Passport           | 12      |
| Lighthouse GraphQL | Latest  |
| Laravel Excel      | 3.1     |
| Faker              | 1.23    |

---

# 🏗 System Architecture

```
Controller
   ↓
Service Layer
   ↓
Repository Layer
   ↓
Database
```

### Example Flow

```
EmployeeController
   ↓
EmployeeService
   ↓
EmployeeRepository
   ↓
Employee Model
```

### Benefits

* Separation of concerns
* Scalable structure
* Easy testing
* Maintainable codebase

---

# 🧩 Design Patterns

## Repository Pattern

Handles all database operations.

* BaseRepository
* EmployeeRepository
* UserRepository

## Service Layer Pattern

Handles business logic.

* EmployeeService
* UserService
* ExcelService

## Dependency Injection

```php
public function __construct(
    EmployeeService $service,
    ExcelService $excelService
) {}
```

## Factory Pattern

Used for test data generation:

* EmployeeFactory
* UserFactory

---

# ⚡ Features

## 🔐 Authentication

* Register
* Login
* Logout
* Passport Token Authentication

---

## 👨‍💼 Employee Management

* Create Employee
* Read Employee
* Update Employee
* Delete Employee
* Search Employees
* Pagination

---

## 📊 Excel Features

* Import Employees (.xlsx / .csv)
* Export Employees

---

## 📡 GraphQL API

* Authentication Mutations
* User Queries & Mutations
* Employee Queries & Mutations
* Search Operations

---

# 🌐 API Overview

## REST API Base URL

```
http://127.0.0.1:8000/api
```

## GraphQL Endpoint

```
http://127.0.0.1:8000/graphql
```

## Playground

```
http://127.0.0.1:8000/graphql-playground
```

---

# 📘 API Documentation

Full API documentation:

* REST API → `docs/REST_API_DOCUMENTATION.md`
* GraphQL → `docs/GRAPHQL_DOCUMENTATION.md`
* Sample Excel File → `/docs/employees.xlsx`

---

# 🔐 Authentication

All protected endpoints require:

```http
Authorization: Bearer {token}
```

---

# 🧪 Default Test User

| Field    | Value                                       |
| -------- | ------------------------------------------- |
| Username | testuser                                    |
| Password | password                                    |
| Email    | [test@example.com](mailto:test@example.com) |

---

# 📦 Database Seed

* 👤 1 Default User
* 👨‍💼 10,000 Employees (Faker generated)

---

# 📊 Employee Fields

* first_name
* last_name
* email
* phone
* address
* salary

---

# 📥 Excel Import Format

Required columns:

```
first_name
last_name
email
phone
address
salary
```

---

# 🔐 Security

* Laravel Passport Authentication
* Password Hashing
* Request Validation
* Protected Routes
* GraphQL Guards

---

# ⚙ Performance Design

* Pagination for large datasets
* Indexed search queries
* Repository abstraction layer
* Efficient import (updateOrCreate)
* Seeder optimized for bulk data

---

# 🧪 Testing Checklist

## Authentication

* Register
* Login
* Logout

## Employees

* Create
* Read
* Update
* Delete
* Search
* Pagination

## Excel

* Import
* Export

## GraphQL

* Queries
* Mutations
* Auth flow

---

# 👨‍💻 Author

Built with Laravel 11 + Passport + Lighthouse GraphQL + Laravel Excel

Employee Management Backend System
