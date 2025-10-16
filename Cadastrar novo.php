<?php

$codigo_vendedor=$_POST['codigo'];
$nome_vendedor=$_POST['nome_vendedor'];
$representante=$_POST['representante'];
$empresa=$_POST['empresa'];
$gerente=$_POST['gerente'];
$login=$_POST['login'];
$senha=$_POST['senha'];
$email=$_POST['email'];


$caminho = 'C:\xampp\htdocs\dbfaseamento.db';

$base= new PDO('sqlite:'.$caminho);


$result=$base->query("INSERT INTO VENDEDORES VALUES ($codigo_vendedor,'$nome_vendedor','$representante','$empresa','$gerente','$login','$senha','$email')");

//$result=$base->query("UPDATE VENDEDORES SET SENHA='$senha' WHERE LOGIN='$login'");

echo $codigo_vendedor;
echo '<br>';
echo $email;
echo '<br>';
echo $nome_vendedor;
echo '<br>';
echo $representante;
echo '<br>';
echo $empresa;
echo '<br>';
echo $gerente;
echo '<br>';
echo $login;
echo '<br>';
echo $senha;











//}

?>