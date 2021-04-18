<h3>Steps to use</h3>

<ol>
    <li>Clone the project</li>
    <li>Update the composer by the command <h2>Composer Update</h2></li>
    <li>Create .env example by copying .env.example and make db configurations <h2>cp .env.example .env</h2></li>
    <li>Create a db with name you configured in the .env</li>
    <li>Migrate all the database from migrations using artisan migration command <h2>php artisan migrate</h2></li>
    <li>Insert the sample values in table <h2>php artisan db:seed</h2></li>
    <li>Run the project in broswer eg: http://localhost/projectname/public</li>
    <li>Register a new user eg: http://localhost/projectname/public/register</li>
    <li>Login  eg: http://localhost/projectname/public/login</li>
</ol>
