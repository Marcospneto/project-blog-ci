<?php $this->load->view('header'); ?>
<h1><strong>Notícias</strong></h1>
	<div class="container">
		<?php if ($noticias = $this->noticia->getNoticia()) {
			foreach ($noticias as $linha){ ?>
				<div class="card" style="background-image: url('<?php echo base_url('uploads/' . $linha->imagem); ?>'); background-size: cover; background-repeat: no-repeat; background-position: center">
					<div class="content">
						<p><?php echo resumo_post($linha->conteudo)?>.</p>
						<a href="<?php echo base_url('post/' .$linha->id);?>">Mais Informações</a>
					</div>
				</div>
			<?php
			}

			}else {
				echo '<p>Nenhuma noticia encontrada</p>';
			 }
			 ?>





<script>
	VanillaTilt.init(document.querySelectorAll(".card"), {
		max: 25,
		speed: 400,
		glare: true,
		"max-glare":1,
	});
</script>

<?php $this->load->view('footer'); ?>
