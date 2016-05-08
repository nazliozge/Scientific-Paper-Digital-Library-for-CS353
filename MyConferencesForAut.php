<html>
	<head>
		<title>SciLib</title>
	</head>
	<body>
		<h1>SciLib </h1>
		
		<h2>Scientific Paper Digital Library</h2>
		

        	
        <form>
	       <h1 align="right"> 
	       <input type="submit" id="buttonPub" name="buttonPub" value="Publications" >
	       <input type="submit" id="buttonCon" name="buttonCon" value="Conferences">
	       <input type="submit" id="buttonJou" name="buttonJou" value ="Journals">
	   </h1>
            
        <h1 align="left">  	
	       <input type="submit" id="buttonHome" name="buttonHome" value="Home">
	       <input type="submit" id="buttonMyPub" name="buttonMyPub" value="My Publications">
	       <input type="submit" id="buttonMyJou" name="buttonMyJou" value="My Journals">
	       <input type="submit" id="buttonMyCon" name="buttonMyCon" value="My Conferences">
	   </h1>


            </form>
            
            &emsp;
            <p></p>

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
		
		
		<div id = "section1">
		<b><u>My Published Conferences </u></b>      		
                <div id = "section2">
                    <b><u>My Ongoing Conferences </u></b>
		            <p></p>
	                Name&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
		            Topic &emsp;&emsp;&emsp;&emsp;
	                
		            <p></p>
	           </div>
		<p></p>
    Name &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
		Topic &emsp;&emsp;&emsp;&emsp;
		<p></p>
	   </div>
            
            
	
	</body>
	
	
	<?php
        echo "<br>";
        session_start();
        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
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
        if(isset($_GET['buttonMyPub']))
        {
            $goToMyPublications = true;
        }
        if(isset($_GET['buttonMyJou']))
        {
            $goMyJournals = true;
        }
        if(isset($_GET['buttonMyCon']))
        {
            $goToMyConference = true;
        }
    ?> 


 
    </script>

    <script type="text/javascript">
        var goToHome = <?php Print($goToHome);?>;
        if(goToHome){
            window.location = 'AuthorHome.php';
        }
    </script>

    <script type="text/javascript">
        var goToAllPublications = <?php Print($goToAllPublications);?>;
        if(goToAllPublications){
            window.location = 'allPublicationsForAut.php';
        }
    </script>

    <script type="text/javascript">
        var goToAllConferences = <?php Print($goToAllConferences);?>;
        if(goToAllConferences){
            window.location = 'allConferencesForAut.php';
        }
    </script>

    <script type="text/javascript">
        var goToAllJournals = <?php Print($goToAllJournals);?>;
        if(goToAllJournals){
            window.location = 'allJournalsForAut.php';
        }
    </script>
        <script type="text/javascript">
        var goToMyPublications = <?php Print($goToMyPublications);?>;
        if(goToMyPublications){
            window.location = 'MyPublicationsForAut.php';
        }
    </script>
    
    <script type="text/javascript">
        var goToMyConferences = <?php Print($goToMyConferences);?>;
        if(goToMyConferences){
            window.location = 'MyConferencesForAut.php';
        }
    </script>

    <script type="text/javascript">
        var goToMyJournals = <?php Print($goToMyJournals);?>;
        if(goToMyJournals){
            window.location = 'MyJournalsForAut.php';
        }
    </script>    
	
</html>
