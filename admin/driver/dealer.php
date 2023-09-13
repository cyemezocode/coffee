<?php require 'config.php'; ?>
<?php 
error_reporting();
$msg = array();
class Action extends Database{
	public function selectRow($query,$param){
		$db=$this->connect();
		$fetch=$db->prepare($query);
		foreach ($param as $key => $value) {
			$fetch->bindValue($key+1,$value);
		}
		$fetch->execute();
		return $fetch->fetch();
	}
	public function selectRows($query,$param){
		$db=$this->connect();
		$fetch=$db->prepare($query);
		foreach ($param as $key => $value) {
			$fetch->bindValue($key+1,$value);
		}
		$fetch->execute();
		return $fetch->fetchAll();
	}
	public function executeQuery($query,$param){
		$pdo=$this->connect();
		$insert = $pdo->prepare($query);
		foreach ($param as $key => $value) {
			$key=$key+1;
			$insert->bindValue($key,$value);
		}
		$insert->execute();
		return true;
	}function timeAgo($datetime, $full = false) {
		$now = new DateTime;
		$ago = new DateTime($datetime);
		$diff = $now->diff($ago);
	
		$diff->w = floor($diff->d / 7);
		$diff->d -= $diff->w * 7;
	
		$string = array(
			'y' => 'year',
			'm' => 'month',
			'w' => 'week',
			'd' => 'day',
			'h' => 'hour',
			'i' => 'minute',
			's' => 'second',
		);
		foreach ($string as $k => &$v) {
			if ($diff->$k) {
				$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
			} else {
				unset($string[$k]);
			}
		}
	
		if (!$full) $string = array_slice($string, 0, 1);
		return $string ? implode(', ', $string) . ' ago' : 'just now';
	}

	function isImage($file){
		$allowed = array('jpg','png','jpeg','bmp','gif','webp');
		$ext = explode('.', $file);
		$ext = end($ext);
		$ext = strtolower($ext);
		$f=false;
		if(in_array($ext, $allowed)){
			$f = uniqid().'.'.$ext;
		}
		return $f;
	}
}
?>
