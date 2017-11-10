<?

// $msg = "cadastro de usuarios ".$_SERVER['REMOTE_ADDR']; 
// mail("jceleste.coop@transitbrasil.com.br",$msg,$msg,"" );

while (	$dataUser =  $result->fetch_assoc()  ){

?>

<br><br><br><br><br>

<TABLE cellSpacing=3 cellPadding=1  border=0 width='600 px' align='center'>
 <form action="mvcphp.php" method="post" onsubmit="return valid(this)">
 <input type=hidden name="tpclient" value="<?=$tpclient?>">
 <input type=hidden name="action" value="<?=$action?>">


 <tr>
	<td bgcolor=#EFEFEF colspan=4 align=center valign=middle height='45 px'><font class=subtitulo3>Para que possa utlizar o site NegociosLucrativos.com é necessário que preencha o formulário abaixo</td>
 </tr>	

 <tr>
	<td bgcolor=#EFEFEF colspan=4 align=center valign=middle height='45 px'><font class=msgAlert>Campos com * são obrigatórios</td>
 </tr>	

  <? if(  $erro ) { ?>
	  <tr>
		   <td align=center colspan=4><font class=msgAlert><?=$Aerro[$erro]?></TD>
      </tr>
  <? } ?>


  <tr>
		<td align=right><font class=msgAlert>*</font><font class='labels'> Nome :</TD>
		<td colspan=3> <input type='text' name="name" size="50" value="<?=$dataUser["name"]?>"></td>
  </tr>

 <tr>
		<td align=right><font class=msgAlert>*</font><font class='labels'> Email :</TD>
		<td colspan=3> <input type='text' name="mail" size="50"  value="<?=$dataUser["mail"]?>"></td>
  </tr>

   <tr>
		<td align=right><font class='labels'> Endereço :</TD>
		<td colspan=3> <input type='text' name="address" size="47"  value="<?=$dataUser["address"]?>"><font class='labels'> No.<input type='text' name="numberAddress" size="5" value="<?=$dataUser["numberaddress"]?>"> </td>
  </tr> 
  <tr>
		<td align=right><font class='labels'>  Bairro :</TD>
		<td><input type='text' name="district" size="20" value="<?=$dataUser["district"]?>"></td>
		<td align=right><font class='labels'> CEP : </td>
		<td> <input type='text' name="zipcode" size="10"  value="<?=$dataUser["zipcode"]?>"></td>
  </tr>
 <tr>
		<td align=right><font class='labels'>Cidade: </TD>
		<td ><input type='text' name="city" size="35"  value="<?=$dataUser["city"]?>">   </TD>
		<td align=right><font class='labels'>Estado: </TD>
		<td >	
		 <select name=state><option value=>--</option>
		 <?
		 while( list( $key,$val ) = each( $nlista_state1 )){
			 $sel = "";
			 if( $val == $dataUser["state"] )
				 $sel = " selected";

			echo "<option value='$val' $sel>$val</option>";
		 
		 }
		 ?>
		 </select>
		 </td>
 </tr>

 <tr>
		<td align=right><font class='labels'>Telefone Celular: </TD>
		<td > <input type='text' name="phonemobile" size="14" maxLength=14   value="<?=$dataUser["phonemobile"]?>"></td>
		<td align=right><font class='labels'> Telefone Comercial: </TD>
		<td ><input type='text' name="phone" size="14" maxLength=14   value="<?=$dataUser["phone"]?>">   </td>
</tr>

<?if(! $_SESSION["id"]) {?>

 <tr>
	 <td align='right'><font class=msgAlert>*</font><font class='labels'> Número de segurança </TD>
	 <td align='left' colspan='3'>
	  <table border='0'>
		<tr>
			<td><input type="text" name="confirmacao" size="10">&nbsp&nbsp;&nbsp;<img src="gd.php"></td>
			<td align='left'></td>
		</tr>

		<tr>
			<td><font class='labels'>Entre com os números da imagem acima.</font></td>
			<td align='left'>&nbsp;</td>
		</tr>

       </table>
	</td>
</tr>
 <tr>
	<td align=right><font class='labels'>Como conheceu o site NegociosLucrativos.com : </TD>
	<td>
	 <select name=id_marketing><option value=>--</option>
		 <?
		 while( list( $key,$val ) = each( $aMarketing )){
		   $sel = "";
		   if(  $dataUser["id_marketing"] == $key  )
		   		   $sel = " selected";		

			echo "<option value='$key' $sel>$val</option>";
		 
		 }
		 ?>
		 </select>
	</td>
</tr>

 <tr>
	<td align=right><font class='labels'>Senha : </TD>
	<td ><INPUT type=password maxLength=15 size=15  name=password>&nbsp;&nbsp;<FONT face=verdana color=darkred   size=1><B>&nbsp; </B></FONT>						
	</td>
</tr>
 <tr>
	<td align=right><font class='labels'>Confirme a Senha : </TD>
	<td ><INPUT type=password maxLength=15 size=15  name=password1>&nbsp;&nbsp;<FONT face=verdana color=darkred   size=1><B>&nbsp; </B></FONT>						
	</td>
 </tr>
<? } 
}?>

 <tr>
	<td align='center' colspan='4'><input type=submit value=Enviar name=btRegister>   </td>
</tr>

</form>    
</table>