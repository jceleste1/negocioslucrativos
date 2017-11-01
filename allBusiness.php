<style type="text/css">
.bloco A:link {COLOR: darkblue; FONT-SIZE: 9px; TEXT-DECORATION:}
.bloco A:visited {COLOR: #8772EB; FONT-SIZE: 9px; TEXT-DECORATION:}
.bloco A:active {COLOR: darkblue; FONT-SIZE: 9px; TEXT-DECORATION:}
.bloco A:hover {COLOR: #008000; FONT-SIZE: 9px; TEXT-DECORATION:}
</style>


<table  style="padding:2em; background-color:#e7f1f6; border:0px solid #FF0000"  width='100%'>
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





<table style=padding:1em; background-color:#e7f1f6; border:0px solid #FF0000  width='100%'>
<?

$qry = "select count(*) count,sector  from announcement where  typeannouncement='S' group by sector";
$result = fMySQL_Connect($qry);	
$rows = mysql_num_rows($result);
$aResultSector = array();
for ($i=0;$i<$rows;$i++)   {
	  $line=mysql_fetch_assoc($result);
	  $aResultSector[ $line["sector"]]= $line["count"];
}
$nLin= 0;
$nCol= 0;
echo $msgSearchbussiness;
echo "<tr bgcolor='#E9ECF7'><td colspan=4 align='center'><font class='tituloAdv'>Empresas a venda por setor</font></td></tr>";
echo "<span class='bloco'>";

while( list( $key,$val ) = each($aSector) ){


	if( $nLin == 0 ){  	  
		echo "<tr>";
	}


	$ahref="";
	$label="";
	$ahrefecha="";
	if(  $aResultSector[$key] )	{
		$ahref="<a href='mvcAnnouncement.php?action=list&typeAnManual=S&sector=".$key."&listBlock=1'>";
		$ahrefecha="</a>";
		$label="(".$aResultSector[$key].")";
	}

	echo "<td>$ahref $val  $label $ahrefecha </td>";

	$nLin++;
	if( $nLin >= 4 ){
		echo "</tr>";
		
		$nLin = 0;
	}

}

?>
</span>
</table>



<table style=padding:1em; background-color:#e7f1f6; border:0px solid #FF0000  width='100%'>
<?
reset( $aSector );

$qry = "select count(*) count,sector  from announcement where  typeannouncement='B' group by sector";
$result = fMySQL_Connect($qry);	
$rows = mysql_num_rows($result);
$aResultSector = array();
for ($i=0;$i<$rows;$i++)   {
	  $line=mysql_fetch_assoc($result);
	  $aResultSector[ $line["sector"]]= $line["count"];
}
$nLin= 0;
$nCol= 0;
echo "<tr bgcolor='#E9ECF7'><td colspan=4 align='center'><font class='subtitulo3'>Compradores e Investidores de empresas </font></td></tr>";
echo "<span class='bloco'>";

while( list( $key,$val ) = each($aSector) ){


	if( $nLin == 0 ){  	  
		echo "<tr>";
	}


	$ahref="";
	$label="";
	$ahrefecha="";
	if(  $aResultSector[$key] )	{
		$ahref="<a href='mvcAnnouncement.php?action=list&typeAnManual=B&sector=".$key."&listBlock=1'>";
		$ahrefecha="</a>";
		$label="(".$aResultSector[$key].")";
	}

	echo "<td>$ahref $val  $label $ahrefecha </td>";

	$nLin++;
	if( $nLin >= 4 ){
		echo "</tr>";
		
		$nLin = 0;
	}

}
echo "</span></table>";
?>





<table width='100%'>
<tr>
	<td bgcolor='white' align=center><font class='tituloAdv'>Mais oportunidades de negócios</font></td>
</tr>
<tr>
	<td bgcolor='white' align=center>
<script type="text/javascript"><!--
google_ad_client = "ca-pub-3882370773203656";
/* Sem Borda */
google_ad_slot = "2099681358";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
	</td></tr>
</table>





</center>


