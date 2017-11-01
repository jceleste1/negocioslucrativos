<?php
include("config.inc");
include("classFilter.php");
$filter = new classFilter();



if(  !$_COOKIE["search"]  ){
//	@setcookie("search", "NegociosLucrativos.com", time()+43200);  

	$qryWhere = $filter->queryFilter(  $_REQUEST[typeAnManual],
									   $_REQUEST["sector"],
									   $_REQUEST['typecompany'],
									   $_REQUEST['billing'],
									   $_REQUEST['zone'] ,
									   $_REQUEST['lupa_x'],
									   $_REQUEST["txtSearch"] );

									   

	$qry = "select count(*)  from announcement a  $qryWhere ";
	
	$result = fMySQL_Connect($qry);
	List( $conta_linhas )= mysql_fetch_row($result);
	if( !$conta_linhas )
		@mail("jceleste1@gmail.com","Search",$qry);
	
}
else
	$conta_linhas = 1;
	

?>

<script>
	document.getElementById('formSearch2').submit();

	
</script>