<h2>Cadastro simples!</h2>
<form method="POST">
<p><input type="text" name="nome" required="true" placeholder="Informe seu nome"></p>
<p><input type="email" name="email" placeholder="Informe seu e-mail"></p>
<p><input type="password" name="senha" placeholder="Informe sua senha"></p>
<p><input type="submit" value="Cadastrar"></p>
</form>
<?php
if(!empty($aviso)){
	echo $aviso;
}
?>