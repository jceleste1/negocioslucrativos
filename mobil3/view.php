<?
$qry = "select a.title,a.typecompany,a.sector,a.billing,a.description,a.datainc,a.status,a.typeannouncement,a.priceselling,a.numberemployee,a.conditionpart,a.zone,a.viewcount,a.confidencial,r.name,r.phonemobile,r.phone,a.price,a.www
from announcement a, register r where a.id=$_POST[id]";
$qry .= " and a.id_user=r.id";
$result = @mysql( $DB , $qry );

if( mysql_error() ){
	 $msg = "DB ERROR NegociosLucrativos mobile \n Page view  \n";
	 $msg .= "UserAgent: ".$ismobi->getUserAgent()."\n \n" ;
	 $msg .= "Screen .$widthScreen  -   $heightScreen \n \n" ;
	 $msg .= "Mobile: ".$ismobi->getMobileDevice()."\n $qry" ;
	 @mail("jceleste@brasilforte.com.br","$msg",$msg);
}
$dataAnnouncement = @mysql_fetch_array( $result ) ;



?>
<div class="content-primary">
	<form action="index.php" id="formView" name="formView">
	<input type=hidden id='id' name='id' value='<?=$_POST[id]?>'/>
	<div class="ui-body ui-body-d ui-corner-all">


	<div data-role="fieldcontain">
		<label for="label1" class="select"><b>Anuncio : <?=strtoupper($dataAnnouncement["title"])?></b></label>
	</div>
	<div data-role="fieldcontain">
		<label for="select-choice-x" class="select"><b>Atividade da Empresa :</b>
			<?switch( $dataAnnouncement["typecompany"] ){
				case "I":
					echo "Indústria";
					break;
				case "C":
					echo "Comércio";
					break;
				case "S":
					echo "Serviço";
					break;
				default:
					break;
			}
		?>
		</label>
	</div>
	<div data-role="fieldcontain">
		<label for="select-setor-x" class="select"><b>Setor :</b>
			<?
			while( list( $key,$val ) =each($aSector) ){
				$sel = "";
				if( $key == $dataAnnouncement["sector"] )
						echo "$val";
			}
			?>
			</label>
	</div>
	<div data-role="fieldcontain">
		<label for="shipping-x" class="select"><b>Faturamento :</b>
		<?while( list( $key,$val ) =each($aInvestimento) ){

				if( $key == $dataAnnouncement["billing"] )
					echo $val;
			}
		?>
		</label>
	</div>
	<div data-role="fieldcontain">
		<label for="description" class="select"><b>Descrição :</b>
		<?=ereg_replace ("\n", "<br>",$dataAnnouncement["description"] );?>
		</label>
	</div>
	<div data-role="fieldcontain">
		<label for="nfunc" class="select"><b>Número de Funcionários :</<b>
		<?=$dataAnnouncement["numberemployee"];?>
		</label>
	</div>
	<div data-role="fieldcontain">
		<label for="local" class="select"><b>Local :</b>
		<?
		while( list( $key,$val ) =each($aZone) ){
			if( $key == $dataAnnouncement["zone"] )
				echo "$val";

		}
		?>
		</label>
	</div>

	</div>
	<div class="ui-body ui-body-b">
		<fieldset class="ui-grid-a">
			<div class="ui-block-a">
				<a href="#" data-role="button" data-inline="true" data-theme="d" onclick="cancel()">Cancel</a>
				<?
				if( $_SESSION["idUser"] ){?>
					<a href="#" data-role="button" data-inline="true" data-theme="b" data-rel="dialog" data-transition="pop" onclick="contact()">Entrar em Contato</a>
				<?}else{?>
					<a href="#" data-role="button" data-inline="true" data-theme="b" data-rel="dialog" data-transition="pop" onclick="login()">Entrar em Contato</a>
				<?}?>
			</div>
		</fieldset>
	</div>
	</form>
</div>

<form action="index.php" id="formLogin" name="formLogin" method="post">
<input type=hidden id='page' name='page' value='login'/>
<input type=hidden id='id' name='id' value='<?=$_POST[id]?>'/>
<input type=hidden id='title' name='title' value='<?=strtoupper($dataAnnouncement["title"])?>'/>
<input type=hidden id='work' name='work' value="<?=$_POST[work]?>"/>
<input type=hidden id='typeCompany' name='typeCompany' value='<?=$_POST['typeCompany']?>'/>
<input type=hidden id='idSector' name='idSector' value='<?=$_POST['idSector']?>'/>
<input type=hidden id='idShipper' name='idShipper' value='<?=$_POST['idShipper']?>'/>
<input type=hidden id='typeAn' name='typeAn' value='<?=$_POST['typeAn']?>'/>
<input type=hidden id='action' name='action' value='redirContact'/>
</form>
<form action="index.php" id="formContact" name="formContact" method="post">
<input type=hidden id='page' name='page' value='contact'/>
<input type=hidden id='id' name='id' value='<?=$_POST[id]?>'/>
<input type=hidden id='title' name='title' value='<?=strtoupper($dataAnnouncement["title"])?>'/>
<input type=hidden id='work' name='work' value="<?=$_POST[work]?>"/>
<input type=hidden id='typeCompany' name='typeCompany' value='<?=$_POST['typeCompany']?>'/>
<input type=hidden id='idSector' name='idSector' value='<?=$_POST['idSector']?>'/>
<input type=hidden id='idShipper' name='idShipper' value='<?=$_POST['idShipper']?>'/>
<input type=hidden id='typeAn' name='typeAn' value='<?=$_POST['typeAn']?>'/>
</form>
<form action="index.php" id="formCancel" name="formCancel" method="post">
<input type=hidden id='page' name='page' value='list'/>
<input type=hidden id='id' name='id' value='<?=$_POST[id]?>'/>
<input type=hidden id='title' name='title' value='<?=strtoupper($dataAnnouncement["title"])?>'/>
<input type=hidden id='work' name='work' value="<?=$_POST[work]?>"/>
<input type=hidden id='typeCompany' name='typeCompany' value='<?=$_POST['typeCompany']?>'/>
<input type=hidden id='idSector' name='idSector' value='<?=$_POST['idSector']?>'/>
<input type=hidden id='idShipper' name='idShipper' value='<?=$_POST['idShipper']?>'/>
<input type=hidden id='typeAn' name='typeAn' value='<?=$_POST['typeAn']?>'/>
</form>
<form action="index.php" id="formHome" name="formHome" method="post"></form>


<script>
	function cancel(){
		document.getElementById('formCancel').submit();
	}
	function contact(){
			 document.getElementById('formContact').submit();
	}
	function login(){
			 document.getElementById('formLogin').submit();
	}
	function home(){
		 document.getElementById('formHome').submit();
	}
</script>

