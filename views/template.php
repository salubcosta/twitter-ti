<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Twitter - TI</title>
	<link rel="stylesheet" href="<?php echo URL;?>/assets/css/template.css" />
	<script type="text/javascript" src="<?php echo URL;?>/assets/js/jquery-3.0.0.min.js"></script>
	<script type="text/javascript" src="<?php echo URL;?>/assets/js/script.js"></script>
</head>
<body>
	<div class="topo">
		<div class="topoint">
			<div class="topoleft">TWITTER-TI</div>
			<div class="toporight"><?php echo $array['nome']; ?> - <a href="<?php echo URL;?>/login/sair">Sair</a></div>
			<div style="clear: both;"></div>
		</div>
	</div>
	<div class="container">
		<?php $this->carregarViewNoTemplate($view,$array); ?>
	</div>
</body>
</html>