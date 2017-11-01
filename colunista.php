<?


@mail("jceleste1@gmail.com","seja nosso colunista","");

?>

<br><br><br><br><br><br><br>
<center>

<table  style="padding:1px; background-color:#e7f1f6; border:0px solid #FF0000"  cellpadding="1" cellspacing="3"   width='500px'>
	<tr>
		<td bgcolor='white' colspan='4' align=center><font class='tituloAdv'>Seja nosso colunista </font></td>
	</tr>
	
	
	
	<tr>
		<td bgcolor='white' colspan='4' align=center><font class='subtitulo3'>NegociosLucrativos.com coloca este
espaço para pessoas que querem expor idéias e conceitos sobre o mundo dos negócios.</font></td>
	</tr>
	
	
	<?if( $_SESSION[id] ){ ?>
		<tr><td></td></tr>
		<tr>
			<td align='center'>
			<input type='button' name='btSubmit' id='btSubmit' value='Clique aqui para publicar um texto.' onclick="actionCool('edit')" />
			</td>
		</tr>
	<?} else{ ?>
		<tr><td></td></tr>
		<tr>
			<td align='center'>
			<input type='button' name='btSubmit' id='btSubmit' value='Para postar matérias, basta preencher um breve cadastro. Clique aqui continuar >>' onclick="actionCool('register')"  />
			</td>
		</tr>

	
	<?} ?>
	
</table>
</center>
<form action='mvcAnnouncement.php' method='post' id='editForm'>
	<input type='hidden' name='action' value='editor'>
</form>


<form action='mvcAnnouncement.php' method='post' id='registerForm'>
	<input type='hidden' name='action' value='register'>
</form>

<script>
 function actionCool(action){
	if( action == "register")
		document.getElementById("registerForm").submit();
	else
		document.getElementById("editForm").submit();
 }


</script>