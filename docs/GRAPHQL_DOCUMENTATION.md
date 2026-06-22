# 📘 GraphQL API Documentation

## Employee Management System

This document describes the GraphQL API for the Employee Management System built with:

* Laravel 11
* Lighthouse GraphQL
* Laravel Passport Authentication
* Repository Pattern
* Service Layer Pattern
* Laravel Excel
* Faker Seeders

---

# Table of Contents

1. Overview
2. Endpoint
3. Authentication
4. GraphQL Playground
5. Authentication Mutations
6. User Queries
7. Employee Queries
8. User Mutations
9. Employee Mutations
10. Search Operations
11. File Upload Operations
12. GraphQL Types
13. Validation Rules
14. Security
15. Error Handling
16. Notes

---

# Overview

The GraphQL API provides functionality for:

* User Authentication
* User Management
* Employee Management
* Employee Search
* Pagination
* Protected Operations using Laravel Passport

---

# Endpoint

```http
POST /graphql
```

Example:

```http
http://127.0.0.1:8000/graphql
```

---

# GraphQL Playground

Access the interactive GraphQL Playground:

```http
http://127.0.0.1:8000/graphql-playground
```

The playground allows developers to:

* Execute Queries
* Execute Mutations
* Explore Schema Documentation
* Test Authentication
* Inspect Types

---

# Authentication

Protected operations require a valid access token.

Header:

```http
Authorization: Bearer {token}
```

Example:

```http
Authorization: Bearer 1|xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
```

---

# Authentication Mutations

## Register

```graphql
mutation {
  register(
    username: "john"
    email: "john@example.com"
    password: "password123"
  ) {
    token
    user {
      id
      username
      email
    }
  }
}
```

### Response

```json
{
  "data": {
    "register": {
      "token": "token here",
      "user": {
        "id": "21",
        "username": "johnson",
        "email": "johnson@example.com"
      }
    }
  }
}
```

---

## Login

```graphql
mutation {
  login(
    username: "johnson"
    password: "password123"
  ) {
    token
    user {
      id
      username
      email
    }
  }
}
```
### Response

```json
{
  "data": {
    "login": {
      "token": "token here",
      "user": {
        "id": "21",
        "username": "johnson",
        "email": "johnson@example.com"
      }
    }
  }
}
```

---

## Logout

```graphql
mutation {
  logout
}
```

### Response

```json
{
  "data": {
    "logout": true
  }
}
```

---

# User Queries

## Get Authenticated User

```graphql
query {
  me {
    id
    username
    email
  }
}
```
### Response

```json
{
  "data": {
    "me": {
      "id": "21",
      "username": "johnson",
      "email": "johnson@example.com"
    }
  }
}
```
---

## Get All Users

```graphql
query {
  users(first: 10, page: 1) {
    paginatorInfo {
      currentPage
      lastPage
      total
      count
    }
    data {
      id
      username
      email
    }
  }
}
```
### Response

```json
{
  "data": {
    "users": {
      "paginatorInfo": {
        "currentPage": 1,
        "lastPage": 2,
        "total": 14,
        "count": 10
      },
      "data": [
        {
          "id": "3",
          "username": "superadmin4",
          "email": "superadmin1235@gmail.com"
        },
        {
          "id": "6",
          "username": "hradmin4",
          "email": "hr@admin4.com"
        },
        {
          "id": "7",
          "username": "hradmin5",
          "email": "hr@admin5.com"
        },
        {
          "id": "8",
          "username": "hradmin6",
          "email": "hr@admin6.com"
        },
        {
          "id": "9",
          "username": "hradmin7",
          "email": "hr@admin7.com"
        },
        {
          "id": "10",
          "username": "admin",
          "email": "admin123@gmail.com"
        },
        {
          "id": "11",
          "username": "superadmin",
          "email": "superadmin@test.com"
        },
        {
          "id": "12",
          "username": "testuserwin",
          "email": "testbywinmyatphyo@mail.com"
        },
        {
          "id": "15",
          "username": "testuserwinmyat",
          "email": "testbywinmyatphyo232@mail.com"
        },
        {
          "id": "16",
          "username": "testuserwinmyatphyo",
          "email": "testbywinmyatphyo2325@mail.com"
        }
      ]
    }
  }
}
```
---

## Get User By ID

```graphql
query {
  user(id: 10) {
    id
    username
    email
    created_at
    updated_at
  }
}
```
### Response

```json
{
  "data": {
    "user": {
      "id": "10",
      "username": "admin",
      "email": "admin123@gmail.com",
      "created_at": "2026-06-21 03:56:18",
      "updated_at": "2026-06-21 03:56:18"
    }
  }
}
```
---

## Search Users

```graphql
query {
  searchUsers(
    search: "johnson"
    first: 10
    page: 1
  ) {
    paginatorInfo {
      total
    }
    data {
      id
      username
      email
    }
  }
}
```
### Response

```json
{
  "data": {
    "searchUsers": {
      "paginatorInfo": {
        "total": 1
      },
      "data": [
        {
          "id": "21",
          "username": "johnson",
          "email": "johnson@example.com"
        }
      ]
    }
  }
}
```
---

# Employee Queries

## Get All Employees

```graphql
query {
  employees(first: 10, page: 1) {
    paginatorInfo {
      currentPage
      lastPage
      total
      count
    }
    data {
      id
      first_name
      last_name
      email
      phone
      address
      salary
    }
  }
}
```

---

## Get Employee By ID

```graphql
query {
  employee(id: 1) {
    id
    first_name
    last_name
    email
    phone
    address
    salary
    created_at
    updated_at
  }
}
```

---

## Search Employees

```graphql
query {
  searchEmployees(
    search: "john"
    first: 10
    page: 1
  ) {
    paginatorInfo {
      total
    }
    data {
      id
      first_name
      last_name
      email
    }
  }
}
```

---

# User Mutations

## Create User

```graphql
mutation {
  createUser(
    input: {
      username: "newuser"
      email: "newuser@example.com"
      password: "password123"
    }
  ) {
    id
    username
    email
  }
}
```

---

## Update User

```graphql
mutation {
  updateUser(
    id: 1
    username: "updateduser"
    email: "updated@example.com"
  ) {
    id
    username
    email
  }
}
```

---

## Delete User

```graphql
mutation {
  deleteUser(id: 1) {
    id
  }
}
```

---

# Employee Mutations

## Create Employee

```graphql
mutation {
  createEmployee(
    input: {
      first_name: "John"
      last_name: "Doe"
      email: "john@example.com"
      phone: "091111111"
      address: "Yangon"
      salary: 2500
    }
  ) {
    id
    first_name
    last_name
    email
  }
}
```

---

## Update Employee

```graphql
mutation {
  updateEmployee(
    id: 1
    input: {
      first_name: "Updated Name"
      salary: 3500
    }
  ) {
    id
    first_name
    salary
  }
}
```

---

## Delete Employee

```graphql
mutation {
  deleteEmployee(id: 1) {
    id
  }
}
```

---

# Search Operations

## Search By First Name

```graphql
query {
  searchEmployees(
    search: "John"
    first: 10
  ) {
    data {
      id
      first_name
    }
  }
}
```

---

## Search By Last Name

```graphql
query {
  searchEmployees(
    search: "Doe"
    first: 10
  ) {
    data {
      id
      last_name
    }
  }
}
```

---

## Search By Email

```graphql
query {
  searchEmployees(
    search: "gmail"
    first: 10
  ) {
    data {
      id
      email
    }
  }
}
```

---

## Partial Search

```graphql
query {
  searchEmployees(
    search: "jo"
    first: 10
  ) {
    data {
      id
      first_name
      email
    }
  }
}
```

---

# File Upload Operations

## Import Employees (Excel)

### Mutation

```graphql
mutation ($file: Upload!) {
  importEmployees(file: $file)
}
```

### Variables

```json
{
  "file": null
}
```

### Supported Formats

```text
.xlsx
.xls
.csv
```

---

# GraphQL Types

## User

```graphql
type User {
  id: ID!
  username: String!
  email: String!
  created_at: DateTime!
  updated_at: DateTime!
}
```

---

## Employee

```graphql
type Employee {
  id: ID!
  first_name: String!
  last_name: String!
  email: String!
  phone: String
  address: String
  salary: Float
  created_at: DateTime!
  updated_at: DateTime!
}
```

---

# Validation Rules

Validation is implemented using Lighthouse directives and Laravel Validation Rules.

Supported validations include:

```text
required
string
email
unique
numeric
min
max
nullable
```

---

# Error Handling

## Invalid Email

```graphql
mutation {
  createEmployee(
    input: {
      first_name: "John"
      last_name: "Doe"
      email: "invalid-email"
      salary: 1000
    }
  ) {
    id
  }
}
```

Example Response:

```json
{
  "errors": [
    {
      "message": "The email field must be a valid email address."
    }
  ]
}
```

---

## Duplicate Email

```graphql
mutation {
  createEmployee(
    input: {
      first_name: "John"
      last_name: "Doe"
      email: "existing@example.com"
      salary: 1000
    }
  ) {
    id
  }
}
```

Example Response:

```json
{
  "errors": [
    {
      "message": "The email has already been taken."
    }
  ]
}
}
```

---

# Security

Protected operations use:

```graphql
@guard(with: ["api"])
@auth(guard: "api")
```

Authentication Provider:

```text
Laravel Passport
```

Protected Operations:

* me
* users
* user
* employees
* employee
* searchUsers
* searchEmployees
* createUser
* updateUser
* deleteUser
* createEmployee
* updateEmployee
* deleteEmployee
* importEmployees
* logout

---

# Notes

* GraphQL Playground is enabled.
* Schema documentation is automatically generated by Lighthouse.
* Pagination returns `data` and `paginatorInfo`.
* Employee search supports partial matching.
* Employee records are seeded using Faker.
* Database contains approximately 10,000 seeded employee records.
* Excel import is powered by Laravel Excel.
* Authentication is handled using Laravel Passport.

---

# Auto Generated Documentation

Lighthouse automatically exposes schema documentation through:

```http
http://127.0.0.1:8000/graphql-playground
```

Open the **DOCS** panel in GraphQL Playground to explore:

* Queries
* Mutations
* Types
* Inputs
* Scalars
* Directives

This documentation is generated directly from the GraphQL schema and remains synchronized with the application's API.
