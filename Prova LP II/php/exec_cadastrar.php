<?php
require_once('conectar.php');
//pegamos os dados que vieram do formulario no vetor $_POST 
$tipo = $_POST['tipo'];
$mar = $_POST['mar'];
$desc = $_POST['desc'];
$val = $_POST['val'];

//pegar o nome do arquivo da foto do instrumento
$imagem = $_FILES['imagem']['tmp_name'];

if($tipo == null){

    echo "<script language='javascript' type='text/javascript'>alert('Todos os campos devem ser preenchido');window.location.href='form_cadastrar.php';</script>";
   
}else{

//montar o comando SQL que vai gravar os dados na tabela cadastro
$sql= "insert into cadastro (tipo, marca, descricao, valor) values ('$tipo', '$mar', '$desc', '$val')";

//executar/gravar os dados na tabela
mysqli_query($conexao,$sql) or die(mysqli_connect_error());

//rotina php para UPLOAD da foto do instrumento
//pegar o ultimo código gerado pelo mySQL

$ultimocod=mysqli_insert_id($conexao);
if ($imagem != '')
{
//testar se a imagem tem formato válido jpg
$imagem_type=$_FILES['imagem']['type'];
if (($imagem_type != 'image/jpeg') && ($imagem_type != 'image/pjpeg') 
    && ($imagem_type != 'image/png') && ($imagem_type != 'image/x-png') 
        && ($imagem_type != 'image/gif')) 
{
echo "Formato de arquivo inválido !";
} 
else 
{
//modificar o nome do arquivo para codigo+extenção .jpg
$arquivo='../instrumentos_musicais/'.$ultimocod.'.jpg';

//faz o upLoad da foto
move_uploaded_file($imagem,$arquivo);
} 
//voltar para index.html e passsar parâmetro por GET com mensagem de: 
// Cliente cadastrado com sucesso !
$msg= urlencode('Instrumento cadastrado com sucesso !');
header("location: ../php/form_cadastrar.php?retorno=$msg");
}
//fecha if linha 21
else 
{ 
echo "<br /> Imagem não enviada"; 
} 
}
?>   