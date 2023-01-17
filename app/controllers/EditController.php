<?php

require_once ROOT_PATH . '/app/models/Task.class.php';


class EditController extends Controller
{
    
	public function editAction()
    {   
        //Pas 1: Inicialitzar objecte tasca
        $tasks = new TaskModel;
        

        //Pas 2: Obtenir el id de la tasca
        $taskId = $_GET["id"];
        
        //Pas 3: executar el model que ens retornarà la tasca passant-li quina tasca volem
        $taskToEdit = $tasks->getTaskById($taskId);

        //Pas 4: passar la informació a la vista
        $this->view->taskToEdit = $taskToEdit;
        var_dump($taskId);

        //Pas 5: Passar les noves dades al model perquè les posi a la base de dades
        if (!empty($_POST)) {
            $data = array(
                'id' => $taskId,
                'taskName' => $_POST["taskName"], 
                'user' => $_POST["user"],
                'status' => $_POST["status"],
                'timeStart' => $_POST["timeStart"],
                'timeEnd' => $_POST["timeEnd"]
            );
            var_dump($data,$taskId);
            $tasks->updateTask($data);

        //return header("Location: ../web/" );
        }
    }

    
}

