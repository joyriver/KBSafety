<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�ޱ����ĵ�</title>
</head>

<body>
<?php

class SqliteDB{
  public function __construct(){
    // ��ʼ�����ݿ⣬�����������ݿ� ���ݿ�����
    $this->db = new PDO('sqlite:'.dirname(__FILE__).'\orderman.db');
    $this->table_name=$tab;
    $this->tab_init();
  }
  public function tab_init()
  {
    # ���ʼ��,������
    $this->db->exec("CREATE TABLE log(
      id integer PRIMARY KEY autoincrement,
      urls varchar(200),
      ip varchar(200),
      datetimes datetime default (datetime('now', 'localtime'))
      )");
  }
  public function insert($tab_name,$key_list,$value_list)
  {
    // echo "INSERT INTO ".$tab_name." (".$key_list.") values(".$value_list.")";
    $result=$this->db->exec("INSERT INTO ".$tab_name." (".$key_list.") values(".$value_list.")");
    if (!$result) {
      return false;
    }
    // echo "{{{INSERT INTO ".$tab_name." (".$key_list.") values(".$value_list.")}}}}";
    $res=$this->db->beginTransaction();//�����gun
  }
  public function total($tab_name,$tj='')//���ܼ�¼��Ŀ
  {
    $sth = $this->db->prepare('SELECT count(id) as c FROM '.$tab_name.' '.$tj);
    $sth->execute();
    $result = $sth->fetchAll();
    return $result[0]['c'];
  }
  public function update()
  {
    # �޸�
  }
  function delete($value='')
  {
    # ɾ��
  }
  public function query($tab_name,$tj='')//�����ƺ�����
  {
    $sth = $this->db->prepare('SELECT * FROM '.$tab_name.' '.$tj);
    // echo 'SELECT * FROM '.$tab_name.' '.$tj;
    $sth->execute();
    $result = $sth->fetchAll();
    return $result;
  }
}
?>
</body>
</html>
