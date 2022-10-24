<?php
require 'credentials.php';
require 'bauth.php';
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

if (isset($_SESSION['un'])) {
	header("Location: ../panel/dashboard/");
	exit();
}

$auth_instance = new c_auth\api("1.0", "ProgramKey", "ENcryptionkey");




?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">

	<?php
	echo '
	    <title>bauth - Login to ' . $name . ' Panel</title>
	    <meta name="og:image" content="css/favicon.png">
        <meta name="description" content="Login to reset your HWID or download ' . $name . '">
        ';
	?>

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">

	<link rel="stylesheet" href="../css/mainad05.css" type="text/css">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
	<!-- aids -->
	<link href="css/frontend.css" rel="stylesheet" type="text/css">

	<style>
		/* width */
		::-webkit-scrollbar {
			width: 10px;
		}

		/* Track */
		::-webkit-scrollbar-track {
			box-shadow: inset 0 0 5px grey;
			border-radius: 10px;
		}

		/* Handle */
		::-webkit-scrollbar-thumb {
			background: #2549e8;
			border-radius: 10px;
		}

		/* Handle on hover */
		::-webkit-scrollbar-thumb:hover {
			background: #0a2bbf;
		}



	</style>

	<script type="text/javascript">
		if (window.history.replaceState) {
			window.history.replaceState(null, null, window.location.href);
		}
	</script>

<script src='https://www.hCaptcha.com/1/api.js' async defer></script>

</head>

<body class="bg-dark">
	<div class="overlay">

		<div class="auth-container">

			<div class="">

				<div class="">

					<form class="form w-100" method="post">

						<div class="text-center mb-10">

							<h1 id="title">Sign In to bauth <?php //echo $name; ?></h1>



						</div>


						<div>

							<!--<label class="form-label fs-6 fw-bolder text-light">Username</label>-->


							<input class="inputbox  round-large" type="text" name="username" placeholder="Enter username" autocomplete="on">
							<div class="form-group row">
								<br>

							</div>


							<div>

								<div class="d-flex flex-stack mb-2">

								<!--	<label class="form-label fw-bolder text-light fs-6 mb-0">Password</label>-->


								<!--	<a href="./upgrade/" class="link-primary fs-6 fw-bolder">Need to upgrade account
										?</a>-->

								</div>


								<input class="inputbox  round-large" type="password" name="password" placeholder="Password" autocomplete="on">

							</div>
							<div class="">

								<br>

								<div class="">
								<div class="h-captcha" data-sitekey="Replaceme"></div>

									<button name="login" class="inputbox  round-large">
										<span class="">Sign In &#8203 &#8203 &#8203 &#8203 &#8203 &#8203 &#8203 &#8203 &#8203 &#8203 &#8203
										&#8203 &#8203 &#8203 &#8203 &#8203 &#8203 &#8203 &#8203 &#8203 &#8203 &#8203 &#8203 &#8203 &#8203
										&#8203 &#8203 &#8203 &#8203 &#8203 &#8203 &#8203 &#8203 &#8203  ></span>
										<!-- the above is stupid asf but it works -->

									</button>
									<div class="text-gray-400 fw-bold fs-4">
							</div>
																<!-- aCTUALLY CURSED - fix the css. do not use this -->
								</div>
								<br><br>
								<a href="./register/register.php" id="regobutton">Register &#8203 &#8203 &#8203 &#8203 &#8203 &#8203
								&#8203 &#8203 &#8203 &#8203 &#8203 &#8203&#8203 &#8203 &#8203 &#8203 &#8203 &#8203
								&#8203 &#8203 &#8203 &#8203 &#8203 &#8203 &#8203 &#8203 &#8203 &#8203 &#8203 &#8203
								&#8203 &#8203 &#8203 &#8203 &#8203 &#8203
								</a><a href="../resellers/" id="purchasebutton">Purchase</a>



							</div>

						</div>
					</form>

				</div>

			</div>



		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

	<?php

if (isset($_POST['login'])) {


	if(isset($_POST['h-captcha-response']) && !empty($_POST['h-captcha-response']))
	{
		  $secret = 'REPLACEME';
		  $verifyResponse = file_get_contents('https://hcaptcha.com/siteverify?secret='.$secret.'&response='.$_POST['h-captcha-response'].'&remoteip='.$_SERVER['REMOTE_ADDR']);
		  $responseData = json_decode($verifyResponse);
		  if($responseData->success)
		  {

			if ($auth_instance->login($_POST['username'], $_POST['password'])) {
				$_SESSION['un'] = $_POST['username'];
				echo "<meta http-equiv='Refresh' Content='2; url=dashboard/'>";
				echo '
							<script type=\'text/javascript\'>

							const notyf = new Notyf();
							notyf
							  .success({
								message: \'You have successfully logged in!\',
								duration: 3500,
								dismissible: true
							  });

							</script>
							';
			}

			  $succMsg = 'Your request have submitted successfully.';
		  }
		  else
		  {
			  $errMsg = 'Robot verification failed, please try again.';
			  echo '
							<script type=\'text/javascript\'>

							const notyf = new Notyf();
							notyf
							  .success({
								message: \'Login failed!\',
								duration: 3500,
								dismissible: true
							  });

							</script>
							';
		  }
	 }
	}

	?>
</body>

</html>
