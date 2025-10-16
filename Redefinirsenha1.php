<?php
    //echo 'senha alterada com sucesso<br>';

    //echo '<a href="Login.html"> Voltar a tela de login</a>';


    $login=$_POST['login'];
    $senha=$_POST['senha']; 
    $caminho = 'C:\xampp\htdocs\dbfaseamento.db';

    $base= new PDO('sqlite:'.$caminho);
    $result=$base->query("SELECT * FROM VENDEDORES WHERE LOGIN='$login'");
    foreach($result as $row){
        $login_banco=$row['LOGIN'];

        if($login==$login_banco){
            $result=$base->query("UPDATE VENDEDORES SET SENHA='$senha' WHERE LOGIN='$login'");
            echo 'senha alterada com sucesso';
            echo '<br>';
            echo '<a href="Login.html"> Voltar a tela de login</a>';
        }
    }
?>