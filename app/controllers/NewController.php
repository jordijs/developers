<?php

require ROOT_PATH . '/app/models/Task.class.php';


class NewController extends Controller
{

	public function NewAction()
    { 
        //Pas 0: Inicialitzar objecte tasca
        $tasks = new TaskModel;
        
        //Pas 1: Obtenir valors de les dades que volem passar
        if (!empty($_POST)) {
            $taskData = array(
            'taskName' => $_POST["taskName"], 
            'user' => $_POST["user"],
            'status' => $_POST["status"],
            'timeStart' => $_POST["timeStart"],
            'timeEnd' => $_POST["timeEnd"]
            );
            echo "The data sent in the form is: <br>";
            var_dump($taskData);
            echo " <br>End of the data sent in the form <br> <br>";
            //Pas 2: executar el model que ens retornarà la tasca passant-li les dades que volem
            $tasks->addTask($taskData);
            
                    
            //Pas 3: Retornar a la vista index/
            return header("Location: ../web/" );
        }
        
    }

}

?>