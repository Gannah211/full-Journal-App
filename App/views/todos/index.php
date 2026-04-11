<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/JOURNALAPP/public/style/sketchy.css">
    <title>Todo list</title>
</head>

<body class="d-flex flex-column min-vh-100">
<?php require_once ($_SERVER['DOCUMENT_ROOT'].'/JournalApp/App/views/components/navBar.php') ?>
    <div class="container">
        <h6 class="text-muted">
            <?php $date = new DateTime($session['date']);
            echo $date->format('l, F j, Y'); ?>
        </h6>

            <h1 class="display-6 fw-bold">Todo List</h1>
        <h3 class="mb-4 text-secondary">Small steps every day make big changes.</h3>

        <form method="POST" action="todo/create" class="row g-2 mb-4">
            <div class="col-md-6">
                <input type="text" name="newTask" class="form-control" placeholder="Add new task" required>
            </div>
            <div class="col-md-3">
                <select id="priority" name="priority" class="form-select">
                    <option value="Normal" selected>Normal</option>
                    <option value="High">High</option>
                    <option value="Low">Low</option>
                </select>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary w-100">+ Add</button>
            </div>
        </form>

        <h3>Tasks</h3>
        <?php if (!empty($Tasks)): ?>
            <ul class="list-group">
                <?php foreach ($Tasks as $task): ?>
                    <li class="list-group-item d-flex align-items-center">
                        <form method="POST" action="todo/check" class="w-100 m-0 p-0">
                            <div class="form-check">
                                <input type="hidden" name="taskId" value="<?php echo $task['task_id']; ?>">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    name="status"
                                    value="1"
                                    onchange="this.form.submit()"
                                    <?php if ($task['is_done']) echo "checked"; ?>>
                                <label class="form-check-label" style="text-decoration: <?php echo $task['is_done'] ? 'line-through' : 'none'; ?>;">
                                    <?php echo $task['content']; ?>
                                </label>
                            </div>
                        </form>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p class="text-muted">No tasks yet.</p>
        <?php endif; ?>
    </div>
<?php require_once ($_SERVER['DOCUMENT_ROOT'].'/JournalApp/App/views/components/footer.php') ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>