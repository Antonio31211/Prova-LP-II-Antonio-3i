<!DOCTYPE html>
<html>
<head>
<link href="../css/tela.css" rel="stylesheet" type="text/css">
<meta charset="UTF-8">
</head>
<body>
<div id="container">  

<div id="topo"> 
    <h1>MusiSom</h1>  
</div>

<div id="menu">
<h3> Atualizar </h3>
</div>
        
<div id="conteudo">

<div id="esquerda">

<?php
require_once('conectar.php');
$sql="select * from cadastro";
$res=mysqli_query($conexao,$sql) or die(mysqli_connect_error());
$num=mysqli_num_rows($res);
//$linha=mysqli_fetch_row($res);
//for ($n=0; $n < $num; $n++)
while ($linha = mysqli_fetch_row($res))
{
$cod=$linha[0];
echo $linha[1]. ' - ';
echo $linha[2]. ' - ';
echo $linha[3]. ' - ';
echo $linha[4]. ' - ';
//echo "<a href='form_atualizar.php?cod=$cod'> onclick='javascript:document.form.submit();'> Atualizar </a>"; 
echo "<a href= 'form_atualizar.php?cod=$cod&&tipo=$linha[1] && form_atualizar.php?cod=$cod&&mar=$linha[2] && form_atualizar.php?cod=$cod&&desc=$linha[3] && form_atualizar.php?cod=$cod&&val=$linha[4]'> <input type='submit' value='Atualizar' />  </a>";

echo "<br />";
}
?>

</div> <!-- fim da div id esquerda -->    

<div id="direita">
<b> <font color="Black" size="4" face="Arial"> Atualize os dados do produto </font> </b>  
<form name="dados" action="../php/exec_atualizar.php" method="POST">

  <input type="hidden" name="cod" value="<?php echo $_GET['cod'] ?>" />      

  <label> <span> Tipo do produto: </span> 
  <input type="text" name="tipo" value="<?php if (isset ($_GET['tipo'])) echo $_GET['tipo'] ?>" /> </label> 

  <label> <span> Marca do produto: </span> 
  <input type="text" name="mar" value="<?php if (isset ($_GET['mar'])) echo $_GET['mar'] ?>" /> </label> 
                
  <label> <span> Descrição do produto: </span> 
  <input type="text" name="desc" value="<?php if (isset ($_GET['desc'])) echo $_GET['desc'] ?>" /> </label> 

  <label> <span> Valor do produto: </span> 
  <input type="text" name="val" value="<?php if (isset ($_GET['val'])) echo $_GET['val'] ?>" /> </label> 

  <input width = 70px type="image" src="../img/atualizar.png" name="img_cad" title="Atualizar"> 
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
