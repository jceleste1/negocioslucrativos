<?



$qry = "select a.id,a.title,a.sector,a.typecompany,a.priceselling,a.price  from announcement a where typeannouncement='B' order by viewcount DESC limit 0,20 ";
$result = fMySQL_Connect($qry);	
$rows = mysql_num_rows($result);
if( $rows ){

	
?>

<table width="100%" cellpadding="1" cellspacing="3" border="0" align="center">

<tr>
	<td bgcolor='white' colspan='4' align=center  class='grayS'> Os  anúncios de investidores e compradores de empresas mais vistos</font></td>
	<td bgcolor='white' colspan='2' align='right'>	&nbsp;

	</td>

	
</tr>

<tr>
	<td  height='35 px'><font class='subtitulo3' color="#9CC328">Título do anúncio</font></td>
	<td  height='35 px'><font class='subtitulo3' color="#9CC328">Setor</font></td>
	<td  height='35 px'><font class='subtitulo3' color="#9CC328">Atividade da Empresa</font> </td>
	<td  height='35 px'><font class='subtitulo3' color="#9CC328">Preço Venda</font> </td>
</tr>

<?

for ($i=0;$i<$rows;$i++)   {
	 $line=mysql_fetch_assoc($result);
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
$bgcolor = "class='grayS'";
	  
	 $ahref= "<a href=mvcAnnouncement.php?action=viewAnnouncement&id_adv=".$line["id"].">";

	 echo "<tr height='35 px'>";
	 echo "<td $bgcolor> $ahref ".$line["title"]."</font></a></td>";
	 echo "<td $bgcolor> $ahref ".$aSector[$line["sector"]]."</font></a></td>";
	 echo "<td $bgcolor> $ahref ".$aTypecompany[$line["typecompany"]]."</font></a></td>";
	 echo "<td $bgcolor> $ahref ".$price."</font></a></td>";
	 echo "</tr>";
}
?>

<tr>
	<td colspan='4' bgcolor='white'>&nbsp;</td>
</tr>

</table>

<?}?>