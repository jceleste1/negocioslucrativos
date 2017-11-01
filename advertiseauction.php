<?


if($_REQUEST['btSubmit'] ){

	$qry = "INSERT INTO advertiseauction (  idUser , datainc , value )  ";
	$qry .= " VALUES ( '$_SESSION[id]',now(),'$_REQUEST[value]' )";
	fMySQL_Connect($qry);	


	mail("jceleste@brasilforte.com.br","Lance de $_SESSION[id] Valor : $_REQUEST[value] " ,"");

}


$qry = "select max(c.value) value,r.name from advertiseauction c, register r where r.id=c.idUser group by r.name order by value desc";
$result = fMySQL_Connect($qry);	
$data = mysql_fetch_array( $result ) ;

?>


<center>

<form action='mvcAnnouncement.php' method='post' name='form' v>
<input type=hidden name='action' value="advertiseauction">


<table align='center' width=500px>

<tr><td align=center colspan=2><font class='subtitulo3'>Anúncie Aqui </td></tr>

<tr><td align=justify colspan=2>
<FONT FACE="Humanst521 BT,Lucida Sans Unicode" SIZE=1><P ALIGN="justify">
		Agora a sua marca pode estar no site
NegociosLucrativos.com e assim ser 
vista por milhares de internautas.<br/><br/>

Participe do leilão, aonde o banner
da sua empresa pode estar visivel 
em todo o site NegociosLucrativos.com
<br/><br/>

Faça um lance, o maior lance ganhara
o direito de ter um banner de 570X105 px
em todo o site NegociosLucrativos.com<br/><br/>


Data de encerramento do leilão 30/11/2010.
<br/>

</td></tr>

<? if( $data['value'] )  { ?>
	<tr><td align=center colspan=2>
	Lance Atual R$ <b><?=$data['value']?> </b>
	</td></tr>

	<tr><td align=center colspan=2>
	Lance de   <b><?=$data['name']?> </b>
	</td></tr>
<?} else{ ?>
	<tr><td align=center colspan=2>
	Lance Minimo R$ <b> 50,00 </b>
	</td></tr>
<?}?>

<tr><td align=center>&nbsp;</td></tr>
<tr><td align=center>&nbsp;</td></tr>


<tr>
	<td>
		Valor do Lance : <input type=text name='value'  onKeyPress="return(formataMoeda(this,'.',',',event));"> 
	</td>
	<td > <input type=submit  name=btSubmit value='Clique aqui para fazer um lance'> </td>		
</tr>
	


</table>

</form>