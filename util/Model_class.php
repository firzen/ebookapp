<?php

include_once  WEB_ROOT."util/config.php";
/**
 *
 * �־ò������
 * @since 2013-11-27
 * @copyright kaxinpig.net
 * this��ָ��ǰ�����ָ�루���Կ���C�����ָ�룩��self��ָ��ǰ���ָ�룬parent��ָ�����ָ��
 */

class Model{

	private $query;

	private $link;

	private $sql;

	public function __construct($ut = "gb2312"){
		$user = $GLOBALS ['database'] ['db_user'];
		$passwd = $GLOBALS ['database'] ['passwd'];
		$dbname = $GLOBALS ['database'] ['dbname'];
		$this->connect($GLOBALS ['database'] ['hostname'],$user,$passwd,$dbname,$ut);
	}

	private function connect($host,$name,$pass,$dbname,$ut){
		$this->link=mysql_pconnect($host,$name,$pass) or die ($this->error());
		mysql_select_db($dbname,$this->link) or die("û�����ݿ⣺".$dbname);
		mysql_query("SET NAMES '$ut'");
	}
	/**
	 *
	 * ��ѯָ��sql
	 * @param string $sql
	 * @throws Exception
	 */
	public function query($sql) {
		try{
			if(!($this->query = @mysql_query($sql,$this->link))){
				throw new Exception(mysql_error());
			}
		}catch (Exception $e){
			echo $e->getMessage(), '<br/>';
			echo '<pre>', $e->getTraceAsString(), '</pre>';
			echo '<strong>Query: </strong> ' . $sql;
		}

		return $this->query;
	}
	/**
	 *
	 * ͨ�ò�ѯ���������ؽ��������
	 * @param string $tablename
	 * @param string $fields
	 * @param string $condition
	 * @return array
	 */
	public function select($table,$fields="*",$condition = "1=1"){
		try{
			if (empty($table) || empty($fields) || empty($condition))
			{
				throw new Exception('��ѯ���ݵı������ֶΣ���������Ϊ��', 444);
			}
			$this->sql = "SELECT {$fields} FROM `{$table}` WHERE {$condition}";
			$this->ping();
			$result = $this->query($this->sql);
			return $this->fetch_all();

		}catch (Exception $e){
			echo $e->getMessage(), '<br/>';
			echo '<pre>', $e->getTraceAsString(), '</pre>';
			echo '<strong>Query: </strong>[select] ', (!empty($this->sql)) && $this->sql;
		}
	}

	/**
	 * �������ݿ��¼ UPDATE�����ظ��µļ�¼����
	 *
	 * @param string $table
	 * @param array $data
	 * @param string $condition
	 * @return int
	 */
	public  function update($table, $data, $condition)
	{
		try
		{
			if (empty($table) || empty($data) || empty($condition))
			throw new Exception('�������ݵı��������ݣ���������Ϊ��', 444);

			if(!is_array($data))
			throw new Exception('�������ݱ���������', 444);

			$set = '';
			foreach ($data as $k => $v)
			$set .= empty($set) ? ("`{$k}` = '{$v}'") : (", `{$k}` = '{$v}'");

			if (empty($set)) throw new Exception('�������ݸ�ʽ��ʧ��', 444);

			$this->sql = "UPDATE `{$table}` SET {$set} WHERE {$condition}";
			$result = $this->query($this->sql);

			// ����Ӱ������
			return $this->affected_rows();
		}
		catch (Exception $e)
		{
			echo $e->getMessage(), '<br/>';
			echo '<pre>', $e->getTraceAsString(), '</pre>';
			echo '<strong>Query: </strong>[update]' . (!empty($this->sql)) && $this->sql;
		}
	}

	/**
	 * ��������
	 *
	 * @param string $table
	 * @param array $fields
	 * @param array $data
	 * @return boolean
	 */
	public function insert($table, $fields, $data)
	{
		try
		{
			if (empty($table) || empty($fields) || empty($data)) {
				throw new Exception('�������ݵı������ֶΡ����ݲ���Ϊ��', 444);
			}

			if (!is_array($fields) || !is_array($data))
			{
				throw new Exception('�������ݵ��ֶκ����ݱ���������', 444);
			}

			// ��ʽ���ֶ�
			$_fields = '`' . implode('`, `', $fields) . '`';

			// ��ʽ����Ҫ���������
			$_data = $this->format_insert_data($data);

			if (empty($_fields) || empty($_data))
			{
				throw new Exception('�������ݵ��ֶκ����ݱ���������', 444);
			}

			$this->sql = "INSERT INTO `{$table}` ({$_fields}) VALUES {$_data}";
			$result = $this->query($this->sql);

			return $this->affected_rows();
		}
		catch (Exception $e)
		{
			echo $e->getMessage(), '<br/>';
			echo '<pre>', $e->getTraceAsString(), '</pre>';
			echo '<strong>Query: </strong>[insert] ' . (!empty($this->sql)) && $this->sql;

		}
	}



	/**
	 * ��ʽ�� insert ���ݣ������飨��ά���飩ת���������ݿ�����¼ʱ���ܵ��ַ���
	 *
	 * @param array $data
	 * @return string
	 */
	protected  function format_insert_data($data)
	{
		if (!is_array($data) || empty($data))
		{
			throw new Exception('���ݵ����Ͳ�������', 445);
		}

		$output = '';
		foreach ($data as $value)
		{
			// ����Ƕ�ά����
			if (is_array($value))
			{
				$tmp = '(\'' . implode("', '", $value) . '\')';
				$output .= !empty($output) ? ", {$tmp}" : $tmp;
				unset($tmp);
			}
			else
			{
				$output = '(\'' . implode("', '", $data) . '\')';
			}
		} //foreach

		return $output;
	}


	/**
	 * ɾ����¼
	 *
	 * @param string $table
	 * @param string $condition
	 * @return num
	 */
	public function delete($table, $condition)
	{
		try
		{
			if (empty($table) || empty($condition))
			{
				throw new Exception('��������������Ϊ��', 444);
			}

			$this->sql = "DELETE FROM `{$table}` WHERE {$condition}";
			$result = $this->query($this->sql);

			return $this->affected_rows();
		}
		catch (Exception $e)
		{
			echo $e->getMessage(), '<br/>';
			echo '<pre>', $e->getTraceAsString(), '</pre>';
			echo '<strong>Query: </strong>[delete] ' . (!empty($this->sql)) && $this->sql;
		}
	}


	/**
	 * ��ѯ��¼��
	 *
	 * @param string $table
	 * @param string $condition
	 * @return int
	 */
	public  function get_rows_num($table, $condition)
	{
		try
		{
			if (empty($table) || empty($condition))
			throw new Exception('��ѯ��¼���ı������ֶΣ���������Ϊ��', 444);

			$this->sql = "SELECT count(*) AS total FROM {$table} WHERE {$condition}";
			$result = $this->query($this->sql);

			$tmp = $this->fetch_one();
			return (empty($tmp)) ? false : $tmp['total'];
		}
		catch (Exception $e)
		{
			echo $e->getMessage(), '<br/>';
			echo '<pre>', $e->getTraceAsString(), '</pre>';
			echo '<strong>Query: </strong>[rows_num] ' . (!empty($this->sql)) && $this->sql;
		}
	}

	/**
	 * ������Ӱ����Ŀ
	 *
	 * @return init
	 */
	public  function affected_rows ()
	{
		return mysql_affected_rows($this->link);
	}


	/**
	 * ���ر��β�ѯ���õ��ܼ�¼��...
	 *
	 * @return int
	 */
	public function num_rows ()
	{
		return mysql_num_rows($this->query);
	}

	/**
	 * (��)���ص�����¼����
	 *
	 * @param  int   $result_type
	 * @return array
	 */
	public  function fetch_one ()
	{
		return mysql_fetch_array($this->query);
	}

	/**
	 * (��)���ض�����¼����
	 *
	 * @param   int   $result_type
	 * @return  array
	 */
	public  function fetch_all ()
	{
		$row = $rows = array();
		while ($row = mysql_fetch_array($this->query))
		{
			$rows[] = $row;
		}
		if (empty($rows))
		{
			return false;
		}
		else
		{
			return $rows;
		}
	}
	
	function __destruct() {
		/*if($this->link){
			mysql_close ( $this->link );
		}*/
	}
	
	/**
	 * 
	 * �����MySQL server has gone away���Ĵ���
	 */
	function ping(){    
 
    if(!mysql_ping($this->link)){    
 
        mysql_close($this->link); //ע�⣺һ��Ҫ��ִ�����ݿ�رգ����ǹؼ�    
 
        $this->connect();    
 
    }    
 
} 

}

?>