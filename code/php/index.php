<!DOCTYPE html>

<html>

    <head>
        <title>Remind O' Clock</title>
        <!-- bootstrap -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- custom -->
        <link type="text/css" rel="stylesheet" href="css/style.css">
        
        <!-- script -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        
    </head>
    
    <body>
        
        <img src="images/northernLights.jpg" class="img-fluid backDrop" alt="Responsive image">
        
        <div id="alertMessage">
            <span class="attentionMsg">Attention:</span>
            <iframe id="physicalAlert" name="showHere" sandbox="allow-top-navigation" frameborder="0">
                <!-- Show content here -->
            </iframe><br>
            <input class="okBtn" type="button" name="okBtn" value="Ok" onclick="registerAlert()">
         </div>
        
        <!-- Login Div -->
        <div id="loginDiv" class="box">
          <h2>Remind O' Clock</h2>
          <!-- Form -->
          <form action="handleLogin.php" method="POST">
            <div class="inputBox">
              <input type="text" name="user" required onkeyup="this.setAttribute('value', this.value);" value="">
              <label>Username</label>
            </div>
            <div class="inputBox">
              <input type="password" name="password" required value="" onkeyup="this.setAttribute('value', this.value);">
              <label>Password</label>
            </div>
            <input type="submit" name="sign-in" value="Sign In">
            <input type="button" name="sign-up" value="Sign Up" onclick="toggleDiv()">  
          </form>
        </div>
        
        <!-- Signup Div -->
        <div id="signUpDiv" class="box">
          <h2>Make an Account</h2>
          <!-- Form -->
          <form action="registerUser.php" target="showHere" method="POST">
            <div class="inputBox">
              <input type="text" name="sUser" required onkeyup="this.setAttribute('value', this.value);" value="">
              <label>Create Username</label>
            </div>
            <div class="inputBox">
              <input type="password" name="sPassword" required value="" onkeyup="this.setAttribute('value', this.value);">
              <label>Create Password</label>
            </div>
            <input type="submit" name="sign-in" value="Finish" onclick="registerAlert()"> 
            <input type="button" name="back-btn" value="Back" onclick="toggleDiv()">    
          </form>
        </div>
        
    </body>
    
    <script>
    
        function toggleDiv(){
            $("#signUpDiv").toggle();
            $("#loginDiv").toggle();
        }
        
        function registerAlert(){
            $("#alertMessage").toggle();
        }
        
        
    </script>
    
</html>