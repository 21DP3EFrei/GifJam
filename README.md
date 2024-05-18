# About

# Kā palaist
open XAMP
http://localhost/phpmyadmin/index.php?route=/database/structure&server=1&db=webpro&table=
(ja vajag, cd api)
php artisan serve

# Github
git add .
git commit -m "Your commit message"
git push


# Dev Info
using C:\Users\User\Desktop\Projekts\api\resources\views\navigation-menu.blade.php as style now.
Delete old style, aka layout and header.



## Installation

To run this project locally, follow these steps:

1. Ensure you have PHP (version ^8.1) installed on your system.
2. Install Composer globally if you haven't already. You can download it from [getcomposer.org](https://getcomposer.org/).
3. Ensure you have Node.js and npm (or Yarn) installed on your system.
4. Clone this repository to your local machine.
5. Navigate to the project directory in your terminal.
6. Run `composer install` to install PHP dependencies.
7. Run `npm install` to install JavaScript dependencies.
8. Create a `.env` file based on the `.env.example` file and configure it with your environment settings.
9. Run `php artisan key:generate` to generate an application key.
10. If the project uses a database, ensure you have a database server installed and configured. Update the `.env` file with your database connection details.
11. Run `php artisan migrate` to run database migrations.
12. Finally, run `npm run dev` to compile assets and start the development server.
13. Visit `http://localhost:3000` in your browser to view the application.

That's it! You should now have the project up and running locally.
