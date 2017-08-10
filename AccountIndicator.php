<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>Account Indicators</title>
<script src="http://cdn.static.runoob.com/libs/jquery/1.10.2/jquery.min.js">
</script>
</head>

<body>

<form action="" method="post" name="myform">
 <tr>
    <td width="605" height="51" bgcolor="#CC99FF"><div align="center">Please input Account keywords
	  <input name="txt_book" type="text" id="txt_book" size="25" value="<?php echo $_POST[txt_book];?>"/>&nbsp;
	  <input type="submit" name="Submit" value="QUERY">
	  <div></div></td>
	  <tr></tr>
 </tr>  
</form>

<?php
// include_once('fenye.php');

//  echo "my first php shell!";
//  echo "test sqlite!";
  $db = new PDO("sqlite:orderman.db");
  if(!$db){
  	echo $db->lastErrorMsg();
  }else{
  	echo "Open KB database successfully\n";
  }
  
//	  $sql = $db->query("SELECT * FROM MailLists WHERE ACC!=''");
//    $sql = $page->entrance('MailLists',5);
if($_POST[Submit] == "QUERY"){
   $txt_book = $_POST[txt_book];
   if($txt_book !='')
   {
 //  $sql = $db->query("SELECT * FROM MailLists WHERE ACC like '%".trim($txt_book)."%'");
//   $tj = "WHERE ACC like '%".trim($txt_book)."%'";
//   $sql = $page->entrance('MailLists',5);

/*
 $page=new SqlitePage();
 $res=$page->entrance('MailLists',5,$tj);
 */
  echo "<table border='1' cellspacing='0' cellpadding='1'>

 <tr>
 <th>Date</th>
 <th>ACC</th>
 <th>Staus</th>
 <th>feedback</th>
 <th>feedback1week</th>
 <th>orders7day</th>
 <th>UnshippedOrders</th>
 <th>Ratings30days</th>
 <th>Ratings365days</th>
 <th>odrShort</th>
 <th>odrLong</th>
 <th>PreFulfillCancelRate7days</th>
 <th>PreFulfillCancelRate30days</th>
 <th>lateShipmentRate7days</th>
 <th>lateShipmentRate30days</th>
 <th>refundRate7days</th>
 <th>refundRate30days</th>
 <th>feedback30days</th>
 <th>orders30days</th>
 <th>suppressedListing</th>
 <th>validTrackingRate7days</th>
 <th>validTrackingRate30days</th>
 <th>feedbackPercentage30days</th>
 <th>region</th>
 <th>CityCountry</th>
 </tr>";
 echo "<br>";
 
 $res = $db->query("SELECT * FROM alert WHERE ACC like '%".trim($txt_book)."%'")->fetchAll();
foreach ($res as $key=>$info) {
	//var_dump($row);
	
	 echo "<tr>";
  echo "<td>".$info[date]."</td>";
  echo "<td>".$info[ACC]."</td>";
  echo "<td>".$info[status]."</td>";
  echo "<td>".$info[feedback]."</td>";
  echo "<td>".$info[feedback1week]."</td>";
  echo "<td>".$info[orders7day]."</td>";
   echo "<td>".$info[UnshippedOrders]."</td>";
  echo "<td>".$info[Ratings30days]."</td>";
  echo "<td>".$info[Ratings365days]."</td>";
  echo "<td>".$info[odrShort]."</td>";
  echo "<td>".$info[odrLong]."</td>";
  echo "<td>".$info[PreFulfillCancelRate7days]."</td>";
   echo "<td>".$info[PreFulfillCancelRate30days]."</td>";
  echo "<td>".$info[lateShipmentRate7days]."</td>";
  echo "<td>".$info[lateShipmentRate30days]."</td>";
  echo "<td>".$info[refundRate7days]."</td>";
  echo "<td>".$info[refundRate30days]."</td>";
  echo "<td>".$info[feedback30days]."</td>";
   echo "<td>".$info[orders30days]."</td>";
  echo "<td>".$info[suppressedListing]."</td>";
  echo "<td>".$info[validTrackingRate7days]."</td>";
  echo "<td>".$info[validTrackingRate30days]."</td>";
  echo "<td>".$info[feedbackPercentage30days]."</td>";
  echo "<td>".$info[region]."</td>";
  echo "<td>".$info[CityCountry]."</td>";
  echo "</tr>";  
	// echo $row['ACC']." ".$row['orderId']." ".$row['price']."\n\r";
}
}
  echo "</table>";
}
//  echo $page->page_bar();
?>
<script type="text/javascript">
//  $("#txt_book").val("100CA"); 
 </script>
</body>

</html>
