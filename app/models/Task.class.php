<?php

class TaskModel extends Model
{
    private $database;
    private $tasks;

    public function __construct() {
        $this->database = file_get_contents(ROOT_PATH . '/db/tasks.json');
    }

    public function getTasks(){
        $this->tasks = json_decode($this->database, true);
        return $this->tasks;
    }

    public function getTaskById($taskId){

        $this->tasks = json_decode($this->database, true);

        $tasks = $this->tasks;
        
        foreach ($tasks as $index => $id ) {
            if ($taskId == $id["id"]){
                $taskToView = ($tasks[$index]);
				return $taskToView;
            }
        }
        
    }


    public function addTask($taskData){

        //1. Inicialitzem bdd
        $this->tasks = json_decode($this->database, true);
        $tasks = $this->tasks;
    
        //3. obtenim el id a introduir

            //3.1 obtenim última tasca
            $lastTask = end($tasks);

            //3.2 en última tasca, agafem el id
            foreach($lastTask as $i => $element) {
                if ($i == "id") {
                    $lastId = $element;
                }
            }

            //3.3 sumem "1" a últim id
            $newId = $lastId + 1;

            //3.4. convertim el id en un array de id
            $newIdArray['id'] = $newId;

        //4. Creem array que sumi id i dades.
        $jointArrayData = $newIdArray + $taskData;

         //echo "The data to be introduced in database by model is: <br><br>";
            //var_dump($jointArrayData);


        //5. Sumem el nostre element a l'array de bdd
        array_push($tasks, $jointArrayData);

        //echo "The final data to be introduced to json is: <br><br>";
        //var_dump($tasks);

        //5. Introduim les dades al JSON
        file_put_contents(ROOT_PATH . '/db/tasks.json', json_encode($tasks));
    }
    

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
