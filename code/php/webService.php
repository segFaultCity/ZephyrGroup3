<?php
    // To enable CORS:
    header('Access-Control-Allow-Origin: *');

    //establish db connection
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
    
    //GET from the URL
    $user = empty($_GET['username']) ? false : $_GET['username'];
	$reminder = empty($_GET['reminder']) ? false : $_GET['reminder'];
    
    $output = "This web service will be retrieved by Group 3's backend zephyr system. By Zephyr's HTTP request, the system can grab information stored on this instances RDS and retrun reminder times needed by our qemu hardware.<br><br>Quick help guide:<br><br>When sending a GET request, provide a username you want us to search for and the reminder type you wish to view.<br><br>Acceptable reminder types to search for are as follows:<br><ul><li>infantRoutine</li><li>dailyReminder (WARNING: This use case is not yet implemented)</li><li>randomReminder (WARNING: This use case is not yet implemented)</li></ul><br>EX: http://ec2-34-201-220-43.compute-1.amazonaws.com/remindOclock/webService.php?username=testUser&reminder=infantRoutine<br><br>This example would return the following data:<br>testUser Infant Routines:<ul><li>Nap Time</li><li>Charlie</li><li>3:00PM</li><li>Everyday</li></ul>";

    switch($reminder) {
        case 'infantRoutine':
            $query = "SELECT * FROM infant_routines WHERE username = '$user' ";
            $info = mysqli_query($link, $query);
            $result = mysqli_fetch_array($info);
            $output = "Reminders for user: " . $result['username'] . "<br>" . "Routine: " . $result['title'] . "<br>" . "For: " . $result['name'] . "<br>" . "At: " . $result['time'] . "<br>" . "Frequency: " . $result['frequency'] . "<br>";
            
//            $json_input = '{
//                "'$result['username']'": [
//                    {
//                        "title": "'$result['title']'",
//                        "name": "'$result['name']'",
//                        "time": "'$result['time']'",
//                        "frequency": "'$result['frequency']'"
//                    }
//                ]
//                
//            }';
            break;
    }

    echo $output;
?>