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

        <div id="tfheader">
            <form id="tfnewsearch" method="get" action="http://www.google.com">
                    <input type="text" class="tftextinput" name="q" size="21" maxlength="120">
                    <input type="submit" value="search" class="tfbutton">
            </form>
            <div class="tfclear"></div>
        </div>

        
	          

	</body>	

	<?php
        echo "<br>";
        session_start();


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
            window.location = 'allPublicationsForSubs.php';

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
