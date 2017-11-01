<?

	$headers  = "From: ".$_REQUEST[nm_contato]."<".$_REQUEST[email].">\n\r";
	$headers .= "To: Negocios Lucrativos <jceleste@brasilforte.com.br>\n\r";

	$msg = "Contato Atraves de Negocios Lucrativos. ";

 
	$msg .= " Empresa  : ".$_REQUEST[nm_empresa];
	$msg .= " Contato  : ".$_REQUEST[nm_contato];
	$msg .= " Email    : ".$_REQUEST[email];
	$msg .= " Fone de Contato :  ".$_REQUEST[dddcom]." ".$_REQUEST[fonecom]." Ramal : ".$_REQUEST[ramal_com];
	$msg .= " Assunto : ".$_REQUEST[assunto];

   @mail("jceleste1@gmail.com","Contato Negocios Lucrativos",$msg,$headers );


   echo "<br><br><br><br><br><br><center><b>Seus dados foram enviados com sucesso<br><br>Em breve entraremos em contato<br><br>Atenciosamente<br><br><br>http://www.negocioslucrativos.com</b>";

?>				


