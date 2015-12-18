<?php
/**
 * Type Fixture
 */
class TypeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'type_description' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 80, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'type_description' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 2,
			'type_description' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 3,
			'type_description' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 4,
			'type_description' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 5,
			'type_description' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 6,
			'type_description' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 7,
			'type_description' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 8,
			'type_description' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 9,
			'type_description' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 10,
			'type_description' => 'Lorem ipsum dolor sit amet'
		),
	);

}
