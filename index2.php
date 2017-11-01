<? 
   header('Content-Type: text/html; charset=ISO-8859-1');
   session_start();
   include("config.inc");   
   include("controlSearch.php");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
        "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
	<title><?=$title?></title>
	<meta name="description" content="<?=$description?>" >
	<META NAME="Description" language="english" CONTENT="NegociosLucrativos.com is the right place to buy and sell small, medium and large business. Work with Venture capital, Investment Banks , Project Finance and Private Equity">
	<meta name="keywords" content="<?=$keywords?>">
	<Meta name="author" content="Brasil Forte Consultoria Ass. Ltda">
	<meta name="classification" content="Empresas">
	<meta name="subject" content="ecommerce">
	<meta name="rating" content="general">
	<meta name="roboots" content="index, all">
	<meta name="robots" content="index, follow">
	<meta name="revisit-after" content="1 days">
	<meta name="copyrigth" content="Brasil Forte Consultoria Ass. Ltda">
	<META name="GOOGLEBOT" content="INDEX, FOLLOW">
	<meta name="audience" content="all">


	<?include("styles.php")?>
	<?include("scripts.php")?>
</head>
<body  >
<div id="wrap">
	<div id="header"><?include("header.php")?></h1></div>
	<div id="nav">
		<ul>
		
			<form action='mvcphp.php' method='post'>
			<input type='hidden' name='action' value='login'>	
			<input type='hidden' name='reclam' value='yes'>	
			<font color="#9CC328">Email</font> <input type=text name=mail style="font-size:8pt; margin:1; border-width:1; border-color:black; border-style:outset;" size="10">
&nbsp;&nbsp;&nbsp;
			<font color="#9CC328">Senha </font> <input type=password name=password style="font-size:8pt; margin:1; border-width:1; border-color:black; border-style:outset;" size="10">
			<input type=submit value='Enviar'>
&nbsp;&nbsp;&nbsp;
			<a  href="mvcphp.php?action=forgetPassword">
			<font color="#24486C">Esqueceu a senha ?</font></a>
			</form>		
		</ul>
	</div>
	<div  id="main"  class="clearfix" >



		<?include("invitationRegister.php")?>
		
		
		<?include("placar.php")?>
		
		
		
		<?include("searchNew.php")?>
		<br /> <br /><br />
	
		
	<div id="divGoogl" style=' text-align:center; float:center; clear:both;'>

</div>

	
		





	</div>
	<div id="sidebar">
	    <?include("menu.php");?>
	</div>
	<div id="footer">

		<p><a href=http://www.integranabis.com.br target=_blanck><font color=darkgreen face=verdana size=1><b>Todos os direitos reservados www.negocioslucrativos.com.br</b></font></p>

	</div>
</div>
</body>
</html>


<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
	_uacct = "UA-1200114-1";
	urchinTracker("<?=$rot?>");
</script>