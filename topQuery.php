<? 
   header('Content-Type: text/html; charset=ISO-8859-1');

   if(  $_SERVER['REQUEST_URI'] == "/index2.php"  )
	{
		$title = " NegociosLucrativos.com Venda Compra aquisi��o fus�o de empresas $dataAnnouncement[title]";

		$description = "Portal de neg�cios, site de neg�cios, empresa de neg�cios, venda de neg�cios, venda de empresa, venda de industria, venda de empresas, empresas a venda, venda de m�quinas e equipamentos, business opportunities, investment in brazil, investidores, s�cios, cis�o, fus�o, incorpora��o, aquisi��o, grupo de investidores, grupo de investimentos, fundos de investimentos, pchs, usinas de a��car, usinas de �lcool, minera��o, papel e celulose, distribuidora de petr�leo, investing in brazil, agroneg�cio, brazil economy ";
		$keywords = "negocios a venda, empresas a venda, portal de neg�cios, site de neg�cios, empresa de neg�cios, assessoria em neg�cios, venda de neg�cios, venda de empresa, venda de industria, venda de empresas, venda de m�quinas e equipamentos, business opportunities, investment in brazil, investidores, s�cios, cis�o, fus�o, incorpora��o, aquisi��o, grupo de investidores, grupo de investimentos, fundos de investimentos, pchs, usinas de a��car, usinas de �lcool, minera��o, papel e celulose, distribuidora de petr�leo, investing in brazil, agroneg�cio, brazil economy";
	}
	else
	{
		$description = $dataAnnouncement[description];
		$keywords =  $dataAnnouncement[description];

		if( $dataAnnouncement[typeannouncement]  == "S" )
			$typeAnnouncement = "Venda de empresa Setor ";
		else
			$typeAnnouncement = "Compra ou Investidores de empresas Setor  ";

		switch( $dataAnnouncement["typecompany"] ){
			case "I":
				$typecompany = " Ind�stria";
				break;
			case "C":
				$typecompany = " Com�rcio";
				break;
			case "S":
				$typecompany = "  Servi�o";
				break;
		}
		$title  = $dataAnnouncement[title]; 
	}
	

?>

<html>
<head>	
	<title><?=$title?></title>
	<meta name="description" content="<?=$description?>" >
	<META NAME="Description" language="english" CONTENT="NegociosLucrativos.com is the right place to buy and sell small, medium and large business. Work with Venture capital, Investment Banks , Project Finance and Private Equity">
	<meta name="keywords" content="<?=$keywords?>">
	<Meta name="author" content="Brasil Forte Consultoria Ass. Ltda">
	<meta name="classification" content="Empresas">
	<meta name="subject" content="ecommerce">
	<meta name="rating" content="general">
	<meta name="roboots" content="index, all">
	<meta name="robots" content="index, follow">
	<meta name="revisit-after" content="1 days">
	<meta name="copyrigth" content="Brasil Forte Consultoria Ass. Ltda">
	<META name="GOOGLEBOT" content="INDEX, FOLLOW">
	<meta name="audience" content="all">

	<link rel="stylesheet" type="text/css" href="<?=$nivel?>css/class.css" />		
	<link rel="stylesheet" type="text/css" href="<?=$nivel?>css/menu.css" />		
	<link rel="stylesheet" type="text/css" href="<?=$nivel?>css/boxMessage.css" />	
	<!--YUI-->
	<link rel="stylesheet" type="text/css" href="./jquery/skin.css" />
	<script type="text/javascript" src="<?=$nivel?>js/jquery.min.js"></script>
    <script type="text/javascript" src="<?=$nivel?>js/valid.js"></script>	
	<script type="text/javascript" src="<?=$nivel?>js/validAnnouncement.js"></script>
	<script type="text/javascript" src="<?=$nivel?>js/boxmessage.js"></script>
	<script type="text/javascript" src="<?=$nivel?>js/funcoes.js"></script>
	<script type="text/javascript" src="<?=$nivel?>js/ng.js"></script>

	<link rel="stylesheet"  type="text/css"  href="<?=$nivel?>css/slider.css"  media="screen" charset="utf-8" />
	
	
</head>
		
<body leftmargin="0" topmargin="0" marginheight="0" marginwidth="0" text="#000000" link="#000000" vlink="#000000" alink="#000000" bgproperties="fixed" class="yui-skin-sam" >

<TABLE cellSpacing=0 cellPadding=0 width=766 align=center border=0 height="106">
 <TBODY>
  <TR vAlign=bottom>
    <TD align=left width=180><A 
      href="http://www.brasilforte.com.br/negocioslucrativos/">
      <IMG 
      alt="Neg�cios Lucrativos" src="<?=$nivel?>img/top_logo.gif" 
      border=0></A><BR>
      </TD>
    <TD align=right width=585 background="">
      <TABLE cellSpacing=0 cellPadding=0 border=0>
        <TBODY>
        <TR vAlign=bottom align=left>
          <TD>
			<p align="center"><IMG src="<?=$nivel?>img/topo_01.gif" border=0 alt='Portal de neg�cios, site de neg�cios, empresa de neg�cios'></TD>
          <TD>
			<p align="center"><IMG src="<?=$nivel?>img/topo_02.gif" border=0></TD>
          <TD>
			<p align="center"><IMG src="<?=$nivel?>img/topo_03.gif" border=0></TD>
          <TD>
			<p align="center"><IMG src="<?=$nivel?>img/topo_04.gif" border=0></TD>
          <TD>
			<p align="center"><IMG src="<?=$nivel?>img/topo_05.gif" border=0></TD>
          <TD>
			<p align="center"><IMG src="<?=$nivel?>img/topo_06.gif" border=0></TD>
          <TD>
			<p align="center"><IMG src="<?=$nivel?>img/topo_07.gif" border=0></TD>
          </TR>
 	     </TBODY>
  	   </TABLE>
    </TD>
   </TR>
  <TR vAlign=bottom>
    <TD align=left width=766 colspan="2" height="10">
      </TD>
   </TR>
   </TBODY>
</TABLE>


<div id="boxes">
	<!-- Janela Modal com Bloco de Nota -->
	<div id="dialog2" class="window">
		<b><font class=tituloAdv>N�o foram encontradas oportunidades de neg�cios, referente a sua pesquisa.</font></b>
		<br><br>
		Sugerimos que fa�a um anuncio em NegociosLucrativos.com, baseados nas informa��es
utilizadas em sua busca.<br>
Com essa a��o, grandes oportunidades de neg�cios podem surgir. <br/>
Lembrando que anunciar em <b>NegociosLucrativos.com</b> � totalmente gratuito.

		<div id="buttons" align=left>
		<table border=0 width=500px>
		<tr><td><br><br></td></tr>
		<tr><td align=center>
		
			<a href="#dialog2" name="modalAnn"><input type=button id=anunciar value='Quero Anunciar'/></a>
			</td><td>
		<!-- <input type="button" value="Fechar" class="close"/> -->
			<td align=center>	
<!--		<input type="button" value="Anunciar" class="ann"/> -->
			<a href="#dialog2" name="modalClose"><input type=button id=close value='Fechar'/></a>
			</td></tr>
			
		</table>	
		</div>
	</div>
	<!-- Fim Janela Modal com Bloco de Nota -->

	<!-- M�scara para cobrir a tela -->
	<div id="mask"></div>
</div>



