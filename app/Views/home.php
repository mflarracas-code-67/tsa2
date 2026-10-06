<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks for Today - TSA2</title>

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
            margin-bottom: 10px;
        }

        .subtitle {
            text-align: center;
            margin-bottom: 30px;
            color: #ffd700;
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
            border-radius: 5px;
        }

        .nav a:hover {
            background: #ffd700;
            color: #000;
        }

        .welcome-box {
            border: 2px solid #ffd700;
            padding: 20px;
            margin-bottom: 25px;
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

        .message {
            border: 1px solid #ffd700;
            padding: 15px;
            text-align: center;
            margin-top: 20px;
        }

        .status {
            text-transform: capitalize;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Tasks for Today</h1>

    <div class="subtitle">
        Today's Tasks
    </div>

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

    <?php if (session()->get('logged_in')): ?>

        <div class="welcome-box">
            Welcome, <?= esc(session()->get('full_name')) ?>!
        </div>

    <?php endif; ?>

    <?php
        $taskModel = new \App\Models\TaskModel();

        $todayTasks = $taskModel
            ->where('task_date', date('Y-m-d'))
            ->where('is_archived', false)
            ->orderBy('id', 'ASC')
            ->findAll();
    ?>

    <?php if (empty($todayTasks)): ?>

        <div class="message">
            There are no tasks scheduled for today.
        </div>

    <?php else: ?>

        <table>

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Task</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach ($todayTasks as $task): ?>

                    <tr>
                        <td><?= esc($task['id']) ?></td>

                        <td><?= esc($task['title']) ?></td>

                        <td class="status">
                            <?= esc($task['status']) ?>
                        </td>

                        <td><?= esc($task['task_date']) ?></td>
                    </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

    <?php endif; ?>

</div>

</body>
</html>