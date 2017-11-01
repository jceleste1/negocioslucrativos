<?

		include("config.inc");


		$qry = "SELECT r.mail rmail,s.mail smail,s.name sname,r.name rname, s.content, s.datainc , s.id FROM searchbussiness s  LEFT JOIN register r ON s.id_user=r.id  where s.id=".$_REQUEST[id];




		// echo $qry;
		$result2 = fMySQL_Connect($qry);	
		$row = mysql_fetch_array($result2);


		Header("Content-type: text/html; charset=iso-8859-1"); 


		$html = "<fieldset style='width:450px;'>";
		if( $row[sname] )
			$html .= "<legend><b>Empresario <b> $row[sname] </b></legend>";
		else
			$html .= "<legend><b>Empresario <b> $row[rname] </b></legend>";

		$html .= "<table width='100%'>";
		if( $row[smail] )
			$html .= "<tr><td>Email <b>$row[smail]</b></td></tr>";
        else
			$html .= "<tr><td>Email <b>$row[rname]</b></td></tr>";

		$html .= "<tr><td>Data <b>".format_date($row[datainc])."</b></td></tr>";
		$html .= "<tr><td colspan=2><hr>";
		$html .=  ereg_replace("\n", "<br>", $row[content])."</td></tr>";
		$html .= "</table>";
		$html .= "</fieldset>";

		echo $html;

?>