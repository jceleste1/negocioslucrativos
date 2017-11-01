
<form action="mvcAnnouncement.php" id="formSearch">
<input type="hidden"  name="action" id="action" value="list">

<table   width='90%' cellpadding="1" cellspacing="0" border="1" ID="alter" align='center'>
	<tr>
		<td colspan=4 align=center><font class=tituloAdv>Busca de oportunidades de negócios</font></td>
	</tr>

	<tr>
		<td colspan=4>
			<?
				$selectedS = " selected ";
				if( $_REQUEST['typeAnManual'] =="B" )
					$selectedB = " selected ";
			?>

			<select name="typeAnManual" id="typeAnManual" class="select">
				<option value="S" <?=$selectedS?>>Anúncios de empresas a venda</option>
				<option value="B" <?=$selectedB?>>Anúncios de investidores e compradores</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>
			Setor
		</td>
		<td><Select ID=0 Name="sector" Size=1>
			<option Value=''></option>
			<?
			reset($aSector);
			while( list( $key,$val ) =each($aSector) ){
				$sel = "";
				if( $key == $_REQUEST["sector"] )
					$sel = " selected";

				echo "<option Value='$key' $sel >$val</option>";
			}
			?>
			</Select>
		</td>

		<td>Faturamento Anual Bruto</td>

		<td> <Select ID=0 Name="billing" Size=1>
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
			Região
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
		<?
			switch( $_REQUEST["typecompany"] ){
					case "I":
						$checkedI = "  selected";
						break;
					case "C":
						$checkedC = "  selected";
						break;
					case "S":
						$checkedS = "  selected";
						break;
					default:
						break;
			}

		?>
		<TD>Atividade da Empresa </TD>
			<td> <Select ID=0 Name="typecompany" Size=1>
			<option Value=''></option>
			<option Value='I' <?=$checkedI?>>Indústria</option>
			<option Value='C' <?=$checkedC?>>Comércio</option>
			<option Value='S' <?=$checkedS?>>Serviço</option>

			</Select>
		</td>
	</tr>

	<tr>
		<td colspan="4"  align=right>
			 <div id="divSearch">
					<span id="spanSearch">						 
						<input type='image' src='img/search.jpg' name='lupa'>
					</span>	
			 </div>	
		</td>
		<td class=ashblack width="1"></td>
	</tr>

</table>

</form>