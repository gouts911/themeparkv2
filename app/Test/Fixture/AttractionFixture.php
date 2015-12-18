<?php
/**
 * Attraction Fixture
 */
class AttractionFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'attraction_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 60, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'attraction_description' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 80, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'admission_price' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'area_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
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
			'attraction_name' => 'Lorem ipsum dolor sit amet',
			'attraction_description' => 'Lorem ipsum dolor sit amet',
			'admission_price' => 1,
			'area_id' => 1,
			'user_id' => 1
		),
		array(
			'id' => 2,
			'attraction_name' => 'Lorem ipsum dolor sit amet',
			'attraction_description' => 'Lorem ipsum dolor sit amet',
			'admission_price' => 2,
			'area_id' => 2,
			'user_id' => 2
		),
		array(
			'id' => 3,
			'attraction_name' => 'Lorem ipsum dolor sit amet',
			'attraction_description' => 'Lorem ipsum dolor sit amet',
			'admission_price' => 3,
			'area_id' => 3,
			'user_id' => 3
		),
		array(
			'id' => 4,
			'attraction_name' => 'Lorem ipsum dolor sit amet',
			'attraction_description' => 'Lorem ipsum dolor sit amet',
			'admission_price' => 4,
			'area_id' => 4,
			'user_id' => 4
		),
		array(
			'id' => 5,
			'attraction_name' => 'Lorem ipsum dolor sit amet',
			'attraction_description' => 'Lorem ipsum dolor sit amet',
			'admission_price' => 5,
			'area_id' => 5,
			'user_id' => 5
		),
		array(
			'id' => 6,
			'attraction_name' => 'Lorem ipsum dolor sit amet',
			'attraction_description' => 'Lorem ipsum dolor sit amet',
			'admission_price' => 6,
			'area_id' => 6,
			'user_id' => 6
		),
		array(
			'id' => 7,
			'attraction_name' => 'Lorem ipsum dolor sit amet',
			'attraction_description' => 'Lorem ipsum dolor sit amet',
			'admission_price' => 7,
			'area_id' => 7,
			'user_id' => 7
		),
		array(
			'id' => 8,
			'attraction_name' => 'Lorem ipsum dolor sit amet',
			'attraction_description' => 'Lorem ipsum dolor sit amet',
			'admission_price' => 8,
			'area_id' => 8,
			'user_id' => 8
		),
		array(
			'id' => 9,
			'attraction_name' => 'Lorem ipsum dolor sit amet',
			'attraction_description' => 'Lorem ipsum dolor sit amet',
			'admission_price' => 9,
			'area_id' => 9,
			'user_id' => 9
		),
		array(
			'id' => 10,
			'attraction_name' => 'Lorem ipsum dolor sit amet',
			'attraction_description' => 'Lorem ipsum dolor sit amet',
			'admission_price' => 10,
			'area_id' => 10,
			'user_id' => 10
		),
	);

}
