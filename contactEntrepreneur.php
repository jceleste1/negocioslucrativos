<table   width='500 px' cellpadding="5px" cellspacing="0"  align='center'>	

	<form name=formdata action="mvcAnnouncement.php"  method=post>

	<input type=hidden name='action' value="sendMsg">	
	<input type=hidden name='id_adv' value="<?=$_REQUEST["id_adv"]?>"> 

	<TR  class="dif">
	   <td colspan=2>&nbsp;</td>
   </tr>		

	<tr>
		<td align="center" colspan=2><font color=darkgreen face=arial>Preencha o campo abaixo, para entrar em contato com o responsável do anúncio</font></td>
	</tr>

	<TR>
		<TD colspan=3 align=center>Assunto</TD>
	</TR>
	 <TR>
		 <TD colspan=3 align=center>
			<textarea rows=11 cols=100 name=message></textarea> 
		 </TD>
	 </TR>

	  <tr> 
		<td colspan=2  align='center'>
		  <table>
			  <tr>
			      <?
				  $listBusiness ="listBusinessBuy";
				  if($dataAnnouncement["typeannouncement"]=="S")
					  $listBusiness ="listBusinessSelling";
				  
				  ?>
				  <td><input type='submit'  value='<< Voltar'  onclick="javascript:formdata.action.value='<?=$listBusiness?>'"> </td>			  
				  <td><input type='submit'  value='Enviar >>' > </td>			  

			  </tr>
		  </table>
		</td>
	 </tr>

	</form>
</table>