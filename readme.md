# Laravel 12 Product CRUD (Inertia + Vue)

A modern CRUD application built with **Laravel 12**, **Inertia.js**, and **Vue.js**.
This project demonstrates a complete **Product management system** with create, read, update, and delete functionality using a full-stack SPA approach.

---

## 🚀 Features

* 🛠️ Product CRUD (Create, Read, Update, Delete)
* ⚡ Inertia.js for seamless SPA experience
* 🎨 Vue.js for reactive UI
* 🔐 Laravel backend with clean MVC structure
* 📦 RESTful resource controllers
* 🧾 Form handling & validation

---

## 🧰 Tech Stack

* **Backend:** Laravel 12
* **Frontend:** Vue.js (via Inertia.js)
* **Styling:** Tailwind CSS
* **Database:** MySQL

---

## 📁 Project Structure (Simplified)

```id="u8q7v2"
app/
├── Http/Controllers/ProductController.php

resources/
├── js/
│   ├── Pages/
│   │   └── Products/
│   │       ├── Index.vue
│   │       ├── Create.vue
│   │       ├── Edit.vue
│   └── app.js

routes/
└── web.php
```

---

## 🛠️ Setup Instructions

### 1️⃣ Clone the repository

```bash id="j3k8df"
git clone https://github.com/Shelendra-Chaudhary/laravel-vue-crud.git
cd laravel-vue-crud
```

---

### 2️⃣ Install backend dependencies

```bash id="n2m9xq"
composer install
```

---

### 3️⃣ Install frontend dependencies

```bash id="a4k1zp"
npm install
```

---

### 4️⃣ Setup environment file

```bash id="w8t6lm"
cp .env.example .env
php artisan key:generate
```

---

### 5️⃣ Configure database

Update `.env`:

```env id="k2q9te"
DB_DATABASE=your_database
DB_USERNAME=root
DB_PASSWORD=
```

---

### 6️⃣ Run migrations

```bash id="d5g7vr"
php artisan migrate
```

---

### 7️⃣ Run development servers

```bash id="p9x4kc"
php artisan serve
npm run dev
```

---

### 8️⃣ Open in browser

```id="z0m1hs"
http://127.0.0.1:8000
```

---

## 📦 Product CRUD Features

* ➕ Add new product
* 📋 View all products
* ✏️ Edit product details
* ❌ Delete product
* ✅ Form validation

---

## 💡 How it works

* Laravel handles backend logic and database
* Inertia.js acts as a bridge between backend and frontend
* Vue.js renders dynamic UI without full page reloads

---

## 🎯 Purpose

This project is built for **learning full-stack development** using Laravel with modern frontend tools like Inertia.js and Vue.

---

## 📄 License

This project is open-source and available under the MIT License.
