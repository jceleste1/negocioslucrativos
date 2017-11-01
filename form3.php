
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>jQuery Modal Window</title>

<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function() {

	$('a[name=modal]').click(function(e) {


		//Get the data from all the fields
		var name = $('input[name=name]');
		var email = $('input[name=email]');
		var website = $('input[name=website]');
		var comment = $('textarea[name=comment]');


		//organize the data properly
		var data = 'name=' + name.val() + '&email=' + email.val() + '&website=' +
		website.val() + '&comment='  + encodeURIComponent(comment.val());

	var id = $(this).attr('href');

		//start the ajax
		$.ajax({
			//this is the php file that processes the data and send mail
			url: "process.php",

			//GET method is used
			type: "GET",

			//pass the data
			data: data,

			//Do not cache the page
			cache: false,

			//success
			success: function (html) {
				//if process.php returned 1/true (send mail success)
				if (html==1) {

					e.preventDefault();




					var maskHeight = $(document).height();
					var maskWidth = $(window).width();

					$('#mask').css({'width':maskWidth,'height':maskHeight});

					$('#mask').fadeIn(1000);
					$('#mask').fadeTo("slow",0.8);

					//Get the window height and width
					var winH = $(window).height();
					var winW = $(window).width();

					$(id).css('top',  winH/2-$(id).height()/2);
					$(id).css('left', winW/2-$(id).width()/2);

					$(id).fadeIn(2000);


				//if process.php returned 0/false (send mail failed)
				} else alert('Sorry, unexpected error. Please try again later.');
			}
		});





	});

	$('.window .close').click(function (e) {
		e.preventDefault();

		$('#mask').hide();
		$('.window').hide();
	});

	$('#mask').click(function () {
		$(this).hide();
		$('.window').hide();
	});

});

</script>
<style type="text/css">
body {
	font-family:verdana;
	font-size:15px;
}

a {color:#333; text-decoration:none}
a:hover {color:#ccc; text-decoration:none}

#mask {
  position:absolute;
  left:0;
  top:0;
  z-index:9000;
  background-color:#000;
  display:none;
}

#boxes .window {
  position:absolute;
  left:0;
  top:0;
  width:440px;
  height:200px;
  display:none;
  z-index:9999;
  padding:20px;
}

#boxes #dialog2 {
  background:url(notice.png) no-repeat 0 0 transparent;
  width:326px;
  height:229px;
  padding:50px 0 20px 25px;
}
.close{display:block; text-align:right;}

</style>
</head>
<body>
<h2>Exemplos - Janela Modal com jQuery</h2>





<div id="form">
	<form method="post" action="process.php">
	<div>
		<label>Name</label>
		<input type="text" name="name"  />
	</div>

	<div>

		<input type="submit" id="submit"/>
		<div class="loading"></div>
	</div>
	</form>
</div>

<ul>
	<li><a href="#dialog2" name="modal">Janela Modal com Bloco de Nota</a></li>
</ul>




<div id="boxes">

	<!-- Janela Modal com Bloco de Nota -->
	<div id="dialog2" class="window">
		Então?<br />
		Construir uma <b>Janela Modal Simples</b> com o formato que você quiser é fácil!<br />
		Simples e totalmente personalizável : ) <br /><br />
		<input type="button" value="Fechar" class="close"/>
	</div>
	<!-- Fim Janela Modal com Bloco de Nota -->


	<!-- Máscara para cobrir a tela -->
	 <div id="mask"></div>

</div>


</body>
</html>
