<?php
/**
 * AttractionsType Fixture
 */
class AttractionsTypeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'attraction_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'type_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
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
			'attraction_id' => 1,
			'type_id' => 1
		),
		array(
			'id' => 2,
			'attraction_id' => 2,
			'type_id' => 2
		),
		array(
			'id' => 3,
			'attraction_id' => 3,
			'type_id' => 3
		),
		array(
			'id' => 4,
			'attraction_id' => 4,
			'type_id' => 4
		),
		array(
			'id' => 5,
			'attraction_id' => 5,
			'type_id' => 5
		),
		array(
			'id' => 6,
			'attraction_id' => 6,
			'type_id' => 6
		),
		array(
			'id' => 7,
			'attraction_id' => 7,
			'type_id' => 7
		),
		array(
			'id' => 8,
			'attraction_id' => 8,
			'type_id' => 8
		),
		array(
			'id' => 9,
			'attraction_id' => 9,
			'type_id' => 9
		),
		array(
			'id' => 10,
			'attraction_id' => 10,
			'type_id' => 10
		),
	);

}
