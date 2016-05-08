<html>
    <?php
        include 'connection.php';

        echo "<br>";
        session_start();    //alınan password ya da username'i diğer sayfalara aktarmak için session. Otomatik olarak gönderiyor sanırım.
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

                $uName = mysqli_real_escape_string($connection, $_GET['userName']);
                $pWord = mysqli_real_escape_string($connection, $_GET['password']);


                $_SESSION['userName'] = $_GET['userName']; // primary key olduğu için

                $query = "SELECT * FROM member WHERE userName = '$uName' and password = '$pWord' ";
                $result = mysqli_query($connection, $query);
                
                if(!$result)
                {
                    echo("Error description: " . mysqli_error($connection));
                }
                $count = mysqli_num_rows($result);


                if ($count == 1) {
                    echo "<br>";
                    header( 'Location: home.php' ); // Home page e geçiş, burda kontrol etmemiz gerekiyor. HANGI TUR HOME PAGE?

                }
                else
                {
                    echo "<br> <script> alert('Incorrect username or password.') </script>";
                }
            }
            else    // Nazlı bunu scriptle(Validate formla) yapmış. Farketmez.
            {
                /*
                
                if (empty($_GET["username"]) && !empty($_GET["password"]))
                {
                    echo "<br> <script> alert('Please fill the username field.') </script>";

                }
                if (!empty($_GET["username"]) && empty($_GET["password"]))
                {
                    echo "<br> <script> alert('Please fill the password field.') </script>";
                }
                if(empty($_GET["username"]) && empty($_GET["password"]))
                {
                    echo "<br> <script> alert('Please fill all the fields.') </script>";
                }
                */
                
            }
        }

    ?> 
</html>


