<html>
	<?php 
		include 'connection.php';
        require 'login.php';
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
			    width:700px;
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
	
		<div id = "section1">
		    <p></p>
		    &emsp;
		    <p></p> <div id = "section2">
                <b>Subscribed Compositions </b>

                <?php

                    session_start();
                    print_r($_SESSION);

                    $_SESSION['uName'] = $uName;

                    $uName = mysqli_real_escape_string($connection, $_GET['$uName']);
                    $query = "SELECT * FROM subscribe WHERE userName = '$uName'";
                    $result = mysqli_query($connection, $query);

                    if(!$result)
                    {
                        echo("Error description: " . mysqli_error($connection));
                    }
                    
                    $count = mysqli_num_rows($result);

            
                    if($count > 0)
                    {
                        echo "<table border = 0>";
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
                            echo "<td >";
                            echo('<a href="SubsHome.php?serial='.$display['name'].'">'.$display['name'].'</a>'); 
                            echo "</td>";
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

                ?>
                <p></p>
			                <p></p>
	                    	</div>
		    <b>Profile Informations<b>
		    <p></p>
		    
			<b>Full Name: </b> 
	                    
			<p></p>
			<b>Phone:</b> 
			<p></p>
			<b>Adress:</b> 
			<p></p>
			<b>Payment Date:</b> 

		</div>

		<h1 align="left"> 
		<form>
			<input type="submit" id="editinfo" name="editinfo" value="Edit information">	  
		</form>
	</body>	

	<?php
        echo "<br>";
        session_start();
        $uName = null;
        $pWord = null;

        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        if(isset($_GET['editinfo']))
        {
            $goToEditSubsInfo = true;
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
            window.location = 'SubsInfoEdit.php';
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
            window.location = 'AllConferences.php';
        }
    </script>

    <script type="text/javascript">
        var goToAllJournals = <?php Print($goToAllJournals);?>;
        if(goToAllJournals){
            window.location = 'allJournals.php';
        }
    </script>


</html>
