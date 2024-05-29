<div class="Noticias col-md-7" style="margin-top: 2%;font-size: 10px;">
	<h5><b style="color: honeydew">Útimas postagens</b></h5>
	<ul>
		<?php
		if ($noticias = $this->noticia->getNoticia(3)) {
			foreach ($noticias as $linha) {
				?>
				<li>
					<img width="70px" height="80px" class="caixa"
						 src="<?php echo base_url('uploads/' . $linha->imagem) ?>">
					<h5 style="color: honeydew"><?php echo to_html($linha->titulo); ?></h5>
					<p style="color: honeydew"><?php echo resumo_post($linha->conteudo); ?>...
						<a href=" <?php echo base_url('post/' . $linha->id); ?>">Leia mais &raquo;</a></p>
				</li>
				<?php
			}

		} else {
			echo '<p> Nenhuma notícia cadastrada!</p>';
		}
		?>
	</ul>
