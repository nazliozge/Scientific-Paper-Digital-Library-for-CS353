<html>
    <?php 
        include 'connection.php';
        include 'login.php';
    ?>

    <head>
        <title>SciLib</title>
    </head>
    <body>
        <h1>SciLib </h1>
        
        <h2>Scientific Paper Digital Library</h2>
        
        <style>
            }
            #section1 {
                width:400px;
                float:left;
                padding:10px; 
            }
            #section2 {
                width:500px;
                float:right;
                padding:1px; 
            }   
        </style>
            
            <form>
                <h1 align="right"> 
                <input type="submit" id="buttonPub" name="buttonPub" value="Publications" >
                <input type="submit" id="buttonCon" name="buttonCon" value="Conferences">
                <input type="submit" id="buttonJou" name="buttonJou" value ="Journals">
                </h1>


                <h1 align="left">   
                <input type="submit" id="buttonHome" name="buttonHome" value="Home">       
                </h1>
            </form>
        
        <h1 align="left"> 

            <form action="" method="post">  
                <input type="text" name="term" /> 
                <input type="submit" value="Search" />  
            </form>

        </h1>

        <?php
            if (!empty($_REQUEST['term'])) {
             

                $term = mysql_real_escape_string($connection, $_GET['term']);     
                $sql = "SELECT * FROM publication WHERE topic LIKE '$term' OR type LIKE '$term' "; 
                $r_query = mysql_query($connection, $sql); 
                echo "test2";


                if($row > 0)
                {
                    echo "<table border = 1>";
                    echo "<thead>";
                    echo"<tr>";
                    echo"<th>Name</th>";
                    echo"<th>Topic</th>";
                    echo"<th>Type</th>";
                    echo"</tr>";
                    echo"</thead>";
                    echo"<tbody>";

                    while ($display = mysql_fetch_array($r_query)){  
                        echo "<tr>";
                        echo "<td>" . $display['name'] . "</td>";
                        echo "<td>" . $display['topic'] . "</td>";
                        echo "<td>" . $display['type'] . "</td>";
                        if($varr == 1)
                        {
                            $cid1 =  $display['name'];
                        }
                        if($varr == 2)
                        {
                            $cid2 =  $display['name'];
                        }
                        else
                        {
                            $cid3 =  $display['name'];
                        }
                        $varr++; 
                    }
                    $varr = 1;
                    echo"</tbody>";
                    echo"</table>";
                }
                else
                {
                    echo "<br>";
                    echo "Nothing found.";
                }

            }
        ?>

    </body> 

    <?php
        echo "<br>";
        session_start();
        $uName = null;
        $pWord = null;

        $flag = true;

        if($flag)
        {

            $result = mysqli_query($connection, "SELECT name, topic, type FROM publication") or die(mysqli_error($mysqli));
            $row = mysqli_num_rows($result);

            if (mysqli_connect_errno())
            {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }


            if($row > 0)
            {
                echo "<table border = 1>";
                echo "<thead>";
                echo"<tr>";
                echo"<th>Name</th>";
                echo"<th>Topic</th>";
                echo"<th>Type</th>";
                echo"</tr>";
                echo"</thead>";
                echo"<tbody>";
                while($display = mysqli_fetch_array($result))
                {
                    echo "<tr>";
                    echo "<td>" . $display['name'] . "</td>";
                    echo "<td>" . $display['topic'] . "</td>";
                    echo "<td>" . $display['type'] . "</td>";
                    if($varr == 1)
                    {
                        $cid1 =  $display['name'];
                    }
                    if($varr == 2)
                    {
                        $cid2 =  $display['name'];
                    }
                    else
                    {
                        $cid3 =  $display['name'];
                    }
                    $varr++;

                }
                $varr = 1;
                echo"</tbody>";
                echo"</table>";
            }
            else
            {
                echo "<br>";
                echo "Nothing found.";
            }

        }


        if(isset($_GET['buttonHome']))
        {
            $goToHome = true;
        }

        if(isset($_GET['buttonPub']))
        {
            $goToAllPublications = true;
        }

        if(isset($_GET['buttonCon']))
        {
            $goToAllConferences = true;
        }

        if(isset($_GET['buttonJou']))
        {
            $goToAllJournals = true;
        }


    ?> 

    <script type="text/javascript">
        var goToEditSubsInfo = <?php Print($goToEditSubsInfo);?>;
        if(goToEditSubsInfo){
            window.location = 'EditSubsInfo.php';
            window.alert("dasda1");
        }
    </script>

    <script type="text/javascript">
        var goToHome = <?php Print($goToHome);?>;
        if(goToHome){
            window.location = 'SubsHome.php';
            window.alert("dasda1");
        }
    </script>

    <script type="text/javascript">
        var goToAllPublications = <?php Print($goToAllPublications);?>;
        if(goToAllPublications){
            window.location = 'allPublicationsForSubs.php';
            window.alert("dasda1");
        }
    </script>

    <script type="text/javascript">
        var goToAllConferences = <?php Print($goToAllConferences);?>;
        if(goToAllConferences){
            window.location = 'allConferences.php';
            window.alert("dasda1");
        }
    </script>

    <script type="text/javascript">
        var goToAllJournals = <?php Print($goToAllJournals);?>;
        if(goToAllJournals){
            window.location = 'allJournals.php';
            window.alert("dasda1");
        }
    </script>


</html>
