<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journal History</title>
    <link rel="stylesheet" href="/JOURNALAPP/public/style/sketchy.css">
    <style>
        .journal-card {
            transition: transform 0.15s ease, box-shadow 0.15s ease;
        }
        .journal-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.1);
        }
        .card-scroll-body {
            max-height: 420px;
            overflow-y: auto;
        }
        .answer-box {
            background-color: #f8f9fa;
            border-left: 3px solid #6c757d;
            border-radius: 0 4px 4px 0;
            padding: 8px 12px;
            color: #495057;
            white-space: pre-wrap;
        }
        .answer-box.empty {
            color: #adb5bd;
            font-style: italic;
        }
        .question-text {
            /* font-size: 2rem; */
            margin-bottom: 6px;
        }
        .question-block {
            padding-bottom: 14px;
            border-bottom: 1px dashed #dee2e6;
            margin-bottom: 14px;
        }
        .question-block:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

    </style>
</head>
<body>
    <?php require_once "../App/views/components/navBar.php" ?>

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

</body>

</html>