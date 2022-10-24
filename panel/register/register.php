<?php
require '../credentials.php';
require '../bauth.php';


if (isset($_SESSION['un'])) {
	header("Location: ../../panel/dashboard/");
	exit();
}

$auth_instance = new c_auth\api("1.0", "ProgramKey", "EncryptionKey");

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">

	<?php
	echo '
	    <title>bauth Panel</title>
	    <meta name="og:image" content="css/favicon.png">
        <meta name="description" content="">
        ';
	?>

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">

	<link rel="stylesheet" href="../../css/mainad05.css?ver=1.4" type="text/css">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
	<!-- taken from keyauth so i can actually edit and make not look stinky poo gay -->
	<link href="../css/frontend.css" rel="stylesheet" type="text/css">

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


<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

	<?php
	if (isset($_POST['register'])) {



if(isset($_POST['h-captcha-response']) && !empty($_POST['h-captcha-response']))
  {
        $secret = 'REPLACEME';
        $verifyResponse = file_get_contents('https://hcaptcha.com/siteverify?secret='.$secret.'&response='.$_POST['h-captcha-response'].'&remoteip='.$_SERVER['REMOTE_ADDR']);
        $responseData = json_decode($verifyResponse);
        if($responseData->success)
        {
            $succMsg = 'Your request have submitted successfully.';

		if ($auth_instance->register($_POST['username'],$_POST['email'], $_POST['password'], $_POST['license'])) {
			//$_SESSION['un'] = $_POST['username'];
			echo "<meta http-equiv='refresh' Content='0; url='https://example.xyz/panel/index.php'>";
			echo '
                        <script type=\'text/javascript\'>

                        const notyf = new Notyf();
                        notyf
                          .success({
                            message: \'You have successfully registered!\',
                            duration: 3500,
                            dismissible: true
                          });

						  </script>

<script>
window.location.replace("https://example.xyz/panel/index.php");


</script>

						  ';




        }
        else
        {
            $errMsg = 'Robot verification failed, please try again.';
        }
   }

		}
	}
	?>




<script src='https://www.hCaptcha.com/1/api.js' async defer></script>
</head>

<body class="bg-dark">
	<div class="overlay">

		<div class="auth-container">

			<div class="">

				<div class="">

					<form class="form w-100" method="post">

						<div class="text-center mb-10">

							<h1 id="title">Register to bauth <?php //echo $name; ?></h1>



						</div>


						<div class="fv-row mb-10">

							<!--<label class="form-label fs-6 fw-bolder text-light">Username</label>-->


							<input class="inputbox  round-large" type="text" name="username" placeholder="username" autocomplete="on">
							<div class="form-group row">
								<br>

							</div>


							<div class="fv-row">

								<div class="d-flex flex-stack mb-2">

								<!--	<label class="form-label fw-bolder text-light fs-6 mb-0">Password</label>-->


								<!--	<a href="./upgrade/" class="link-primary fs-6 fw-bolder">Need to upgrade account
										?</a>-->

								</div>


								<input class="inputbox  round-large" type="password" name="password" placeholder="Password" autocomplete="on">

							</div>
							<div class="fv-row mb-10">

								<br>
								<input class="inputbox  round-large" type="email" name="email" placeholder="email" autocomplete="on">
							<br>

							<!--	<input class="inputbox  round-large" type="license" name="license" placeholder="license (optional)" autocomplete="on">-->

								<div ><div class="h-captcha" data-sitekey="REPLACEME"></div>

									<button name="register" class="inputbox  round-large">
										<span class="indicator-label">Register &#8203 &#8203 &#8203 &#8203 &#8203 &#8203 &#8203 &#8203 &#8203 &#8203 &#8203
										&#8203 &#8203 &#8203 &#8203 &#8203 &#8203 &#8203 &#8203 &#8203 &#8203 &#8203 &#8203 &#8203 &#8203
										&#8203 &#8203 &#8203 &#8203 &#8203 &#8203 &#8203 &#8203
										></span>
										<!-- the above is stupid asf but it works, will fix later -->

									</button>
									<div class="text-gray-400 fw-bold fs-4">
							</div>

								</div>
								<br><br>
								<a href="../index.php" id="regobutton">Sign in &#8203 &#8203 &#8203 &#8203 &#8203 &#8203
								&#8203 &#8203 &#8203 &#8203 &#8203 &#8203&#8203 &#8203 &#8203 &#8203 &#8203 &#8203
								&#8203 &#8203 &#8203 &#8203 &#8203 &#8203 &#8203 &#8203 &#8203 &#8203 &#8203 &#8203
								&#8203 &#8203 &#8203 &#8203 &#8203 &#8203
								</a><!--<a href="../../resellers" id="purchasebutton">Purchase</a>-->



							</div>

						</div>
					</form>

				</div>

			</div>

			<!--<script src="plugins.js" type="text/javascript"></script>
			<script src="scripts.js" type="text/javascript"></script>-->

		</div>
	</div>

	</body>

</html>
