<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <link rel="stylesheet" href="/JOURNALAPP/public/style/sketchy.css">
</head>

<body class="d-flex flex-column min-vh-100"> 
    <?php require_once "../App/views/components/navBar.php" ?>
<div class="flex-fill">
    <div class="text-center mb-4">
        <h1 class="display-6 fw-bold">History</h1>
        <p class="text-muted">A place to see the old version of you</p>
    </div>

    <div class="row g-4 mt-3">

        <div class="col-md-4">
            <a href="/JOURNALAPP/public/history/Diary" class="text-decoration-none">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title">Diary History</h2>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="/JOURNALAPP/public/history/Journal" class="text-decoration-none">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title">Journal History</h2>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="/JOURNALAPP/public/history/Todo" class="text-decoration-none">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title">Todo List History</h2>
                    </div>
                </div>
            </a>
        </div>
    </div>
    </div>
<?php require_once "../App/views/components/footer.php" ?>

</body>

</html>