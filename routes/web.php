<?php
$router = new Router();

$router->get('/login','AuthController@loginForm');
$router->post('/login','AuthController@login');

$router->get('/register','AuthController@registerForm');
$router->post('/register','AuthController@register');

$router->get('/logout','AuthController@logout');

$router->get('/home','HomeController@index');

$router->get('/diary','DiaryController@DiaryForm');
$router->post('/diary','DiaryController@AddDiary');
$router->post('/diary/update','DiaryController@updateDiary');


$router->get('/journal','JournalController@JournalForm');
$router->post('/journal','JournalController@AddJournal');
$router->post('/journal/update','JournalController@updateanswers');


$router->get('/todo','TodoController@TodoForm');
$router->post('/todo/create','TodoController@createTodo');
$router->post('/todo/check','TodoController@checkTask');

$router->get('/history','HistoryController@index');
$router->get('/history/Diary','HistoryController@getDiary');
$router->get('/history/Journal','HistoryController@getJournal');
$router->get('/history/Todo','HistoryController@getTodo');


