# 🚀 Employee Management System API

A backend Employee Management System built with **Laravel 11** that provides both **REST API** and **GraphQL API** for managing users and employees, including authentication, search, pagination, and Excel import/export functionality.

---

# 📋 Table of Contents

* Overview
* Features
* Technology Stack
* System Architecture
* Design Patterns
* Installation
* Configuration
* API Endpoints
* Authentication
* Database Seeding
* Excel Operations
* Performance Optimizations
* Security Features
* Testing Checklist
* Documentation

---

# 📌 Overview

This project was developed to demonstrate:

* REST API Development
* GraphQL API Development
* Laravel Passport Authentication
* Repository Pattern
* Service Layer Architecture
* Excel Import/Export Operations
* Large Dataset Handling

---

# ✨ Features

## Authentication

* User Registration
* User Login
* User Logout
* Laravel Passport Token Authentication

## User Management

* Create User
* View User
* Update User
* Delete User

## Employee Management

* Create Employee
* View Employee
* Update Employee
* Delete Employee
* Search Employees
* Pagination Support

## Excel Operations

* Import Employees from Excel/CSV
* Export Employees to Excel

## GraphQL Features

* Queries
* Mutations
* Authentication Support
* Pagination
* File Upload Support

---

# 🛠 Technology Stack

| Technology         | Version |
| ------------------ | ------- |
| PHP                | 8.2+    |
| Laravel            | 11      |
| Laravel Passport   | 12      |
| Lighthouse GraphQL | Latest  |
| Laravel Excel      | 3.1     |
| Faker              | 1.23    |

---

# 🏗 System Architecture

```text
Controller
    ↓
Service Layer
    ↓
Repository Layer
    ↓
Database
```

### Employee Module Flow

```text
EmployeeController
    ↓
EmployeeService
    ↓
EmployeeRepository
    ↓
Employee Model
```

## Benefits

* Separation of Concerns
* Maintainable Codebase
* Reusable Business Logic
* Easier Unit Testing
* Scalable Architecture

---

# 🎯 Design Patterns

## Repository Pattern

Responsible for database interactions.

* BaseRepository
* EmployeeRepository
* UserRepository

## Service Layer Pattern

Responsible for business logic.

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

Used for generating test data.

* EmployeeFactory
* UserFactory

---

# ⚙ Installation

## Clone Repository

```bash
git clone <https://github.com/winmyatphyo99/employee-management.git>
cd employee management test
```

## Install Dependencies

```bash
composer install
```

## Environment Setup

```bash
cp .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

Configure database credentials in `.env`.

---

# 🗄 Database Configuration

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=employee_management
DB_USERNAME=root
DB_PASSWORD=
```

---

# 🔐 Passport Setup

Install Passport:

```bash
php artisan passport:install
```

Authentication guard:

```php
'api' => [
    'driver' => 'passport',
    'provider' => 'users',
],
```

---

# 🚀 Running the Application

Run migrations:

```bash
php artisan migrate
```

Seed database:

```bash
php artisan db:seed
```

Start server:

```bash
php artisan serve
```

Application will be available at:

```text
http://127.0.0.1:8000
```

---

# 🌐 API Endpoints

## REST API

```text
http://127.0.0.1:8000/api
```

## GraphQL Endpoint

```text
http://127.0.0.1:8000/graphql
```

## GraphQL Playground

```text
http://127.0.0.1:8000/graphql-playground
```

<!-- ## Swagger Documentation

```text
http://127.0.0.1:8000/api/documentation
``` -->

---

# 🔐 Authentication

Protected endpoints require:

```http
Authorization: Bearer {token}
```

Authentication Flow:

1. Register
2. Login
3. Receive Access Token
4. Access Protected Resources
5. Logout

---

# 📊 Database Seeding

The application seeds:

* 1 Default User
* 10,000 Employee Records

Default User:

| Field    | Value                                       |
| -------- | ------------------------------------------- |
| Username | testuser                                    |
| Email    | [test@example.com](mailto:test@example.com) |
| Password | password                                    |

---

## 📄 Sample Excel File

A sample Excel file is included for testing employee import functionality.

Location:

```text
docs/employees.xlsx
```

Supported columns:

| Column     |
| ---------- |
| first_name |
| last_name  |
| email      |
| phone      |
| address    |
| salary     |

Example API:

```http
POST /api/employees/import
```

Content-Type:

```text
multipart/form-data
```

Form Data:

| Key  | Type |
| ---- | ---- |
| file | File |

Use the provided `employees.xlsx` file to test employee import functionality.


---

# 📈 Performance Optimizations

* Pagination for Large Datasets
* Indexed Search Queries
* Repository Abstraction Layer
* Efficient Bulk Imports
* Optimized Seeder for 10,000+ Records
* Lighthouse Batch Loading

---

# 🛡 Security Features

* Laravel Passport Authentication
* Password Hashing
* Request Validation
* Protected Routes
* GraphQL Authorization Guards
* Token-Based Authentication

---

# 🧪 Testing Checklist

## Authentication

* Register
* Login
* Logout

## Employee Management

* Create Employee
* View Employee
* Update Employee
* Delete Employee
* Search Employees
* Pagination

## Excel

* Import Employees
* Export Employees

## GraphQL

* Queries
* Mutations
* Authentication Flow

---

# 📚 Documentation

Additional documentation:

```text
docs/REST_API_DOCUMENTATION.md
docs/GRAPHQL_DOCUMENTATION.md
docs/employees.xlsx
docs/Employee Management.postman_collection.json
```

---

# 👨‍💻 Author

Employee Management System API

Built with:

* Laravel 11
* Laravel Passport
* Lighthouse GraphQL
* Laravel Excel

---

# 📄 License

This project is developed for educational and assessment purposes.
