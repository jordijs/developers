<?php

require ROOT_PATH . '/app/models/Task.class.php';


class NewController extends Controller
{

	public function NewAction()
    { 
        
        
    }

    public function AddAction()
    { 
        /*
        $tasks = new TaskModel;
        $allTasks = $tasks->getTasks();
        
        //$_POST[''];
        
        $this->view->allTasks = $allTasks;
        */

                //Pas 0: Inicialitzar objecte tasca
                $tasks = new TaskModel;
        
                //Pas 1: Obtenir valors de les dades que volem passar
                array_push($taskData, $_POST["taskName"]);
                array_push($taskData, $_POST["user"]);
                array_push($taskData, $_POST["status"]);
                array_push($taskData, $_POST["timeStart"]);
                array_push($taskData, $_POST["timeEnd"]);

                //Pas 2: executar el model que ens retornarà la tasca passant-li les dades que volem
                $tasks->addTask($taskData);
        
                //Pas 3: Retornar a la vista index/
                return header("Location: ../web/" );
    }
}

