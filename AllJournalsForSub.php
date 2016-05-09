<html>
    <?php 
        include 'connection.php';
        include 'login.php';
    ?>

    <head>
        <title>SciLib</title>
        <style>
            table {
                border-collapse: collapse;
                width: 90%;
                margin:0 auto;

            }

            th, td {
                padding: 8px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }
        </style>
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

            <form>
                <style type="text/css">.resizedTextbox {  width: 800px; width:50%; height: 22px; padding: 1px; margin: 0 auto; display:block;}</style>
                <input type="text" id="jou_name" name="jou_name" class="resizedTextbox" />
                <style type="text/css">.button {  width: 100px; width:50%; height: 22px; padding: 2px; margin: 0 auto; display:block;}</style>  
                <input align="middle" type="submit" name="Search" value="Search" class="button">
            </form>

        </h1>
    </body>

    <?php
        session_start();
        $uName = null;
        $pWord = null;

        $flag = true;

        if(isset($_GET['Search']))
        {
            if(!empty($_GET["jou_name"]))
            {
                $jou_name = mysqli_real_escape_string($connection, $_GET['jou_name']);
                $query = "SELECT * FROM journal natural join composition WHERE topic LIKE '%$jou_name%' OR name LIKE '%$jou_name%' ";
                $result = mysqli_query($connection, $query);

                if(!$result)
                {
                    echo("Error description: " . mysqli_error($connection));
                }
                
                $count = mysqli_num_rows($result);

            
                echo "                    Search Results: ";
                echo "<br>";
                echo "<br>";

                if($count > 0)
                {
                    echo "<table border = 1>";
                    echo "<thead>";
                    echo"<tr>";
                    echo"<th>Name</th>";
                    echo"<th>Topic</th>";
                    echo"</tr>";
                    echo"</thead>";
                    echo"<tbody>";
                    while($display = mysqli_fetch_array($result))
                    {
                        echo "<tr>";
                        echo "<td >";
                        echo('<a href="SubsHome.php?serial='.$display['name'].'">'.$display['name'].'</a>'); 
                        echo "</td>";
                        echo "<td>" . $display['topic'] . "</td>";
                        if($varr == 1)
                        {
                            $cid1 =  $display['name'];

                        }
                        if($varr == 2)
                        {
                            $cid2 =  $display['name'];
                        }
                     
                        $varr++;


                }
                $varr = 1;
                echo"</tbody>";
                echo"</table>";
            }
            else
            {
                echo "Nothing found!";
            }
                

            }
        }

        if($flag)
        {

            $result = mysqli_query($connection, "SELECT name, topic FROM journal natural join composition") or die(mysqli_error($mysqli));
            $row = mysqli_num_rows($result);

            echo "<br>";
            echo "<br>";
            echo "<br>";
            
            

            if (mysqli_connect_errno())
            {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }


            if($row > 0)
            {   
                echo "<table border = 0 >";
                echo "<thead>";
                echo"<tr>";
                echo"<th>Name</th>";
                echo"<th>Topic</th>";
                echo"</tr>";
                echo"</thead>";
                echo"<tbody>";
                while($display = mysqli_fetch_array($result))
                {
                    echo "<tr>";
                    echo "<td >";
                    echo('<a href="SubsHome.php?serial='.$display['name'].'">'.$display['name'].'</a>'); 
                    echo "</td>";
                    echo "<td>" . $display['topic'] . "</td>";

                    if($varr == 1)
                    {
                        $cid1 =  $display['name'];
                    }
                    if($varr == 2)
                    {
                        $cid2 =  $display['name'];
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
        }
    </script>

    <script type="text/javascript">
        var goToHome = <?php Print($goToHome);?>;
        if(goToHome){
            window.location = 'SubsHome.php';
        }
    </script>

    <script type="text/javascript">
        var goToAllPublications = <?php Print($goToAllPublications);?>;
        if(goToAllPublications){
            window.location = 'allPublications.php';
        }
    </script>

    <script type="text/javascript">
        var goToAllConferences = <?php Print($goToAllConferences);?>;
        if(goToAllConferences){
            window.location = 'allConferences.php';
        }
    </script>

    <script type="text/javascript">
        var goToAllJournals = <?php Print($goToAllJournals);?>;
        if(goToAllJournals){
            window.location = 'allJournals.php';
        }
    </script>


</html>
