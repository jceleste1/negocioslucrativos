<?	$style = " style='font-size:10pt; margin:1; border-width:1; border-color:#3f691f; border-style:outset;text-align:right;'"; ?>
<div id=miolo>


<?include("blocosetor.php")?>
<table width="590" align="center" border="0" cellpadding="0" cellspacing="0">
	
	<tr>
		<td valign="top" align="center">

			<div style="OVERFLOW: hidden; WIDTH: 580">
					<table width="100%" cellpadding="0" cellspacing="0" border="0" align="left">
						<!-- Inicio Classificados -->
						<tr>
							<td colspan=5>
								<p align="center">
								<a href="mvcAnnouncement.php?action=listBusinessBuy"><font class=tituloAdv>Oportunidades de negócios</a>
							</td>
						</tr>
						<tr>
							<td class=ashblack colspan=5></td>
						</tr>
						 
						<tr>
							<td class=ashblack width="1" height="48"></td>
							<td width="10"></td>
							<td width="540" height="48" valign="middle" align=left>
								<form action='mvcAnnouncement.php' method='post'>
								<input type='hidden' name='action' value='listBusinessSelling'>
								
								<font color="#000066">	
										<p>&nbsp;&nbsp;&nbsp; <img border="0" src="img/arrow1.png" width="9" height="9"> Em NegociosLucrativos.com você terá um banco de dados de investidores que compram e vendem empresas brasileiras de diversos setores.
										</p>
										<p>&nbsp;&nbsp;&nbsp; <img border="0" src="img/arrow1.png" width="9" height="9">Sua proposta de negócio pode ser apresentada e divulgada gratuitamente.</p>

										<p>&nbsp;&nbsp;&nbsp; <img border="0" src="img/arrow1.png" width="9" height="9">Cadastra-se e divulgue <b>GRATUITAMENTE</b> a sua proposta.</p>

										<p>&nbsp;&nbsp;&nbsp; <img border="0" src="img/arrow1.png" width="9" height="9"> Pesquisar
	<input type='text' name='txtSearch' size=40 <?=$style?>>&nbsp;<input type='image' src='img/lupa.jpg' name='lupa' alt='Pesquisa de empresas a venda'>
								</font></p>
								</form>
							</td>
							<td width="10">&nbsp;</td>
							<td class=ashblack width="1"></td>
						</tr>
						<tr>
							<td class=ashblack width="1"></td>
							<td class=gray colspan="3" >
							<a href="mvcphp.php?action=registerUser">
							<img border="0" src="img/ico_cad.gif" alt='Clique aqui para pesquisar'align="right" width="113" height="25"></a></td>
							<td class=ashblack width="1"></td>
						</tr>
					<!--	<tr>
							<td class=ashblack colspan=5></td>
						</tr>  -->
						<!-- Fim Noticias -->
					</table>
			</div>
		</td>

	</tr>
	
</table>

	<div style="padding: 0px;  top;overflow: auto; position: relative;height: 25px; width:670px; opacity: 0.5;  background: white;">
			<script type="text/javascript" src="<?=$nivel?>js/v_newsticker_3.js"></script></div>
			
		
			
<table width="590" align="center" border="0" cellpadding="0" cellspacing="0">	
	<tr>
		<td colspan="3">
		<?include("listBusinessHome.php")?>
		</td>
	</tr>

</table>

</div>