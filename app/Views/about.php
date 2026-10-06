<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>About - TSA2</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #000;
            color: #fff;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 700px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .nav {
            text-align: center;
            margin-bottom: 30px;
        }

        .nav a {
            display: inline-block;
            padding: 10px 18px;
            margin: 5px;
            color: #fff;
            text-decoration: none;
            border: 2px solid #ffd700;
            background: #000;
            border-radius: 5px;
        }

        .nav a:hover {
            background: #ffd700;
            color: #000;
        }

        .about-box {
            border: 2px solid #ffd700;
            padding: 30px;
            line-height: 1.7;
        }

        .about-box h2 {
            color: #ffd700;
            text-align: center;
        }

        .info {
            margin-top: 20px;
        }

        .label {
            color: #ffd700;
            font-weight: bold;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>About</h1>

    <div class="nav">
        <a href="/">Welcome</a>
        <a href="/tasks">Task List</a>
        <a href="/profile">Profile</a>
        <a href="/about">About</a>
    </div>

    <div class="about-box">

        <h2>Tasks for Today Management System</h2>

        <p>
            This system is designed to help users manage their daily
            tasks in an organized and simple way.
        </p>

        <div class="info">
            <p>
                <span class="label">Developer:</span>
                Mico F. Larracas
            </p>

            <p>
                <span class="label">Project:</span>
                Tasks for Today Management System
            </p>

            <p>
                <span class="label">Technology:</span>
                PHP and CodeIgniter 4
            </p>
        </div>

    </div>

</div>

</body>
</html>