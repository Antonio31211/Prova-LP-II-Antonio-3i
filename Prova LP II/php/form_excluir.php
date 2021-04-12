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
<div id="topo"> 
    <h1>MusiSom</h1>  
  </div>
</div>
<div id="menu">
<h3> Excluir </h3>
</div>
        
<div id="conteudo">

<div id="esquerda">
<?php
require_once('conectar.php');
$sql="select * from cadastro";
$res=mysqli_query($conexao,$sql) or die (mysqli_connect_error());
$num=mysqli_num_rows($res);
while ($linha = mysqli_fetch_row($res))
{
$cod=$linha[0];
echo $linha[1]. ' - ';
echo $linha[2]. ' - ';
echo $linha[3]. ' - ';
echo $linha[4]. ' - ';

//echo "<a href='form_atualizar.php?cod=$cod'> onclick='javascript:document.form.submit();'> Atualizar </a>"; 
echo "<a href='form_excluir.php?cod=$cod&&mar=$linha[2]'> <input type='submit' value='Excluir' /> </a> ";
echo "<br />";
}
?>
</div> <!-- fim da div id esquerda -->    

<div id="direita">
<b> <font color="black" size="4" face="Arial"> Confirma exclusão do registro ? </font> </b>  
<form name="dados" action="../php/exec_excluir.php" method="POST">
  <input type="hidden" name="cod" value="<?php echo $_GET['cod'] ?>" />
              
  <label> <span> Código: </span> 
  <input type="text" name="cod" readonly value="<?php if (isset ($_GET['cod'])) echo $_GET['cod'] ?>" /> </label> 
                
  <input type="image" src="../img/excluir.png" width = "70px" name="img_cad" title="Excluir"> 
</form>
</div> <!-- fim da div id direita -->
<?php
if (isset ($_GET['retorno']))
{
 $msg = $_GET['retorno'];
 echo "<br />";
 echo "<font face='Arial' size='3' color='#F00'>";
 echo $msg;
 $msg="";
 echo "</font>";
}
?>
</div>
<div id="rodape">
  <div id="voltar"><h3><button><a href="index.html">Voltar ao Início</a></button></h3> </div>
</div>
</div>
</body>
</html>
