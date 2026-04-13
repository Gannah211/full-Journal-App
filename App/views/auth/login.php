<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/JOURNALAPP/public/style/sketchy.css">
    <title>Login</title>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-sm p-4" style="width: 100%; max-width: 400px;">
        <h3 class="card-title text-center mb-4">Login</h3>
        <p>Prove that i know you !</p>
        <?php if (isset($errorMessage)):?>
            <div class="alert alert-dismissible alert-danger">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Oh oh!</strong> <?php echo $errorMessage ?>
            </div>
        <?php endif;?>
        <form method="POST" action="login">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Enter your username" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>

            </div>

            <button type="submit" class="btn btn-dark w-100 mt-2">Login</button>

        </form>
        <p>I don't know you ? <a href="/JOURNALAPP/public/register">then let me know</a></p>
    </div>
</div>
</body>
</html>