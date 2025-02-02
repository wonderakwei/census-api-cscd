<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ghana Population Census</title>
</head>
<body>
<h1>Ghana Population Census - Data Access System</h1>

<p><strong>Important Links:</strong></p>
<ul>
    <li><a href="https://populationhousingcensusgh.vercel.app/">Frontend: Census App</a></li>
    <li><a href="https://dbdocs.io/Wonder%20Akwei/CensusDatabase?view=relationships">Database Documentation</a></li>
    <li><a href="https://github.com/wonderakwei/census-api-cscd">API GitHub Repository</a></li>
</ul>

<h2>Database Design:</h2>
<p>The database structure and design were visualized and documented using the following tools:</p>
<ul>
    <li><strong>Draw.io:</strong> For general flow and architecture diagrams.</li>
    <li><strong>DbDocs.io:</strong> To document the database schema and structure.</li>
    <li><strong>DbDiagram.io:</strong> For visualizing the relationships between different database tables.</li>
</ul>

<h2>Deployment:</h2>
<p>The backend API is accessible via the following link: <a href="https://populationhousingcensusgh.vercel.app/">Census API Backend</a>.</p>
<ul>
    <li><strong>Frontend:</strong> The frontend interfaces with the API for data interaction, and is deployed on <a href="https://vercel.com/">Vercel</a>.</li>
    <li><strong>Database:</strong> The API and database are hosted on AWS EC2 with MySQL RDS, providing scalable and reliable cloud hosting for the application.</li>
</ul>

<h3>Access Links:</h3>
<ul>
    <li><a href="https://populationhousingcensusgh.vercel.app/">API Homepage</a></li>
    <li><a href="https://44.204.79.93/phpmyadmin">Backend Access via phpMyAdmin</a></li>
</ul>

<h4>Accessing the Database via phpMyAdmin:</h4>
<p>To allow a user, such as a lecturer, to access the census-api database with view-only privileges, use the following details:</p>
<ul>
    <li><strong>URL:</strong> <a href="http://44.204.79.93/phpmyadmin">phpMyAdmin Access</a></li>
    <li><strong>Username:</strong> lecturer</li>
    <li><strong>Password:</strong> cscd6112024</li>
</ul>
<p><strong>Permissions:</strong></p>
<ul>
    <li>Can View: Data, schema, stored procedures, and triggers without modifying.</li>
    <li>Cannot Modify: The user cannot modify or delete records or alter the schema or stored procedures.</li>
</ul>
</body>
</html>
