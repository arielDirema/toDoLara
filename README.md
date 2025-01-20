# **Task Manager in Laravel**

This project is a simple web application for managing tasks. It allows users to create, read, update, and delete tasks. The application is built with **Laravel**, a modern and powerful PHP framework.

---

## **Features**

- **Create a Task**: Add a new task with a title, description, due date, and status (completed or not).
- **List Tasks**: Display all tasks, sorted from most recent to oldest.
- **Edit a Task**: Update the details of an existing task.
- **Delete a Task**: Remove a task from the list.
- **Mark a Task as Complete**: Check a box to mark a task as completed.
- **Filter Tasks**: Display only completed tasks.

---

## **Technologies Used**

- **Laravel**: PHP framework for web development.
- **Tailwind CSS & Flowbite**: CSS framework for modern and responsive design.
- **SQLite**: Database for storing tasks.
- **JavaScript**: For dynamic interactions (e.g., updating task status via AJAX).

---

## **Prerequisites**

Before starting, ensure you have the following installed on your machine:

- **PHP 8.1 or higher**
- **Composer** (to manage PHP dependencies)
- **Node.js** (to compile CSS/JS assets)
- **SQLite** (or another compatible database)
- **Git** (to clone the project)

---

## **Local Installation**

Follow these steps to run the project locally:

### **1. Clone the Project**

Open your terminal and run the following command to clone the repository:

```bash
git clone https://github.com/your-username/your-laravel-project.git
cd your-laravel-project
```

### **2. Install PHP Dependencies**

Install PHP dependencies using Composer:

```bash
composer install
```

### **3. Configure the Environment**

1. Copy the `.env.example` file and rename it to `.env`:

   ```bash
   cp .env.example .env
   ```

2. Open the `.env` file and configure the environment variables:

    - **Database**:
      ```env
      DB_CONNECTION=sqlite
      # DB_HOST=127.0.0.1
      # DB_PORT=3306
      # DB_DATABASE=
      # DB_USERNAME=
      # DB_PASSWORD=
      ```

    - **Application Key**:
      Generate a Laravel application key:
      ```bash
      php artisan key:generate
      ```

### **4. Migrate the Database**

Run migrations to create the tables in the database:

```bash
php artisan migrate
```

### **5. Install JavaScript Dependencies**

Install JavaScript dependencies using npm:

```bash
npm install
```


### **6. Start the Development Server**

Start the Laravel development server:

```bash
php artisan serve
```

Open your browser and access the application at:

```
http://localhost:8000
```

---

## **Usage**

- **Home**: Displays the list of tasks.
- **Create a Task**: Click on "Add a Task" to create a new task.
- **Edit a Task**: Click on "Edit" to update an existing task.
- **Delete a Task**: Click on "Delete" to remove a task.
- **Mark as Complete**: Check the box to mark a task as completed.

---

## **Project Structure**

- **`app/Http/Controllers`**: Contains controllers to handle business logic.
- **`resources/views`**: Contains Blade views for the user interface.
- **`routes/web.php`**: Contains the application routes.
- **`database/migrations`**: Contains database migration files.
- **`public/css`**: Contains compiled CSS files.
- **`public/js`**: Contains compiled JavaScript files.

---

## **Contributing**

If you'd like to contribute to this project, follow these steps:

1. Fork the project.
2. Create a new branch (`git checkout -b feature/new-feature`).
3. Commit your changes (`git commit -m 'Add a new feature'`).
4. Push to the branch (`git push origin feature/new-feature`).
5. Open a Pull Request.

---

## **Author**

- **Ariel Direma** - [arielDirema](https://github.com/arielDirema)

---

## **License**

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

---

## **Acknowledgments**

- Thanks to the Laravel community for their documentation and support.
- Thanks to Tailwind CSS for their amazing CSS framework.

---

If you have any questions or suggestions, feel free to open an issue on GitHub or contact me directly. 😊

---

### **Happy Coding!** 🚀

---

