# Employee Management API

## Overview

Employee Management API is a backend application built with Laravel 11 that provides Employee Management functionality through both REST API and GraphQL.

The application supports:

* User Authentication using Laravel Passport
* Employee CRUD Operations
* Employee Search with Pagination
* Excel Import
* Excel Export
* GraphQL API using Lighthouse
* Repository Pattern
* Service Layer Pattern
* Faker Seeder for generating 10,000 employee records

---

# Technical Stack

| Technology         | Version |
| ------------------ | ------- |
| PHP                | 8.2+    |
| Laravel            | 11      |
| Laravel Passport   | 12      |
| Lighthouse GraphQL | Latest  |
| Laravel Excel      | 3.1     |
| Faker              | 1.23    |

---

# Architecture

The application follows a layered architecture.

Controller Layer

→ Service Layer

→ Repository Layer

→ Database

Example:

EmployeeController

→ EmployeeService

→ EmployeeRepository

→ Employee Model

Benefits:

* Separation of Concerns
* Maintainability
* Scalability
* Testability

---

# Design Patterns Used

## Repository Pattern

Repositories abstract database operations from business logic.

Example:

* BaseRepository
* EmployeeRepository

Responsibilities:

* CRUD operations
* Search operations
* Pagination

---

## Service Layer Pattern

Services contain business logic.

Example:

* EmployeeService
* UserService
* ExcelService

Responsibilities:

* Authentication
* Employee Management
* Excel Import/Export

---

## Dependency Injection

Laravel Service Container is used throughout the application.

Example:

```php
public function __construct(
    EmployeeService $service,
    ExcelService $excelService
)
```

---

## Factory Pattern

Factories generate test and seed data.

Example:

* EmployeeFactory
* UserFactory

---

# Features

## Authentication

* Register
* Login
* Logout
* Passport Access Tokens

---

## Employee Management

* Create Employee
* View Employee
* Update Employee
* Delete Employee
* Search Employee
* Pagination

---

## Excel Operations

* Import Employees
* Export Employees

---

## GraphQL

* Authentication
* Employee Queries
* Employee Mutations
* User Queries
* User Mutations

---

# Installation

## Clone Repository

```bash
git clone <https://github.com/winmyatphyo99/employee-management>

cd employee management test
```

---

## Install Dependencies

```bash
composer install
```

---

## Create Environment File

```bash
cp .env.example .env
```

---

## Configure Database

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=employee_management
DB_USERNAME=root
DB_PASSWORD=
```

---

## Generate Application Key

```bash
php artisan key:generate
```

---

## Run Migrations

```bash
php artisan migrate
```

---

## Install Passport

```bash
php artisan passport:install
```

---

## Seed Database

Creates:

* 1 Test User
* 10,000 Employees

```bash
php artisan db:seed
```

---

# Default Credentials

Username:

```text
testuser
```

Password:

```text
password
```

---

# Running Application

```bash
php artisan serve
```

Application URL:

```text
http://127.0.0.1:8000
```

---

# Authentication

Protected endpoints require:

```http
Authorization: Bearer {token}
```

---

# Database Seed Data

## User

| Field    | Value                                       |
| -------- | ------------------------------------------- |
| username | testuser                                    |
| email    | [test@example.com](mailto:test@example.com) |
| password | password                                    |

---

## Employees

Generated automatically using Faker.

Count:

```text
10000 Employees
```

Fields:

* first_name
* last_name
* email
* phone
* address
* salary

---

# Excel Import Format

Required columns:

```text
first_name
last_name
email
phone
address
salary
```

---

# API Documentation

See:

docs/REST_API_DOCUMENTATION.md

---

# GraphQL Documentation

See:

docs/GRAPHQL_DOCUMENTATION.md

---

# Security

Implemented security measures:

* Laravel Passport Authentication
* Password Hashing
* Form Request Validation
* Protected Routes
* GraphQL Guards

---

# Performance Considerations

* Pagination implemented for employee listing
* Search filtering at database level
* Repository abstraction
* Import uses updateOrCreate to prevent duplicate employees
* Faker-generated dataset contains 10,000 records

---

# Testing Checklist

Authentication

* Register User
* Login User
* Logout User

Employees

* Create Employee
* Get Employee
* Update Employee
* Delete Employee
* Search Employee
* Pagination

Excel

* Import Employees
* Export Employees

GraphQL

* Queries
* Mutations
* Authentication

---

# Author

Employee Management Backend API

Built with Laravel 11, Passport, Lighthouse GraphQL, and Laravel Excel.
