<!DOCTYPE html>
<html lang="en">
<head>
	<title>JVM Dev - Cadastro</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="../../../application/assets/Imgs/icons/favicon.ico"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../../application/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../../application/assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../../application/assets/fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../../application/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../../application/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../../application/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../../application/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../../application/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../../application/assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="../../../application/assets/css/main.css">
	<!--===============================================================================================-->
</head>
<body>

<div class="limiter">
	<div class="container-login100" style="background-image: url('../../../application/assets/Imgs/bg-01.jpg')">
		<div class="wrap-login100">
			<form class="login100-form validate-form" action="" method="post">
                <span class="login100-form-logo">
                    <i class="zmdi zmdi-landscape"></i>
                </span>

				<span class="login100-form-title p-b-34 p-t-27">
                    Setup do sistema
					<?php
					if ($msg = get_msg()){
						echo '<div class="msg-box">'.$msg.'</div>';
					}
					?>
                </span>


				<div class="wrap-input100 validate-input" data-validate="Enter email">
					<?php
					echo form_input('email', '', array('class' => 'input100', 'placeholder' => 'Email'));
					?>
					<span class="focus-input100" data-placeholder="&#xf191;"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Enter senha">
					<?php
					echo form_password('senha', set_value('senha'), array('class' => 'input100', 'placeholder' => 'Senha', 'name' => 'senha', 'autocomplete' => 'off' ));
					?>
					<span class="focus-input100" data-placeholder="&#xf191;"></span>
				</div>


				<div class="contact100-form-checkbox">
					<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
					<label class="label-checkbox100" for="ckb1">
						Remember me
					</label>
				</div>

				<div class="container-login100-form-btn">
					<?php
					echo form_submit('enviar', 'Autenticar', array('class' => 'login100-form-btn'));
					?>
				</div>
			</form>
		</div>
	</div>
</div>



<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="../../../application/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="../../../application/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="../../../application/vendor/bootstrap/js/popper.js"></script>
<script src="../../../application/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="../../../application/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="../../../application/vendor/daterangepicker/moment.min.js"></script>
<script src="../../../application/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="../../../application/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="../../../application/assets/js/main.js"></script>

</body>
</html>
