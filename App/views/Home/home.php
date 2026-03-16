<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="/JOURNALAPP/public/style/sketchy.css">
</head>

<body class="container mt-5">
    <?php require_once "../App/views/components/navBar.php" ?>

    <div class="text-center mb-4">
        <h6 class="text-muted">
            <?php $date = new DateTime($session['date']);
            echo $date->format('l, F j, Y'); ?>
        </h6>
        <h1 class="display-5">Welcome <?php echo $user['username'] ?></h1>
    </div>

    <!-- the new part -->
    <div class="row g-4 mt-3">

        <div class="col-md-4">
            <a href="/JOURNALAPP/public/diary" class="text-decoration-none">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title">Diary</h2>
                        <p class="card-text text-muted">Write down your daily thoughts and feelings. Capture every moment, reflect, and see your growth over time.</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="/JOURNALAPP/public/journal" class="text-decoration-none">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title">Journal</h2>
                        <p class="card-text text-muted">Get thoughtful questions every day to inspire self-reflection, creativity, and personal insights.</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="/JOURNALAPP/public/todo" class="text-decoration-none">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title">Todo List</h2>
                        <p class="card-text text-muted">Stay organized and focused. Add tasks, set priorities, and check them off as you achieve your goals.</p>
                    </div>
                </div>
            </a>
        </div>

    </div>
</body>

</html>