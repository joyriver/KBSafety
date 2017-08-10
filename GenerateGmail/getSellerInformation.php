
<?php
	include 'conn.php';
	mysql_query('SET NAMES UTF8');
    mysql_query('set character_set_client = utf8');
    mysql_query('set character_set_results = utf8');

	$Accountid = isset($_POST['Accountid']) ? mysql_real_escape_string($_POST['Accountid']) : '';
	
	$result = array();
	
	$where = "Account like '%$Accountid%'";
	
	//$rs = mysql_query("select ACC,ReceivedDate,OwnerEmail,OwnerName,ASIN,BrandName,FirstEmail from infringement where " . $where );

	
	$rs = mysql_query("select * from accountinfo where " . $where );
	$items = array();
	while($row = mysql_fetch_object($rs)){
//		array_push($items, $row);
       $items = $row;
	}
	$result["rows"] = $items;
	
	echo json_encode($items);
	
?>
