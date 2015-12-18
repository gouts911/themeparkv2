<?php
App::uses('Park', 'Model');

/**
 * Park Test Case
 */
class ParkTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.park',
		'app.user',
		'app.area',
		'app.attraction',
		'app.type',
		'app.attractions_type',
		'app.state',
		'app.country'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Park = ClassRegistry::init('Park');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Park);

		parent::tearDown();
	}

/**
 * testIsOwnedBy method
 *
 * @return void
 */
	public function testIsOwnedByForReal() {
		$resultat = $this->Park->isOwnedBy(1,1);
                $this->assertTrue($resultat);
	}
        public function testIsOwnedByNotReal() {
		$resultat = $this->Park->isOwnedBy(1,2);
                $this->assertFalse($resultat);
	}
        public function testURLValide(){
            
        }
        public function testNomParcVide(){
            
            $data = array(
                        'id' => '3',
			'user_id' => '1',
			'park_name' => '',
                        'park_location' => 'Lorem ipsum dolor sit amet',
			'state_id' => '1',
			'park_email' => 'a@a.com',
			'park_website' => 'http://laronde.com');
            $resultat = $this->Park->save($data);
            
            $this->assertFalse($resultat);
            
        }
        public function testNomParc(){
            
            $data = array(
                        'id' => '3',
			'user_id' => '1',
			'park_name' => 'aa',
                        'park_location' => 'Lorem ipsum dolor sit amet',
			'state_id' => '1',
			'park_email' => 'a@a.com',
			'park_website' => 'http://laronde.com');
            $resultat = $this->Park->save($data);
            
           $this->assertArrayHasKey('Park', $resultat);
            
        }
        public function testUserIdValide(){
            
            $data = array(
                        'id' => '3',
			'user_id' => '1',
			'park_name' => 'aa',
                        'park_location' => 'Lorem ipsum dolor sit amet',
			'state_id' => '1',
			'park_email' => 'a@a.com',
			'park_website' => 'http://laronde.com');
            $resultat = $this->Park->save($data);
            
           $this->assertArrayHasKey('Park', $resultat);
        }
        public function testUserIdNonValide(){
            
            $data = array(
                        'id' => '3',
			'user_id' => 'a',
			'park_name' => 'aa',
                        'park_location' => 'Lorem ipsum dolor sit amet',
			'state_id' => '1',
			'park_email' => 'a@a.com',
			'park_website' => 'http://laronde.com');
            $resultat = $this->Park->save($data);
            
           $this->assertFalse($resultat);
        }
        public function testUserIdVide(){
            
            $data = array(
                        'id' => '3',
			'user_id' => '',
			'park_name' => 'aa',
                        'park_location' => 'Lorem ipsum dolor sit amet',
			'state_id' => '1',
			'park_email' => 'a@a.com',
			'park_website' => 'http://laronde.com');
            $resultat = $this->Park->save($data);
            
           $this->assertFalse($resultat);
        }
        

}
