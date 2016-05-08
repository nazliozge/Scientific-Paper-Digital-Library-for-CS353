<html>
	<head>
		<title>SciLib</title>
	</head>
	<body>
		<h1>SciLib </h1>
		
		<h2>Scientific Paper Digital Library</h2>

		<h3> Register </h3>
		<form>

			<!-- fields to fill -->
			<p> Username: </p> 
			<input type="text" id="userName" name="userName" placeholder="Username"/>
	            	<p> Password: </p>
	        	<input type="text" id="password" name="password" placeholder="Password"  />
	        	<p> Full Name: </p> 
	           	<input type="text" id="name" name="name" placeholder="Name"/>
	        	<p> Phone: </p>
	            	<input type="text" id="phone" name="phone" placeholder="Phone"/>
	            	<p> Address: </p> 
	            	<input type="text" id="address" name="address" placeholder="Address"/>


			<!-- membership - list type could be changed; currently not compatible with sql statement!  -->
			<p> Membership: </p>
			<select name="membership">
				<option value="subscriber">Subscriber</option>
				<option value="student">Student</option>
				<option value="researcher">Researcher</option>
				<option value="editor">Editor</option>
			</select>

			<input type="submit" name="Continue" value="CONTINUE" onclick="validateForm()">
  
		</form>
	

		<script>
			function validateForm(){
				var username = document.getElementById("userName").value;
				var pass = document.getElementById("pass").value;
				var name = document.getElementById("name").value;
				var phone = document.getElementById("phone").value;
				var address = document.getElementById("address").value;
				if(pass == "" || username == ""|| name == "" || phone == "" || address == "" )
				{
					alert("You have to fill all fields");
					return false;
				}
				return true;
			}
		</script>

	</body>

	<?php
	        include 'connection.php';
	
	        echo "<br>";
	        session_start();
	        $uName = null;
	        $pWord = null;
	
	        if (mysqli_connect_errno())
	        {
	            echo "Failed to connect to MySQL: " . mysqli_connect_error();
	        }
	
	        if(isset($_GET['Continue']))
	        {
	
	            echo "<br>";
	            if( !(pass == "" || username == ""|| name == "" || phone == "" || address == "" ) )
	            {
	            	$_SESSION["userName"] = $_GET["userName"];
			$_SESSION["password"] = $_GET["password"];
			$_SESSION["name"] = $_GET["userName"];
			$_SESSION["phone"] = $_GET["phone"];
			$_SESSION["address"] = $_GET["address"];
			$_SESSION["membership"] = $_POST["membership"];
	
			// GO TO NEXT PAGE
	            }
	         }

    	?> 



</html>

