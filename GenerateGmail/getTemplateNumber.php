
<?php
	include 'conn.php';
	$itemid = isset($_POST['itemid']) ? mysql_real_escape_string($_POST['itemid']) : '';
	
	$result = array();
	
	$where = "ID like '$itemid%'";
	
	//$rs = mysql_query("select ACC,ReceivedDate,OwnerEmail,OwnerName,ASIN,BrandName,FirstEmail from infringement where " . $where );

	
	$rs = mysql_query("select * from infringement where " . $where );
	$items = array();
	while($row = mysql_fetch_object($rs)){
//		array_push($items, $row);
       $items = $row;
	}
	$result["rows"] = $items;
	
	echo json_encode($items);
	
?>
