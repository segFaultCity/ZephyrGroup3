<?php
    $username = empty($_COOKIE['username']) ? '' : 
    $_COOKIE['username'];

    if (!$username) {
        header("Location: index.php");
        exit;
    }

?>

<!DOCTYPE html>
<html>

    <head>
        <title>Infant Reminders</title>
        <!-- bootstrap -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- icon -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- custom -->
        <link type="text/css" rel="stylesheet" href="css/style.css">
        <link type="text/css" rel="stylesheet" href="css/home.css">
        <!-- js -->
        <script   src="https://code.jquery.com/jquery-3.4.0.min.js"   integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="   crossorigin="anonymous"></script>
        
        <style>body{overflow: scroll;}</style>
    </head>
    
    <body>
        
        <div id="alertMessage">
            <span class="attentionMsg">Attention:</span>
            <iframe id="physicalAlert" name="showHere" sandbox="allow-top-navigation" frameborder="0">
                <!-- Show content here -->
            </iframe><br>
            <input class="okBtn" type="button" name="okBtn" value="Ok" onclick="registerAlert()">
        </div>
        
        <div class="titleHome1 fontH">Infant Routines</div>
        
        <div class="selectionWrap">
            <button id="create" class="selection" onclick="formToggle()">Create Infant Routine <i class="fa fa-angle-down fr"></i></button>
            <div class="formWrap">
                <form action="userInfant.php" target="showHere" method="POST">
                    <input id="title" class="formInput" type="text" name="routineTitle" required value="" placeholder="Routine Title">
                    <input id="name" class="formInput" type="text" name="infantName" required value="" placeholder="Name of Child?">  
                    <input id="when" class="halfFormInputL" type="text" name="when" required value="" placeholder="When?">  
                    <input id="frequency" class="halfFormInputR" type="text" name="frequency" required value="" placeholder="How Often?">
                    <input class="submitForm" type="submit" value="Submit Form" onclick="registerAlert()">
                    <input class="clearForm" type="button" value="Clear Form" onclick="clearForm()">
                </form>
            </div>
            <button class="selection">Check Existing Routines <i class="fa fa-angle-down fr"></i></button>
        </div>
    
        <img src="images/homeLights.jpg" class="img-fluid backDrop" alt="Responsive image">
    
    </body>
    
    <script>
        
        var createState = 1;
        function formToggle(){
            if(createState == 1){
                document.getElementById("create").innerHTML = "Create Infant Routine <i class='fa fa-angle-up fr'>";
                createState = 2;
                $(".formWrap").toggle();
                return;
            }
            if(createState == 2){
                document.getElementById("create").innerHTML = "Create Infant Routine <i class='fa fa-angle-down fr'>";
                createState = 1;
                $(".formWrap").toggle();
                return;
            }
        }
        
        function registerAlert(){
            $("#alertMessage").toggle();
        }
        
        function clearForm(){
            document.getElementById("title").value = "";
            document.getElementById("name").value = "";
            document.getElementById("when").value = "";
            document.getElementById("frequency").value = "";
        }
        
    </script>

</html>