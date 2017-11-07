<?
	session_start();



   header('Content-Type: text/html; charset=ISO-8859-1');


	include("config.inc"); 
    $conn = connectDB();
	
	require_once "ismobile/ismobile.class.php";
	$ismobi = new IsMobile();


	switch( $_REQUEST["action"] ){
		case "postAnnouncementBuy":
				$_SESSION["addAnnouncement"] = true;
				$action = "recAnnouncement";
				$rot = "formAnnouncement.php";
				$typeannouncement = "B";
				break;
		case "postAnnouncementSelling":
				$_SESSION["addAnnouncement"] = true;
				$action = "recAnnouncement";
				$rot = "formAnnouncement.php";
				$typeannouncement = "S";
				break;

		case "modifyAnnouncement":
				$qry = sprintf("select title,typecompany,sector,billing,description,
				datainc,status,typeannouncement,priceselling,numberemployee,
				conditionpart,zone,confidencial,price,www from announcement 
				where id='%s' and id_user='".$_SESSION["id"]."'", 
				mysql_real_escape_string($_REQUEST["id_adv"],$conexao) );				
				
				$result = fMySQL_Connect($qry);

				$dataAnnouncement = mysql_fetch_array( $result ) ;
				$action = "updateAnnouncement";
				$rot = "formAnnouncement.php";
				break;

		case "deleteAnnouncement";
				$qry = sprintf("delete from announcement where 
				id='%s' and id_user='".$_SESSION["id"]."'", 
				mysql_real_escape_string($_REQUEST["id_adv"],$conexao) );				
				
				$result = fMySQL_Connect($qry);
				$rot = "inhome.php";
				break;
		case "recAnnouncement":
				if( $_SESSION["addAnnouncement"] ) {

					$price =   str_replace(".", "",  $_REQUEST["priceselling"]);
					$price =   str_replace(",", ".", $price);
					
					if($price< 100)
					   $price="";

					$qry = "insert into  announcement ( title,typecompany,sector,billing,description,datainc,status,typeannouncement,id_user,priceselling,numberemployee,conditionpart,zone,confidencial,price,www,publish )values( \"".$_REQUEST[title]."\",\"".$_REQUEST['typecompany']."\",".$_REQUEST[sector].",".$_REQUEST[billing].",\"".$_REQUEST['description']."\",now(),'V',\"".$_REQUEST[typeannouncement]."\" ,".$_SESSION["id"].",\"".$price."\",\"".$_REQUEST["numberemployee"]."\",\"".$_REQUEST["conditionpart"]."\",\"".$_REQUEST["zone"]."\",'".$_REQUEST["confidencial"]."','".$price."',\"".$_REQUEST["www"]."\",'Y')";

					fMySQL_Connect($qry);

				}
				$_SESSION["addAnnouncement"] = false;
				$rot = "inhome.php";
				$idAnnouncement = mysql_insert_id();


				break;

		case "recAnnouncementSearch":
				if( $_REQUEST["confirmacao"] !=  $_SESSION['autenticagd']   ){
				    $ErroConfirm = "true";
				    $rot = "formAnnouncementSearch.php";
					break;
				}
		
				$publish = PUBLISH;			     
				if( $_REQUEST[name] ){

					$qry = "select name,mail,password,id from register where mail='".$_REQUEST['mail']."'"; 
					$result = fMySQL_Connect($qry);
					$dataUser = mysql_fetch_array( $result ) ;					
					$idUser = $dataUser[id];
					if( !$idUser ){
						$qry = "insert into register( name,mail , password ,datainc  ) values( \"".$_REQUEST["name"]."\",\"".$_REQUEST["mail"]."\", \"".$_REQUEST[password]."\", now() )";
						fMySQL_Connect($qry);
						
						$_SESSION["nameUser"] = $name;
						$idUser =  mysql_insert_id();
						$_SESSION["id"] =  $idUser;
						$_SESSION["mail"] = $_REQUEST["mail"];
						$_SESSION["nameUser"] = $_REQUEST["name"];
					}else{
						$publish ="N";	
					}	
				}
				else{
					$idUser	 = $_SESSION["id"];
				}
						
				$price =   str_replace(".", "",  $_REQUEST["priceselling"]);
				$price =   str_replace(",", ".", $price);
				
				if( $publish != 'N' ){
					if($price< 100)
					   $price="";

					$qry = "insert into  announcement ( title,typecompany,sector,billing,description,datainc,status,typeannouncement,id_user,priceselling,numberemployee,conditionpart,zone,confidencial,price,www, publish )values( \"".$_REQUEST[txtSearch]."\",\"".$_REQUEST['typecompany']."\",".$_REQUEST[sector].",".$_REQUEST[billing].",\"".$_REQUEST['description']."\",now(),'V',\"".$_REQUEST[typeannouncement]."\" ,$idUser,\"".$price."\",\"".$_REQUEST["numberemployee"]."\",\"".$_REQUEST["conditionpart"]."\",\"".$_REQUEST["zone"]."\",'".$_REQUEST["confidencial"]."','".$price."',\"".$_REQUEST["www"]."\",'$publish')";
					fMySQL_Connect($qry);
					
					$idAnnouncement = mysql_insert_id();
					$viewMessagePostAnnounce = "true";
				}	
				if( !$dataUser[id] )				
					$rot = "inhome.php";
				else	
					$rot = "forgetPassword.php";
				
				break;
				
				
		case "updateAnnouncement":

				$price =   str_replace(".", "",  $_REQUEST["priceselling"]);
				$price =   str_replace(",", ".", $price);

				if($price< 100)
					   $price="";
	   
				$qry = sprintf( "update   announcement set  	
				                 title =\"".$_REQUEST["title"]."\",
								 typecompany=\"".$_REQUEST["typecompany"]."\",
								 sector='".$_REQUEST["sector"]."',	
								 billing=\"".$_REQUEST["billing"]."\",
								 description=\"".$_REQUEST["description"]."\",
								 priceselling=\"".$price."\",
								 numberemployee=\"".$_REQUEST["numberemployee"]."\",
								 conditionpart=\"".$_REQUEST["conditionpart"]."\",
								 zone=\"".$_REQUEST["zone"]."\",
								 confidencial='".$_REQUEST["confidencial"]."',
								 price='".$price."', 
								 dtmodify=now(),
								 datainc=now(),
								 www =\"".$_REQUEST["www"]."\" 
								 where id_user='".$_SESSION["id"]."' and  
								 id='%s'", mysql_real_escape_string($_REQUEST["id_adv"],$conexao) );
				fMySQL_Connect($qry);

				$rot = "inhome.php";
				break;

		case "viewAnnouncement":
				if($ismobi->CheckMobile()) {
//					mail("jceleste@brasilforte.com.br",$ismobi->GetMobileDevice(),"")	;
					echo "<META HTTP-EQUIV='REFRESH' CONTENT=0;URL='http://www.negocioslucrativos.com.br/mobil/demos/docs/forms/view.php?id=$_REQUEST[id_adv]'>";
					exit;
				}

				$CONTROLSESSION = true;
				
				$qry = sprintf("select a.title,a.typecompany,a.sector,a.billing, 
				                 a.description,a.datainc,a.status,a.typeannouncement,
								 a.priceselling,a.numberemployee,a.conditionpart,a.zone,
								 a.viewcount,a.confidencial,r.name,r.phonemobile,r.phone,
								 a.price,a.www  from announcement a, register r 
								 where  a.id_user =r.id and    a.id='%s'", mysqli_real_escape_string($conn,$_REQUEST["id_adv"]) );	echo $qry;			
			
				$result =  $conn->query( $qry );
				$dataAnnouncement = $result->fetch_assoc() ;

				$viewcount = ( $dataAnnouncement["viewcount"] +1 ) ;

				$rot = "viewAnnouncement.php";

				$qry = sprintf("update  announcement set viewcount=$viewcount where id='%s'", 
				mysqli_real_escape_string($conn,$_REQUEST["id_adv"]) );				

				$res =  $conn->query( $qry );
				break;
		case "sendMsg":
				$qry = "select a.id_user,r.name,r.mail, a.title,a.typeannouncement from announcement  a,register r  where a.id='".$_REQUEST['id_adv']."' and a.id_user=r.id";

				$result = fMySQL_Connect($qry);
				$dataAnnouncementUser = mysql_fetch_array( $result ) ;


				$subjectMail = "Interessado sobre o anuncio ".$dataAnnouncementUser["title"]  ;
				$subject .= "Interessado sobre o anuncio ".$dataAnnouncementUser["title"]."<br>"   ;

				$msg .= $subject."<br><br><br>";

				$msg .= "Prezado ".$dataAnnouncementUser["name"]."<br><br>"   ;

				$msg .= "Estamos direcionando para você um e-mail referente ao seu anúncio.<br>";
				$msg .= "Para visualizar a mensagem completa, por favor acesse o site,  <br>";
				$msg .= "http://www.negocioslucrativos.com.br <br>";
				$msg .= "Digite seu login e senha e acesse o link  'Novas mensagens' .<br><br>";


//				$msg .= "Nome: ".$_SESSION["nameUser"]."<br>";
//				$msg .= "E-mail: ".$_SESSION["mail"]."<br>";
				$msg .= "Mensagem: ".substr($_REQUEST["message"], 0, 7)." ....<br>";


//				if( $_REQUEST["dddcom"] and	$_REQUEST["fonecom"] )
//					$msg .= "Fone (".$_REQUEST["dddcom"].")  ".$_REQUEST["fonecom"]."<hr>";

				$msg .=  "<br><br><br>";
				$msg .= " Atenciosamente <br><br>";

				$msg .= "http://www.negocioslucrativos.com.br";

				$headers  = "MIME-Version: 1.0\r\n";
				$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
//				$headers .= "From: ".$_SESSION["name"]."<".$_SESSION["mail"].">\n\r";

				$headers .= "From: NegociosLucrativos.com.br<negocioslucrativos@brasilforte.com.br>\n\r";
				$headers .= "To: ".$dataAnnouncementUser["name"]."<".$dataAnnouncementUser["mail"].">\n\r";


				mail($dataAnnouncementUser["mail"],$subjectMail,$msg,$headers);
				//mail("jceleste@brasilforte.com.br",$subjectMail,$msg,$headers);

				$qry = "insert into contatos ( id_userto,msg,datainc,id_userof ) values (  '";
				$qry .= $dataAnnouncementUser["id_user"]."','".$_REQUEST["message"]."',now(),'".$_SESSION["id"]."')";
				$result = fMySQL_Connect($qry);

				$msg = 1;
				$rot = "msgSystem.php";
				break;

	case "listBusinessBuy":
		$dataAnnouncement["title"] = "Compra e venda de empresas franquias";
		break;
	case "listBusinessSelling":
		$dataAnnouncement["title"] = "Compra e venda de empresas franquias";
		break;
	case "list":
		$dataAnnouncement["title"] = "Compra e venda de empresas franquias";
		break;
	case "backHome";
		$rot = "inhome.php";
		break;
	case "viewMatter";			
		$rot = "viewMatter.php";
		break;	
	 case "controlMaterials";
		$rot = "controlMaterials.php";
		break;
	case "allBusiness";
		$rot = "allBusiness.php";
		break;
	case "image";
		$rot = "imageEnterprise.php";
		break;
	case "viewMessage";
		$rot = "viewMsg.php";
		break;
	case "msgList";
			$rot = "listMsg.php";
			break;
	case "searchbussiness";
		$qry = "insert into searchbussiness (id_user, name      ,    mail     ,      content ,datainc )	values( '".$_SESSION['id']."','$_REQUEST[name]','$_REQUEST[mail]','$_REQUEST[content]', now() ) ";
		fMySQL_Connect($qry);

		$msgSearchbussiness = "<tr><td colspan=4 align='center'><font class='subtitulo3'>Seus dados foram enviados com sucesso !!!<br/> Agradecemos por utilizar o site NegociosLucrativos.com</font></td></tr>";

		$rot = "allBusiness.php";
		break;
	case "listResultSe";
		$rot = "listResultSearch.php";
		break;
	
	case "formAnn";
		$rot = "formAnnouncementSearch.php";
		break;

	case "editor";
		$rot = "editor.php";
		break;

	
	}
	if( !$rot )
		$rot = $_REQUEST["action"].".php";
		

	include("checkSession.php")	;

	include("nlTemplate.php");







?>
