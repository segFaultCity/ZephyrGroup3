<?php
    
    define("HOST", "zephyr3.clyfvv0ob313.us-east-1.rds.amazonaws.com");
    define("DBUSER", "zephyrdb");
    define("PASS", "zephyrdb");
    define("DB", "zephyr3");
    define("PORT", 3306);

    $inputUsername = $_POST['user'] ? $_POST['user'] : null;
    $inputPassword = $_POST['password'] ? $_POST['password'] : null;

    $link=mysqli_connect(HOST,DBUSER,PASS,DB,PORT); 
    
    // Check connection
    if (mysqli_connect_errno($link)){
        echo "Failure to connect: " . mysqli_connect_error();
    }

    $query = "SELECT * FROM user_info WHERE username = '$inputUsername' ";
    $result = $link->query($query);

    if($result->num_rows === 1) {
            
        $row = $result->fetch_array(MYSQLI_ASSOC);
        if($inputPassword == $row['password']){
            echo "I worked";
            setcookie('username', $inputUsername);
            header("Location: home.php");
            exit; 
        }                    
  
    }  
    
    echo '<script language="javascript">';
    echo 'alert("Wrong username or password was used!")';
    echo '</script>';
    require "index.php";

?>