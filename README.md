# User Management Technical Assessment

This is a simple Laravel-based user management API that allows basic CRUD operations, filtering, and pagination.

## 📦 Features

-   Create user
-   Update user
-   Delete user
-   Show user details
-   List users
-   Filter users by name and email
-   Paginate user listing

## 🛠️ Setup

1. Clone the repository:
    ```bash
    git clone https://github.com/FernandoTrejo/UserManagementTechnicalAssesment.git
    cd UserManagementTechnicalAssesment
    ```

### 2. Install Dependencies
Make sure you have [Composer](https://getcomposer.org/) installed, then run:

```bash
composer install
```

### 3. Create and Configure `.env` File
Copy the example `.env` file and set your environment variables:

```bash
cp .env.example .env
```

Then generate the application key:

```bash
php artisan key:generate
```

Edit `.env` and configure your **database** settings:

```
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database.sqlite
```

### 4. Run Migrations and Seeders
This will create the tables and insert the default roles and users (if any):

```bash
php artisan migrate --seed
```

> If you only want to run the seeders again without dropping all tables:
```bash
php artisan db:seed
```

### 5. Serve the Application
Start the local development server:

```bash
php artisan serve
```

The app will be available at:
```
http://127.0.0.1:8000
```

## 🔐 Protected API Routes (Authentication Required)

All the following routes are protected by the `auth:sanctum` middleware. To access them, you must first authenticate and obtain a valid token.

---

### 🧾 Authentication

**Login**

```
POST /api/login
```

**Request Body:**

```json
{
    "email": "admin@gmail.com",
    "password": "12345678"
}
```

**Response:**

```json
{
    "message": "Login successful.",
    "token": "AUTH_TOKEN",
    "user": {
        "id": 1,
        "name": "Admin",
        "email": "admin@gmail.com",
        "phone_number": "1234567890",
        "created_at": "2025-05-21T15:44:47.000000Z"
    }
}
```

> Use the token in the `Authorization` header for subsequent requests:  
> `Authorization: Bearer YOUR_AUTH_TOKEN`

---

## 👤 User Routes (`/api/user`)

All user-related endpoints are prefixed with `/user` and require authentication.

### 📄 List Users

```
GET /api/user
```

**Optional Query Parameters:**

-   `name` – Filter by name (partial match)
-   `email` – Filter by email (partial match)

Example: /api/user?name=Admin&email=admin@gmail.com
---

### 🔍 Get User by ID

```
GET /api/user/{id}
```

---

### ➕ Create User

```
POST /api/user
```

**Request Body:**

```json
{
    "name": "Ronald",
    "email": "ronaldfernandotrejo233241@gmail.com",
    "password": "12345678",
    "password_confirmation": "12345678",
    "phone_number": "75986525"
}
```

---

### ✏️ Update User

```
PUT /api/user/{id}
```

**Request Body:**  
(You can send one or more of the following fields.)

```json
{
    "name": "Ronald Fernando",
    "email": "ronaldfernandotrejo1@gmail.com",
    "password": "1234567890",
    "password_confirmation": "1234567890",
    "phone_number": "75000000"
}
```

---

### ❌ Delete User

```
DELETE /api/user/{id}
```
