


<link rel="stylesheet" href="pagging.css">
<center>
<table  style="padding:5em; background-color:#e7f1f6; border:0px solid #FF0000"  width='100%'>
  <tr>
	<td bgcolor='white' colspan='4'>&nbsp;</td>
 </tr>
  <tr>
	  <td bgcolor='white' colspan='4' align=center>
	
	   </td>
	</tr>
</table>
<br/><br/>


<!--PANEL HISTORICO ORDEM DE SERVICOS ABERTOS-->
	<div id="resizablepanel" style="display:none;">
				<div class="hd"> <img src="./img/information.PNG"  border=0> <?=$help[16]?></div>
				<div class="bd" >			
					<table>
					<tr><td>
					<span id="spanMessage">										
					</td></tr>
					</table>
				</div>
	</div>
	<!--END PANEL ORDEM DE SERVICOS ABERTOS-->



<table  style="padding:5em; background-color:#e7f1f6; border:0px solid #FF0000"  cellpadding="1" cellspacing="3"   width='100%'>
<form action='mvcAnnouncement.php' method='post'>
<input type='hidden' name='action' value='listBusinessBuy'>



<?
$registrosPorPagina = 10;
$registroInicial = 0;
$ultimoRegistro = 0;


$qry = "SELECT r.mail rmail,s.mail smail,s.name sname,r.name rname, s.content, s.datainc , s.id FROM searchbussiness s  LEFT JOIN register r ON s.id_user=r.id order by s.datainc desc ";

// echo $qry;
$result2 = fMySQL_Connect($qry);	
$_rows_ = mysql_num_rows($result2);

?>


<tr>
	<td bgcolor='white' colspan=4 align=center><font class='tituloAdv'>Pesquisas registradas pelo Sistema Procurado $ </font></td>		
</tr>


<tr>
	<td bgcolor='white' height='45 px'><font class='subtitulo3'>Nome do empresario</font></td>	
	<td bgcolor='white' height='45 px'><font class='subtitulo3'>mail</font></td>	
	<td bgcolor='white' height='45 px'><font class='subtitulo3'>Data</font> </td>
	<td bgcolor='white' height='45 px'><font class='subtitulo3'>Mensagem</font> </td>
	
</tr>


<?


for ($i=0;$i<$_rows_;$i++)   {
	 $line=mysql_fetch_assoc($result2);

	 $font = "<font color='#24486C'>";
	 $bgcolor = " bgcolor='#FDFDFD'";
	 if( ($i%2)==0)  {
		 $bgcolor = " bgcolor='#E9ECF7'";
	 	 $font = "<font color='#24486C'>";
	 }



	 $ahref = "<a href='#' onclick=\"javascript:showPanelMessage('$linha[id]');\">";

	 $name = $line["sname"] ;
 	 $mail = $line["smail"] ;

     if( $line["rname"] ) 
		$name = $line["rname"] ;

     if( $line["rmail"] ) 
		 $mail = $line["rmail"] ;


	 echo "<tr height='35 px'>";

	 echo "<td $bgcolor> $name </a></td>";
	 echo "<td $bgcolor> $mail </a></td>";

 	 echo "<td $bgcolor>".format_date($line["datainc"])."</a></td>";

 	 echo "<td $bgcolor><a href='#' onclick=\"showPanelMessage('".$line['id']."');\"> <img src='./imagens/lupa.jpg' alt='Clique aqui para ver a mensagem' border='0'></a></td>";


	 echo "</tr>";
}
?>



</form>
</table>


</center>
