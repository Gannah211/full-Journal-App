<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/JOURNALAPP/public/style/sketchy.css">
    <title>Journal</title>
</head>

<body>
    <?php require_once "../App/views/components/navBar.php" ?>
    <div class="container">
        <h6 class="text-muted">
            <?php $date = new DateTime($session['date']);
            echo $date->format('l, F j, Y'); ?>
        </h6>
        <h1 class="mb-2">Journal</h1>
        <h4 class="mb-4">Answer These Questions</h4>
        <form method="POST" action="journal" class="card p-4 shadow-sm" id="journal-form">
            <?php for ($i = 0; $i < 3; $i++): ?>
                 <div class="mb-4">
                    <?php if (isset($savedAnswers[$i])): ?> 
                        <label class="form-label fw-bold" for="<?php echo "question" . $i ?>"> 
                            <?php echo $savedAnswers[$i]['question'] ?>
                         </label>
                        <textarea class="form-control" id="<?php echo "question" . $i ?>" name="answer[<?php echo $i ?>]" rows="3"><?php echo $savedAnswers[$i]['answer'] ?>
                        </textarea>
                        <input type="hidden" name="question_id[<?php echo $i ?>]" value="<?php echo $savedAnswers[$i]['question_id']; ?>">
                    <?php else: ?>
                             <label class="form-label fw-bold" for="<?php echo "question" . $i ?>">
                                 <?php echo $questions[$i]['question']; ?> 
                            </label> 
                            <textarea class="form-control" id="<?php echo "question" . $i ?>" name="answer[<?php echo $i ?>]" rows="3">
                            </textarea>
                             <input type="hidden" name="question_id[<?php echo $i ?>]" value="<?php echo $questions[$i]['id']; ?>">
                    <?php endif ?>
                             </div> 
            <?php endfor; ?>
            <!-- <button  type="submit" class="btn btn-primary">Save</button> </form> -->
             <button type="submit" id="save-btn" class="btn btn-primary"
               <?php if (!empty($savedAnswers) && $savedAnswers[0]['answer'] != null) echo 'disabled'; ?>>
                Save
            </button>

            <button type="submit" id="update-btn" class="btn btn-warning d-none">
                Update
            </button>

    </div> <?php if (isset($_SESSION['success'])): ?> <script>
            alert("<?php echo $_SESSION['success']; ?>");
        </script> <?php unset($_SESSION['success']); ?> <?php endif; ?>


<script>
    const form = document.getElementById('journal-form');
    const saveBtn = document.getElementById('save-btn');
    const updateBtn = document.getElementById('update-btn');

    // snapshot the form data on page load
    const originalData = new FormData(form);
    const originalString = new URLSearchParams(originalData).toString();

    form.addEventListener('input', function () {
        const currentString = new URLSearchParams(new FormData(form)).toString();

        if (currentString !== originalString) {
            saveBtn.classList.add('d-none');
            updateBtn.classList.remove('d-none');
            form.action = 'journal/update';
        } else {
            saveBtn.classList.remove('d-none');
            updateBtn.classList.add('d-none');
            form.action = 'journal';
        }
    });
</script>
</body>

</html>
