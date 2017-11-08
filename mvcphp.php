<? 
	session_start();



	header('Content-Type: text/html; charset=ISO-8859-1');








 
	include("config.inc");
	 $conn = connectDB();
	
	
	
	switch( $_REQUEST["action"] ){
		case "login":
        		    $erro = 1;



			$rot = "msgErro.php";
			
			$qry = sprintf( "select id,name,mail from
			register where mail='%s' 
			and password='%s'",mysqli_real_escape_string( $conn, $_REQUEST['mail'] ),
			mysqli_real_escape_string( $conn, $_REQUEST['password']) );
		
			$result =  $conn->query( $qry );

			$rows = mysqli_num_rows($result);


			if(  $rows  ){


				header("Expires: -1");
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
				
				header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
				header("Cache-Control: post-check=0, pre-check=0", false);
				header("Pragma: no-cache");


				while ( $aUser = $result->fetch_assoc() ) {
					$_SESSION["nameUser"] = $aUser["name"];
					$_SESSION["id"] = $aUser["id"];
					$_SESSION["mail"] = $aUser["mail"];
				}
				$rot = "inhome.php";


				header('Location: ./mvcAnnouncement.php?action=inhome');

			} 
			break;
		case "forgetPassword":
			$rot = "forgetPassword.php";
			break;
		case "forgetPassword1":

			$qry = sprintf( "select name,mail,password from 
			register where mail='%s'",
			mysql_real_escape_string($_REQUEST['mail'],$conexao) );
			
			$result = fMySQL_Connect($qry);
			if( mysql_num_rows($result ) ){
				$aUser = mysql_fetch_array( $result ) ;

			    $headers  =  "From: Suporte negocioslucrativos.com <jceleste@brasilforte.com.br> To: ".$aUser["name"]."<".$aUser["mail"].">";
				$msg = "Prezado Sr(a) ".$aUser["name"]." \n"; 
				$msg .= "Estamos lhe enviando a senha para acessar o site http://www.negocioslucrativos.com \n";
				$msg .= "Senha : ".$aUser["password"]." \n\n";
				$msg .= "Atenciosamente \n";
				$msg .= "Equipe http://negocioslucrativos.com \n";
			    $subject = "Senha de acesso  para o site negocioslucrativos.com";

				mail($aUser["mail"],$subject,$msg,$headers  );			
				$rot = "msgSystem.php";
			} else{
				$erro = 3;
				$rot = "msgErro.php";
			}
			break;
		case "logger":
			$rot = "login.php";			
			break;
        case "home";
			$rot = "inhome.php";
			break;
		case "logout":
			$_SESSION["name"] = "";
			$_SESSION["id"] = "";
			$_SESSION["mail"] = "";
			$rot = "thank.php";
			break;
		case "loadData":
			$qry = "select * from register where id='".$_SESSION["id"]."'";
			
			$result = fMySQL_Connect($qry);
			$dataUser = mysql_fetch_array( $result ) ;
			$action = "updateDataUser";
			
			$rot = "register.php";
			break;

		case "updateDataUser":
			$qry = "update register set	name=\"".$_REQUEST[name]."\",		mail=\"".$_REQUEST[mail]."\" ,address= \"".$_REQUEST[address]."\",	numberaddress=\"".$_REQUEST[numberAddress]."\" ,	district=\"".$_REQUEST[district]."\",		zipcode=\"".$_REQUEST[zipcode]."\" ,	city=\"".$_REQUEST[city]."\" , state=\"".$_REQUEST[state]."\",	phonemobile=\"".$_REQUEST[phonemobile]."\"  ,		phone=\"".$_REQUEST[phone]."\"	where id='".$_SESSION["id"]."'";
			fMySQL_Connect($qry);
			

			$action = "updateDataUser";
			$rot = "inhome.php";			
			
			break;
        case "register": 
			$qry = sprintf( "select mail from register where mail='%s'",
			mysql_real_escape_string($_REQUEST['mail'],$conexao) );
	
			$result = fMySQL_Connect($qry);

			$rot = "register.php";
			if(  mysql_num_rows($result )  ){
	            $erro = 2;			
			}
			if( $_REQUEST["confirmacao"] !=  $_SESSION['autenticagd']   ){
				$erro = 4;
				$dataUser["name"] = $_REQUEST["name"] ;
				$dataUser["mail"] = $_REQUEST["mail"] ;
				$dataUser["numberAddress"] = $_REQUEST["numberAddress"] ;
				$dataUser["address"] = $_REQUEST["address"];
				$dataUser["district"] = $_REQUEST["district"];
				$dataUser["zipcode"] = $_REQUEST["zipcode"];
				$dataUser["city"] = $_REQUEST["city"];
				$dataUser["state"] = $_REQUEST["state"];
				$dataUser["phonemobile"] = $_REQUEST["phonemobile"];
				$dataUser["phone"] = $_REQUEST["phone"];
				$dataUser["phonemobile"] = $_REQUEST["phonemobile"];
				$dataUser["id_marketing"]  = $_REQUEST["id_marketing"];

			}
			if(! $erro ){
					$qry = "insert into register(	name,mail ,	address ,	numberaddress ,	district,zipcode ,	city ,	state,phonemobile ,	phone ,	cpfcnpj ,password ,datainc,tpclient,id_marketing ) values( \"".$_REQUEST["name"]."\",\"".$_REQUEST["mail"]."\",\"".$_REQUEST[address]."\", \"".$_REQUEST[numberAddress]."\",\"".$_REQUEST[district]."\",\"".$_REQUEST[zipcode]."\",\"".$_REQUEST[city]."\" ,	\"".$_REQUEST[state]."\",\"".$_REQUEST[phonemobile]."\" ,	\"".$_REQUEST[phone]."\" ,	\"".$_REQUEST[cpfcnpj]."\" ,\"".$_REQUEST[password]."\", now(),'".$_REQUEST[tpclient]."','".$_REQUEST[id_marketing]."' )";
					fMySQL_Connect($qry);			

					$_SESSION["nameUser"] = $name;
					$_SESSION["id"] = mysql_insert_id();
					$_SESSION["mail"] = $_REQUEST["mail"];
					$rot = "inhome.php";
			}
			break;
	
		case "registerUser":
			$rot = "register.php";
			$action = "register"; 
			break;	
	
		case "contact":
			$rot = "contato.php";
			break;
		case "contact1":
			$rot = "contato1.php";
			break;
		case "negociosinternet":
			$rot = "negociosinternet.html";
			break;

		case "opiniaonegocios":
			$rot = "opiniaonegocios.php";
			break;

		case "forgetPassword":
			$rot = "forgetPassword.php";
			break;			
		case "TermodeUso":
			$rot = "TermodeUso.html";
			break;			


		case "condicao":
			$rot = "condicao.php";
			break;		


	}



	include("nlTemplate.php");

?>