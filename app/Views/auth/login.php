<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - TSA2</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #000;
            color: #fff;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 450px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-box {
            border: 2px solid #ffd700;
            padding: 30px;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 7px;
            color: #ffd700;
        }

        input {
            width: 100%;
            box-sizing: border-box;
            padding: 12px;
            background: #111;
            color: #fff;
            border: 1px solid #ffd700;
            border-radius: 4px;
        }

        .button {
            width: 100%;
            margin-top: 25px;
            padding: 12px;
            background: #000;
            color: #fff;
            border: 2px solid #ffd700;
            cursor: pointer;
            border-radius: 5px;
        }

        .button:hover {
            background: #ffd700;
            color: #000;
        }

        .message {
            border: 1px solid #ffd700;
            padding: 12px;
            margin-bottom: 20px;
            text-align: center;
        }

        .demo-info {
            margin-top: 20px;
            padding: 15px;
            border: 1px solid #ffd700;
            text-align: center;
        }

        .back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            color: #ffd700;
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Login</h1>

    <?php if (session()->getFlashdata('error')): ?>

        <div class="message">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>

    <?php endif; ?>

    <div class="form-box">

        <form action="/login" method="post">

            <?= csrf_field() ?>

            <label for="username">Username</label>

            <input
                type="text"
                id="username"
                name="username"
                value="<?= old('username') ?>"
                required
            >

            <label for="password">Password</label>

            <input
                type="password"
                id="password"
                name="password"
                required
            >

            <button type="submit" class="button">
                Login
            </button>

        </form>

    </div>

    <div class="demo-info">
        <strong>Demo Account</strong><br><br>
        Username: demo_user<br>
        Password: demo123
    </div>

    <a href="/" class="back-link">
        Back to Welcome
    </a>

</div>

</body>
</html>