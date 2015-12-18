<?php
App::uses('Area', 'Model');

/**
 * Area Test Case
 */
class AreaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.area',
		'app.park',
		'app.user',
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
		$this->Area = ClassRegistry::init('Area');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Area);

		parent::tearDown();
	}

/**
 * testGetAreaNames method
 *
 * @return void
 */
	public function testGetAreaNamesFindFirst() {
            
            $area = $this->Area->find('first');
            
            $this->assertEquals($area['Area']['id'], 1);
	}
        
           public function testGetAreaNamesWithOneLetter() {
                $areaName = $this->Area->GetAreaNames("P");
                $this->assertEqual($areaName, array("1" => "Plage"));
	}
         public function testGetAreaNamesWithWrongLetter() {
                $areaName = $this->Area->GetAreaNames("D");
                  $this->assertEqual($areaName, array());
	}
         public function testGetAreaNamesWithTwoLetter() {
                $areaName = $this->Area->GetAreaNames("Ki");
                $this->assertEqual($areaName, array("2" => "Kids Zone"));
	}
        public function testGetAreaNamesWithNoLetter() {
                $areaName = $this->Area->GetAreaNames("");
                $this->assertFalse($areaName);
	}

}
