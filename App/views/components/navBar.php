<?php
require_once "../App/models/User.php";
$userModel =new User();
$user = isset($_SESSION['user_id'])?$userModel->findByID($_SESSION['user_id']):null;
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded mb-4 px-3">
<a class="navbar-brand" href="#">JournalApp</a>
    <ul class="navbar-nav me-auto">
        <li class="nav-item">
            <a class="nav-link" href="/JOURNALAPP/public/home">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/JOURNALAPP/public/diary">Diary</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/JOURNALAPP/public/journal">Journal</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/JOURNALAPP/public/todo">Todo</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="/JOURNALAPP/public/history" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                History
            </a>
            <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" href="/JOURNALAPP/public/history/Diary">Diary</a></li>
                <li><a class="dropdown-item" href="/JOURNALAPP/public/history/Journal">Journal</a></li>
                <li><a class="dropdown-item" href="/JOURNALAPP/public/history/Todo">Todo List</a></li>

            </ul>
        </li>
    </ul>
    <?php if(!empty($user)) :?>
    <a class="nav-link navbar-nav me-3 " href="#">Hello, <?php echo $user['username'] ?> !</a>
    <a class="nav-link navbar-nav " href="/JOURNALAPP/public/logout">Logout</a>
    <?php else:?>
        <a class="nav-link navbar-nav " href="/JOURNALAPP/public/login">Login</a>
    <?php endif; ?>
</nav>