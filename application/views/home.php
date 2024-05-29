<?php $this->load->view('header'); ?>
<h1 style="text-align: center; font-size: 30px"><strong>Confira as principais notícias do momento</strong></h1>
<div class="container">
	<?php if ($noticias = $this->noticia->getNoticia()) : ?>
		<?php foreach ($noticias as $linha) : ?>
			<div class="card" style="background-image: url('<?php echo base_url('uploads/' . $linha->imagem); ?>'); background-size: cover; background-repeat: no-repeat; background-position: center;">
				<div class="content">
					<p><?= resumo_post($linha->conteudo) ?>.</p>
					<a href="<?= base_url('post/' . $linha->id); ?>">Mais Informações</a>
				</div>
			</div>
		<?php endforeach; ?>
	<?php else : ?>
		<?= '<p>Nenhuma noticia encontrada</p>'; ?>
	<?php endif; ?>

	<script>
		VanillaTilt.init(document.querySelectorAll(".card"), {
			max: 25,
			speed: 400,
			glare: true,
			"max-glare": 1,
		});
	</script>

	<?php $this->load->view('footer'); ?>
