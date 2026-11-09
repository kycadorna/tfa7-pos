<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>My Tasks</title>
</head>

<body>
    <header class="site-header">
        <div>
            <h1>My Tasks</h1>
            <p>Organize your day and stay productive.</p>
        </div>

        <span class="task-count">
            {{ $tasks->count() }}
            {{ $tasks->count() === 1 ? 'task' : 'tasks' }}
        </span>
    </header>

    <main class="page-shell">
        @if (session('success'))
            <p class="success-message">
                {{ session('success') }}
            </p>
        @endif

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf

            <div class="form-heading">
                <h2>Create a New Task</h2>
                <p>Write down what you need to accomplish next.</p>
            </div>

            <label for="task_title">Task Title</label>

            <input
                type="text"
                id="task_title"
                name="task_title"
                value="{{ old('task_title') }}"
                placeholder="Enter a task title"
                required
            >

            @error('task_title')
                <p class="error-message">{{ $message }}</p>
            @enderror

            <label for="description">Description</label>

            <textarea
                id="description"
                name="description"
                placeholder="Add some details (optional)"
            >{{ old('description') }}</textarea>

            <button type="submit">Add Task</button>
        </form>

        <div class="tasks-heading">
            <h2>Saved Tasks</h2>
            <span>{{ $tasks->count() }} total</span>
        </div>

        @forelse ($tasks as $task)
            <article class="task-card">
                <div class="task-icon">✓</div>

                <div class="task-content">
                    <h3>{{ $task->task_title }}</h3>

                    <p>
                        {{ $task->description ?: 'No description provided.' }}
                    </p>

                    <p class="task-status">
                        <span></span>
                        {{ $task->completed ? 'Completed' : 'Not completed' }}
                    </p>
                </div>
            </article>
        @empty
            <p class="empty-message">No tasks have been added yet.</p>
        @endforelse
    </main>
</body>
</html>