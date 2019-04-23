<?php
    define("HOST", "zephyr3.clyfvv0ob313.us-east-1.rds.amazonaws.com");
    define("DBUSER", "zephyrdb");
    define("PASS", "zephyrdb");
    define("DB", "zephyr3");
    define("PORT", 3306);

    $inputUsername = $_POST['sUser'] ? $_POST['sUser'] : null;
    $inputPassword = $_POST['sPassword'] ? $_POST['sPassword'] : null;

    $link=mysqli_connect(HOST,DBUSER,PASS,DB,PORT); 

    // Check connection
    if (mysqli_connect_errno($link)){
        echo "Failure to connect: " . mysqli_connect_error();
    }
//    else{
//        echo "Connected";
//    }

    if($inputPassword == null || $inputUsername == null){
        echo '<p style = "text-align: center;">You did not fill out all the fields. All are required. Try Again.</p>';
        session_write_close();
        exit;
    }
    
    //Check for duplicate username
    $query = "SELECT * FROM user_info WHERE username = '$inputUsername' ";
    $result = mysqli_query($link, $query);

    if(mysqli_num_rows($result) >= 1) {
        echo '<p style = "text-align: center;">Oops! That Username is already taken. <br>Please try a different one.</p>';    
        session_write_close();
        exit;
    }
    //Username is not takin and the passwords match
    else {
        $sql = "INSERT INTO user_info (username, password) VALUES ('$inputUsername', '$inputPassword');";
        echo '<p style = "text-align: center;">Success! You Have Made an Account!</p>';
        if($link->query($sql) === TRUE) {
            session_write_close();
            exit;
        }
         else {
             echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    mysqli_close($link);
?>