<html>
	<head>
		<title>SciLib</title>

	</head>
	<body>
		<h1 align="center">SciLib </h1>
		
		<h2 align="center">Scientific Paper Digital Library</h2>

		<p> <b> Username: </b>  <?php echo $_GET['uName']; ?> </p> <!--replace XXX with the username-->

		<b>Full Name:</b> <input id="name" name="textfield" type="text"> 
		<p></p>
		<b>New Password:</b> <input id="password" name="textfield" type="text"> 
		<p></p>
		<b>Phone:</b> <input id="phone" name="textfield" type="text"> 
		<p></p>
		<b>Address: </b> <input id="address" name="textfield" type="text"> 
		<p></p>
		
	

		<input type="submit" name="Update" value="Update" onclick="validateForm()">
		<!-- button for login. -->
		

		<script>
			function validateForm(){
				var name = document.getElementById("name").value;
				var password = document.getElementById("password").value;
				var phone = document.getElementById("phone").value;
				var address = document.getElementById("address").value;
				
				return true;
			}
		</script>

	</body>	
	
    <?php
		include 'login.php';
	    include "connection.php"
	    
	    echo "<br>";
	    $name = null;
	    $pWord = null;
	    $phone = null;
	    $address = null;
	    if (mysqli_connect_errno())
	    {
	        echo "Failed to connect to MySQL: " . mysqli_connect_error();
	    }
	    
	    if(isset($_GET['Update']))	//if update button is clicked
	    {
        	$name = mysqli_real_escape_string($connection, $_GET['username']);
        	$pWord = mysqli_real_escape_string($connection, $_GET['password']);
        	$phone = mysqli_real_escape_string($connection, $_GET['username']);
        	$address = mysqli_real_escape_string($connection, $_GET['password']);
        	//$userName = $_SESSION['userName'];
	        echo "<br>";
	        if( !(name == "" || password == ""|| phone == "" || address == "" ) )
	        {
				$query = "UPDATE member SET name='$name', password='$pWord', phone='$phone',address='$address' WHERE userName='$uName'  ";
                $result = mysqli_query($connection, $query);
                if(!$result)
                {
                	die('Could not update data: ' . mysql_error());
                }
                echo "Updated data successfully\n";
				// GO TO NEXT PAGE
				header("Location: SubscriberMainPage.php"); //name could change
	        }
	     }
    ?>
</html>
