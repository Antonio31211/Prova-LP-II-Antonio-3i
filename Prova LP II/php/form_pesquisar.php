<!DOCTYPE html>
<html>
<head>
<link href="../css/tela.css" rel="stylesheet" type="text/css">
<meta charset="UTF-8">
<title></title>
</head>
<body>
<div id="container">    
<div id="topo"> 
    <h1>MusiSom</h1>  
  </div>
<div id="menu">
<h3> Pesquisar </h3>
</div>
        
<div id="conteudo">

<div id="esquerda">
<form name="pesquisar" action="form_pesquisar.php" method="POST" >
<h4> <b>Informe: Código do Produto <input type="text" name= "cod" size="25"></b> </h4>
<h4> <b>Informe: Marca do Produto <input type="text" name="mar" size="25"/> </b> </h4>
<input type="submit" value="Procurar" /> 
</form>
</div> <!-- fim da div id esquerda --> 

<div id="direita">
<?php
ini_set( 'display_errors', 0 );
require_once('./conectar.php');

$cod = $_POST['cod'];
$tipo = $_POST['tipo'];
$mar = $_POST['mar'];
$desc = $_POST['desc'];
$val = $_POST['val'];

//Teste necessário para evitar mostrar mensagem 
//de "nome não encontrado" na primeira vez que carrega a pagina

if ($cod != "" && $mar !="")  
{
//monta o comando SQL que busca os registros na tabela
$sql = "select * from cadastro where codigo='$cod' && marca='$mar'"; 
$res = mysqli_query($conexao,$sql) or die(mysql_connect_error()); //executa o comando SQL
$num = mysqli_num_rows($res); //coloca na variável $num o total de linhas da consulta SQL

//armazenar nas variáveis o conteúdo dos campos da tabela
if ($num > 0)
{
 $linha = mysqli_fetch_row($res);
 $cod = $linha[0];
 $tipo = $linha[1];
 $mar = $linha[2];
 $desc = $linha[3];
 $val = $linha[4];
 
 //variavel $foto recebe nome do arquivo da foto -- codigo do instrumento + extensão jpg
 $foto = '../instrumentos_musicais/'.$cod.'.jpg';
}
else 
    { 
     echo "<font color='#D70000' size='4' weight='bold'>"; 
     echo "Instrumento não encontrado...";
     echo "</font>";
    } 
    
} //fecha o if da linha 30

?>

<form name="pesq"> 
<label><span>Código</span>
 <input type="text" name="codigo" size="25" value="<?php echo $cod ?>"/>
</label>

<label><span>Tipo</span>
 <input type="text" name="tipo" size="25" value="<?php echo $tipo ?>"/>
</label>

<label><span>Marca</span>
 <input type="text" name="marca" size="25" value="<?php echo $mar ?>"/>
</label>

<label><span>Descrição</span>
 <input type="text" name="descricao" size="25" value="<?php echo $desc ?>"/>
</label>

<label><span>Valor</span>
 <input type="text" name="valor" size="25" value="<?php echo $val ?>"/>
</label>

<label><span>Foto:</span>
<img width = 56px src="<?php echo $foto ?>" />
</label>

</div> <!-- fim da div id direita -->
</div> <!-- fim da div id conteudo -->
<div id="rodape">
  <div id="voltar"><h3><button><a href="index.html">Voltar ao Início</a></button></h3> </div>
</div>
</div> <!-- fim da div id container -->
</body>
</html>
