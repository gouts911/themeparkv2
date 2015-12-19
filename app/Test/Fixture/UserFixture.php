<?php
/**
 * User Fixture
 */
class UserFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'username' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'password' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'actif' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'role' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'email' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'image' =>  array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'date', 'null' => false, 'default' => null),
		'modified' => array('type' => 'date', 'null' => false, 'default' => null),
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
			'id' => 1,
			'username' => 'admin',
			'password' => 'Lorem ipsum dolor sit amet',
			'actif' => 1,
			'role' => 'admin',
			'email' => 'a@a.com',
			'image' => 'uploads/Koala.png',
			'created' => '2015-11-26',
			'modified' => '2015-11-26'
		),
		array(
			'id' => 2,
			'username' => 'proprio',
			'password' => 'Lorem ipsum dolor sit amet',
			'actif' => 1,
			'role' => 'proprietaire',
			'email' => 'Lorem ipsum dolor sit amet',
			'image' => 'Lorem ipsum dolor sit amet',
			'created' => '2015-11-26',
			'modified' => '2015-11-26'
		),
                array(
			'id' => 3,
			'username' => 'proprioNA',
			'password' => 'Lorem ipsum dolor sit amet',
			'actif' => 0,
			'role' => 'proprietaire',
			'email' => 'Lorem ipsum dolor sit amet',
			'image' => 'Lorem ipsum dolor sit amet',
			'created' => '2015-11-26',
			'modified' => '2015-11-26'
		)
	);

}
