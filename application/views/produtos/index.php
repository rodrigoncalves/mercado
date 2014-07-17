<html lang="en">
	<head>
		<meta charset='utf-8'>
		<link rel="stylesheet" href=<?=base_url("css/bootstrap.css")?>>
	</head>
	<body>
	<div class="container">

		<?php if($this->session->flashdata("success"))  : ?>
    		<p class="alert alert-success text-center"><?= $this->session->flashdata("success") ?></p>
		<?php endif;
		if($this->session->flashdata("danger"))  : ?>
    		<p class="alert alert-danger text-center"><?= $this->session->flashdata("danger") ?></p>
		<?php endif ?>

		<h1> Produtos</h1>
		<table class="table">
			<?php foreach($produtos as $produto) : ?>
			<tr>
				<td><?=$produto["nome"]?></td>
				<td><?=numeroemReais($produto["preco"])?></td>
			</tr>
		<?php endforeach ?>
		</table>

		<?php 
		if ($this->session->userdata("usuario_logado")) { 
			echo anchor('produtos/formulario', 'Adicionar produto', array("class" => "btn btn-primary"));
			echo " ";
			echo anchor('login/logout', 'Sair', array("class" => "btn btn-primary"));
		} else { ?>

		<h1>Login</h1>
		<?php 
		echo form_open("login/autenticar");

		echo form_label("E-mail", "email");
		echo form_input(array(
			"name" => "email",
			"id" => "email",
			"class" => "form-control",
			"maxlength" => "255"
		));

		echo form_label("Senha", "senha");
		echo form_password(array(
			"name" => "senha",
			"id" => "senha",
			"class" => "form-control",
			"maxlength" => "255"
		));

		echo "<br>";
		
		echo form_button(array(
			"class" => "btn btn-primary",
			"content" => "Entrar",
			"type" => "sumbit"
		));

		echo form_close();
		?>

		<h1>Cadastro</h1>
		<?php 
		echo "<br>";
		
		echo form_open("usuarios/novo");

		echo form_label("Nome", "nome");
		echo form_input(array(
			"name" => "nome",
			"id" => "nome",
			"class" => "form-control",
			"maxlength" => "255"
		));

		echo form_label("E-mail", "email");
		echo form_input(array(
			"name" => "email",
			"id" => "email",
			"class" => "form-control",
			"maxlength" => "255"
		));

		echo form_label("Senha", "senha");
		echo form_password(array(
			"name" => "senha",
			"id" => "senha",
			"class" => "form-control",
			"maxlength" => "255"
		));

		echo "<br>";
		
		echo form_button(array(
			"class" => "btn btn-primary",
			"content" => "Cadastrar",
			"type" => "sumbit"
		));

		echo form_close();

		} ?>
	</body>
	<div>
</html>