<?

include("config.inc");


$query = "DELETE  FROM announcement   WHERE  id =".$_GET["id"];

$result = fMySQL_Connect($query);	


x

?>