<?
import('TagLib');
	class TagLibKey extends TagLib{ 
		protected $tags=array(
			'key'=>array('attr'=>'','close'=>1),

		);

		public function _key($attr,$content){ 
			//替换关键字
			$keydata = M("Keyword")->select();
			$new_content = $content;
			

				

			foreach($keydata as $k=>$v){
				$str='<a href="'.$v[key_url].'" style="'.$v[key_style].'" >'.$v[key_name].'</a>';
				$new_content=ereg_replace($v[key_name],$str,$new_content);
			}
			return $new_content;
		}
	}


?>