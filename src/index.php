<?php
header("Access-Control-Allow-Orgin: *");
header("Access-Control-Allow-Methods: *");
header("Content-Type: application/json");

$db = mysqli_connect('db', 'root2', 'passw', 'auth_DB');

require_once 'apiLogic.php';


$method = $_SERVER['REQUEST_METHOD'];

$q = $_GET['q'];
$params = explode('/', $q);

$entity = $params[0];
$id = $_GET['ID'];//$params[1];

if ($entity === ''){
            header("Location: http://localhost/index.html");
        }

switch ($method) {

    case 'GET': {
        
        if (isset($id)) {
            getOne($db, $entity, $id);
        } else {
            getAll($db,$entity);
        }
        break;
    }

    case 'POST': {
        $data = file_get_contents('php://input');
        $data = json_decode($data, true);
        addItem($db, $entity, $data);
        break;
    }
    
    case 'DELETE': {
        if (isset($id)) {
            deleteItem($db, $entity, $id);
        } else {
            http_response_code(400);
            $res = [
                "status" => false,
                "message" => "No ID was sent"
            ];
            echo json_encode($res);
        }
        break;
    }

    case 'PUT': {
        if (isset($id)) {
            $data = file_get_contents('php://input');
            $data = json_decode($data, true);
            updateItem($db, $entity, $id, $data);
        } else {
            http_response_code(400);
            $res = [
                "status" => false,
                "message" => "No ID was sent"
            ];
            echo json_encode($res);
        }
        break;
    }
    
    default:
        break;
}
?>
