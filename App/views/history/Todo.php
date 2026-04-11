<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo history</title>
    <link rel="stylesheet" href="/JOURNALAPP/public/style/sketchy.css">
</head>

<body class="d-flex flex-column min-vh-100">
<?php require_once ($_SERVER['DOCUMENT_ROOT'].'/JournalApp/App/views/components/navBar.php') ?>

   <div class="flex-fill">
    <div class="container mt-5">

        <div class="text-center mb-4">
            <h1 class="display-6 fw-bold">Todo Histroy</h1>
            <p class="text-muted">A record of everything you set out to do</p>
        </div>

        <div class="row g-4 mt-3">
            <?php foreach($Todos as $date => $tasks):?>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h2><?php echo $date ;?></h2>
                            <ul class="list-group">
                                <?php foreach ($tasks as $task): ?>
                                    <li class="list-group-item d-flex align-items-center">
                                        <div class="form-check">
                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                <?php if ($task['is_done']) echo "checked"; ?>
                                                onclick="return false;">
                                            <label class="form-check-label"
                                                style="text-decoration: <?php echo $task['is_done']==1 ? 'line-through' : 'none'; ?>;">
                                                <?php echo $task['content']; ?>
                                            </label>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>

    </div>
</div>
<?php require_once ($_SERVER['DOCUMENT_ROOT'].'/JournalApp/App/views/components/footer.php') ?>
</body>

</html>