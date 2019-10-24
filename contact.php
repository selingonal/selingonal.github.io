<?php
	$name = $email = $subject = $message = $msg = "";
	$nameErr = $emailErr = $subjectErr = $messageErr = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["name"])) {
		$nameErr = "Name is required";
	 	echo $nameErr;
		} else {
			if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
	 		$nameErr = "Only letters and white space allowed"; 
	 		echo $nameErr;
			} else {
				$name = test_input($_POST["name"]);
				echo $name;
			}
		}

		if (empty($_POST["email"])) {
		$emailErr = "Email is required";
		echo $emailErr;
		} else {
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      		$emailErr = "Invalid email"; 
      		echo $emailErr;
    		}else{
    			$email = test_input($_POST["email"]);
    			echo $email;
    		}
		}


		if (empty($_POST["subject"])) {
		$subjectErr = "Subject is required";
		echo $subjectErr;
		} else {
			$subject = test_input($_POST["subject"]);
			echo $subject;
		}

		if (empty($_POST["message"])) {
		$messageErr = "Message is required";
		echo $messageErr;
		} else {
			$message = test_input($_POST["message"]);
			echo $message;
		}

		

	}

	$msg = "
			<html>
			<head>
			<title>Greetings from selingonal.github.io!</title>
			</head>
			<body>
			<table>
			<tr>
			<th>Name</th>
			<th>Email</th>
			</tr>
			<tr>
			<td>$name</td>
			<td> $email</td>
			</tr>
			</table>
			<p>$message</p
			</body>
			</html>
		";


		mail("selingonal@gwu.edu", $subject, $msg);

	header("Location: #contact");

?>