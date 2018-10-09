<?php


	class OrderModel extends RelationModel
	{
		protected $_link = array(
			'Profile' => array(
				'mapping_type' => BELONGS_TO,
				'class_name' => 'product',
				'foreign_key'=>'pid',
//				'mapping_order'=>'addtime desc',
				'mapping_fields'=>'proname',
				'as_fields'=>'proname',

			),
         );

}
?>