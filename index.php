<html>

    <?php
        include "login.php";
        include "connection.php"
    ?>

    <head>
        <title>SciLib</title>
        <h1 align="center">SciLib </h1>
    </head>
    
    <body>
        <form>
            <h2 align="center">Scientific Paper Digital Library</h2>    
            <input type="text" id="userName" name="userName" placeholder="Username"/>
            <p> </p>
            <input type="text" id="password" name="password" placeholder="Password"  />
            <p> </p>
            <input type="submit" name="Login" value="LOGIN" onclick="validateForm()">
            <p> </p>

            <p> <b> Not a member? </b></p> 
            <input type="submit" name="Register" value="REGISTER">

        </form>

        <script>
            function validateForm(){
                var userName = document.getElementById("userName").value;
                var pass = document.getElementById("password").value;
                if(pass == "" || userName == "")
                {
                    alert("You have to fill all fields");
                    return false;
                }
            }
        </script>

    </body>

</html>

