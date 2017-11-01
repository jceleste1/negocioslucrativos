<? 
	session_start(); 
	include("config.inc");



	$qry = "select a.title,a.typecompany,a.sector,a.billing,a.description,a.datainc,a.status,a.typeannouncement,a.priceselling,a.numberemployee,a.conditionpart,a.zone,a.viewcount,a.confidencial,r.name,r.phonemobile,r.phone,a.price,a.www  from announcement a, register r where a.id=".$_REQUEST["idAdv"];
	$qry .= " and a.id_user=r.id";
	
	$result = fMySQL_Connect($qry);
	$dataAnnouncement = mysql_fetch_array( $result ) ;

	$viewcount = ( $dataAnnouncement["viewcount"] +1 ) ;

	$rot = "viewAnnouncement.php";

	$qry = "update  announcement set viewcount=$viewcount where id=".$_REQUEST["idAdv"];
	$res = fMySQL_Connect($qry);

	
	include("checkSession.php")	;

	include("nlTemplate.php");


?>