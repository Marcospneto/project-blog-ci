<?php $this->load->view('painel/header'); ?>

<link rel="stylesheet", type="text/css" href="../../../application/assets/css/estilo.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="container">
	<div class="col-md-6 col-md-offset-3 text-center">
		<div class="col-md-6">
			<form action="" method="post" class="login100-form">
                <span class="login100-form-logo">
                    <i class="zmdi zmdi-landscape"></i>
                </span>

				<span class="login100-form-title p-b-34 p-t-27" style="font-size: 24px; margin-top: 20px;">
                    Alterar configurações básicas
				</span>

				<span id="flash-message" class="flash-message"><?= get_msg(); ?></span>

				<div class="form-group" data-validate="Enter username">
					<?php
					echo form_input('login', set_value('login'), array('class' => 'form-control', 'placeholder' => 'Login', 'name' => 'login'));
					?>
					<span class="focus-input100" data-placeholder="&#xf207;"></span>
				</div>

				<div class="form-group" data-validate="Enter email">
					<?php
					echo form_input('email', set_value('email'), array('class' => 'form-control', 'placeholder' => 'Email', 'name' => 'email'));
					?>
					<span class="focus-input100" data-placeholder="&#xf191;"></span>
				</div>

				<div class="form-group" data-validate="Enter senha">
					<?php
					echo form_password('senha', '',  array('class' => 'form-control', 'placeholder' => 'Senha (Deixe em branco para não alterar)', 'name' => 'senha'));
					?>
					<span class="focus-input100" data-placeholder="&#xf191;"></span>
				</div>

				<div class="form-group" data-validate="Enter senha2">
					<?php
					echo form_password('senha2', '', array('class' => 'form-control', 'placeholder' => 'Repita a senha', 'name' => 'senha2'));
					?>
					<span class="focus-input100" data-placeholder="&#xf191;"></span>
				</div>

				<div class="form-group" data-validate="Enter email">
					<?php
					echo form_input('nome_site', set_value('nome_site'), array('class' => 'form-control', 'placeholder' => 'Nome do site', 'name' => 'nome_site'));
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
					echo form_submit('enviar', 'Salvar dados', array('class' => 'btn btn-primary'));
					?>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		// Verifica se há uma mensagem flash para exibir
		var flashMessage = $('#flash-message');
		if (flashMessage.length > 0 && flashMessage.text() !== '') {
			flashMessage.fadeIn('slow', function(){
				setTimeout(function(){
					flashMessage.fadeOut('slow');
				}, 5000); // Tempo em milissegundos (5 segundos neste caso)
			});
		}
	});
</script>



<?php $this->load->view('painel/footer'); ?>
