<center>
<table  style="padding:2em; background-color:#e7f1f6; border:0px solid #FF0000"  width='95%'>
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



<? $font = "<font class='colunistas'>";  ?>

<table width="95%" cellpadding="1" cellspacing="3" border="0" align="center">
	<tr>
		<td bgcolor='white' colspan='4' align=center><font class='tituloAdv'>Revista de Negócios</font></td>
	</tr>
</table>
<br/>
<table  style="padding:1,5px; background-color:#e7f1f6; border:0px solid #FF0000"  cellpadding="1" cellspacing="5"   width='95%'>

<?





$qry = sprintf("select id,subject,datainc,content,viewcount from matter where status='A' 
and id='%s'",mysql_real_escape_string($_REQUEST["idMatter"],$conexao) );

$result = fMySQL_Connect($qry);
$line=mysql_fetch_assoc($result);


?>	 
<tr>
	<td bgcolor='white' align='center'><font color=darkgreen size=3><b><?=$line[subject]?></b></font></td>
</tr>
<tr>
	<td bgcolor='white' align='left'><?=$line[content];?></td>
</tr>
</table>
<?


ob_end_flush(); 

$line[viewcount] = $line[viewcount] + 1;

$qry = sprintf("update matter set viewcount ='$line[viewcount]'  where  id='%s'",
mysql_real_escape_string($_REQUEST["idMatter"],$conexao) );
fMySQL_Connect($qry);



?>
<br/><br/><br/>


<?include("blocosetor.php");?>


