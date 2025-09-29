Ecommerce API
Overview

This is a RESTful API for an Ecommerce platform built with Laravel. It supports:

User registration and authentication (Sanctum)

Product management (CRUD)

Order placement with stock management

Category listing and products grouped by category

API versioning (v1 and selective v2)

Installation

Clone the repository:

git clone https://github.com/yourusername/ecommerce-api.git
cd ecommerce-api

Install dependencies:

composer install

Copy .env.example to .env and configure:

cp .env.example .env
php artisan key:generate

Set up the database in .env:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ecommerce
DB_USERNAME=root
DB_PASSWORD=

Run migrations and seeders:

php artisan migrate:fresh --seed

Start the server:

php artisan serve

API Endpoints
Authentication
Method Endpoint Description
POST /api/v1/register Register a new user
POST /api/v1/login Login and get API token
Products (v1)
Method Endpoint Auth Description
GET /api/v1/products ❌ List all products
GET /api/v1/products/{id} ❌ Show single product details
POST /api/v1/products ✅ Create a new product
PUT /api/v1/products/{id} ✅ Update an existing product
DELETE /api/v1/products/{id} ✅ Delete a product
Products (v2)
Method Endpoint Auth Description
GET /api/v2/products ❌ List all products (v2 logic)
Orders
Method Endpoint Auth Description
POST /api/v1/orders ✅ Place a new order
Categories
Method Endpoint Auth Description
GET /api/v1/categories ❌ List all categories
GET /api/v1/categories/products ❌ List products grouped by category
Request Example (Place Order)
POST /api/v1/orders
Authorization: Bearer <token>

{
"products": [
{ "id": 1, "quantity": 1 },
{ "id": 2, "quantity": 2 }
]
}

Response:

{
"message": "Order placed successfully",
"products": [
{ "id": 1, "quantity": 1 },
{ "id": 2, "quantity": 2 }
],
"total_price": 2800
}

Database

Users: id, name, email, password, timestamps

Products: id, name, price, stock, category_id, timestamps

Categories: id, name, timestamps

Orders: id, user_id, total_price, timestamps

order_product (pivot): id, order_id, product_id, quantity, timestamps

Notes

Authentication is required for product creation, update, deletion, and placing orders.
