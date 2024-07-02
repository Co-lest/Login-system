<?php
if (true) { //$_SERVER["REQUESTMETHOD"] == "POST"
    $namePerson = $_POST["namePerson"];
    $pass = $_POST["pass"];

    $servername = "localhost";
    $username = "root";
    $password = ""; 
    $dbname = "login_db";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT `name`, `user_name`, `password_` FROM `login_table`";

    $result = $conn->query($sql);
    
    $data = array();
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    
    //echo json_encode($data);
    //var_dump($data);

    if ($namePerson == $data[0] && $pass == $$data[2]) {
        header("Location ../");
    }
    
    $conn->close();
} else {
    header("Location: ../index.html");
}