<?php
	include 'conn.php';
	
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	$itemid = isset($_POST['itemid']) ? mysql_real_escape_string($_POST['itemid']) : '';
	$ACCid = isset($_POST['ACCid']) ? mysql_real_escape_string($_POST['ACCid']) : '';	
	$productid = isset($_POST['productid']) ? mysql_real_escape_string($_POST['productid']) : '';
	$ReceiveDateid = isset($_POST['ReceiveDateid']) ? mysql_real_escape_string($_POST['ReceiveDateid']) : '';
	
	$offset = ($page-1)*$rows;
	
	$result = array();
	
	$where = "ID like '$itemid%' ";
	$rs = mysql_query("select count(*) from infringement where " . $where);
	$row = mysql_fetch_row($rs);
	$result["total"] = $row[0];
	
	$rs = mysql_query("select * from infringement where " . $where . " limit $offset,$rows");
	
	$items = array();
	while($row = mysql_fetch_object($rs)){
		array_push($items, $row);
	}
	$result["rows"] = $items;
	
	echo json_encode($result);
?>