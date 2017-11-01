<?


$qry = "select a.id,a.title,a.sector,a.typecompany,a.priceselling,a.price  from announcement a WHERE publish='Y' order by datainc DESC,dtmodify DESC limit 0,10 ";
$result = fMySQL_Connect($qry);
$rows = mysql_num_rows($result);
if( $rows ){


?>

<table width="95%" cellpadding="0" cellspacing="0" border="0" align="center">
<tr>
<td>&nbsp;</td>
</tr>
<tr>
	<td colspan=4 align=center bgcolor='#E9ECF7'><font color darkgreen size=3>Oportunidades de empresas a venda , compra de empresas e investidores em empresas, registradas recentemente</font></td>
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
	 $font = "<font color=darkgreen>";
	 $bgcolor = " bgcolor='#FDFDFD'";
	 if( ($i%2)==0)  {
		 $bgcolor = " bgcolor='#E9ECF7'";
	 	 $font = "<font color=darkgreen>";
	 }

	 $ahref= "<a href=mvcAnnouncement.php?action=viewAnnouncement&id_adv=".$line["id"].">";

	 $price =  $line["priceselling"];
	 if( $line[price] != 0 )
	{
		 $price =   number_format($line[price], 2, ',', '.');
    }




	 echo "<tr height='35 px'>";
	 echo "<td  class='grayS'>$ahref $font ".$line["title"]."</font></a></td>";
	 echo "<td  class='grayS'>$ahref $font".$aSector[$line["sector"]]."</font></a></td>";
	 echo "<td  class='grayS'>$ahref $font".$aTypecompany[$line["typecompany"]]."</font></a></td>";
	 echo "<td  class='grayS'>$ahref $font".$price."</font></a></td>";
	 echo "</tr>";
}
?>


</table>

<?}




function mk_price_to_float($price){
    $price = trim($price);
    if(preg_match("~^([0-9]+|(?:(?:[0-9]{1,3}([.,' ]))+[0-9]{3})+)(([.,])[0-9]{1,2})?$~", $price, $r)){
        if(!empty($r['2'])){
            $pre = preg_replace("~[".$r['2']."]~", "", $r['1']);
        }else{
            $pre = $r['1'];
        }
        if(!empty($r['4'])){
            $post = ".".preg_replace("~[".$r['4']."]~", "", $r['3']);
        }else{
            $post = false;
        }
        $form_price = $pre.$post;
        return $form_price;
    }
    return false;
}














?>