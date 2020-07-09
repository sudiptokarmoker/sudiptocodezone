<?php 
//solvearray db user password : e?W~ruf}dK@a
require_once __DIR__.'/config.php';
class API{
    function Select(){
        $db = new Connect;
        $users  = array();
        $data = $db->prepare('SELECT * FROM users ORDER BY id');
        $data->execute();

        while($result = $data->fetch(PDO::FETCH_ASSOC)){
            $users[$result['id']] = array(
              'id' => $result['id'],
              'name' => $result['name'],
              'age' => $result['age']
            );
        }
        return json_encode($users);
    }
}

$API = new API;
header('Content-Type: application/json');
echo $API->Select();
?>