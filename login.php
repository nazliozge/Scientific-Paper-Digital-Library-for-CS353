<html>
    <?php
        include 'connection.php';

        session_start();
     
        //alınan password ya da username'i diğer sayfalara aktarmak için session. Otomatik olarak gönderiyor sanırım.

        $uName = null;
        $pWord = null;
        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        if(isset($_GET['Login']))
        {
            echo "<br>";
            if(!empty($_GET["userName"]) && !empty($_GET["password"]))
            {  
                $_SESSION['uName'] = $_GET['userName']; 

                $uName = mysqli_real_escape_string($connection, $_GET['userName']);
                $pWord = mysqli_real_escape_string($connection, $_GET['password']);

                $query = "SELECT * FROM member WHERE userName = '$uName' and password = '$pWord' ";
                $result = mysqli_query($connection, $query);
                
                if(!$result)
                {
                    echo("Error description: " . mysqli_error($connection));
                }
                $count = mysqli_num_rows($result);
                if ($count == 1) {
                    $query = "SELECT * FROM author WHERE userName = '$uName'";
                    $resultAuthor = mysqli_query($connection, $query);
                    if(!$resultAuthor)
                    {
                        echo("Error description: " . mysqli_error($connection));
                    }
                    $countAuthor = mysqli_num_rows($resultAuthor);
                    $query = "SELECT * FROM subscriber WHERE userName = '$uName'";
                    $resultSubsc = mysqli_query($connection, $query);
                    if(!$resultSubsc)
                    {
                        echo("Error description: " . mysqli_error($connection));
                    }
                    $countSubsc = mysqli_num_rows($resultSubsc);
                    if($countAuthor==1){
                        $goToAuthHome = true;
                    }
                    if($countSubsc==1){
                        $goToSubscHome = true;
                    }
                               
                }
                else
                {
                    echo "<br> <script> alert('Incorrect username or password.') </script>";
                }
            }
            
        }
        if(isset($_GET['Register']))
        {
            echo "string";
            $goToReg = true;
        }
    ?> 

    <script type="text/javascript">
        var goToAuthHome = <?php Print($goToAuthHome);?>;
        if(goToAuthHome){
            window.location = 'AuthHome.php';
            window.alert("dasda1");
        }
    </script>
    <script type="text/javascript">
        var goToSubscHome = <?php Print($goToSubscHome);?>;                
        if(goToSubscHome){
            window.location = 'SubsHome.php';
        }
    </script>
    <script type="text/javascript">
        var goToReg = <?php Print($goToReg); ?>;
        if(goToReg){
            window.location = 'Register.php';
        }
    </script>
        
</html>
