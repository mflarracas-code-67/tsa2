<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profile - TSA2</title>

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

        .profile-box {
            border: 2px solid #ffd700;
            padding: 30px;
        }

        .profile-row {
            padding: 15px 0;
            border-bottom: 1px solid #ffd700;
        }

        .profile-row:last-child {
            border-bottom: none;
        }

        .label {
            color: #ffd700;
            font-weight: bold;
            display: inline-block;
            width: 150px;
        }

        .error-box {
            border: 2px solid #ffd700;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Profile</h1>

    <div class="nav">
        <a href="/">Welcome</a>
        <a href="/tasks">Task List</a>
        <a href="/profile">Profile</a>
        <a href="/about">About</a>
    </div>

    <?php if ($user): ?>

        <div class="profile-box">

            <div class="profile-row">
                <span class="label">Username:</span>
                <?= esc($user['username']) ?>
            </div>

            <div class="profile-row">
                <span class="label">Full Name:</span>
                <?= esc($user['full_name']) ?>
            </div>

            <div class="profile-row">
                <span class="label">Email:</span>
                <?= esc($user['email']) ?>
            </div>

            <div class="profile-row">
                <span class="label">Created At:</span>
                <?= esc($user['created_at']) ?>
            </div>

        </div>

    <?php else: ?>

        <div class="error-box">
            No user record found.
        </div>

    <?php endif; ?>

</div>

</body>
</html>