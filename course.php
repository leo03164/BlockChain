<?php
    //header('Content-Type: application/json; charset=UTF-8');
    include "mysql_connect.inc.php";
    $dp = $_POST["department"];
    
    $sql_select = "SELECT * FROM course where department = '$dp'";
    $result = mysqli_query($conn, $sql_select);    

    $rows = array();

    if(mysqli_num_rows($result) > 0){
        while ($r = mysqli_fetch_assoc($result)) {            
            array_push($rows, $r);
        }
        //print json_encode($rows,JSON_UNESCAPED_UNICODE);
        //echo print_r($_POST);
        echo json_encode($rows,JSON_UNESCAPED_UNICODE);
    }else{
        echo "No data";
    }
    mysqli_close($conn);
?>