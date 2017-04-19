<div class="feed">
	<form method="POST">
		<textarea name="msg" class="post"></textarea>
		<input type="submit" value="Enviar">
	</form>

	<?php foreach($feed as $item): ?>
	<strong><?php echo $item['NOME']; ?></strong> - <?php echo date('H:i', strtotime($item['DATA_POST']));?><br />
	<?php echo $item['MENSAGEM']; ?>
	<hr />
	<?php endforeach; ?>
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
				<?php if($usuario['SEGUIDO']==0):?>
					<a href="<?php echo URL?>/home/seguir/<?php echo $usuario['ID'];?>">Seguir</a>
				<?php else: ?>
					<a href="<?php echo URL;?>/home/abandonar/<?php echo $usuario['ID'];?>">Abandonar</a>
				<?php endif;?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>