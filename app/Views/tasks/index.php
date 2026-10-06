<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List - TSA2</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #000;
            color: #fff;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            color: #fff;
            margin-bottom: 30px;
        }

        .nav {
            text-align: center;
            margin-bottom: 25px;
        }

        .nav a,
        .button {
            display: inline-block;
            padding: 10px 18px;
            margin: 5px;
            color: #fff;
            text-decoration: none;
            border: 2px solid #ffd700;
            background: #000;
            border-radius: 5px;
        }

        .nav a:hover,
        .button:hover {
            background: #ffd700;
            color: #000;
        }

        .message {
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ffd700;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ffd700;
            padding: 12px;
            text-align: left;
        }

        th {
            background: #222;
            color: #ffd700;
        }

        tr:nth-child(even) {
            background: #111;
        }

        .actions a,
        .actions button {
            display: inline-block;
            padding: 7px 12px;
            margin: 2px;
            border: 1px solid #ffd700;
            background: #000;
            color: #fff;
            text-decoration: none;
            cursor: pointer;
            border-radius: 4px;
        }

        .actions a:hover,
        .actions button:hover {
            background: #ffd700;
            color: #000;
        }

        .actions form {
            display: inline;
        }

        .status {
            text-transform: capitalize;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Task List</h1>

    <div class="nav">
        <a href="/">Welcome</a>
        <a href="/tasks">All Tasks</a>
        <a href="/profile">Profile</a>
        <a href="/about">About</a>

        <?php if (session()->get('logged_in')): ?>
            <a href="/tasks/new">New Task</a>
            <a href="/logout">Logout</a>
        <?php else: ?>
            <a href="/login">Login</a>
        <?php endif; ?>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="message">
            <?= esc(session()->getFlashdata('success')) ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="message">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>
    <?php endif; ?>

    <?php if (empty($tasks)): ?>

        <div class="message">
            No tasks found.
        </div>

    <?php else: ?>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Task</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Created At</th>

                    <?php if (session()->get('logged_in')): ?>
                        <th>Actions</th>
                    <?php endif; ?>
                </tr>
            </thead>

            <tbody>

                <?php foreach ($tasks as $task): ?>

                    <tr>
                        <td><?= esc($task['id']) ?></td>

                        <td><?= esc($task['title']) ?></td>

                        <td class="status">
                            <?= esc($task['status']) ?>
                        </td>

                        <td>
                            <?= esc($task['task_date']) ?>
                        </td>

                        <td>
                            <?= esc($task['created_at']) ?>
                        </td>

                        <?php if (session()->get('logged_in')): ?>

                            <td class="actions">

                                <a href="/tasks/edit/<?= esc($task['id']) ?>">
                                    Edit
                                </a>

                                <form
                                    action="/tasks/delete/<?= esc($task['id']) ?>"
                                    method="post"
                                    onsubmit="return confirm('Are you sure you want to archive this task?');"
                                >
                                    <button type="submit">
                                        Delete
                                    </button>
                                </form>

                            </td>

                        <?php endif; ?>

                    </tr>

                <?php endforeach; ?>

            </tbody>
        </table>

    <?php endif; ?>

</div>

</body>
</html>