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
<h3> Cadastrar </h3>
</div>
        
<div id="conteudo">
<form name="dados" action="../php/exec_cadastrar.php" method="POST" enctype="multipart/form-data"> 
  <label> <span> Tipo: </span> 
  <input type="text" name="tipo" /> </label> 
  <label> <span> Marca: </span> 
  <input type="text" name="mar" /> </label> 
  <label> <span> Descrição: </span> 
  <input type="text" name="desc" /> </label> 
  <label> <span> Valor: </span> 
  <input type="text" name="val" /> </label> 
  
  <label> <span> Foto: </span> 
  <input type="file" name="imagem" /> </label>  
  <input width = 200px  type="image" src = "../img/save.png" name="img_cad" title="Salvar"> 
</form>

<?php
if (isset ($_GET['retorno']))
{
 $msg = $_GET['retorno'];
 echo "<br />";
 echo "<font size='5' color='#F00'>";
 echo $msg;
 $msg="";
 echo "</font>";
}
?>
</div>
<div id="rodape">
<div id="voltar">
<div id="voltar"><h3><button><a href="index.html">Voltar ao Início</a></button></h3> </div>
</div>
</div>
</body>
</html>
