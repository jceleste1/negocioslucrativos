<br>
<center>
Bem vindo <b><?=$_SESSION["nameUser"]?></b>
<table align='center'>
<?

$qry = "select id  from contatos c where c.id_userto ='".$_SESSION["id"]."' and c.dateread is null";
echo $qry;

$result =  $conn->query( $qry );
$rows = mysqli_num_rows($result);
if( $rows ) {
?>
<tr>
	<td align='center' colspan=2 valign="top">
			<p align='justify' valign="top"><a href="mvcAnnouncement.php?action=viewMessage"><img src='./img/msg_unread.gif' border=0>&nbsp;&nbsp; Existem mensagens novas para você</p>
			<p>&nbsp;</p>
	</td>
</tr>
<?}?>
