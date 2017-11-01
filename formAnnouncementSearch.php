<script type="text/javascript" src="js/validAnnouncement.js"></script>


<table   width='600px' cellpadding="5px" cellspacing="0" ID="alter" align='center'>					

	<form action='mvcAnnouncement.php' method='GET' name='form'   onsubmit="return valid2(this)">
	<input type=hidden name='action' value="recAnnouncementSearch">
	
	<TR  class="dif">
	   <td colspan=2 align='center'><font class='subtitulo3'>Preencha o formulário abaixo,
	   para cadastrar seu anúncio de
	   <?
	   if( $_REQUEST["typeAnManual"] == "B" ){ 
	       echo "<b>  compra de empresas</b>";
		   $labelZone = "Local de preferência ";
		   $labelCondition = "Condições para a compra";
		   $labelPriceSelling = "Valor do Investimento";
		}else{
   	       echo "<b>  venda de empresa</b>";	   
 		   $labelZone = "Local da empresa";
   		   $labelCondition = "Condições de Venda ou de  Participação na Empresa ";
  		   $labelPriceSelling = "Valor de Venda ";
        }

		  $price =  $_REQUEST["priceselling"];
		  if( $line[price] != 0 )
		  {
				 $price =   number_format($dataAnnouncement[price], 2, ',', '.'); 
		  }




	   ?></font></td>
   </tr>
	<?if($ErroConfirm) {?>
   <TR  class="dif">
	   <td colspan=2 align='center'><font color=darkred>Código de validação invalido</font></td>
	</tr>
	<?}?>
   
   
	<tr>
		<td align="center">Titulo do anúncio</td>		
		<td><input type='text' name='txtSearch' id='txtSearch' size='60' MAXLENGTH ="70" value="<?=$_REQUEST["txtSearch"]?>"></td>
	</tr>

	<TR> 
		<TD  class="gray">Atividade da Empresa </TD>
		<td  class="gray">
		<?
			switch( $_REQUEST["typecompany"] ){
				case "I":
					$checkedI = "  Checked";
					break;
				case "C":
					$checkedC = "  Checked";
					break;
				case "S":
					$checkedS = "  Checked";
					break;
				default:
					$checkedI = "  Checked";
					break;
			}



		
		?>

			<input type='radio' name='typecompany' value='Indústria' <?=$checkedI?>>Indústria<br>
			<input type='radio' name='typecompany' value='Comércio' <?=$checkedC?> >Comércio<br>
			<input type='radio' name='typecompany' value='Serviço'  <?=$checkedS?>>Serviço<br>
		</td>
	</tr>

<tr>
	<td>
		Setor
	</td>
	<td><Select ID=0 Name="sector" Size=1>
		<option Value=''></option>
		<?
		while( list( $key,$val ) =each($aSector) ){
			$sel = "";	
			if( $key == $_REQUEST["sector"] )
				$sel = " selected";	

			echo "<option Value='$key' $sel >$val</option>";
			
		}	
		?>
		</Select>
	</td>
</tr>
<tr> 
	<td  class="gray">
		Faturamento Anual Bruto
	</td>
	<td  class="gray"> <Select ID=0 Name="billing" Size=1>
		<option Value=''></option>
		<?
		while( list( $key,$val ) =each($aInvestimento) ){
			$sel = "";	
			if( $key == $_REQUEST["billing"] )
				$sel = " selected";	

			echo "<option Value='$key' $sel>$val</option>";
			
		}	
		?>
		</Select>
	</td>
</tr>

<tr> 
	<td>
		<?=$labelZone?>
	</td>
	<td > <Select ID=0 Name="zone" Size=1>
		<option Value=''></option>
		<?
		while( list( $key,$val ) =each($aZone) ){
			$sel = "";	
			if( $key == $_REQUEST["zone"] )
				$sel = " selected";	

			echo "<option Value='$key' $sel>$val</option>";
			
		}	
		?>
		</Select>
	</td>
</tr>




<TR>
	<TD   class="gray">
		Descrição :
	</TD>		
	<TD  class="gray">			
		<TEXTAREA COLS='125' ROWS='11' WRAP='hard' NAME='description'><?=$_REQUEST[description]?></TEXTAREA>
		<br><font color=darkred face=verdana size=1><b>Atenção :</b> Não coloque dados de telefone ou email neste campo, caso isso ocorra seu
		anúncio não será publicado.</font>
	</TD>
</TR>

<?


?>
<tr>
	<td align="center"   class="gray"><?=$labelPriceSelling?></td>		
	<td>

		<input type=text name='priceselling'  value="<?=$price?>" onKeyPress="return(formataMoeda(this,'.',',',event));">
		
	</td>
</tr>

<? if( !$_SESSION["id"] ) { ?>

<tr>
	<td colspan=4 align=center bgcolor='#CCFFCC'>Dados Adicionais</td>
</tr>

<tr>
	<td class="gray">Nome :</TD>
	<td colspan=3 class="gray"> <input type='text' name="name" size="50" value="<?=$_REQUEST["name"]?>"></td>
</tr>

<tr>
	<td> Email :</TD>
	<td colspan=3> <input type='text' name="mail" size="50"  value="<?=$_REQUEST["mail"]?>"></td>
</tr>

 <tr>
	<td class="gray">Senha : </TD>
	<td class="gray"><INPUT type=password maxLength=15 size=15  name=password>&nbsp;&nbsp;<FONT face=verdana color=darkred   size=1><B>&nbsp; </B></FONT>						
	</td>
</tr>
<tr>
	<td>Confirme a Senha : </TD>
	<td ><INPUT type=password maxLength=15 size=15  name=password1>&nbsp;&nbsp;<FONT face=verdana color=darkred   size=1><B>&nbsp; </B></FONT>						
	</td>
</tr>

 <tr>
	 <td>Número de segurança </TD>
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
<? } ?>

<tr> 
	<td colspan=2  align='center' class="gray">
	  <table>
		  <tr>
			  <td><input type='submit' name=btBack  value='<< Voltar' onclick="javascript:form.action.value='backHome'"> </td>
			  <td><input type='submit' name=btSend value='Enviar >>'></td>
		  </tr>
	  </table>
	</td>
 </tr>
</form>



</center>
</TABLE>


<form action="mvcAnnouncement.php" id="formSearch3" METHOD=GET>
<input type=hidden name='action' id='action' value='list'/>
<input type=hidden name='typeAnManual' id='typeAnManual' value='S'/>
</form>
