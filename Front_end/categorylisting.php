<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .sidebar {
            width: 250px;
            height: 100%;
            background-color: #333;
            position: fixed;
            top: 0;
            left: 0;
            overflow-x: hidden;
            padding-top: 20px;
        }

        .sidebar a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 18px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidebar a:hover {
            color: #f1f1f1;
        }

       .sub-menu {
            padding-left: 20px;
            display: none;
            background-color: black;
        }

        .sub-menu a {
            padding: 8px;
        }

        .menu-item:hover .sub-menu {
            display: block;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <a href="#">Home</a>
    <div class="menu-item">
        <a href="#">Products</a>
        <div class="sub-menu">
            <a href="#">Category 1</a>
            <a href="#">Category 2</a>
            <a href="#">Category 3</a>
        </div>

    </div>
    <div class="menu-item">
        <a href="#">Services</a>
        <div class="sub-menu">
            <a href="#">Service 1</a>
            <a href="#">Service 2</a>
            <a href="#">Service 3</a>
        </div>
    </div>
    <a href="#">Contact</a>
</div>

<div class="content">
    <!-- Your main content goes here -->
    <h2>Main Content</h2>
    <p>This is your main content area.</p>
</div>

</body>
</html>
