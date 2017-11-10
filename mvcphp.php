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


			echo "blbalba";

			
			break;
			


	}



	include("nlTemplate.php");

?>