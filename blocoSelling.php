<style type="text/css">
.bloco A:link {COLOR: darkblue; FONT-SIZE: 9px; TEXT-DECORATION:}
.bloco A:visited {COLOR: #8772EB; FONT-SIZE: 9px; TEXT-DECORATION:}
.bloco A:active {COLOR: darkblue; FONT-SIZE: 9px; TEXT-DECORATION:}
.bloco A:hover {COLOR: #008000; FONT-SIZE: 9px; TEXT-DECORATION:}
</style>
<?

if($_REQUEST["br"]){
	echo "<br><br><br><br><br><br><br><br>";
}

?>

<table style=padding:1em; background-color:#e7f1f6; border:0px solid #FF0000  width='100%'>
<?

include_once("config.inc");

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
echo "<tr bgcolor='#E9ECF7'><td colspan=4 align='center'><font class='subtitulo3'>Empresas a venda por setor</font></td></tr>";
echo "<span class='bloco'>";

while( list( $key,$val ) = each($aSector) ){
	if( $nLin == 0 ){  	  
		echo "<tr>";
	}

	$ahref="";
	$label="";
	$ahrefecha="";
	if(  $aResultSector[$key] )	{
		$ahref="<a href='mvcAnnouncement.php?action=listBusinessSelling&sector=".$key."'>";
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
echo "</span></table><center><br><br><br>";

?>

<script type="text/javascript"><!--
google_ad_client = "pub-3882370773203656";
google_ad_width = 468;
google_ad_height = 60;
google_ad_format = "468x60_as";
google_ad_type = "text";
google_ad_channel = "";
//-->
</script>
<script type="text/javascript"
  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>

</center>