<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/JOURNALAPP/public/style/sketchy.css">
    <title>Diary</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <?php require_once "../App/views/components/navBar.php" ?>
    <div class="container">
        <h6 class="text-muted">
            <?php $date = new DateTime($session['date']);
            echo $date->format('l, F j, Y'); ?>
        </h6>
            <h1 class="display-6 fw-bold">Diary</h1>
        <h3 class="mb-4">How was your day?</h3>

        <form method="POST" action="diary" id="diary-form">
            <div class="mb-3">
                <textarea class="form-control" name="content" id="content" rows="6" placeholder="Dear Diary..."><?php if (isset( $diary['content'])) echo $diary['content']; ?></textarea>
            </div>
            <button type="submit" id="save-btn" class="btn btn-primary"
                <?php if (isset( $diary['content'])) echo 'disabled'; ?>>
                Save
            </button>

            <button type="submit" id="update-btn" class="btn btn-warning d-none">
                Update
            </button>
        </form>
    </div>

    <?php if (isset($_SESSION['success'])): ?>
        <script>
            alert("<?php echo $_SESSION['success']; ?>");
        </script>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>



<script>
      const form = document.getElementById('diary-form');
        const saveBtn = document.getElementById('save-btn');
        const updateBtn = document.getElementById('update-btn');

        const originalData = new FormData(form);
        const originalString = new URLSearchParams(originalData).toString();

        const textareas = form.querySelectorAll('textarea');
        const isExisting = Array.from(textareas).some(ta => ta.value.trim() !== '');

        form.addEventListener('input', function () {
            const currentString = new URLSearchParams(new FormData(form)).toString();

            if (isExisting) {
                // Editing saved answers — toggle between save/update based on changes
                if (currentString !== originalString) {
                    saveBtn.classList.add('d-none');
                    updateBtn.classList.remove('d-none');
                    form.action = 'diary/update';
                } else {
                    saveBtn.classList.remove('d-none');
                    updateBtn.classList.add('d-none');
                    form.action = '/diary';
                }
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
 <?php require_once "../App/views/components/footer.php" ?>

</body>

</html>