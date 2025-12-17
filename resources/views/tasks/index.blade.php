<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task Manager</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 700px;
            margin: 50px auto;
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form.add-task {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        input, textarea {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-add {
            background: #007bff;
            color: white;
        }

        .task {
            background: #f9f9f9;
            padding: 12px;
            border-radius: 5px;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .task.completed {
            background: #e6ffe6;
            text-decoration: line-through;
            color: #555;
        }

        .actions {
            display: flex;
            gap: 5px;
        }

        .btn-toggle { background: #28a745; color: #fff; }
        .btn-edit { background: #ffc107; color: #000; text-decoration: none; padding: 6px 10px; border-radius: 5px; }
        .btn-delete { background: #dc3545; color: #fff; }

        .status {
            font-size: 12px;
            color: #666;
        }
    </style>
</head>

<body>
<div class="container">

    <h2>📝 Task Manager <!-- Logout Button -->
<form method="POST" action="{{ route('logout') }}" style="text-align:right; margin-bottom:15px;">
    @csrf
    <button style="
        background:#dc3545;
        color:#fff;
        border:none;
        padding:6px 12px;
        border-radius:5px;
        cursor:pointer;
    ">
        Logout
    </button>
</form>
</h2>

    <!-- Add Task Form -->
    <form method="POST" action="/tasks" class="add-task">
        @csrf
        <input type="text" name="title" placeholder="Task title" required>
        <textarea name="description" placeholder="Description"></textarea>
        <button class="btn-add">Add</button>
    </form>

    <!-- Task List -->
    @foreach($tasks as $task)
        <div class="task {{ $task->status === 'completed' ? 'completed' : '' }}">
            <div>
                <strong>{{ $task->title }}</strong><br>
                <span class="status">{{ ucfirst($task->status) }}</span>
            </div>

            <div class="actions">
                <form action="/tasks/{{ $task->id }}/status" method="POST">
                    @csrf
                    @method('PATCH')
                    <button class="btn-toggle">✔</button>
                </form>

                <a href="/tasks/{{ $task->id }}/edit" class="btn-edit">Edit</a>

                <form action="/tasks/{{ $task->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn-delete">X</button>
                </form>
            </div>
        </div>
    @endforeach

</div>
</body>
</html>
