<?php

require_once ROOT_PATH . '/app/models/Task.class.php';


class DeleteController extends Controller
{
    
	public function deleteAction()
    {   
        //Pas 1: Inicialitzar objecte tasca
        $tasks = new TaskModel;

        //Pas 2: Obtenir el id de la tasca
        $taskId = $_GET["id"];
        
        //Pas 3: executar el model que esborrarà la tasca de la base de dades
        $tasks->deleteTask($taskId);

        //Pas 4: Tornar la vista a la pàgina principal
        return header("Location: ../web/" );
        
    }

    
}

