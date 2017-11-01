<center>
<table  style="padding:5em; background-color:#e7f1f6; border:0px solid #FF0000"  width='100%'>
  <tr>
	<td bgcolor='white' colspan='4'>&nbsp;</td>
 </tr>
  <tr>
	  <td bgcolor='white' colspan='4' align=center>
			<script type="text/javascript"><!--
		google_ad_client = "pub-3882370773203656";
		google_ad_width = 468;
		google_ad_height = 60;
		google_ad_format = "468x60_as";
		google_ad_type = "text_image";
		google_ad_channel = "";
		//-->
		</script>
		<script type="text/javascript"
		  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
		</script>	   
	   </td>
	</tr>
</table>


<?
$style = " style='font-size:10pt; margin:1; border-width:1; border-color:#3f691f; border-style:outset;text-align:right;'"; 

$registroInicial = 0;
$ultimoRegistro = 0;

$style = " style='font-size:10pt; margin:1; border-width:1; border-color:#3f691f; border-style:outset;text-align:right;'"; 

$qryWhere = "";
if( $_REQUEST['lupa_x'] || $_REQUEST["txtSearch"] ){


		$Awork_search = explode(  " ",$_REQUEST["txtSearch"]);
		while( list( $key, $value ) = each( $Awork_search ) ) {
			 if( $value  && strlen($value) > 2  )              
				 $qryWhere .=   "  and description LIKE CONVERT( _utf8 '%$value%' USING latin1 ) COLLATE latin1_swedish_ci  or  (  title LIKE CONVERT( _utf8 '%$value%' USING latin1 ) COLLATE latin1_swedish_ci   )   ";

		}
		if($qryWhere)	
		{
			$qry = "insert into  searchword (words,id_user,datainc) values( \"".$_REQUEST['txtSearch']."\",'".$_SESSION[id]."', now() )";
			fMySQL_Connect($qry);	
		}

		$htmlVoltar = "<a href=mvcAnnouncement.php?action=listBusinessSelling><img src='img/voltar.jpg' border='0'></a>";
}
if( $_REQUEST["sector"]  ){
	$qryWhere = " and a.sector='".$_REQUEST["sector"]."'";	
}
$sector = $_REQUEST["sector"];


$qry = "select count(*)  from announcement a where typeannouncement='S'  $qryWhere ";

// echo $qry;
$result = fMySQL_Connect($qry);	
List( $conta_linhas )= mysql_fetch_row($result);

?>

<table  style="padding:5em; background-color:#e7f1f6; border:0px solid #FF0000"  cellpadding="1" cellspacing="3"   width='100%'>
	<form action='mvcAnnouncement.php' method='post'>
	<input type='hidden' name='action' value='listBusinessSelling'>
	<tr>
		<td bgcolor='white' colspan='4' align=center><font class='tituloAdv'>Empresas à Venda </font></td>
	</tr>
	<tr>
		<td bgcolor='white' colspan='4'>Localizar por palavra chave </font>
		<input type='text' name='txtSearch' value="<?=$_REQUEST["txtSearch"]?>" size=55>&nbsp&nbsp&nbsp;<input type='image' src='img/lupa.jpg' name='lupa'></td>
	</tr>

	<tr>
		<td bgcolor='white' height='45 px'><font class='subtitulo3'>Título do anúncio</font></td>
		<td bgcolor='white' height='45 px'><font class='subtitulo3'>Atividade da Empresa</font></td>
		<td bgcolor='white' height='45 px'><font class='subtitulo3'>Preço Venda</font> </td>
		<td bgcolor='white' height='35 px'><font class='subtitulo3'>Data do Anúncio</font> </td>
	</tr>

<?
	$action = "listBusinessSelling";
	$http = "mvcAnnouncement.php";
	$exibe = "15"; 
	$pag = ($_GET['pag']);
	
	if( !$pag )
	   $pag = "1"; 
	else
	   $pag = $_REQUEST['pag'] ;

	$total_paginas = ceil(($conta_linhas/$exibe)); 
	$linha_chegar = (($pag-1)*$exibe);

	$limit = "limit $linha_chegar,$exibe  ";
	
	$qry = "select a.id,a.title,a.sector,a.typecompany,a.priceselling,datainc,a.price  from announcement a where typeannouncement='S' $qryWhere   order by datainc desc $limit ";
	// echo $qry;
	$result2 = fMySQL_Connect($qry);	
	$_rows_ = mysql_num_rows($result2);
	for ($i=0;$i<$_rows_;$i++)   {
		 $line=mysql_fetch_assoc($result2);

		 $font = "<font color='#24486C'>";
		 $bgcolor = " bgcolor='#FDFDFD'";
		 if( ($i%2)==0)  {
			 $bgcolor = " bgcolor='#E9ECF7'";
			 $font = "<font color='#24486C'>";
		 }

		 $price =  $line["priceselling"];
		 if( $line[price] != 0 )
		 {
			 $price =   number_format($line[price], 2, ',', '.'); 
		 }


		 $ahref= "<a href=mvcAnnouncement.php?action=viewAnnouncement&id_adv=".$line["id"].">";
		 
		 echo "<tr height='35 px'>";
		 echo "<td $bgcolor> $ahref ".$line["title"]."</td>";
		 echo "<td $bgcolor> $ahref ".$aSector[$line["sector"]]."</td>";
		 echo "<td $bgcolor> $ahref ".$price."</td>";
		 echo "<td $bgcolor> $ahref ".format_date($line["datainc"])."</td>";
		 echo "</tr>";
	}
	?>

	<tr>
		<td colspan='4' bgcolor='white' align='center'> <font class='subtitulo3'> Total de <?=$conta_linhas?> anúncios de empresas à venda </font>
			<div id="rodapePaginacao" class="rodapePaginacao">
				<br>
				<?include("paginar.php")?>

			</div>
		</td>
	</tr>
	<tr>
		<td colspan='4' bgcolor='white' align='center'><?=$htmlVoltar?></td>
	</tr>
</form>
</table>
<br><br>

<table>
<tr>
	<td colspan='4' bgcolor='white' align='center'>
		<?include("blocosetor.php");?>
	</td>
</tr>
</table>
</center>

