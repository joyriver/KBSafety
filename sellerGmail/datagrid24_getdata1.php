<?php
	include 'conn.php';
	
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	$Noid = isset($_POST['Noid']) ? mysql_real_escape_string($_POST['Noid']) : '';
	$Accountid = isset($_POST['Accountid']) ? mysql_real_escape_string($_POST['Accountid']) : '';	
	$Countryid = isset($_POST['Countryid']) ? mysql_real_escape_string($_POST['Countryid']) : '';
	$Locationid = isset($_POST['Locationid']) ? mysql_real_escape_string($_POST['Locationid']) : '';
	
	$offset = ($page-1)*$rows;
	
	$result = array();
	
	$where = "No like '$Noid%' and Account like '$Accountid%' and Country  like '$Countryid%' and Location like '$Locationid%'";
	$rs = mysql_query("select count(*) from accountinfo where " . $where);
	$row = mysql_fetch_row($rs);
	$result["total"] = $row[0];
	
	$rs = mysql_query("select * from accountinfo where " . $where . " limit $offset,$rows");
	
	$items = array();
	while($row = mysql_fetch_object($rs)){
		array_push($items, $row);
	}
	$result["rows"] = $items;
	
	echo json_encode($result);
?>