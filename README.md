---

# Installation

Follow these steps for a smooth setup of the Laravel project.

## Requirements

Ensure the following are installed on your system:
1. **WSL** (Windows Subsystem for Linux)  
2. **Composer**  
3. **MySQL**  
4. **PHP Laravel**  
5. **Git**  
6. **Node.js**  
7. **Mailtrap**  

## Installation Guide

### Clone the Repository

Use the following command to clone the repository:  
```bash
git clone https://github.com/Brent-Devroey/laravelProject.git
```

### Set Up the `.env` File

1. Copy the `.env.example` file and rename it to `.env`.  
2. Configure the following sections in the `.env` file:

#### Database Configuration
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=project
DB_USERNAME=root
DB_PASSWORD=[Your Password]
```

#### Mailtrap Configuration
```env
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=[Your Mailtrap Username]
MAIL_PASSWORD=[Your Mailtrap Password]
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="example@gmail.com"
MAIL_FROM_NAME="${APP_NAME}"
```

3. Generate the application key by running:  
```bash
php artisan key:generate
```

### Install Dependencies

Install the required dependencies for PHP and JavaScript:  
```bash
# For PHP
composer install

# For JavaScript
npm install
```

### Set Up the Database

1. Log in to MySQL using the following command:  
   ```bash
   mysql -u root -p
   ```
2. Create the database:  
   ```sql
   CREATE DATABASE project;
   ```
3. Exit MySQL:  
   ```bash
   exit;
   ```

### Run Migrations and Seeders

Run the following command to set up the database tables and seed initial data:  
```bash
php artisan migrate:fresh --seed
```

### Set Up the Storage Link

Create a symbolic link to the storage folder:  
```bash
php artisan storage:link
```
### Start the project
Start the development server:
```bash
 php artisan serve
```
### Images

Since the images are listed in `.gitignore`, you'll need to download them manually:  
[Download Images](https://drive.google.com/drive/folders/1laQBAzyJUr9XUsuemsHtXXvl7IvJ-kNO?usp=sharing)

Place the images in the following folders:  
- `public/storage/`  
- `storage/app/public/`

---

# Features

### Users
- Store books in your library and rate them.  
- Search for users via the search bar.  
- View a user’s most recently added book.  
- View news articles.  
- Access the FAQ.  
- Contact the admin via the contact page.  
- Delete books from your library.  
- Edit your profile.

### Admins
- Access the admin dashboard.  
- Manage users.  
- Manage news articles.  
- Manage the FAQ.  
- Respond to contact forms via email.

---

# Sources

Here are the resources used during development:

- **Fixing Pivot Table for FAQ and Categories**: [ChatGPT Resource](https://chatgpt.com/share/67885fd4-0fa8-800f-8f3b-f5d9790c4873)  
- **Images in Layout**: [ChatGPT Resource](https://chatgpt.com/share/67886039-1b60-800f-865c-2d560672ac15)  
- **Design Issues**: [ChatGPT Resource](https://chatgpt.com/share/67886088-4460-800f-a333-8d5b58296647)  
- **Navbar Search**: [ChatGPT Resource](https://chatgpt.com/share/678860a9-d350-800f-87a5-89ea3d719603)  
- **Route Definition Fix**: [ChatGPT Resource](https://chatgpt.com/share/678860cd-e754-800f-89cc-e5d43b52e85a)  
- **Fixing Email Variable**: [ChatGPT Resource](https://chatgpt.com/share/67886136-a500-800f-9866-c04ac063f944)  
- **Show Recent Book**: [ChatGPT Resource](https://chatgpt.com/share/67886170-3178-800f-a240-53e0f0ed90c5)

---

