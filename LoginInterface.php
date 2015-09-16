<!DOCTYPE html>
<html>
<head>
   <title>Assignment9</title>
   <script>
    function submitted() { 
		var fname = document.forms["form1"]["fname"].value;
        var lname = document.forms["form1"]["lname"].value;
        var email = document.forms["form1"]["email"].value;
        
		if (fname == ""){
			document.getElementById("errormsg").innerHTML = "Please enter your first name.";
            return false;
		} 
		else if (lname == ""){
            document.getElementById("errormsg").innerHTML = "Please enter your last name.";    
            return false;
		}
        else if (email == "" || email.indexOf("@") == -1 || email.indexOf(".") == -1){ 
        	document.getElementById("errormsg").innerHTML = "Please enter valid email address.";
            return false;     
        }
		else {
			return true;
        }     
     }
   </script>
</head>

<body>

<?php
if (($_SERVER["REQUEST_METHOD"] == "POST") || (!empty($_GET))){
     
    $page1 = "null"; 
    $page2 = "toggle";
	
    if(empty($_POST)){
		echo "Hi there " . $_GET["fname"] . " " . $_GET["lname"]."! Let's play a super fun game!<br><br>";
        echo "I'm thinking of a number between from 1 to 5. See if you can guess it!<br><br>";
        $answer = rand(1,5);        
    }
    else{
        $answer = $_POST["answer"];
        if($_POST["answer"] == $_POST["guess"]){
			$page2 = "null";
			echo "Oh boy! You got it! See how much fun that was!?!?";
        } 
		else{
			echo "Oops! Your guess, ". $_POST["guess"].", was wrong. Please try again!<br><br>";
		}
     }
}
else{
	$page1 = "toggle";
	$page2 = "null";
}

if($page1 == "toggle"){
	
echo "<h1>Welcome to CSCE 3193 Asignment 9! </h1>";
echo "<p>Please fill out the form below to begin a super fun game.</p>";

echo '<form name="form1" method="get" action="'. $_SERVER['PHP_SELF'] .'" onsubmit="return submitted()">'
 	. 'First name: <input type="text" id="fname"  name="fname" value="Ignacio"><br>'
  	. 'Last name: <input type="text" id="lname"  name="lname" value="Gea"><br>'
   	. 'Email address: <input type="text" id="email" name="email" value="igeagonz@uark.edu"><br>'
	. '<input type="submit" value="Submit"><br>'
	. '</form><br>'
	. '<div style= "color:red" id="errormsg"></div>';		
}

if($page2 == "toggle"){

echo '<form name="form2" method="post" action="'. $_SERVER['PHP_SELF']. '">'
	. 'Your guess: <input type="text" name="guess"> <input type="submit" value="Guess!"><br>'
    . '<input type="hidden" name="answer" value="'.$answer.'">'
	. '</form>';
}
?>

</body>
</html>
