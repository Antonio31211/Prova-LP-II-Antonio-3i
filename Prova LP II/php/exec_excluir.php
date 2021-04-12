<?php
require_once('conectar.php');
//pegar os dados que veio do formulário no vetor $_POST
$cod = $_POST['cod'];

//rotina para excluir a foto do instrumento 
$exclui_foto='../instrumentos_musicais/'.$cod.'.jpg';
unlink($exclui_foto); //comando que exclui a foto 

if($cod == null){

    echo "<script language='javascript' type='text/javascript'>alert('Escolha uma opção para excluir');window.location.href='form_excluir.php';</script>";
   
}else{
//montar o sql e executar que irá atualizar o registro do instrumento
$sql="delete from cadastro where codigo='$cod'";
mysqli_query($conexao,$sql) or die (mysql_connect_error());
//voltar para form_atualizar.php e passar parâmetro com a mensagem de: Registro excluído com sucesso
$msg=urlencode('Registro excluído com sucesso ! ! ! ');
header ("location: ../php/form_excluir.php?retorno=$msg");
}
?>