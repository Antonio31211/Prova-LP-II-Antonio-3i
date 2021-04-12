<?php
require_once("../tcpdf/tcpdf.php");
require_once("../php/conectar.php");
$obj_pdf=new TCPDF('P',PDF_UNIT,PDF_PAGE_FORMAT,true,'UTF-8',false);  
$obj_pdf->SetCreator(PDF_CREATOR);  
$obj_pdf->SetTitle("Gerando arquivo PDF com dados do MySQL - biblioteca TCPDF php");  
$obj_pdf->SetHeaderData('','60','ITENS CADASTRADOS' );  
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));  
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA,'',PDF_FONT_SIZE_DATA));  
$obj_pdf->SetDefaultMonospacedFont('helvetica');  
$obj_pdf->SetHeaderMargin('15'); 
$obj_pdf->SetFooterMargin('30');  
$obj_pdf->SetMargins(PDF_MARGIN_LEFT,'40',PDF_MARGIN_RIGHT);  
$obj_pdf->setPrintHeader(true);  
$obj_pdf->setPrintFooter(true);  
$obj_pdf->SetAutoPageBreak(TRUE,10);  
//$obj_pdf->SetFont('helvetica','',11);  
$obj_pdf->SetFont('dejavusans', '', 12, '', true); 
$obj_pdf->AddPage();  
//rotina para colocar um logotipo no relatório - imagem da internet
//$img = file_get_contents('http://img.cinemablend.com/cb/0/f/c/5/9/e/0fc59efffd13d661c3231986d2d7c60b4cb03b10a15b266dd6694c0326a224a2.jpg');
//$imgdata = base64_decode(base64_encode($img));
//$obj_pdf->Image('@' . $imgdata,16,8,30);
//rotina para colocar um logotipo no relatório 

$obj_pdf->Image('../img/logo_musisom.png', 15, 10, 50, 13, '', '', '', true, 200, '', false, false, 1, false, false, false);
$txt="INSTRUMENTOS CADASTRADOS";
$cod="Código";
$tipo="Tipo";
$mar="Marca";
$desc="Descrição";
$val="Valor";

// config de fonte e texto
$obj_pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
//Titulo relatorio
$obj_pdf->Cell(185, 15,$txt, 1, 1, 'C', 0, '', 0);
//Cabeçalho relatorio
$obj_pdf->MultiCell(20, 5,''.$cod, 1, 'C', 1, 0, '', '', true);
$obj_pdf->MultiCell(37, 5,''.$tipo, 1, 'C', 1, 0, '', '', true);
$obj_pdf->MultiCell(42, 5,''.$mar, 1, 'C', 1, 0, '', '', true);
$obj_pdf->MultiCell(59, 5,''.$desc, 1, 'C', 1, 0, '', '', true);
$obj_pdf->MultiCell(27, 5,''.$val, 1, 'C', 1, 1, '', '', true);

$sql="SELECT * FROM cadastro";

//executa o comando select
$result=mysqli_query($conexao,$sql); 

//dados do relatorio
while ($linha = mysqli_fetch_row($result))
{
$obj_pdf->writeHTMLCell(20, 0, '', '', $linha[0], 1, 0, 0, true, '', true);
$obj_pdf->writeHTMLCell(37, 0, '', '', $linha[1], 1, 0, 0, true, '', true);
$obj_pdf->writeHTMLCell(42, 0, '', '', $linha[2], 1, 0, 0, true, '', true);
$obj_pdf->writeHTMLCell(59, 0, '', '', $linha[3], 1, 0, 0, true, '', true);
$obj_pdf->writeHTMLCell(27, 0, '', '', $linha[4], 1, 1, 0, true, '', true);

}

/*limpar/iniciar o buffer de saída que gera o arq. PDF para evitar o erro
TCPDF ERROR: Some data has already been output, can't send PDF file*/
ob_start ();
//gerar o relatório para tela (I) gerar relatorio PDF para arquivo (D)
$obj_pdf->Output('../php/relatorio.pdf','I');