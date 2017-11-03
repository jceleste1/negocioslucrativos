<script>
function go(id,page)
{
	document.getElementById("id").value = id;
	document.getElementById("page").value = page;
        document.getElementById('formList').submit();
}
function filter()
{
    document.getElementById('formFilter').submit();
}
function home(){
	document.getElementById('formHome').submit();
}

</script>

<?
$typeAn =  $_POST['typeAn'];
if( $_POST[typeAnManual]  )
	$typeAn = $_POST[typeAnManual];

?>

<form action="index.php" id="formList" name="formList" method="POST">
	<input type=hidden id='work' name='work' value="<?=$_POST[work]?>"/>
	<input type=hidden id='typeCompany' name='typeCompany' value='<?=$_POST['typeCompany']?>'/>
	<input type=hidden id='idSector' name='idSector' value='<?=$_POST['idSector']?>'/>
	<input type=hidden id='idShipper' name='idShipper' value='<?=$_POST['idShipper']?>'/>
	<input type=hidden id='typeAn' name='typeAn' value='<?=$typeAn?>'/>
	<input type=hidden id='id' name='id' />
	<input type=hidden id='page' name='page' />

	<div class="content-primary">
		<ul data-role="listview" data-filter="true">

		<?


		$where = "where typeannouncement='$typeAn' and ";
		if( $_POST['typeCompany']  )
			$where  .= " typecompany='".$_POST['typeCompany']."' and ";

		if( $_POST['idSector']  )
			$where .=" sector=".$_POST['idSector']." and ";

		if( $_POST['work']  )
			$where  .=  " (title like '%".$_POST['work']."%' or
							description like '%".$_POST['work']."%') and ";

		$where = substr($where,0 ,strlen($where)-5 );


		$qry = "select a.id,a.title,a.sector,a.typecompany,a.priceselling,a.price
		from announcement a
		$where
		order by datainc DESC,dtmodify DESC limit 0,30 ";
		$result = mysql($DB,$qry);
		$rows = mysql_num_rows($result);
		for ($i=0;$i<$rows;$i++)   {
			$line=mysql_fetch_assoc($result);
		?>
			<li><a href="#" onclick="javascript:go(<?=$line[id]?>,'view' );"><?=strtoupper($line["title"])?></a></li>
		<?}?>
		</div><!-- /page -->

		</ul>


		<div data-role="fieldcontain">
			<div class="content-primary">
				<a href="#" data-role="button" data-inline="true" onclick="filter()"><< Voltar</a>
			</div>
		</div>

	</div>


</form>




<form action="index.php" id="formFilter" name="formFilter" method="post">
    <input type=hidden id='page' name='page' value="filter"/>
	<input type=hidden id='typeAn' name='typeAn' value='<?=$typeAn?>'/>
</form>


<form action="index.php" id="formHome" name="formHome" method="post">
</form>



