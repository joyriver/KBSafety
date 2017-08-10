<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>Query All Email Database!</title>
</head>

<body>

<meta charset='utf-8'>
<?php

class SqlitePage{
  public function __construct()
  {
    $this->table_name='';
    $this->tj='';
    $this->page_size='';
    $this->current_page='';
    $this->total_page='';
    include_once 'sqlite_db.php';
    $this->db=new SqliteDB();//可以调用他的操作方法了
  }
  function entrance($table_name,$page_size,$tj='')//sql中不包含limit  page_size为每页显示条数
  {
    // 首先获取当前页
    // sql = "select * from tab where "+条件+" order by "+排序+" limit "+要显示多少条记录+" offset "+跳过多少条记录;
    $this->page_size=$page_size;
    $this->table_name=$table_name;
    $this->tj=$tj;
    $this->total_page=ceil($this->db->total($this->table_name,$this->tj)/$this->page_size);
    if (!isset($_GET['page'])) {
      $this->current_page=1;//如果没有page，则设置为默认第一页
    }
    else{
      $this->current_page=$_GET['page'];
    }
    if ($this->current_page>$this->total_page) {//当当前页数目大于总页数，则设置当前页数为总页数
      $this->current_page=$this->total_page;
    }
    if ($this->current_page<1) {//当当前页数目大于总页数，则设置当前页数为总页数
      $this->current_page=1;
    }
    $tj=$this->tj.' limit '.$this->page_size.' offset '.($this->current_page-1)*$this->page_size;
    $result=$this->db->query($this->table_name,$tj);
    return $result;
  }
  function page_bar()
  {
    $old_url = $_SERVER["REQUEST_URI"];
    $check = strpos($old_url, '?');
    $pre_urls='test';
    if ($check) {//如果urls中有？
      if(substr($old_url, $check+1) == '')
      { //有问号，但是后面没有跟任何参数
        $first_urls=$old_url.'page=1';//首页
        $pre_urls=$old_url.'page='.($this->current_page-1);//上一页;
        $next_urls=$old_url.'page='.($this->current_page+1);//下一页;
        $end_urls=$old_url.'page='.$this->total_page;//末页
      }
      else {//有问号，并且有参数
        if (isset($_GET['page'])) {//如果参数中包含page参数，则注销这个参数
     //     unset($_GET['page']);
          $old_url='http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.http_build_query($_GET);
        }
        $first_urls=$old_url.'&page=1';//首页
        $pre_urls=$old_url.'&page='.($this->current_page-1);//上一页;
        $next_urls=$old_url.'&page='.($this->current_page+1);//下一页;
        $end_urls=$old_url.'&page='.$this->total_page;//末页
      }
    }
    else{// 如果没有问号(也就是说后面没有任何参数，则直接跟)
      $first_urls=$old_url.'?page=1';
      $first_urls=$old_url.'?page=1';//首页
      $pre_urls=$old_url.'?page='.($this->current_page-1);//上一页;
      $next_urls=$old_url.'?page='.($this->current_page+1);//下一页;
      $end_urls=$old_url.'?page='.$this->total_page;//末页
    }
    // echo $this->table_name.'table_name';  <div align="center">
    return '
    <div align="center" class="page">
      <a>Total:'.$this->total_page.'&nbsp Page,  Page'.$this->current_page.'&nbsp</a>
      <a href="'.$first_urls.'" rel="external nofollow" >&nbsp first</a>
      <a href="'.$pre_urls.'" rel="external nofollow" >&nbsp last</a>
      <a href="'.$next_urls.'" rel="external nofollow" >&nbsp next</a>
      <a href="'.$end_urls.'" rel="external nofollow" >&nbsp final</a>
    </div>
    ';
  }
  public function get_total_page()
  {
    return ceil($this->total_record/$this->page_size);
  }
}
// echo "Query All Email Database!\n";
 $page=new SqlitePage();
 $res=$page->entrance('MailLists',5);
 echo "<hr />";
 echo "<table border='1' cellspacing='0' cellpadding='1'>
 <tr>
 <th>ACC</th>
 <th>From</th>
 <th>To</th>
 <th>Date</th>
 <th>Subject</th>
 <th>Content</th>
 </tr>";
 echo "<br>";
 
 foreach ($res as $key => $info) {
  echo "<tr>";
  echo "<td>".$info[ACC]."</td>";
  echo "<td>".$info[FromS]."</td>";
  echo "<td>".$info[ToS]."</td>";
  echo "<td>".$info[DateS]."</td>";
  echo "<td>".$info[SubjectS]."</td>";
  echo "<td>".$info[Content]."</td>";
  }
  echo "</table>";
  echo $page->page_bar();
  
?>
</body>
</html>
