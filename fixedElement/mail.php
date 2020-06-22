<html>
	<head>
		<title>Form</title>
	</head>

	<body>

		<?php 
			$to = "su_astro@connect.ust.hk"; // this is your Email address
			$from = $_POST['email']; // this is the sender's Email address
			$name = $_POST['name'];
			
			$subject = "Enquiry from " . $name . " through soc web";
			
			$message = $name . "(" . $from . ")". " wrote the following:" . "\n\n" . $_POST['message'];
			
			mail($to,$subject,$message);
		
			echo "Mail Sent. Thank you ";
			
			// You can also use header('Location: thank_you.php'); to redirect to another page.
			// You cannot use header and echo together. It's one or the other.
			
		?>


	</body>
</html>