<?php
/**
 * Created by IntelliJ IDEA.
 * User: den
 * Date: 14.08.14
 * Time: 10:44
 */

class Database {

	public static $fields = [];
	protected static $per_page = 30;
	protected static $pdo;

	public static function load($file){
		if(!is_file($file)){
			file_put_contents($file,'');
			static::$pdo = new PDO('sqlite:'.$file);
			if(static::createTable(static::$fields)){
				return true;
			}
		}else{
			static::$pdo = new PDO('sqlite:'.$file);
			if(static::createTable(static::$fields)){
				return true;
			}
		}
	}

	public static function createTable($fields){
		if(is_array($fields)){
			$tableFields = 'id INTEGER PRIMARY KEY AUTOINCREMENT,addDate TEXT,status INTEGER DEFAULT 1,';
			foreach($fields as $field){
				if(isset($field['name'])) {
					$tableFields .= "{$field['name']} ";
				}
				if(isset($field['type'])) {
					$tableFields .= "{$field['type']} ";
				}else{
					$tableFields .= "TEXT";
				}
				$tableFields.=',';
			}
			$tableFields = rtrim($tableFields,',');
			$newTableQuery = "create table if not exists leads (
				$tableFields
			)";
			static::$pdo->exec($newTableQuery);
			if(static::$pdo->errorCode()!='00000'){
				$error = static::$pdo->errorInfo();
				throw new \Exception('createTable Error:'.$error[2]);
			}else{
				return true;
			}
		}else{
			throw new \Exception('createFile Error');
		}
	}

	public static function Add($params){
		if(is_array($params)){
			$fields = '';
			$values = '';
			foreach($params as $key => $value){
				$fields.=$key.',';
				$values.='\''.$value.'\',';
			}
			$fields.='addDate';
			$current_date = date('d-m-Y H:i:s');
			$day = date('Y-m-d');
			$values.='\''.$current_date.'\'';
			$phone = $params['phone'];
			$query = "SELECT addDate FROM leads WHERE phone='".$phone."' AND addDate LIKE '%".$day."%' ";
			$q = static::$pdo->query($query);

			$row = $q->fetch(PDO::FETCH_ASSOC);

			if($row){
				return false;
			}
			else{
				$addQuery = "insert into leads ($fields) values ($values)";
				static::$pdo->exec($addQuery);
				if(static::$pdo->errorCode()!='00000'){
					$error = static::$pdo->errorInfo();
					throw new Exception('insertError Error:'.$error[2]);
				}else{
					return true;
				}
			}

		}else{
			return false;
		}
	}

	public static function Update($params, $phone){
		if(is_array($params)){
			$values = '';

			foreach($params as $key => $value){
				$values.=$key.'=\''.$value.'\',';
			}
			$values = substr($values, 0, -1);

			$addQuery = "update leads set $values where phone = '$phone'";

			static::$pdo->exec($addQuery);
			if(static::$pdo->errorCode()!='00000'){
				$error = static::$pdo->errorInfo();
			   	throw new Exception('updateError Error:'.$error[2]);
			}else{
				return true;
			}
		}else{
			return false;
		}
	}

	public static function Get($page=0){
		$table = '<tr><th class="heading">№</th>';
		foreach (static::$fields as $field){
			if(isset($field['title'])){
				$table.='<th align="center" class="heading">'.$field['title'].'</th>';
			}else{
				$table.='<th align="center" class="heading">'.$field['name'].'</th>';
			}
		}
		$table .= '<th  align="center" class="heading" style="width:95px;">Дата</th><th class="heading">Скрыть</th>'.'</tr>';

		$pages_count = static::$pdo->query('SELECT count(*) as counted FROM leads WHERE `status`=1');

		$pages_count = $pages_count->fetch(PDO::FETCH_ASSOC);
		$pages_count  = ceil($pages_count['counted'] / static::$per_page);
		$from_page = $page*static::$per_page;
		$fields = static::$pdo->query("SELECT * FROM leads WHERE `status`=1 ORDER BY id DESC LIMIT ".$from_page.",".static::$per_page);
		while($row = $fields->fetch(PDO::FETCH_ASSOC)){
			//TODO: remove this check, now it in sql query
			if($row['status']){
				$table.='<tr><td>'.$row['id'].'</td>';
				foreach (static::$fields as $field){
					$table.='<td>'.$row[$field['name']].'</td>';
				}
				$table .= '<th>'.$row['addDate'].'</th>';
				$table.='<td align="center"><a class="status delete" id="'.$row['id'].'"> &times; </a>'.'</tr>';
			}
		}
		$table = '<table class="table table-condensed table-hover">'.$table.'</table>';
		#//TODO: make nice url
		$actual_link = "http://$_SERVER[HTTP_HOST]/admin/index.php?page=";

		$table .= '<ul class="pagination">';

		for($i=1;$i<=$pages_count;$i++){

			$link = $actual_link . ($i-1);
			if(($i-1)==$page) {
				$table .= '<li class="active"><a href="' . $link . '">' . $i . '</a></li>';
			}
			else{
				$table .= '<li><a href="' . $link . '">' . $i . '</a></li>';
			}
		}

		$table.='</ul>';
		return $table;
	}

	public static function GetForExport(){
		$result = [];

		$result['title'][0] = "№";
		$result['title'][1] = "Дата";
		foreach (static::$fields as $field){
			if(isset($field['title'])){
				$result['title'][] = $field['title'];
			}else{
				$result['title'][] = $field['name'];
			}
		}

		$fields = static::$pdo->query('SELECT * FROM leads ORDER BY id DESC');
		while($row = $fields->fetch(PDO::FETCH_ASSOC)){
			if($row['status']){
				$result['data'][] = $row;
			}
		}

		return $result;
	}

	public static function GetHidden($page=0){
		$table = '<tr><th class="heading">№</th>';
		foreach (static::$fields as $field){
			if(isset($field['title'])){
				$table.='<th align="center" class="heading">'.$field['title'].'</th>';
			}else{
				$table.='<th align="center" class="heading">'.$field['name'].'</th>';
			}
		}
		$pages_count = static::$pdo->query('SELECT count(*) as counted FROM leads WHERE `status`=0');

		$pages_count = $pages_count->fetch(PDO::FETCH_ASSOC);
		$pages_count  = ceil($pages_count['counted'] / static::$per_page);
		$from_page = $page*static::$per_page;
		$table .= '<th align="center" class="heading" style="width:95px;">Дата</th><th class="heading">Показать</th>'.'</tr>';
		$fields = static::$pdo->query('SELECT * FROM leads WHERE `status`=0 ORDER BY addDate DESC LIMIT '.$from_page.",".static::$per_page);
		while($row = $fields->fetch(PDO::FETCH_ASSOC)){
			//TODO: remove this check, now it in sql query
			if(!$row['status']){
				$table.='<tr><td>'.$row['id'].'</td>';
				foreach (static::$fields as $field){
					$table.='<td>'.$row[$field['name']].'</td>';
				}
				$table .= '<th>'.$row['addDate'].'</th>';
				$table.='<td align="center"><a class="status show" id="'.$row['id'].'"> + </a>'.'</tr>';
			}
		}
		$table = '<table class="table table-condensed table-hover">'.$table.'</table>';
		#//TODO: make nice url
		$actual_link = "http://$_SERVER[HTTP_HOST]/admin/index.php?showhidden=1&page=";

		$table .= '<ul class="pagination">';

		for($i=1;$i<=$pages_count;$i++){

			$link = $actual_link . ($i-1);
			if(($i-1)==$page) {
				$table .= '<li class="active"><a href="' . $link . '">' . $i . '</a></li>';
			}
			else{
				$table .= '<li><a href="' . $link . '">' . $i . '</a></li>';
			}
		}

		$table.='</ul>';
		return $table;
	}

	public static function isAlreadyAdded($phone){
		
		$fields = static::$pdo->query('select * from leads');

		while($row = $fields->fetch(PDO::FETCH_ASSOC)){

			if($row['phone'] == $phone){
				return true;
			}

		}

		return false;
	}

	public static function ChangeStatus($id, $status){
		$addQuery = "UPDATE leads SET status = $status WHERE id = $id";

		static::$pdo->exec($addQuery);
		if(static::$pdo->errorCode()!='00000'){
			$error = static::$pdo->errorInfo();
		   	throw new Exception('updateError Error:'.$error[2]);
		}else{
			return true;
		}
	}
}


/*
NULL. The value is a NULL value.

INTEGER. The value is a signed integer, stored in 1, 2, 3, 4, 6, or 8 bytes depending on the magnitude of the value.

REAL. The value is a floating point value, stored as an 8-byte IEEE floating point number.

TEXT. The value is a text string, stored using the database encoding (UTF-8, UTF-16BE or UTF-16LE).

BLOB
*/
