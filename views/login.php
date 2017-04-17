<h2>Acesso Restrito</h2>
<form method="POST">
<p><input type="email" name="email" required="true" placeholder="Informe seu e-mail"></p>
<p><input type="password" name="senha" required="true" placeholder="Informe sua senha"></p>
<p><input type="submit" value="Entrar"></p>
<p><a href="<?php echo URL?>/login/cadastro">Cadastre-se!</a></p>
</form>
<?php
	if(isset($aviso)){
		echo $aviso;
	}
?>