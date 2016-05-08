<html>

	<head>
		<title>SciLib</title>
	</head>
	<body>
		<h1>SciLib </h1>
		
		<h2>Scientific Paper Digital Library</h2>
		

        	
        	<form>
            <h1 align="right"> 
            <input type="submit" name="Publications" value="Publications">
            <input type="submit" name="Journals" value="Journals">
            <input type="submit" name="Conferences" value="Conferences">
            </h1>

            <h1 align="left">  	
            <button type="home">Home</button>
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

    </script>

    <script type="text/javascript">
        var goToSubscHome = <?php Print($goToSubscHome);?>;                
        if(goToSubscHome){
            window.alert("dasda2");
            window.location = 'SubsHome.php';
        }

    </script>

</html>
