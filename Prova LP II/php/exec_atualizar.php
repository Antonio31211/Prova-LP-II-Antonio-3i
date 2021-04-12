<?php
require_once('conectar.php');
//pegar os dados que veio do formulário no vetor $_POST
$cod = $_POST['cod'];
$tipo = $_POST['tipo'];
$mar = $_POST['mar'];
$desc = $_POST['desc'];
$val = $_POST['val'];

//montar o sql e executar que irá atualizar o registro do instrumento
if($tipo == null && $mar == null && $desc == null && $val == null){

    echo "<script language='javascript' type='text/javascript'>alert('Escolha uma opção para atualizar');window.location.href='form_atualizar.php';</script>";
   
}else{

$sql="update cadastro set tipo = '$tipo', marca = '$mar', descricao ='$desc', valor = '$val' where codigo=$cod";
mysqli_query($conexao,$sql) or die(mysqli_connect_error());
//voltar para form_atualizar.php e passar parâmetro com a mensagem de: Cadastro atualizado com sucesso
$msg=urlencode('Cadastro atualizado com sucesso ! ! ! ');
header ("location: ../php/form_atualizar.php?retorno=$msg");
}
?>