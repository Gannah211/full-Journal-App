<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diary History</title>
    <link rel="stylesheet" href="/JOURNALAPP/public/style/sketchy.css">

</head>

<body class="d-flex flex-column min-vh-100">
<?php require_once ($_SERVER['DOCUMENT_ROOT'].'/JournalApp/App/views/components/navBar.php') ?>
<div class="flex-fill">
        <div class="container mt-5">
            <div class="text-center mb-4">
                <h1 class="display-6 fw-bold">Diary Histroy</h1>
                <p class="text-muted">Relive the moments you chose to remember</p>
            </div>

            <div class="row g-4 mt-3">
                <?php foreach($diaries as $diary):?>
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h2 class="card-title"><?php echo $diary['date']?></h2>
                                <p><?php echo $diary['content']?></p>
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