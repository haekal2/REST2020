<?php


include_once './config/Database.php';
include_once './class/Items.php';

header("Content-Type:application/json");

function get($result){
    if($result -> num_rows > 0){
        $itemRecords = array();
        $itemRecords["items"]=array();
            while($item = $result->fetch_assoc()){
                extract($item);
                $itemDetails = array(
                    "id"=> $id,
                    "name"=> $name,
                    "description"=> $description,
                    "price"=> $price,
                    "category_id"=> $category_id,
                    "created"=> $created,
                    "modified"=> $modified
                    
                );
                array_push($itemRecords['items'],$itemDetails);
            }
            http_response_code(200);
            echo json_encode($itemRecords);
    }else{
        http_response_code(404);
        echo json_encode(
            array("message"=>"theres no item")
        );
    }
}

// GET REQUEST
if ($_SERVER['REQUEST_METHOD']=="GET") {
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    $database = new Database();
    $db = $database->getConnection();
    $items = new Items($db);
    $items->id = (isset($_GET['id']) ? $_GET['id'] : '0');
    $result = $items->read();
    get($result);
        
    // POST REQUEST
}else if($_SERVER['REQUEST_METHOD']=="POST"){
    $database = new Database();
    $db = $database->getConnection();
    
    $items = new Items($db);
    
    $data = json_decode(file_get_contents("php://input"));

    if(!empty($data->name) && !empty($data->description) &&
    !empty($data->price) && !empty($data->category_id)){    

        $items->name = $data->name;
        $items->description = $data->description;
        $items->price = $data->price;
        $items->category_id = $data->category_id;	
        $items->created = date('Y-m-d H:i:s'); 
        
        if($items->create()){         
            http_response_code(201);         
            echo json_encode(array("message" => "Item was created."));
        } else{         
            http_response_code(503);        
            echo json_encode(array("message" => "Unable to create item."));
        }
    }else{    
        http_response_code(400);    
        echo json_encode(array("message" => "Unable to create item. Data is incomplete."));
    }
}else if($_SERVER['REQUEST_METHOD']=="DELETE"){
    $database = new Database();
    $db = $database->getConnection();
    
    $items = new Items($db);
    $id = (isset($_GET['id']) ? $_GET['id'] : null);
    if(!empty($id)) {
        $items->id = $id;
        if($items->delete()){    
            http_response_code(200); 
            echo json_encode(array("message" => "Item was deleted."));
        } else {    
            http_response_code(503);   
            echo json_encode(array("message" => "Unable to delete item."));
        }
    } else {
        http_response_code(400);    
        echo json_encode(array("message" => "Unable to delete items. Data is incomplete."));
    }
}