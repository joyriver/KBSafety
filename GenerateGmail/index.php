<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Basic TextBox - jQuery EasyUI Demo</title>
	<link rel="stylesheet" type="text/css" href="../../themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="../../themes/icon.css">
	<link rel="stylesheet" type="text/css" href="../demo.css">
	<script type="text/javascript" src="../../jquery.min.js"></script>
	<script type="text/javascript" src="../../jquery.easyui.min.js"></script>
	<script type="text/javascript" src="template.js" charset="gb2312"></script>

    <script>
    $(document).ready(function(){
	$("#clab1").click(function(){
		$.post("getTemplateNumber.php",{
			itemid:'1780'
		},
		function(data,status){
			alert("模板编号: \n" + data + "\n状态: " + status);
		});
	});
    });
     </script>
	<script>
	    function temptest(){
		 alert('abc');
	}
	</script>

</head>
<body>

	<h2>Basic TextBox</h2>
	<p>The textbox allows a user to enter information.</p>
	<div style="margin:20px 0;"></div>
	<div class="easyui-panel" title="Register" style="width:400px;padding:30px 60px">
		<div style="margin-bottom:20px">
			<div>Keyword:</div>
			<input class="easyui-textbox" data-options="prompt:'Enter a email address...',validType:'email'" style="width:100%;height:32px">
		</div>
		<div style="margin-bottom:20px">
			<div>Infringement No:</div>
			<input class="easyui-textbox" name="txt_book"  id="txt_book" style="width:100%;height:32px">
		</div>
		<div style="margin-bottom:20px">
			<div>AmazonEmail:</div>
			<input class="easyui-textbox" id ="showT" style="width:100%;height:32px">
		</div>
	
		
	<button id="clab" name="Submit" type="button" right="16px" onClick="myFunction('t2','10');">生成模板</button>	
	<button id="clab1" name="Submit1" type="button" right="16px" >生成模板1</button>	
<!--	
 <input type="submit" name="Submit" value="GenerateGmail" onClick="myFunction('t2','<script>document.write(a)</script>')">
<script  type="text/javascript">
    window.onload = function(){
    temptest();
    };
	myFunction('t2','10')
 </script>   -->
 <script>
 var a='6';
 </script>>

  
	      
	</div>
	<div id="t2" contenteditable="true">这是一段可编辑的段落。请试着编辑该文本。</div>


<?php
function getTemplateNumber(){
$link = mysql_connect("localhost","root","root") or die("link failed!".mysql_error());
mysql_select_db("orders",$link);
mysql_query("set names gb2312");

//$sql = mysql_query("select * from infringement where ID!=''");
if($_POST[Submit] == "生成模板"){
   $txt_book = $_POST[txt_book];
   if($txt_book !='') {
   $sql = mysql_query("select * from infringement where ID like '%".trim($txt_book)."%'");
$info = mysql_fetch_array($sql);
  echo "<tr>";
  echo "<td>".$info[ID]."</td>";
  echo "<td>".$info[ACC]."</td>";
  echo "<td>".$info[ReceiveDateid]."</td>";
  echo "<td>".$info[OwnerEmail]."</td>";
  echo "<td>".$info[OwnerName]."</td>";
  echo "<td>".$info[FirstEmail]."</td>";
  echo "</tr>";
  $telp = substr($info[FirstEmail],1);
   echo "<td>".$telp."</td>";
  
 //    myFunction('t2',$telp);
 return $telp;
 
 }
	}
	 mysql_close($link);
	 
	 }
	 getTemplateNumber();
?>	
	
	<script>
	function myFunction(y,telp1){
	alert(telp1);
	
	if(telp1==='6'){
	var result= Template6("l","a","b","c","d","e","f","g","h","i","j","k");
	document.getElementById(y).innerHTML = result;
	}
	if(telp1==='7'){
	var result= Template7("l","a","b","c","d","e","f","g","h","i","j","k");
	document.getElementById(y).innerHTML = result;
	}
	if(telp1==='10'){
	var result= Template10("l","a","b","c","d","e","f","g","h","i","j","k");
	document.getElementById(y).innerHTML = result;
	}
		// Template0("l","a","b","c","d","e","f","g","h","i","j","k");
	}
	</script>
</body>
</html>