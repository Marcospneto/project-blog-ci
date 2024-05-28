<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> <?php echo $titulo;?></title>


	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="/application/assets/css/stylecards.css">
	<script type="text/javascript" src="../../application/assets/js/vanilla-tilt.js"></script>



	<style>
		.navbar-default .navbar-nav > li > a {
			color: #04e9e7 !important;
		}
	</style>



</head>
<body style="">

    <nav class="navbar navbar-default navbar-static-top">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>

            </button>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="background-color: #004f4f" >
            <ul class="nav navbar-nav navbar-left">
                <a class="navbar-brand" href="<?php echo base_url('pagina');?>">
					<?php
						echo $this->option->getOption('nome_site', 'Falta configurar');
					?>
				</a>
            </ul>
            <ul class="nav navbar-nav navbar-right" style="margin-right: 5%;">
                <li> <a href="<?php echo base_url('pagina');?>"> HOME </a> </li>
                <li> <a href="<?php echo base_url('cliente');?>"> CLIENTES </a> </li>
                <li> <a href="<?php echo base_url('servico');?>"> SERVIÇOS </a> </li>
                <li> <a href="<?php echo base_url('sobre');?>"> SOBRE </a> </li>
                <li> <a href="<?php echo base_url('contato');?>"> CONTATO </a> </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
