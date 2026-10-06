<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Task - TSA2</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #000;
            color: #fff;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .nav {
            text-align: center;
            margin-bottom: 25px;
        }

        .nav a {
            display: inline-block;
            padding: 10px 18px;
            margin: 5px;
            color: #fff;
            text-decoration: none;
            border: 2px solid #ffd700;
            border-radius: 5px;
        }

        .nav a:hover {
            background: #ffd700;
            color: #000;
        }

        .form-box {
            border: 2px solid #ffd700;
            padding: 25px;
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
            margin-top: 25px;
            padding: 12px 20px;
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

        .error-box {
            border: 1px solid #ffd700;
            padding: 12px;
            margin-bottom: 20px;
        }

        .error-box ul {
            margin: 0;
            padding-left: 20px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Create New Task</h1>

    <div class="nav">
        <a href="/">Welcome</a>
        <a href="/tasks">Task List</a>
        <a href="/profile">Profile</a>
        <a href="/about">About</a>
    </div>

    <?php if (session()->getFlashdata('errors')): ?>

        <div class="error-box">
            <ul>
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>

    <?php endif; ?>

    <div class="form-box">

        <form action="/tasks/create" method="post">

            <?= csrf_field() ?>

            <label for="title">Task Title</label>

            <input
                type="text"
                id="title"
                name="title"
                value="<?= old('title') ?>"
                maxlength="150"
                required
            >

            <label for="task_date">Task Date</label>

            <input
                type="date"
                id="task_date"
                name="task_date"
                value="<?= old('task_date') ?>"
                required
            >

            <button type="submit" class="button">
                Create Task
            </button>

        </form>

    </div>

</div>

</body>
</html>