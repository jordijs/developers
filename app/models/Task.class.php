<?php

class TaskModel extends Model
{
    private $database;
    private $tasks;
    private $taskData;

    public function __construct() {
        $this->database = file_get_contents(ROOT_PATH . '/db/tasks.json');
    }

    public function getTasks(){
        $this->tasks = json_decode($this->database, true);
        return $this->tasks;
    }

    public function getTaskById($taskId){

        $this->tasks = json_decode($this->database, true);

        $tasks = ($this->tasks);
        
        foreach ($tasks as $index => $id ) {
            if ($taskId == $id["id"]){
                $taskToView = ($tasks[$index]);
				return $taskToView;
            }
        }
        
    }


    public function addTask($taskData){
        //obtenim les dades que ens han passat
        //$this->taskData = $taskData;
        //Transformem les dades a format JSON
        //$taskDataJson = json_encode($this->taskData);
        //Afegim les dades al JSON
        //file_put_contents(ROOT_PATH . '/db/tasks.json', $taskDataJson);
    }
    
/*
    public function editTask($taskId){
        //obtenim les dades a canviar
        //introduïm els nous valors a la bbdd
        //tornem a la vista inicial

        $this->tasks = json_decode($this->database, true);

        $tasks = ($this->tasks);
        
        foreach ($tasks as $index => $id ) {
            if ($taskId == $id["id"]){
                $taskToView = ($tasks[$index]);
				return $taskToView;
            }
        }
        
    }
*/
    public function updateTask($data) {
    
    
        $this->tasks = json_decode($this->database, true);
        $tasks = $this->tasks;

        foreach ($data as $i => $dataElement ) {
           if ($i == "id") {
            $dataId = $dataElement;
           }
        }

        foreach ($tasks as $i => $task) {
            if ($task['id'] == $dataId) {
                $tasks[$i] =  $data;
            }
        }
        
        file_put_contents(ROOT_PATH . '/db/tasks.json', json_encode($tasks));

}
}

?>
