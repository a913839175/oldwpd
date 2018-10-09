<?php


	class UsersModel extends RelationModel
	{
		protected $_link = array(
			'Profile' => array(
				'mapping_type' => HAS_ONE,
				'class_name' => 'credit',
				'foreign_key'=>'user_id',
//				'mapping_order'=>'addtime desc',
				'mapping_fields'=>'credit',
				'as_fields'=>'credit',

			),
         );

}
?>