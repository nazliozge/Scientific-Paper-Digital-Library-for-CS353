<html>

	<head>
		<title>SciLib</title>
	</head>
	<body>
		<h1>SciLib </h1>
		
		<h2>Scientific Paper Digital Library</h2>
		

        	
        	<form>
            <h1 align="right"> 
            <input type="submit" name="buttonPub" value="Publications">
            <input type="submit" name="buttonjou" value="Journals">
            <input type="submit" name="buttonCon" value="Conferences">
            </h1>

            <h1 align="left">  	
            <input type="submit" name="buttonHome" value="Home">
            </h1>
            </form>
            
            <form>
            <b>Search Journal:</b> 
	
		
			<input id="Journal" name="journalSearch" type="text">
			<p></p>
            </form>
            &emsp;
            <p></p>
            
            <u><b>Published Journal List </b></u>
			<p></p>
			Name:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
			Topic: 

			 <p></p>
	
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
    ?> 

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
            window.location = 'allConferencesForSub.php';
        }
    </script>

    <script type="text/javascript">
        var goToAllJournals = <?php Print($goToAllJournals);?>;
        if(goToAllJournals){
            window.location = 'AllJournalsForSub.php';
        }
    </script>


</html>
