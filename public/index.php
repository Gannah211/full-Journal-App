<?php

session_start();

require_once "../core/Router.php";
require_once "../core/Database.php";
require_once "../core/Controller.php";
require_once "../core/Model.php";

require_once "../routes/web.php";

$router->dispatch();
