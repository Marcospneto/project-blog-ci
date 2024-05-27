<div class="Noticias col-md-7" style="margin-top: 2%;font-size: 10px;">
    <h5><b style="color: honeydew">Útimas postagens</b></h5>
	<ul>
		<?php
		if ($noticias = $this->noticia->getNoticia(3)){
			foreach ($noticias as $linha){
		?>
		<li>
			<img width="60px" height="50px" class="caixa" src="<?php echo base_url('uploads/'.$linha->imagem)?>">
			<h4 style="color: honeydew"><?php echo to_html($linha->titulo);?></h4>
			<p style="color: honeydew"><?php echo resumo_post($linha->conteudo);?>...
			<a href=" <?php echo base_url('post/'.$linha->id);?>">Leia mais &raquo;</a> </p>
		</li>
		<?php
		}

		}else{
			echo '<p> Nenhuma notícia cadastrada!</p>';
		}
		?>
	</ul>