<?php
require_once "../App/models/User.php";
$userModel =new User();
$user = $userModel->findByID($_SESSION['user_id']);
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded mb-4 px-3">
    <a class="navbar-brand" href="#">JournalApp</a>
    <div class="navbar-nav me-auto">
        <a class="nav-link" href="/JOURNALAPP/public/home">Home</a>
        <a class="nav-link" href="/JOURNALAPP/public/diary">Diary</a>
        <a class="nav-link" href="/JOURNALAPP/public/journal">Journal</a>
        <a class="nav-link" href="/JOURNALAPP/public/todo">Todo</a>
    </div>
    <a class="nav-link navbar-nav me-3 " href="#">Hello, <?php echo $user['username'] ?> !</a>
    <a class="nav-link navbar-nav " href="/JOURNALAPP/public/logout">Logout</a>

</nav>