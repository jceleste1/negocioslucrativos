<?
if( $_REQUEST[idMatter] )
{

	$qry = sprintf("select  subject,  content  from matter where  
	id_user='%s' and id='%s'",
	mysql_real_escape_string($_SESSION[id],$conexao),
	mysql_real_escape_string($_REQUEST[idMatter],$conexao) );
	
	$result = fMySQL_Connect($qry);
	$dataNews = mysql_fetch_array( $result ) ; 
	
	
	$dataNews[content] =  mb_convert_encoding($dataNews[content], "utf-8", "ISO-8859-1");
}
?>


<head>

<link rel="stylesheet" type="text/css" href="<?=$nivel?>css/class.css" />
<LINK rel=stylesheet type=text/css href="<?=$nivel?>editor_arquivos/menu.css">
<LINK rel=stylesheet type=text/css href="<?=$nivel?>editor_arquivos/fonts-min.css">
<LINK rel=stylesheet type=text/css href="<?=$nivel?>editor_arquivos/container.css">
<LINK rel=stylesheet type=text/css href="<?=$nivel?>editor_arquivos/editor.css">

<SCRIPT type=text/javascript src="<?=$nivel?>editor_arquivos/animation-min.js"></SCRIPT>
<SCRIPT type=text/javascript src="<?=$nivel?>editor_arquivos/connection-min.js"></SCRIPT>
<SCRIPT type=text/javascript src="<?=$nivel?>editor_arquivos/container-min.js"></SCRIPT>
<SCRIPT type=text/javascript src="<?=$nivel?>editor_arquivos/menu-min.js"></SCRIPT>
<SCRIPT type=text/javascript src="<?=$nivel?>editor_arquivos/editor-min.js"></SCRIPT>

<link rel="stylesheet" type="text/css" href="<?=$nivel?>build/button/assets/skins/sam/button.css" />

<script type="text/javascript" src="<?=$nivel?>build/yahoo-dom-event/yahoo-dom-event.js"></script>
<script type="text/javascript" src="<?=$nivel?>build/element/element-min.js"></script>
<script type="text/javascript" src="<?=$nivel?>build/button/button-min.js"></script>

<style type="text/css">


	html, body{margin:0;}
/* Clear calendar's float */
	#calendarPanel .bd:after {content:".";display:block;clear:left;height:0;visibility:hidden;}
	 
/* Have calendar squeeze upto bd bounding box */
	#calendarPanel .bd {padding:0;font-size:10px}
	#calendarPanel .hd {font-size:11px;color:#FFF;height:25px;
						background:url(<%= renderResponse.encodeURL(renderRequest.getContextPath() + "/jsp/images/sprite.png") %>) 0 -1400px repeat-x;}
	
	#calendarPanel {visibility:hidden;}

/* Remove calendar's border and set padding in ems instead of px, so we can specify an width in ems for the container */
	#calContainer {border:none;padding:1em}


	div#icones{width:740px;}
	

		
	#status {
		BORDER-BOTTOM: black 1px solid; BORDER-LEFT: black 1px solid; BACKGROUND-COLOR: #ccc; MARGIN: 2em; HEIGHT: 4em; BORDER-TOP: black 1px solid; BORDER-RIGHT: black 1px solid
	}

	
</style>


<script language="javascript">
 
	YAHOO.util.Event.onDOMReady(initFilter);	


	   // "contentready" event handler for the "pushbuttonsfrommarkup" <fieldset>

		YAHOO.util.Event.onContentReady("pushbuttonsfrommarkup", function () {

			// Create Buttons using existing <input> elements as a data source


			 var oPushButton4 = new YAHOO.widget.Button("pushbutton4");
            oPushButton4.on("click", onButtonClick);

		
		});

	function back(){
		 document.getElementById('formRed').submit();
	}

	YAHOO.util.Event.addListener(window, "load", initCalendar);
</script>
</head>






<table   width='600px' cellpadding'="5px" cellspacing="1" ID="alter" align='center' border=0>			
<FORM id=form1 method=post action="mvcAnnouncement.php">
<input type=hidden name='idMatter' id='idMatter' value="<?=$_REQUEST['idMatter']?>">
<input type=hidden name='salveMatter' id='salveMatter' value="true">
<input type=hidden name='action' id='action' value="inhome">
<input type=hidden name='edit' id='edit'>


<tr>
	<td>T�tulo da mat�ria :</td>		
	<td><input type='text' name='subject' id="subject"  size='60' MAXLENGTH ="90" value="<?=$dataNews[subject]?>"></td>
</tr>


<TR>
	<TD colspan='4' align=center>
		<TEXTAREA id="editor" rows="20" cols="75" name="editor"><?= utf8_decode($dataNews[content])?></TEXTAREA> 
	</TD>
</TR>

<TR>

</TR>





<TR>
	<TD  colspan=4 align=center>	
		 <span id="pushbutton4" class="yui-button yui-push-button">
			<span class="first-child"><button   type="button" name="button4" onclick='back()'>Back </button>  </span>
		</span>
		 <span id="pushbutton5" class="yui-button yui-push-button">	 
			<span class="first-child"><button   type="button"  id='submitEditor' name="button5">Enviar </button></span>
		</span>
	</TD>		
</TR>



</form>
</table>


<SCRIPT>
(function() {
    var Dom = YAHOO.util.Dom,
        Event = YAHOO.util.Event,
        status = null;

        var handleSuccess = function(o) {
            YAHOO.log('Post success', 'info', 'example');
            var json = o.responseText.substring(o.responseText.indexOf('{'), o.responseText.lastIndexOf('}') + 1);
            var data = eval('(' + json + ')');
            myEditor.setEditorHTML(data.Results.data);
        }
        var handleFailure = function(o) {
            YAHOO.log('Post failed', 'info', 'example');
            var json = o.responseText.substring(o.responseText.indexOf('{'), o.responseText.lastIndexOf('}') + 1);
            var data = eval('(' + json + ')');
            status.innerHTML = 'Status: ' + data.Results.status + '<br>';
        }

        var callback = {
            success: handleSuccess,
            failure: handleFailure
        };

    
    YAHOO.log('Create Button Control (#toggleEditor)', 'info', 'example');
    var _button = new YAHOO.widget.Button('submitEditor');

    var myConfig = {
        height: '300px',
        width: '600px',
        animate: true,
        dompath: true
    };

    YAHOO.log('Create the Editor..', 'info', 'example');
    var myEditor = new YAHOO.widget.Editor('editor', myConfig);
    myEditor.render();

    _button.on('click', function(ev) {
	
        YAHOO.log('Button clicked, initiate transaction', 'info', 'example');
        Event.stopEvent(ev);
        myEditor.saveHTML();

        window.setTimeout(function() {
			var subject = Dom.get('subject').value ; 
            var sUrl = "mvcAnnouncement.php";			
			var id = Dom.get('idMatter').value ; 

            var data =  'action=recMatter&idMatter='+id+'&editor_data='+ encodeURIComponent(myEditor.get('textarea').value)+'&subject='+encodeURIComponent(subject);
			document.getElementById("edit").value   =	Dom.get('editor').value ;

		//	var request = YAHOO.util.Connect.asyncRequest('POST', sUrl, callback, data);

			
			document.getElementById('form1').submit();
			
			
        }, 200);
    });


    Event.onDOMReady(function() {
        status = Dom.get('status');
    });
})();
</SCRIPT>
