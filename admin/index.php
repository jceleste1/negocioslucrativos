<? 
session_start(); 
$nivel = "../";
include("../config.inc");
include("../top.php");

?>

<TABLE cellSpacing=0 cellPadding=0 width=766 align=center border=0 height="500" >
 <TR vAlign=top>
    <TD align=center>
<?

    $rot =  $_REQUEST[rot];
	if(!$rot)
	    $rot =  "listNews";

		include($rot.".php");
?>
	</td>
   </tr>
</table>



<?include("../bottom.php");?>