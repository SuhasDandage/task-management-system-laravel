<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Task</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;  
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 80px auto;
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        .btn-group {
            display: flex;
            justify-content: space-between;
        }

        button {
            padding: 10px 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-update {
            background: #007bff;
            color: #fff;
        }

        .btn-cancel {
            background: #6c757d;
            color: #fff;
            text-decoration: none;
            padding: 10px 18px;
            border-radius: 5px;
            display: inline-block;
        }
    </style>
</head>

<body>

<div class="container">
    <h2>✏️ Edit Task</h2>

    <form method="POST" action="/tasks/{{ $task->id }}">
        @csrf
        @method('PUT')

        <input 
            type="text" 
            name="title" 
            value="{{ $task->title }}" 
            required
        >

        <textarea 
            name="description" 
            rows="4"
        >{{ $task->description }}</textarea>

        <div class="btn-group">
            <button class="btn-update">Update Task</button>
            <a href="/tasks" class="btn-cancel">Cancel</a>
        </div>
    </form>
</div>

</body>
</html>
