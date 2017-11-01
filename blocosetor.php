<style type="text/css">
.bloco A:link {COLOR: darkblue; FONT-SIZE: 9px; TEXT-DECORATION:}
.bloco A:visited {COLOR: #8772EB; FONT-SIZE: 9px; TEXT-DECORATION:}
.bloco A:active {COLOR: darkblue; FONT-SIZE: 9px; TEXT-DECORATION:}
.bloco A:hover {COLOR: #008000; FONT-SIZE: 9px; TEXT-DECORATION:}
</style>
<div align=center>
<table  width='95%'>
<tr><td>&nbsp;</td></tr>
<?
include_once("config.inc");

$handle = fopen('total.txt', "rb");
while (!feof($handle)) {
  $total .= fread($handle, 8192);
}
fclose($handle);

$handle = fopen('countSector.txt', "rb");
while (!feof($handle)) {
  $array .= fread($handle, 8192);
  
}
fclose($handle);


reset($aSector);

$aResultSector = explode(",",$array);

$nLin= 0;
$nCol= 0;
echo "<tr><td colspan=4 align='center' class='grayS'> Anúncios relacionados a empresas a venda , compra de empresas e investidores em empresas.</font></td></tr>";
echo "<span class='bloco'>";
while( list( $key,$val ) = each($aSector) ){
	if( $nLin == 0 ){  	  
		echo "<tr>";
	}
	$count = $aResultSector[$key];
	$count = explode( "=>",$count );

	$ahref="";
	$label="";
	$ahrefecha="";
	if(  $aResultSector[$key] )	{
		$ahref="<a href='mvcAnnouncement.php?action=allBusiness&sector=".$key."&listBlock=1'>";
		$ahrefecha="</a>";
		$label="(".trim($count[1]).")";
	}

	echo "<td class='grayS'>$ahref $val <font color=darkgreen> $label $ahrefecha  </font></td>";

	$nLin++;
	if( $nLin >= 4 ){
		echo "</tr>";
		$nLin = 0;
	}

}
echo "<tr><td>&nbsp;</td></tr>";
echo "</span></table>";

?>
</div>