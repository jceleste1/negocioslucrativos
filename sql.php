<?


$conexao =  mysql_connect( "localhost","root","Isr0704@");


$query = sprintf("SELECT * FROM users WHERE user='%s' AND password='%s'",
mysql_real_escape_string("zeca"),
mysql_real_escape_string($password));
echo $query;exit;




$name_bad = "' OR 1'";
$name_bad = "";


$name_bad = mysql_real_escape_string($name_bad);
echo  $name_bad;
exit;
$query_bad = "SELECT * FROM register WHERE name = '$name_bad'";
echo "Escaped Bad Injection: <br />" . $query_bad . "<br />";


$name_evil = "'; DELETE FROM register WHERE 1 or name = '";

$name_evil = mysql_real_escape_string($name_evil);

$query_evil = "SELECT * FROM register WHERE name = '$name_evil'";
echo "Escaped Evil Injection: <br />" . $query_evil;

?>