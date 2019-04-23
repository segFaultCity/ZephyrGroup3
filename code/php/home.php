<!DOCTYPE html>

<html>

    <head>
    
        <title>Remind O' Clock Home</title>
        <!-- bootstrap -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- icon -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- custom -->
        <link type="text/css" rel="stylesheet" href="css/style.css">
        <link type="text/css" rel="stylesheet" href="css/home.css">
        
        
    </head>
    
    <body>
        
        <?php
    
            $username = empty($_COOKIE['username']) ? '' : 
            $_COOKIE['username'];

            if (!$username) {
                header("Location: index.php");
                exit;
            }
            else{
                echo '<div id="textWrap">';
                echo '<div class="titleHome1 fontH">Remind O</div>';
                echo '<div class="titleHome2 fontH">Clock</div>';  
                echo '</div>';
                echo '<div class="titleHome3 fontH2">Welcome back ' . $username . '!</div>';    
            }

        ?>
        
        <div class="wrap">
            <form action="userInfant.php"></form>
            <button type="submit" class="buttonM" onclick="location.href='http://ec2-34-201-220-43.compute-1.amazonaws.com/remindOclock/infantReminders.php';">Infant Routines</button>
            <div class="buttonD"><i class="fa fa-lock"></i> Daily Schedule<br>Not yet available</div>
            <div class="buttonD"><i class="fa fa-lock"></i> Random Reminders<br>Not yet available</div>
        </div>
        
        <img src="images/homeLights.jpg" class="img-fluid backDrop" alt="Responsive image">
    
    </body>
    
</html>