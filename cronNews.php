#!/usr/bin/php 
<?
                         
          
mail("jceleste@brasilforte.com.br","jceleste@brasilforte.com.br","");




$conexao =  mysql_connect( "localhost","brforte","Isr0704@");

 if(  mysql_error() ) {
	 $msg = "ERRO NO BANCO DE DADOS";
	 mail("jceleste@brasilforte.com.br",$msg,$msg);
 }

mail("jceleste@brasilforte.com.br","jceleste@brasilforte.com.br","CONECTADO");


$qry = "SELECT count( name ) , name, count( mail ) , mail FROM register  GROUP BY mail";
$result = fMySQL_Connect($qry);
while(	$dataAnnouncement = mysql_fetch_array( $result )  )
{
	$stringData  .= $dataAnnouncement[name]." | ".$dataAnnouncement["mail"] ."\n";

	$qry = "insert into newsReader ( nome,mail,send ) values ('$dataAnnouncement[name]','$dataAnnouncement[mail]','N')";
	fMySQL_Connect($qry);	
}



?>