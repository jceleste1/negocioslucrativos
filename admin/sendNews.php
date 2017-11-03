<font color=darkred size=5>Aguarde.....enviando....</font>
<? 

require_once('../PHPMailer51/class.phpmailer.php');

$qry = "select  subject,  dateEdition , matter, send from newsletters where  idEdition=$_REQUEST[idEdition]";
$result = fMySQL_Connect($qry);
$dataNews = mysql_fetch_array( $result ) ; 


$msg  ="<html>";
$msg .="<body>";
$msg .="<table   width='100%' cellpadding='20' cellspacing='3' align='center' border=0  bgcolor=white>";
$msg .="<tr>";
$msg .="<td>";
$msg .="<table  width='100%' border=0>";
$msg .="<tr>";
$msg .="<td colspan=2><b><a href=http://www.negociosLucrativos.com.br><font color=darkgreen size=3>www.negociosLucrativos.com.br</a></font></b></td>";
$msg .="</tr>";
$msg .="<tr><td  colspan=2><a href=http://www.negociosLucrativos.com.br><font color=darkgreen>";
$matter  = $dataNews[matter]."\n\n";
$matter  = ereg_replace("\n", "<br>", $matter);
$matter  = putId($matter,$data[id]);
$msg .= $matter;
$msg .=	"</font> </a></td></tr>";


$msg .=	"</table>";
$msg .=	"</td>";
$msg .=	"</tr>";
$msg .=	"</table>";
$msg .=	"</td>";
$msg .=	"</tr>";
$msg .=	"</table>";
$msg .="</body>";
$msg .="</html>";






$x = 0;

$qry = "SELECT  name, mail,id FROM register where newsletter=1";
//$qry .= "  where  send='N'";
$result = fMySQL_Connect($qry);
$count = 0;
while(	$data = mysql_fetch_array( $result )  )
{
	// faço a chamada da classe12.
	$Email = new PHPMailer();

	// na classe, há a opção de idioma, setei como br14.
	$Email->SetLanguage("br");

	// esta chamada diz que o envio será feito através da função mail do php. Você mudar para sendmail, qmail, etc 
	// se quiser utilizar o programa de email do seu unix/linux para enviar o email17.

	$Email->IsMail(); 


	// ativa o envio de e-mails em HTML, se false, desativa.19.
	$Email->IsHTML(true); 

	// email do remetente da mensagem21.
	$Email->From = "jceleste1@gmail.com";
	 $Email->CharSet           = 'UTF-8';

	// nome do remetente do email
	$Email->FromName = 'NegociosLucrativos.com.br';

	// Endereço de destino do emaail, ou seja, pra onde você quer que a mensagem do formulário vá?
	$Email->AddAddress($data['mail']);


	// informando no email, o assunto da mensagem
	$Email->Subject = $dataNews[subject];
	// Define o texto da mensagem (aceita HTML)

	$Email->Body .=   eregi_replace("[\]",'',$msg );



	$msg = "</body></html>";
	$sele = "";
	//if( $x == 1)
	//	$sele = " aaaaaaaa";

	// verifica se está tudo ok com oa parametros acima, se nao, avisa do erro. Se sim, envia.
	if(!$Email->Send()) {
		echo "A mensagem não foi enviada. <p>";
		echo 	"Erro: " . $mail->ErrorInfo;
	}else
	{
	//	$qry = "update newsreaderTest   set  send='S' where  id=$data[id] 	";
	//	fMySQL_Connect($qry);
		$count = $count + 1;

	}
	$x++;
}


//$qry = "select count(*) sent from newsreaderTest where  send='S'";
//$result = fMySQL_Connect($qry);	
//$dataSent = mysql_fetch_array( $result );


$qry = "update  newsletters set  sent='$count'     where idEdition=$_REQUEST[idEdition]";
fMySQL_Connect($qry);


//if( $dataNews[send] ==  $dataSent[sent] )
//{
	$qry = "update newsletters set status='E'  where  idEdition=$_REQUEST[idEdition]";
	$result = fMySQL_Connect($qry);
//}



function putId($text,$id)
{
//	$pos = strpos($text,"idUser") ;
//	return substr( $text,0, $pos ).$id.substr( $text, $pos+6, strlen($text) ) ;

	return	eregi_replace("idUser", "$id", $text);
}




function temAnuncio(){



}


?>


<META HTTP-EQUIV='REFRESH' CONTENT=0;URL='index.php?rot=listNews'>