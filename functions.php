<?php
require('Database.php');

if($_GET['acao'] == "cadastrar"){

    $sql = "INSERT INTO `cliente`(`nome`, `cpf`, `endereco`, `idade`) VALUES ('".$_GET['nome']."','".$_GET['cpf']."','".$_GET['endereco']."','".$_GET['Idade']."')";

    $database = new Database();


    if($database->executaQuery($sql)){
        header('Location: index.php?menssagem=cadastrado com sucesso');
    } else {
        header('Location: index.php?erro=true&menssagem=Ocorreu um erro ao tentar cadastrar um  novo cliente');
    }
    
} else if($_GET['acao'] == "editar"){
    $sql = 
    "UPDATE `cliente` 
    SET `nome`= '".$_GET['nome']."',
    `cpf`= '".$_GET['cpf']."' ,
    `endereco`= '".$_GET['endereco']."' ,
    `idade`= '".$_GET['Idade']."' 
    WHERE cod_cliente = ".$_GET['id'];

    $database = new Database();

    if($database->executaQuery($sql)){
       header('Location: index.php?menssagem=atualizado com sucesso');
    } else {
        header('Location: index.php?erro=true&menssagem=Ocorreu um erro ao tentar atualizar o cliente');
    }

} else if($_GET['acao'] == "excluir"){

    $sql = "DELETE FROM cliente WHERE cod_cliente = ".$_GET['id'];
    $database = new Database();

    if($database->executaQuery($sql)){
        header('Location: index.php?menssagem=deletado com sucesso');
    } else {
        header('Location: index.php?erro=true&menssagem=Ocorreu um erro ao tentar deletar o cliente');
    }

}
