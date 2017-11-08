  <?

	while ($dataAnnouncement = $result->fetch_assoc() ) {

	   if( $dataAnnouncement["$typeannouncement"] == "B" ){
		   $labelZone = "Local de preferência ";
		   $labelCondition = "Condições para a compra";
		}else{
 		   $labelZone = "Local da empresa";
   		   $labelCondition = "Condições de Venda<br>ou de  Participação na Empresa ";
        }


		$price = $dataAnnouncement["priceselling"];
	    if( $dataAnnouncement[price] != 0 )
		{
				 $price =   number_format($dataAnnouncement[price], 2, ',', '.');
        }



	   ?>

 <table cellpadding="1" cellspacing="5" border="0" align="center" width='95%' bgcolor='white'>
  <tr>
	<td bgcolor='white' colspan='4' align="center">
	
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

	
	

			<a href="#" onclick="javascript:submitFormSearch()"><img src='img/search.jpg' border=0></a>

			</td>

 </tr>
 
</table>



 <table cellpadding="1" cellspacing="3" border="0" align="center" width='95%' bgcolor='white'>
 <tr><td width='90%'>

  <table cellpadding="1" cellspacing="3" border="0" align="center" width='100%' height='100%'  >
   <tr>
	   <td colspan=2>&nbsp;</td>
   </tr>

	<tr>
		<td align="center" colspan=2 class="gray"><?=$dataAnnouncement["title"]?></td>
	</tr>

	<TR>
		<TD  class="gray" width='140px'>Atividade da Empresa </TD>
		<td  class="gray">
		<?
			switch( $dataAnnouncement["typecompany"] ){
				case "I":
					echo "Indústria";
					break;
				case "C":
					echo "Comércio";
					break;
				case "S":
					echo "Serviço";
					break;
				default:
					break;
			}
		?>
		</td>
	</tr>

<tr>
	<td class="grayS">
		Setor
	</td>
	<td class="grayS">
		<?
		while( list( $key,$val ) =each($aSector) ){
			$sel = "";
			if( $key == $dataAnnouncement["sector"] )
					echo "$val";
		}
		?>
	</td>
</tr>

<tr>
	<td  class="gray">
		Faturamento Anual Bruto
	</td>
	<td  class="gray">
		<?
		while( list( $key,$val ) =each($aInvestimento) ){
			$sel = "";
			if( $key == $dataAnnouncement["billing"] )
				echo "$val";
		}
		?>
		</Select>
	</td>
</tr>

<tr>
	<td class="grayS">
		Local
	</td>
	<td class="grayS">
		<?
		while( list( $key,$val ) =each($aZone) ){
			if( $key == $dataAnnouncement["zone"] )
				echo "$val";

		}
		?>
	</td>
</tr>


<TR>
	<TD   class="gray">
		Descrição :
	</TD>
	<TD  class="gray">
		<?=ereg_replace ("\n", "<br>",$dataAnnouncement["description"] );?>
	</TD>
</TR>




<tr>
	<td  class="grayS">Preço de Venda</td>
	<td class="grayS"><?=$price?></td>
</tr>

<tr>
	<td  class="gray">Número de Funcionários</td>
	<td    class="gray"><?=$dataAnnouncement["numberemployee"];?></td>
</tr>

<tr>
	<td class="grayS"><?=$labelCondition?></td>
	<td class="grayS">
		<?=ereg_replace ("\n", "<br>",$dataAnnouncement["conditionpart"] );?>
	</td>
</tr>


<? if( $dataAnnouncement["confidencial"] != "N"   &&  $_SESSION["id"] ) { ?>

	<? if( $dataAnnouncement["www"]  ) {?>
		<TR>
			<TD   class="gray">
				Site da empresa http://
			</TD>
			<TD  class="gray"><a href="<?=$http.$dataAnnouncement["www"];?>" target=_blank><?=$dataAnnouncement["www"];?></a>
			</TD>
		</TR>
	<? } ?>

<tr>
	<td colspan=2 bgcolor='darkgreen' align=center><font color=white>Dados do anunciante</font></td>
</tr>


<tr>
   <td  class="gray">Nome</td>
	<td  class="gray">
		<?=$dataAnnouncement["name"]?>
	</td>
</tr>

<tr>
	<td class="grayS">Telefone</td>
	<td class="grayS">
		<?=$dataAnnouncement["phone"]?>
	</td>
</tr>


<tr>
	<td  class="gray">Telefone Celular</td>
	<td  class="gray">
		<?=$dataAnnouncement["phonemobile"]?>
	</td>
</tr>

<? }

}?>

</TABLE>

</td></tr>
</TABLE>




<? include("photoEnterprise.php")?>


<?
if(  $_SESSION["id"]  )
	include("contactEntrepreneur.php");
else{

	echo "<table cellpadding=\"1\" cellspacing=\"3\" border=\"0\" align=\"center\" width='90%' >";
	echo "<tr><td colspan=2  align=center><b><font color=darkgreen face=verdana>Para entrar em contato com  o empresário e necessário cadastrar-se no site NegociosLucrativos.com </font></b></td>	</tr>";
	echo "</table>";
    include("login.php");
}

?>
<br><br>

<form action="mvcAnnouncement.php" id="formSearch3" METHOD=GET>
<input type=hidden name='action' id='action' value='list'/>
<input type=hidden name='typeAnManual' id='typeAnManual' value='S'/>
</form>


<script>
function  submitFormSearch(){
	document.getElementById('formSearch3').submit();
}
</script>


