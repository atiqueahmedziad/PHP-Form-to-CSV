<?php

	$filename ="FinalMissingData.csv";

	$firstName = $lastName = $email = $phone = $message = '';
	$errors = array('firstName' => '', 'lastName' => '', 'emailErr' => '', 'phoneErr' => '', 'messageErr' => '');

	$formValid = false;


	if(isset($_POST['submit'])) {

		if(empty(trim($_POST['first_name']))) {
			$errors['firstName']  = 'First Name is required.';
		} else {
			$firstName = $_POST['first_name'];
		}
		if(empty(trim($_POST['last_name']))) {
			$errors['lastName'] = "Last Name is required.";
		} else {
			$lastName = $_POST['last_name'];
		}
		if(empty(trim($_POST['email']))) {
			$errors['emailErr'] = "Email is required.";
		} else {
			$email = $_POST['email'];
		}
		if(empty(trim($_POST['phone']))) {
			$errors['phoneErr'] = "Contact number is required";
		} else {
			if(!preg_match('/^\+?\d+$/', $_POST['phone'])){
				$errors['phoneErr'] = "Contact number must contain only numbers.";
			} else {
				$phone = $_POST['phone'];
			}
			$phone = $_POST['phone'];
		}
		if(empty(trim($_POST['message']))) {
			$errors['messageErr'] = "Message is required";
		} else {
			$message = $_POST['message'];
		}


		if(!empty(trim($firstName)) && !empty(trim($lastName)) && !empty(trim($email)) && !empty(trim($phone)) && !empty(trim($message))) {
			$formValid = true;
		}

		if($formValid){
			$new_csv = fopen($filename, 'a');
			$resOrder = array(
			0 => htmlspecialchars($firstName),
			1 => htmlspecialchars($lastName),
			2 => htmlspecialchars($email),
			3 => htmlspecialchars($phone),
			4 => htmlspecialchars($message)
			);
			fputcsv($new_csv, $resOrder);

			$sucessMessage = "Thank you for contact with us. We will get back to you asap.";

			$firstName = $lastName = $email = $phone = $message = '';
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
	<link type="text/css" rel="stylesheet" href="css/style.css" />
	<script
	  src="https://code.jquery.com/jquery-3.4.1.min.js"
	  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
	  crossorigin="anonymous"></script>

		<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    </script>
		
</head>
<body>

<div class="container">
    <div class="row">
		<h2 class="col s12 m6 offset-m3 l6 offset-l3 center">Contact Form</h2>
		<div class="col s6 m6 offset-m3 l6 offset-l3 z-depth-6 card-panel">
			<div class="contact-form">
				<form action="index.php" method="POST">
	        <div class="row">
		        <div class="input-field col s6">
	            <input id="first_name" name="first_name" type="text" class="validate" value="<?php echo htmlspecialchars($firstName) ?>">
	            <label for="first_name">First Name</label>
							<div class="validation-error">
								<?php
									echo $errors['firstName'];
								?>
							</div>
		        </div>
		        <div class="input-field col s6">
	            <input id="last_name" name="last_name" type="text" class="validate" value="<?php echo htmlspecialchars($lastName) ?>">
	            <label for="last_name">Last Name</label>
							<div class="validation-error">
								<?php
									echo $errors['lastName'];
								?>
							</div>
		        </div>
	        </div>
	        <div class="row">
		        <div class="input-field col s12">
	            <input id="email" type="email" name="email" class="validate" value="<?php echo htmlspecialchars($email) ?>">
	            <label for="email">Email</label>
							<div class="validation-error">
								<?php
									echo $errors['emailErr'];
								?>
							</div>
		        </div>
      	  </div>

					<div class="row">
		        <div class="input-field col s12">
	            <input id="contact" type="text" name="phone" class="validate" value="<?php echo htmlspecialchars($phone) ?>">
	            <label for="contact">Contact number</label>
							<div class="validation-error">
								<?php
									echo $errors['phoneErr'];
								?>
							</div>
		        </div>
      	  </div>

					<div class="row">
		        <div class="input-field col s12">
							<textarea id="textarea" name="message" class="materialize-textarea" data-length="400"><?php echo htmlspecialchars($message) ?></textarea>
	          	<label for="textarea2">Message</label>
							<div class="validation-error">
								<?php
									echo $errors['messageErr'];
								?>
							</div>
		        </div>
	        </div>
					<div class="row">
						<div class="col s12 center">
							<button class="btn waves-effect cyan waves-light z-depth-2" type="submit" value="Submit" name="submit">Submit
						    <i class="material-icons right">send</i>
						  </button>
						</div>
					</div>
        </form>
			</div>
		</div>

		<?php
			if(!empty($sucessMessage)){
				echo '<div class="col s6 m6 offset-m3 l6 offset-l3 z-depth-6 card-panel green darken-1"><p class="white-text">' . $sucessMessage . '</p></div>';
			}
		?>

	</div>
</div>

<script type="text/javascript" src="js/materialize.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
