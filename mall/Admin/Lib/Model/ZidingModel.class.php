<?php
	class ZidingModel extends Model{
		protected $_validate=array(
			array("name","require","字段名称必须要输入"),
			array("relname","require","字段别名必须要输入"),
			array('name','','该字段已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
			array("orderby","require","排序必须要输入"),
		);
		
		
		//增加字段
		public function addfield($data){
			$field = $this->returnPlFtype($data);
			if($data[modules]==1){
				$tablenameinfo = "content";
				$tablename = C("DB_PREFIX").$tablenameinfo;
			}else if($data[modules]==2){
				$tablenameinfo = "product";
				$tablename = C("DB_PREFIX").$tablenameinfo;
			}else if($data[modules]==3){
				$tablenameinfo = "guest";
				$tablename = C("DB_PREFIX").$tablenameinfo;
			}else if($data[modules]==4){
				$tablenameinfo = "job";
				$tablename = C("DB_PREFIX").$tablenameinfo;
			}else if($data[modules]==5){
				$tablenameinfo = "pacontent";
				$tablename = C("DB_PREFIX").$tablenameinfo;
			}else if($data[modules]==6){
				$tablenameinfo = "order";
				$tablename = C("DB_PREFIX").$tablenameinfo;
			}else if($data[modules]==7){
				$tablenameinfo = "down";
				$tablename = C("DB_PREFIX").$tablenameinfo;
			}else if($data[modules]==8){
				$tablenameinfo = "atl";
				$tablename = C("DB_PREFIX").$tablenameinfo;
			}
			if($this->checkfield($tablenameinfo,$data[name])){
				$lkjl = "alter table ".$tablename." add ".$field."";
				$this->query($lkjl);
				return true;
			}else{
				return false;
			}
			
			
			
			
		}
		
		//组合sql语句
		public function returnPlFtype($add){
			
			//字段类型
			if($add[type]==0){
				$def=" varchar(255) default ''";
			}else if($add[type]==1){
				$def=" varchar(255) default ''";
			}else if($add[type]==2){
				$def=" tinyint(1) default 0";
			}else if($add[type]==4){
				$def=" text default ''";
			}else if($add[type]==5){
				$def=" varchar(30) default ''";
			}else if($add[type]==6){
				$def=" text default ''";
			}
			//字段名称
			$field = "`" . $add["name"] . "` ". $def;
			return $field;
			//dump($field);
		}
		
		//检测字段是否存在
		public function checkfield($tablenameinfo,$name){
			$m = new Model($tablenameinfo);
			//dump($m->getDbFields());
			foreach($m->getDbFields() as $v){
				if($name==$v){
					return false;
				}
				
			}
			return true;
		}
		//删除字段
		public function deletefield($tablenameinfo,$fieldname){
			$bool = $this->query("alter table $tablenameinfo drop column $fieldname");
			if($bool){
				return true;
			}else{
				return false;
			}
	
		}
		//修改字段  表名,老字段,新字段
		public function editfield($tablename,$oldfieldname,$newfieldname,$type){
			switch($type){
				case 0:
					$strsql = "alter table $tablename change $oldfieldname $newfieldname varchar(255);";
				break;
					
				case 1:
					$strsql = "alter table $tablename change $oldfieldname $newfieldname varchar(255);";
				break;
				
				case 2:
					$strsql = "alter table $tablename change $oldfieldname $newfieldname tinyint(1);";
				break;
				
				case 3:
					$strsql = "alter table $tablename change $oldfieldname $newfieldname tinyint(1);";
				break;
				
				case 4:
					$strsql = "alter table $tablename change $oldfieldname $newfieldname text;";
				break;
				
				case 5:
					$strsql = "alter table $tablename change $oldfieldname $newfieldname varchar(30);";
				break;
				case 6:
					$strsql = "alter table $tablename change $oldfieldname $newfieldname text;";
				break;
			}
			
			return $this->execute($strsql);
		}
	}
?>