<?php
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = 'jonathan10219';
    $dbname = 'api_data';

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    if(!$conn){
        die('Could not connect to database: '.mysqli_error($conn));
    }
    $response = array();

    // echo "Connection success";

    $sql = 'SELECT * FROM datatbl';
    $result = mysqli_query($conn, $sql);
    if(!$result){
        die('Error retriving data '. mysqli_error($conn));
    }else{
        header("Content-Type: JSON");
        $i = 0;
        while($row = mysqli_fetch_assoc($result)){
            $response[$i]['id'] = $row['id'];
            $response[$i]['name'] = $row['name'];
            $response[$i]['age'] = $row['age'];
            $response[$i]['email'] = $row['email'];

            $i++;
        }

        echo json_encode($response, JSON_PRETTY_PRINT);
    }
    
?>