<br>
<center>
Bem vindo <b><?=$_SESSION["nameUser"]?></b>
<table align='center'>
<?
$qry = "select id  from contatos c where c.id_userto ='".$_SESSION["id"]."' and c.dateread is null";
$result = fMySQL_Connect($qry);
$rows = mysql_num_rows($result);
if( $rows ){?>
<tr>
	<td align='center' colspan=2 valign="top">
			<p align='justify' valign="top"><a href="mvcAnnouncement.php?action=viewMessage"><img src='./img/msg_unread.gif' border=0>&nbsp;&nbsp; Existem mensagens novas para voc�</p>
			<p>&nbsp;</p>
	</td>
</tr>
<?}?>


<?if( $viewMessagePostAnnounce ){?>
<tr>
	<td align='center' colspan=2>Inclus�o de anuncio feita com sucesso</td>
</tr>
<?}?>

<?if( $viewMessagePostMatter ){?>
<tr>
	<td align='center' colspan=2>Inclus�o de mat�ria feita com sucesso</td>
</tr>
<?}?>

<tr>
	<td align='center'>
		<div style="width:15em; margin: 10px 0; height:1em; padding:1em;  background-color:#e7f1f6; border:1px solid #FF0000"><a href='mvcphp.php?action=loadData'>Alterar meus dados</a></div>
	</td>

	<td align='center'>
		<div style="width:15em; margin: 10px 0; height:1em;  padding:1em; background-color:#e7f1f6; border:1px solid #FF0000"><a href='mvcphp.php?action=logout'>Sair</a> </div>
	</td>
</tr>

<tr>
	<td align='center'>
		<div style="width:15em; margin: 10px 0; height:4em; padding:1em;  background-color:#e7f1f6; border:1px solid #FF0000"><a href='mvcAnnouncement.php?action=postAnnouncementBuy'>Incluir an�ncio de Compra de Empresas</a></div>
	</td>

	<td align='center'>
		<div style="width:15em; margin: 10px 0; height:4em; padding:1em;  background-color:#e7f1f6; border:1px solid #FF0000"><a href='mvcAnnouncement.php?action=postAnnouncementSelling'>Incluir an�ncio de Venda de Empresas</a></div>
	</td>

	</tr>

	<tr>
	<td align='center'>
		<div style="width:15em; margin: 10px 0; height:1em; padding:1em;  background-color:#e7f1f6; border:1px solid #FF0000"><a href='mvcAnnouncement.php?action=msgList'>Mensagens Lidas</a></div>
	</td>

	<td align='center'>
		<div style="width:15em; margin: 10px 0; height:1em; padding:1em;  background-color:#e7f1f6; border:1px solid #FF0000"><a  href='mvcAnnouncement.php?action=publicidade'>Anuncie aqui</a></div>  
	</td>
	</tr>


</table>
</table>
<center>
<br/>
<?
$qry = "select a.id,a.title,a.sector,a.typecompany,viewcount  from announcement a where id_user='".$_SESSION["id"]."'";
$result = fMySQL_Connect($qry);
$rows = mysql_num_rows($result);
if( $rows ){
?>
<font class='tituloAdv'>Meus an�ncios</font>
<br/>
<table width="95%" cellpadding="1" cellspacing="3" border="0" align="center" bgcolor='white'>
<tr>
	<td bgcolor='white'><font class='subtitulo3'>T�tulo do an�ncio</td>
	<td bgcolor='white'><font class='subtitulo3'>Atividade da Empresa</td>
	<td bgcolor='white'><font class='subtitulo3'>Setor </td>
	<td bgcolor='white'><font class='subtitulo3'>Visualiza��es</td>
	<td bgcolor='white'>&nbsp;&nbsp; </td>
	<td bgcolor='white'>&nbsp;&nbsp; </td>
	<td bgcolor='white'>&nbsp;&nbsp; </td>

</tr>
<?
	for ($i=0;$i<$rows;$i++)   {
	
		 $font = "<font color=darkblue>";
		 $bgcolor = " bgcolor='#FDFDFD'";
		 if( ($i%2)==0)  {
			 $bgcolor = " bgcolor='#E9ECF7'";
			 $font = "<font color=darkgreen>";
		 }
	
	
		 $line=mysql_fetch_assoc($result);
		 echo "<tr>";
		 echo "<td  $bgcolor>$font".$line["title"]."</td>";
		 echo "<td  $bgcolor>$font".$aSector[$line["sector"]]."</td>";
		 echo "<td  $bgcolor>$font".$aTypecompany[$line["typecompany"]]."</td>";
		 echo "<td align=center  $bgcolor>$font".$line["viewcount"]."</td>";
		 echo "<td  $bgcolor><a href=mvcAnnouncement.php?action=modifyAnnouncement&id_adv=".$line["id"].">$font Alterar</a></td>";
		 echo "<td  $bgcolor><a href=\"javascript:go_erase(".$line["id"].");\">$font Excluir</a></td>";
		 echo "<td  align=center  $bgcolor><a href=mvcAnnouncement.php?action=image&id_adv=".$line["id"]."><b>$font FOTOS DO EMPREENDIMENTO</b></a></td>";
		 echo "</tr>";
	}
?>
</table>
<?}
?>


</center>


<script>
	function go_erase(id_adv) {
	   msg="Deseja realmente apagar an�ncio ?";
	   if(confirm(msg))
			self.location="mvcAnnouncement.php?action=deleteAnnouncement&id_adv="+id_adv;
	 }
 </script>
