<?php

$ID = $_REQUEST['ID'];
$ACC = $_REQUEST['ACC'];
$ReceiveDate = $_REQUEST['ReceiveDate'];
$OwnerEmail = $_REQUEST['OwnerEmail'];
$OwnerName = $_REQUEST['OwnerName'];
$FirstEmail = $_REQUEST['FirstEmail'];
$ComplaintWithdrawn = $_REQUEST['ComplaintWithdrawn'];
$Comment = $_REQUEST['Comment'];

include 'conn.php';

$sql = "update accountinfo set ID='$ID',ACC='$ACC',ReceiveDate='$ReceiveDate',OwnerEmail='$OwnerEmail',FirstEmail='FirstEmail',ComplaintWithdrawn='ComplaintWithdrawn',
Comment='Comment' where id=$id";
@mysql_query($sql);
echo json_encode(array(
	'id' => mysql_insert_id(),
	'ID' => $ID,
	'ACC' => $ACC,
	'ReceiveDate' => $ReceiveDate,
	'OwnerEmail' => $OwnerEmail,
	'OwnerName' => $OwnerName,
	'FirstEmail' => $FirstEmail,
	'ComplaintWithdrawn' => $ComplaintWithdrawn,
	'Comment' => $Comment
));
?>