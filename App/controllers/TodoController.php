<?php 
require_once "../App/models/Session.php";
require_once "../App/models/Todo.php";

class TodoController extends Controller{
    public function TodoForm(){
        $session_id = $_SESSION['journal_session_id'];

        $sessionModel = new SessionModel();
        $session = $sessionModel->getSessionById($session_id);

        $todoModel = new Todo();
        if(!$todoModel->getTodoId($session_id)){
            $todoModel->createTodo($session_id);
        }
        $existedTasks = $todoModel->getSessionTasks($session_id); // get previous typed tasks 
       
        $this->view("todos/index",['session'=>$session, 'Tasks'=> $existedTasks]);
    }

    public function createTodo(){
        $session_id = $_SESSION['journal_session_id'];
        $sessionModel = new SessionModel();
        $session = $sessionModel->getSessionById($session_id);

        $todoModel = new Todo();
        $todoListID= $todoModel->getTodoId($session_id);
        $content = $_POST['newTask'];
        $priorty=$_POST['priority'];
        $todoModel->createTask($content,$priorty,$todoListID['id']);
        header("Location: /JOURNALAPP/public/todo");
        exit;
    }

    public function checkTask(){
        $todoModel = new Todo();

        $taskId = $_POST['taskId'];
        $status = isset($_POST['status']) ? 1 : 0 ;
        $todoModel->updateTaskStatus($taskId, $status);
       
        header("Location: /JOURNALAPP/public/todo");
        exit;
    }
  

}