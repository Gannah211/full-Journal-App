<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journal History</title>
    <link rel="stylesheet" href="/JOURNALAPP/public/style/sketchy.css">
    <link rel="stylesheet" href="/JOURNALAPP/public/style/journalCardStyle.css">
</head>

<body class="d-flex flex-column min-vh-100">
    <?php require_once "../App/views/components/navBar.php" ?>
<div class="flex-fill">
     <div class="container mt-5">
    <div class="text-center mb-5">
        <h1 class="display-6 fw-bold">Journal History</h1>
        <p class="text-muted">A look back at your past reflections</p>
    </div>

    <div class="row g-4 mt-2">
        <?php foreach($journals as $date => $questions): ?>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0 journal-card">

                    <div class="card-header bg-dark text-white d-flex align-items-center gap-2 py-3">
                        <span>
                            <h2 class="card-title"><?php echo $date?></h2>
                        </span>
                        <h2 class="ms-auto card-title"><?php echo count($questions); ?> Q</h2>
                    </div>

                    <div class="card-body card-scroll-body p-3">
                        <?php foreach ($questions as $index => $question): ?>
                            <div class="question-block">
                                <p class="question-text">
                                    <?php echo $question['question']; ?>
                                </p>
                                <?php if (!empty($question['answer'])): ?>
                                    <div class="answer-box">
                                        <?php echo $question['answer']; ?>
                                    </div>
                                <?php else: ?>
                                    <div class="answer-box empty">No answer written</div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="card-footer text-end bg-transparent border-top-0 pb-3 pe-3">
                        <small class="text-muted"><?php echo count($questions); ?> question<?php echo count($questions) !== 1 ? 's' : ''; ?></small>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
     </div>
</div>
 <?php require_once "../App/views/components/footer.php" ?>
</body>

</html>