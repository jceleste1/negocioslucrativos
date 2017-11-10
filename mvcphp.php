<? 
	session_start();



	header('Content-Type: text/html; charset=ISO-8859-1');


	include("config.inc");
	 $conn = connectDB();

	 $action = "";
	
	 if (isset($_REQUEST["action"]) ) 
		$action = $_REQUEST["action"];

	if (isset($_POST["action"])) 
		$action = $_POST["action"];


	switch( $action ){
		case "login":
        		    $erro = 1;



			$rot = "msgErro.php";
			
			$qry = sprintf( "select id,name,mail from
			register where mail='%s' 
			and password='%s'",mysqli_real_escape_string( $conn, $_POST['mail'] ),
			mysqli_real_escape_string( $conn, $_POST['password']) );
	
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


	}



	include("nlTemplate.php");

?>