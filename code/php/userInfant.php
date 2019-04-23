<?php
    
    define("HOST", "zephyr3.clyfvv0ob313.us-east-1.rds.amazonaws.com");
    define("DBUSER", "zephyrdb");
    define("PASS", "zephyrdb");
    define("DB", "zephyr3");
    define("PORT", 3306);

    $link=mysqli_connect(HOST,DBUSER,PASS,DB,PORT); 

    // Check connection
    if (mysqli_connect_errno($link)){
        echo "Failure to connect: " . mysqli_connect_error();
    }

    $user = empty($_COOKIE['username']) ? '' : 
    $_COOKIE['username'];
    $inputTitle = $_POST['routineTitle'] ? $_POST['routineTitle'] : null;
    $inputName = $_POST['infantName'] ? $_POST['infantName'] : null;
    $inputTime = $_POST['when'] ? $_POST['when'] : null;
    $inputFreq = $_POST['frequency'] ? $_POST['frequency'] : null;

    if($inputTitle == null || $inputName == null || $inputTime == null || $inputFreq == null){
        echo '<p style = "text-align: center;">You did not fill out all the fields. All are required. Try Again.</p>';
        session_write_close();
        exit;
    }
    else{
        $sql = "INSERT INTO infant_routines (username, title, name, time, frequency) VALUES ('$user', '$inputTitle', '$inputName', '$inputTime', '$inputFreq' );";
        echo '<p style = "text-align: center;">Success! You have added an infant routine!</p>';
        if($link->query($sql) === TRUE) {
            session_write_close();
            exit;
        }
         else {
             echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

?>