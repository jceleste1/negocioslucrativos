<center>
<table  style="padding:1px; background-color:#e7f1f6; border:0px solid #FF0000"  width='95%'>
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
<tr>
	<td colspan='4' bgcolor='white' align='center'></td>
</tr>
</table>
<br/><br/>
<table  style="padding:1px; background-color:#e7f1f6; border:0px solid #FF0000"  cellpadding="1" cellspacing="3"   width='95%'>
	<tr>
		<td bgcolor='white' align='center' width='70%'><font class='subtitulo3' color="#9CC328">Matérias</font>
		<td bgcolor='white' align='center'><font class='subtitulo3' color="#9CC328">Colunistas</font>
	</td>

<?
$qry = "select m.id,m.subject,m.datainc, r.name, r.mail ,r.id_msg, r.id idUser  from matter m, register r where status='A' and r.id=m.id_user order by m.datainc desc" ;
$result = fMySQL_Connect($qry);
$rows = mysql_num_rows($result);
for ($i=0;$i<$rows;$i++)   {
	 $line=mysql_fetch_assoc($result);
	 
	 $image = "";
	 if( $line[id_msg]  )
	   $image = "<br><img src='img\\col\\".$line[idUser].".".$line[id_msg]."'  width=70 height=70/>";
	 else  
	 $image = "<br><img src='imagens\\Masculino.gif'  width=70 height=70/>";
?>	 
	<tr>
		<td bgcolor='white' align='left'><a href=mvcAnnouncement.php?action=viewMatter&idMatter=<?=$line[id]?>><?=$font?><?=$line[subject]?>
		</td>
		<td bgcolor='white' align='center'><a href='mailto:<?=$line[mail]?>?subject=<?=$line[subject]?>' target='_blanck'><?=$font?><?=$line[name]?> <?=$image?> </b></font></td>
	</tr>
<?
}
?>


</table>

<br/><br/><br/>

<?include("blocosetor.php");?>
</center>


