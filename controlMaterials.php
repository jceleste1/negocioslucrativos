<STYLE type="text/css">
   p{ font : 10pt Verdana, Geneva, Arial, Helvetica, sans-serif; }
 </STYLE>
<link rel="stylesheet" href="pagging.css">
<center>
<table  style="padding:5em; background-color:#e7f1f6; border:0px solid #FF0000"  width='100%'>
  <tr>
	<td bgcolor='white' colspan='4'>&nbsp;</td>
 </tr>
  <tr>
	  <td  colspan='4' align=center>
		  <? include("bannerOfertasWeb.php")?>	
	   </td>
	</tr>
</table>

<table  style="padding:5em; background-color:#e7f1f6; border:0px solid #FF0000"  cellpadding="1" cellspacing="3"   width='100%'>



<tr>
	<td colspan='4' bgcolor='white' align='center'>

<?


$filename  = "materiasng/".$_REQUEST["file"].".htm";

if(!$_REQUEST["file"] or  ! file_exists($filename)  ){
    echo "<META HTTP-EQUIV='REFRESH' CONTENT=0;URL='http://www.negocioslucrativos.com'>";
	exit;
}


  $handle = fopen( $filename , 'rb'); 
   while (!feof($handle)) { 
       $buffer = fread($handle, "1024"); 
       echo $buffer; 
       ob_flush(); 
       flush(); 
       if ($retbytes) { 
           $cnt += strlen($buffer); 
       } 
   } 
   $status = fclose($handle); 

  
  

?>

	</td>
</tr>


</table>

<!-- Serviços de contabilidade -->

<table  style="padding:5em; background-color:#e7f1f6; border:0px solid #FF0000"  width='100%'>
  <tr>
	<td bgcolor='white' colspan='4'>&nbsp;<br><br></td>
 </tr>
  <tr>
	  <td bgcolor='white' colspan='4' align=center>
		<script type="text/javascript"><!--
		google_ad_client = "pub-3882370773203656";
		google_ad_width = 468;
		google_ad_height = 60;
		google_ad_format = "468x60_as";
		google_ad_type = "text";
		//2007-07-01: Jornal NG TOP
		google_ad_channel = "6127610198";
		//-->
		</script>
		<script type="text/javascript"
		  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
		</script>
	   </td>
	</tr>
</table>

<tr>
	<td colspan='4' bgcolor='white' align='center'>
		<?include("blocosetor.php");?>
    </td>
</tr>



<!-- Serviços de contabilidade -->


<table  style="padding:5em; background-color:#e7f1f6; border:0px solid #FF0000"  width='100%'>
  <tr>
	<td bgcolor='white' colspan='4'>&nbsp;<br><br></td>
 </tr>
  <tr>
	  <td bgcolor='white' colspan='4' align=center>

<script type="text/javascript"><!--
google_ad_client = "pub-3882370773203656";
google_ad_width = 468;
google_ad_height = 60;
google_ad_format = "468x60_as";
google_ad_type = "text";
//2007-07-01: Jornal NG BOTTOM
google_ad_channel = "5365298560";
//-->
</script>
<script type="text/javascript"
  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
	
	   </td>
	</tr>
</table>


</center>


