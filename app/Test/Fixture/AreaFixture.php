<?php
/**
 * Area Fixture
 */
class AreaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'area_name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'area_description' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'park_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '1',
			'area_name' => 'Plage',
			'area_description' => 'Zone de la plage',
			'park_id' => '6',
			'user_id' => '9'
		),
		array(
			'id' => '2',
			'area_name' => 'Kids Zone',
			'area_description' => 'Kids Zone',
			'park_id' => '5',
			'user_id' => '2'
		),
	);

}
