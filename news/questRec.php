<?

$nivel = "../";
include("../config.inc");
include("../top.php");

$qry = "insert quest1 ( resp1,resp2,resp3,idUser,datainc ) values ";
$qry .= "( '$_REQUEST[resp1]','$_REQUEST[resp2]', \"".$_REQUEST["resp3"]."\",'".$_REQUEST[idUser]."',now() )";


$result = fMySQL_Connect($qry);
?>

<table width=780px align=center height=400px>
<tr> <td align=center>
<font color=darkgreen face=verdana>Obrigado por responder o questionário<br/><br/>
Atenciosamente<br/><br/>
NegociosLucrativos.com
</font>
</td></tr>

</table>