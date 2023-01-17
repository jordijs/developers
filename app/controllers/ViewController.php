<?php

require_once ROOT_PATH . '/app/models/Task.class.php';


class ViewController extends Controller
{
    
	public function viewAction()
    {   
        //Pas 0: Inicialitzar objecte tasca
        $tasks = new TaskModel;
        
        //Pas 1: Passar paràmetre de quina tasca volem
        $taskId = $_GET["id"];
        
        //Pas 2: executar el model que ens retornarà la tasca passant-li quina tasca volem
        $taskToView = $tasks->getTaskById($taskId);

        //Pas 3: passar la informació a la vista
        $this->view->taskToView = $taskToView;

    }

    
}

