<?php
     
function getAll($db, $table_name) {
    $allItems = mysqli_query($db, "SELECT * FROM `$table_name`");
    $itemsList = [];
    while ($item = mysqli_fetch_assoc($allItems)) {
        $itemsList[] = $item;
    }
    http_response_code(200);
    echo json_encode($itemsList);
}

function getOne($db, $table_name, $id) {
    $item = mysqli_query($db, "SELECT * FROM `$table_name` WHERE ID = '$id';");

    if (mysqli_num_rows($item) < 1) {
        http_response_code(404);
        $res = [
            "status" => false,
            "message" => "Post not found"
        ];
        echo json_encode($res);
    } else {
        http_response_code(200);
        $item = mysqli_fetch_assoc($item);
        echo json_encode($item);
    }
}

function addItem($db, $table_name, $data) {
    if ($table_name === 'users') {
        $name = $data['name'];
        $password = $data['password'];
        $password = password_hash($password, PASSWORD_DEFAULT);
        mysqli_query($db, "INSERT INTO users (name, password) VALUES ('$name', '$password');");

    } else {
        $name = $data['name'];
        $price = $data['price'];
        $amount = $data['amount'];
        mysqli_query($db, "INSERT INTO products (name, price, amount) VALUES ('$name', '$price', '$amount');");

    }
        $res = [
        "status" => true,
        #"item_ID" => mysqli_insert_ID($db)
    ];

    http_response_code(201);

    echo json_encode($res);

}

function deleteItem($db, $table_name, $id) {

    mysqli_query($db, "DELETE FROM `$table_name` WHERE ID = '$id';");

        $res = [
            "status" => true,
            "message" => "Item is deleted"
        ];
    
    echo json_encode($res);
}

function updateItem($db, $table_name, $id, $data) {
    if ($table_name === 'users') {
        $name = $data['name'];
        $password = $data['password'];
        $password = password_hash($password, PASSWORD_DEFAULT);
        mysqli_query($db, "UPDATE users SET name = '$name', password ='$password' WHERE ID = '$id';");

    } else {
        $name = $data['name'];
        $price = $data['price'];
        $amount = $data['amount'];
        mysqli_query($db, "UPDATE products SET name='$name', price='$price', amount='$amount' WHERE ID = '$id';");
    }
    $res = [
        "status" => true,
        "message" => "Item is updated"
    ];
    echo json_encode($res);

}
