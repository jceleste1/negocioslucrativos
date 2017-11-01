
<center>
<TABLE cellSpacing=3 cellPadding=1  border=0>

<form name=formdata action="mvcphp.php" method=post>
<input type=hidden name='action' value='contact1'>


<?	if( $_REQUEST[prop]  ) {?>


	<TR>
	<TD bgcolor=#EFEFEF colspan=2 align=center valign=middle>
	
	<FONT FACE="Humanst521 BT,Lucida Sans Unicode" SIZE=1>
		Agora a sua marca pode estar no site
NegociosLucrativos.com e assim ser 
vista por milhares de empresarios.</FONT>
	
	</TD></TR>					


<?	 }  ?>

	<TR>
	<TD bgcolor=#EFEFEF colspan=2 align=center valign=middle><b>Preencha os dados abaixo para entrar em contato conosco.<br><br></TD></TR>					

<TR>
	<TD align=right width="25%">Assunto:</TD>
	<TD><INPUT maxLength=38 size=40 name=nm_assunto value="<?=$_REQUEST["assunto"]?>"></TD></TR>



	<TR>
	<TD align=right width="25%">Empresa:</TD>
	<TD><INPUT maxLength=38 size=40 name=nm_empresa></TD></TR>

	<TR>
	<TD align=right width="25%">Contato:</TD>
	<TD><INPUT maxLength=38 size=40 name=nm_contato ></TD></TR>
	<TR>
	<TD align=right  width="25%">E-mail:</TD>
	<TD><INPUT maxLength=60 size=60 name=email></TD></TR>


	<TR>
	<TD align=right  width="25%">Telefone de Contato: </TD>
	<TD><INPUT maxLength=3 size=3 name=dddcom>
		<INPUT  maxLength=8 size=8 name=fonecom> &nbsp;&nbsp;&nbsp;
		 Ramal: &nbsp;<INPUT maxLength=3 size=3 name=ramal  > 
	 </TD>
	 </TR>

	<TR>
		<TD  bgcolor=#EFEFEF  colspan=3 align=center>Assunto</TD>
	</TR>
	 <TR>
		 <TD colspan=3 align=center>
			<textarea rows=10 cols=60 name=assunto></textarea> 
		 </TD>
	 </TR>

	<TR>
	<TD colspan=3 align=center><input type=submit name=bt_enviar value='Enviar'>
	</td>
	</tr>
 </form>
</table>
</center>

		