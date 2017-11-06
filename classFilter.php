<?

class classFilter{

		function  classFilter(){

		}



		function queryWord( $lupa, $txtSearch){
			global $_SESSION;

			if( $lupa || $txtSearch ){


				$Awork_search = explode(  " ",$txtSearch );
				while( list( $key, $value ) = each( $Awork_search ) ) {
					 if( $value  && strlen($value) > 2  )
						 $qryWhere .=   "  and description LIKE CONVERT( _utf8 '%$value%' USING latin1 ) COLLATE latin1_swedish_ci  and  (  title LIKE CONVERT( _utf8 '%$value%' USING latin1 ) COLLATE latin1_swedish_ci   )   ";

				}
				if($qryWhere)
				{
					$qry = "insert into  searchword (words,id_user,datainc) values( \"".$txtSearch."\",'".$_SESSION[id]."', now() )";
					fMySQL_Connect($qry);
				}
			}

			return $qryWhere;
		}



		function queryFilter( $typeAnManual,$sector,$typeCompany, $billing, $zone, $lupa, $txtSearch  ){
echo  "passo 1";

			$qryWhere = "where typeannouncement='$typeAnManual'";
echo  "passo 2";


		    $qryWhere .= $this->queryWord( $lupa, $txtSearch );
echo  "passo 3";

			if( $sector  )
				$qryWhere .= " and a.sector='$sector'";

			if( $typeCompany  )
				$qryWhere .= " and typecompany='$typeCompany'";

			if( $billing  )
				$qryWhere .= " and billing='$billing'";

			if( $zone )
				$qryWhere .= " and zone='$zone'";
echo  "passo 4";

			return $qryWhere;
		}

}