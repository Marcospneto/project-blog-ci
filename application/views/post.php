<?php $this->load->view('header'); ?>
<div class="row">

	<div class="col-md-6" style="text-align: justify;">
		<h2><?php echo $not_titulo; ?> </h2>
		<?php echo $not_conteudo; ?>
	</div>
	<div class="col-md-5" style="text-align: justify; margin-left: 70px">
		<div>

			<img width="380px;" height="500px;" src="<?php echo base_url('uploads/' . $not_imagem); ?>"
				 alt="<?php echo $not_titulo; ?>">
			<div style="width:70%;">
			</div>
		</div>
		<div>

		</div>
	</div>


</div>

<div class="row">
	<div class="col-md-5" style="margin-top: 3%;">
		<h4><b> Curiosidade</b></h4>
		<div class="row">
			<div class="col-md-12" style="margin-top: 3%;">
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
				dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
				Lorem ipsum dolor sit amet, consectetur
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" style="margin-top: 3%;">
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
				dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitationminim veniam, quis nostrud
				exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" style="margin-top: 3%;">
				Lminim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Ut
				enim ad minim veniam, quis nostrud exercitationminim veniam, quis nostrud exercitation ullamco laboris
				nisi ut aliquip ex ea commodo consequat.
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('footer'); ?>
