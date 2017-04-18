<div class="feed">
	Feeds...
</div>

<div class="rightside">
	<h4>Relacionamentos</h4>
	<div class="rs_meio"><?php echo $qtdSeguidores;?> <br />Seguidores</div>
	<div class="rs_meio"><?php echo $qtdSeguidos;?> <br />Seguindo</div>
	<div style="clear: both;"></div>

	<h4>Sugestão</h4>
	<table border="0" width="100%">
		<tr>
			<td width="80%"></td>
			<td></td>
		</tr>
		<?php foreach($sugestao as $usuario): ?>
		<tr>
			<td><?php echo $usuario['NOME'];?></td>
			<td>
				<a href="#">Seguir</a>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>