# GraphQL Documentation

## Endpoint

```http
POST /graphql
```

---

# Authentication

Protected operations require:

```http
Authorization: Bearer {token}
```

---

# Auth Mutations

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

---

## Login

```graphql
mutation {
  login(
    username: "testuser"
    password: "password"
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

---

## Logout

```graphql
mutation {
  logout
}
```

---

# Employee Queries

## Employees

```graphql
query {
  employees(
    first: 10
    page: 1
  ) {
    id
    first_name
    last_name
    email
  }
}
```

---

## Employee By ID

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
    id
    first_name
    last_name
    email
  }
}
```

---

# User Queries

## Users

```graphql
query {
  users(
    first: 10
    page: 1
  ) {
    id
    username
    email
  }
}
```

---

## User By ID

```graphql
query {
  user(id: 1) {
    id
    username
    email
  }
}
```

---

## Search Users

```graphql
query {
  searchUsers(
    search: "test"
    first: 10
    page: 1
  ) {
    id
    username
    email
  }
}
```

---

## Current Authenticated User

```graphql
query {
  me {
    id
    username
    email
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
      salary: 3500
    }
  ) {
    id
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

## Import Employees

```graphql
mutation ($file: Upload!) {
  importEmployees(file: $file)
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

# GraphQL Security

Implemented using:

* @guard(with: ["api"])
* @auth(guard: "api")
* Laravel Passport Tokens

Protected Operations:

* me
* employees
* employee
* users
* user
* searchEmployees
* searchUsers
* createEmployee
* updateEmployee
* deleteEmployee
* createUser
* updateUser
* deleteUser
* logout
* importEmployees

---

# GraphQL Validation

Validation is enforced using Lighthouse directives:

```graphql
@rules
```

Examples:

* required
* string
* email
* unique
* numeric
* min
* max

---

# Upload Support

Employee import supports GraphQL Upload scalar.

Supported format:

```text
.xlsx
```
