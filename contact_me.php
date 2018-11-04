//<?php
// Check for empty fields
//if(empty($_POST['name'])  		||
 //  empty($_POST['email']) 		||
  // empty($_POST['message'])	||
  // !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   //{
//	echo "No arguments Provided!";
//	return false;
  // }
	
//$name = $_POST['name'];
//$email_address = $_POST['email'];
//$message = $_POST['message'];
	
// Create the email and send the message
//$to ='yourname@yourdomain.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
//$email_subject = "Website Contact Form:  $name";
//$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nMessage:\n$message";
//$headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
//$headers .= "Reply-To: $email_address";	
//mail($to,$email_subject,$email_body,$headers);
//return true;			
//?>

?php
//$username="";
//$email="";
$errors=array();

//connect to database
$db = mysqli_connect('localhost', 'root', '', 'Evans_Projects');

if($db){
	//die ("connection success");
}

//if register button is clicked
if(isset($_POST['index.php'])){
	$name = mysql_real_escape_string($_POST['name']);
    $email = mysql_real_escape_string($_POST['email']);
    $message = mysql_real_escape_string($_POST['message']);
	

	//ensure that formfiels are filled properly
	if(empty($name)){
		array_push($errors, "name is required");
	} 
	if(empty($email)){
		array_push($errors, "Email is required");
	} 
	

	//die( count($errors));
	//if there is no errors, save user to database
	if(count($errors)==0){
		
		$sql="INSERT INTO MyWeb(name, email, message) VALUES('$name','$email','$message')";
		$responce=mysqli_query($db,$sql);
		if ($responce){
			die ("SUCCESSFULL REGISTRATION");
			//return;
		}
		die ("REGISTRATION failed");
		
	}
	die(json_encode($errors));

return;
}
//die("not registration");

?>