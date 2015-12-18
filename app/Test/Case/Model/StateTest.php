<?php
App::uses('State', 'Model');

/**
 * State Test Case
 */
class StateTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.state',
		'app.country',
		'app.park',
		'app.user',
		'app.area',
		'app.attraction',
		'app.type',
		'app.attractions_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->State = ClassRegistry::init('State');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->State);

		parent::tearDown();
	}
        /**
 * testGetByCategory method
 *
 * @return void
 */
	
        public function testGetByCountryAndRealCountry() {
        $resultat = $this->State->GetByCountry(2);    
        $expected = array(
             2 => 'California' 
        );
        $this->assertEquals($resultat, $expected);
		
    }
    public function testGetByCountryAndNoneRealCountry() {
        $resultat = $this->State->GetByCountry(3);
        $this->assertEquals($resultat, array());

    }
     public function testGetByCountryWithNothing() {
        $resultat = $this->State->GetByCountry();
        $this->assertEquals($resultat, array());

    }

}
