<?php $this->load->view('painel/header'); ?>

<link rel="stylesheet" type="text/css" href="../../../application/assets/css/estilo.css">

<div class="col-md-6">
	<ul class="nav navbar-nav navbar-right" style="margin-right: 20%;">
		<li> <a class="btn btn-secondary" href="<?php echo base_url('noticia/cadastrar');?>"> Inserir </a> </li>
		<li> <a class="btn btn-secondary" href="<?php echo base_url('noticia/listar');?>"> Listar </a> </li>
	</ul>
</div>

<div class="container">
	<div class="col-md-6 col-md-offset-3 text-center">
		<div class="coluna col-10">
			<div><h2><?php echo $h2; ?></h2></div>
			  	<?php
				switch ($tela):


					case 'listar':
						if (isset($noticias) && sizeof($noticias) > 0){
						?>
							<table class="table table-bordered">
								<thead class="thead-dark">
								<tr>
									<th class="text-center" scope="col">Título</th>
									<th class="text-center" scope="col">Ações</th>
								</tr>
								</thead>
								<tbody>
									<?php
										foreach ($noticias as $linha){
									?>
									<tr>
										<td><?php echo $linha->titulo;?></td>
										<td class="text-center"><?php echo anchor('noticia/editar/' . $linha->id, 'Editar');?>
											| <?php echo anchor('noticia/excluir/' . $linha->id, 'Excluir');?>
											| <?php echo anchor('post/'.$linha->id,'Ver', array('target' => '_blank'));?></td>
									</tr>

										<?php
										}
										?>

								</tbody>
							</table>
							<?php
						}else{
							echo '<div class="msg-box"><p> Nenhuma notícia cadastrada!</p></div>';
						}
						break;



					case 'cadastrar':
						?>
							<form id="form-cadastrar-noticia" action="<?php echo base_url('noticia/cadastrar'); ?>" method="post" enctype="multipart/form-data">
							  	<div class="form-group">
									<label for="exampleFormControlInput1" class="col-sm-1 form-control-label">Título</label>
									<input type="text" class="form-control" id="exampleFormControlInput1" name="titulo" placeholder="Título">
								</div>


								<div class="form-group">
									<label for="exampleFormControlTextarea1" class="col-sm-1 form-control-label">Conteúdo</label>
									<textarea name="conteudo" id="trumbowyg-editor"  rows="5"></textarea>
								</div>


								<div class="form-group">
									<label for="exampleFormControlFile1">Escolher Arquivo</label>
									<input type="file" class="form-control-file" name="imagem" id="exampleFormControlFile1" placeholder="Imagem da notícia">
								</div>
								<div class="container-login100-form-btn">
									<?php
									echo form_submit('enviar', 'Salvar notícia', array('class' => 'btn btn-primary', 'id' => 'btn-show-sweetalert'));
									?>
								</div>
							</form>
						    <div id="flash-message"></div>
						<?php
						break;



					case 'editar':
						$titulo = isset($noticia->titulo) ? to_html($noticia->titulo) : '';
						$conteudo = isset($noticia->conteudo) ? to_html($noticia->conteudo) : '';
						$imagem = isset($noticia->imagem) ? $noticia->imagem : '';
						$idNoticia = isset($noticia) ? $noticia->id : NULL;
						?>
						<form id="form-editar-noticia" action="<?php echo base_url('noticia/editarAction/'.$idNoticia); ?>" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label for="exampleFormControlInput1" class="col-sm-1 form-control-label">Título</label>
								<input type="text" class="form-control" id="exampleFormControlInput1" name="titulo" value="<?php echo $titulo?>" placeholder="Título">
							</div>


							<div class="form-group">
								<label for="exampleFormControlTextarea1" class="col-sm-1 form-control-label">Conteúdo</label>
								<textarea name="conteudo" id="trumbowyg-editor"  rows="5" readonly> <?php echo $conteudo?></textarea>
							</div>

							<div class="form-group">
								<label for="exampleFormControlFile1">Escolher Arquivo</label>
								<input type="file" class="form-control-file" name="imagem" id="exampleFormControlFile1" placeholder="Imagem da notícia">
							</div>


							<div class="form-group">
								<?php if ($imagem): ?>
									<p><small>Imagem:</small><br />
										<img src="<?php echo base_url('uploads/'.$imagem); ?>" class="img-mini"></p>
								<?php endif; ?>
							</div>


							<div class="container-login100-form-btn">
								<?php
								echo form_submit('enviar', 'Salvar notícia', array('class' => 'btn btn-primary', 'id' => 'btn-show-sweetalert'));
								?>
							</div>
						</form>
						<div id="flash-message"></div>



						<?php
						break;



					case 'excluir':
						$titulo = isset($noticia->titulo) ? to_html($noticia->titulo) : '';
						$conteudo = isset($noticia->conteudo) ? to_html($noticia->conteudo) : '';
						$imagem = isset($noticia->imagem) ? $noticia->imagem : '';
						$idNoticia = isset($noticia) ? $noticia->id : NULL;
						?>

						<form id="form-excluir-noticia" action="<?php echo base_url('noticia/excluirAction/'.$idNoticia); ?>" method="post" enctype="multipart/form-data">
							  	<div class="form-group">
									<label for="exampleFormControlInput1" class="col-sm-1 form-control-label">Título</label>
									<input type="text" class="form-control" id="exampleFormControlInput1" name="titulo" value="<?php echo $titulo?>" placeholder="Título" readonly>
								</div>


								<div class="form-group">
									<label for="exampleFormControlTextarea1" class="col-sm-1 form-control-label">Conteúdo</label>
									<textarea name="conteudo" id="trumbowyg-editor"  rows="5" readonly> <?php echo $conteudo?></textarea>
								</div>


							<div class="form-group">
								<?php if ($imagem): ?>
									<p><small>Imagem:</small><br />
										<img src="<?php echo base_url('uploads/'.$imagem); ?>" class="img-mini"></p>
								<?php endif; ?>
							</div>

							<div class="container-login100-form-btn">
								<button type="button" class="btn btn-primary" id="btn-excluir">Excluir notícia</button>
							</div>

							</form>
							<?php
						break;
					endswitch;
				?>



		</div>
	</div>
</div>

<script>
	// Quando o dom estiver completamente carregado essa função é executada
	document.addEventListener('DOMContentLoaded', function (){
		// Seleciona o form pelo id
		const formCadastrar = document.querySelector('#form-cadastrar-noticia');
		const formExcluir = document.querySelector('#form-excluir-noticia');
		const btnExcluir = document.querySelector('#btn-excluir');
		const formEditar = document.querySelector('#form-editar-noticia');

		// Essa função vai ser executada quando o form for submetido
		if (formCadastrar) {
			formCadastrar.addEventListener('submit', function (event) {
				event.preventDefault();

				// Pegando o id do botao de enviar do meu form
				const formData = new FormData(formCadastrar);

				fetch(formCadastrar.action, {
					method: formCadastrar.method,
					body: formData
				})
					.then(response => response.text())
					.then(text => {
						// Remove todos os caracteres UTF-8 'BOM'
						const sanitizedText = text.replace(/^\s*[\ufeff]*/, '');
						// Remove todos os caracteres não ASCII no início da string
						const sanitizedText2 = sanitizedText.replace(/^[^\x20-\x7E]+/, '');
						try {
							return JSON.parse(sanitizedText2);
						} catch (e) {
							console.error('Erro ao fazer o parse do JSON:', e);
							throw e; // Lança o erro novamente para ser capturado no próximo bloco catch
						}
					})
					.then(data => {
						responseCadastro(data);
					})
					.catch(error => {
						console.log(error);
						Swal.fire({
							position: "center",
							icon: 'error',
							title: 'Preencha todos os campos!',
							showConfirmButton: false,
							timer: 2000
						});
					});
			});
		}

		if (btnExcluir) {
			btnExcluir.addEventListener('click', function() {
				Swal.fire({
					title: "Tem certeza?",
					text: "Você não poderá reverter isso!",
					icon: "warning",
					showCancelButton: true,
					confirmButtonColor: "#3085d6",
					cancelButtonColor: "#d33",
					confirmButtonText: "Sim, excluir!"

				}).then((result) => {
					if (result.isConfirmed) {
						// Pegando o id do botao de enviar do meu form
						const formData = new FormData(formExcluir);

						fetch(formExcluir.action, {
							method: formExcluir.method,
							body: formData
						})
							.then(response => response.text())
							.then(text => {
								// Remove todos os caracteres UTF-8 'BOM'
								const sanitizedText = text.replace(/^\s*[\ufeff]*/, '');
								// Remove todos os caracteres não ASCII no início da string
								const sanitizedText2 = sanitizedText.replace(/^[^\x20-\x7E]+/, '');
								try {
									return JSON.parse(sanitizedText2);
								} catch (e) {
									console.error('Erro ao fazer o parse do JSON:', e);
									throw e; // Lança o erro novamente para ser capturado no próximo bloco catch
								}
							})
							.then(data => {
								responseExclusao(data);
							})
							.catch(error => {
								console.log(error);
								Swal.fire({
									position: "center",
									icon: 'error',
									title: 'Erro ao excluir a notícia!',
									showConfirmButton: false,
									timer: 2000
								});
							});
					}
				});
			});
		}

		if (formEditar) {
			formEditar.addEventListener('submit', function (event) {
				event.preventDefault();

				// Pegando o id do botao de enviar do meu form
				const formData = new FormData(formEditar);

				fetch(formEditar.action, {
					method: formEditar.method,
					body: formData
				})
					.then(response => response.text())
					.then(text => {
						// Remove todos os caracteres UTF-8 'BOM'
						const sanitizedText = text.replace(/^\s*[\ufeff]*/, '');
						// Remove todos os caracteres não ASCII no início da string
						const sanitizedText2 = sanitizedText.replace(/^[^\x20-\x7E]+/, '');
						try {
							return JSON.parse(sanitizedText2);
						} catch (e) {
							console.error('Erro ao fazer o parse do JSON:', e);
							throw e; // Lança o erro novamente para ser capturado no próximo bloco catch
						}
					})
					.then(data => {
						responseEditar(data);
					})
					.catch(error => {
						console.log(error);
						Swal.fire({
							position: "center",
							icon: 'error',
							title: 'Preencha todos os campos!',
							showConfirmButton: false,
							timer: 2000
						});
					});
			});
		}


	});






	function responseCadastro(data) {
		if (data.status === 'success') {
			// Se o status da resposta for 'success'
			Swal.fire({
				position: "center",
				icon: "success",
				title: data.message,
				showConfirmButton: false,
				timer: 2500
			}).then(() => {
				window.location.href = data.redirect;
			});
		} else {
			Swal.fire({
				position: "center",
				icon: "error",
				title: data.message,
				showConfirmButton: false,
				timer: 3000
			});
		}
	}


	function responseExclusao(data) {
		if (data.status === 'success') {
			Swal.fire({
				title: "Deletado!",
				text: "Sua notícia foi excluída",
				icon: "success",
				showConfirmButton: false,
				timer: 3000
			}).then(() => {
				window.location.href = data.redirect;
			});
		}else {
			Swal.fire({
				position: "center",
				icon: "error",
				title: data.message,
				showConfirmButton: false,
				timer: 3000
			});
		}
	}

	function responseEditar(data){
		if (data.status === 'success') {
			// Se o status da resposta for 'success'
			Swal.fire({
				position: "center",
				icon: "success",
				title: data.message,
				showConfirmButton: false,
				timer: 2500
			}).then(() => {
				window.location.href = data.redirect;
			});
		} else {
			Swal.fire({
				position: "center",
				icon: "error",
				title: data.message,
				showConfirmButton: false,
				timer: 3000
			});
		}
	}

</script>



<?php $this->load->view('painel/footer'); ?>
