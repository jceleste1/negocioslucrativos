<center> 
<?php 
include("searchNew.php");

$style = " style='font-size:10pt; margin:1; border-width:1; border-color:#3f691f; border-style:outset;text-align:right;'";

$registroInicial = 0;
$ultimoRegistro = 0;
$style = " style='font-size:10pt; margin:1; border-width:1; border-color:#3f691f; border-style:outset;text-align:right;'";


include("classFilter.php");
$filter = new classFilter();
  
$qryWhere = $filter->queryFilter(  $_REQUEST["typeAnManual"],
								   $_REQUEST["sector"],
								   $_REQUEST['typecompany'],
								   $_REQUEST['billing'],
								   $_REQUEST['zone'] ,
								   $_REQUEST['lupa_x'],
								   $_REQUEST["txtSearch"] );

$qry = "select count(*) counts  from announcement a  $qryWhere ";
$result =  $conn->query( $qry );
$conta_linhas =  $result->fetch_assoc() ;
echo $qry;
if( $conta_linhas[counts] ){
?>
<table   cellpadding="1" cellspacing="3" width='95%' >
	<form action='mvcAnnouncement.php' method='post'>
	<input type='hidden' name='action' value='listBusinessSelling'>
	<tr>
		<td bgcolor='white' colspan='4' align=center><font class='tituloAdv'>Listagem de oportunidades de negócios </font></td>
	</tr>
	<tr>
		<td bgcolor='white' height='45 px'><font class='subtitulo3'>Título do anúncio</font></td>
		<td bgcolor='white' height='45 px'><font class='subtitulo3'>Atividade da Empresa</font></td>
		<td bgcolor='white' height='45 px'><font class='subtitulo3'>Preço Venda</font> </td>
		<td bgcolor='white' nowrap='nowrap' height='35 px'><font class='subtitulo3'>Data do Anúncio</font> </td>
	</tr>

<?php
	$action = "list";
	$http = "mvcAnnouncement.php";
	$exibe = "10";
	$pag = ($_GET['pag']);

	if( !$pag )
	   $pag = "1";
	else
	   $pag = $_REQUEST['pag'] ;

	$total_paginas = ceil(($conta_linhas/$exibe));
	$linha_chegar = (($pag-1)*$exibe);

	$limit = "limit $linha_chegar,$exibe  ";

	$qry = "select a.id,a.title,a.sector,a.typecompany,a.priceselling,datainc,a.price  from announcement a  $qryWhere   order by datainc desc $limit ";
	$result =  $conn->query( $qry );


	while ( $line = $result->fetch_assoc() ) {


		 $font = "<font color='darkgreen'>";
		 $bgcolor = " bgcolor='#FDFDFD'";
		 if( ($i%2)==0)  {
			 $bgcolor = " bgcolor='#E9ECF7'";
			 $font = "<font color='darkgreen'>";
		 }

		 $price =  $line["priceselling"];
		 if( $line[price] != 0 )
		 {
			 $price =   number_format($line[price], 2, ',', '.');
		 }


		 $ahref= "<a href=mvcAnnouncement.php?action=viewAnnouncement&id_adv=".$line["id"].">";

		 echo "<tr height='35 px'>";
		 echo "<td $bgcolor> $ahref $font ".$line["title"]."</td>";
		 echo "<td $bgcolor> $ahref $font ".$aSector[$line["sector"]]."</td>";
		 echo "<td $bgcolor> $ahref $font ".$price."</td>";
		 echo "<td $bgcolor> $ahref $font ".format_date($line["datainc"])."</td>";
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
<?}else{?>
<table  style="padding:5em; background-color:#e7f1f6; border:0px solid #FF0000"  width='100%' height=300px>
  <tr>
	<td bgcolor='white' colspan='4' align=center><img src='./img/del.png'  border=0>Sua busca não encontrou nenhum anúncio.</td>
 </tr>
<?}?>
</center>