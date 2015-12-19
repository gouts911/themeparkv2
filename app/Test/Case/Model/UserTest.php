<?php
App::uses('User', 'Model');

/**
 * User Test Case
 */
class UserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user',
		'app.area',
		'app.park',
		'app.state',
		'app.country',
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
		$this->User = ClassRegistry::init('User');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->User);

		parent::tearDown();
	}

/**
 * testProcessImageUpload method
 *
 * @return void
 */
	public function testProcessImageUpload() {
		$valide = $this->User->processImageUpload(1);
        $this->assertTrue($valide);
	}
        
 /**
 * testValidateEmail
 *
 * @return void
 */   
        
        public function testEmailValid(){
            $data = array(
			'id' => '4',
			'username' => 'admin1',
			'password' => 'asasasasasas',
			'actif' => 1,
			'role' => 'admin',
			'email' => 'a@a.com',
			'image' => ''
			
		);
            $resultat = $this->User->Save($data);
            $pass = $resultat['User']['password'];
            $this->assertArrayHasKey('User', $resultat);
            
            
            
        }
        public function testEmailInvalid(){
            $data = array(
			'id' => '4',
			'username' => 'admin1',
			'password' => 'asasasasasas',
			'actif' => 1,
			'role' => 'admin',
			'email' => 'aa.com',
			'image' => ''
			
		);
            $resultat = $this->User->save($data);
            
            $this->assertFalse($resultat);
        }
        public function testFormWithEmptyFile() {
		// Build the data to save along with an empty file
		$data = array('User' => array(
                        'id' => '4',
			'username' => 'James Fairhurst',
                        'password' => 'sasasas',
                        'actif' => 1,
			'role' => 'admin',
			'email' => 'info@jamesfairhurst.co.uk',
			'filename' => array(
                            'name' => '',
                            'type' => '',
                            'tmp_name' => '',
                            'error' => 4,
                            'size' => 0,
		)
                            
			
                        
		));

		// Attempt to save
		$result = $this->User->save($data);

		// Test successful insert
		$this->assertArrayHasKey('User', $result);


		
	}

	public function testFormWithValidFile() {
		// Create a stub for the Contact Model class
		$stub = $this->getMockForModel('User', array('is_uploaded_file','move_uploaded_file'));

		// Always return TRUE for the 'is_uploaded_file' function
		$stub->expects($this->any())
			->method('is_uploaded_file')
			->will($this->returnValue(TRUE));
		// Copy the file instead of 'move_uploaded_file' to allow testing
		$stub->expects($this->any())
			->method('move_uploaded_file')
			->will($this->returnCallback('copy'));

		// Build the data to save along with a sample file
		$data = array('User' => array(
			'username' => 'James Fairhurst',
			'email' => 'info@jamesfairhurst.co',
			'password' => 'sasasas',
                    'actif' => 1,
			'role' => 'admin',
			'filename' => array(
				'name' => 'TestFile.jpg',
				'type' => 'image/jpg',
// modified with windows DS backslash
    				'tmp_name' => '.\TestFile.jpg',
// original from tutorial
//    				'tmp_name' => ROOT.DS.APP_DIR.DS.'Test'.DS.'Case'.DS.'Model'.DS.'TestFile.jpg',
				'error' => (int) 0,
				'size' => (int) 845941
			)
		));

		// Attempt to save
		$result = $stub->save($data);
                //$result = $this->User->save($data);

		// Test successful insert
		$this->assertArrayHasKey('User', $result);

		
		
		// Test uploaded file exists
		$this->assertFileExists(WWW_ROOT.'uploads'.DS.'TestFile.jpg');
	}

	/*public function testFormWithInvalidFile() {
		// Create a stub for the Contact Model class
		$stub = $this->getMockForModel('User', array('is_uploaded_file','move_uploaded_file'));

		// Always return TRUE for the 'is_uploaded_file' function
		$stub->expects($this->any())
			->method('is_uploaded_file')
			->will($this->returnValue(TRUE));
		// Copy the file instead of 'move_uploaded_file' to allow testing
		$stub->expects($this->any())
			->method('move_uploaded_file')
			->will($this->returnCallback('copy'));

		// Build the data to save along with a sample file
		$data = array('User' => array(
			'username' => 'aaaaa',
                        'password' => 'sasasasaaaaaaaa',
                        'actif' => 1,
			'role' => 'admin',
			'email' => 'a@a.com',
			
			'filename' => array(
				'name' => 'TestFile.txt',
				'type' => 'text/plain',
// modified with windows DS backslash
    				'tmp_name' => 'J:\UniServerZ\tmp\TestFile.txt',
// original from tutorial
//    				'tmp_name' => ROOT.DS.APP_DIR.DS.'Test'.DS.'Case'.DS.'Model'.DS.'TestFile.jpg',
				'error' =>  (int) 0,
				'size' =>  (int) 19
			)
		));
                

		// Attempt to save
		$result = $stub->save($data);
               
		// Test failure
		$this->assertFalse($result);
               // $this->assertArrayHasKey('User', $result);

		// Test uploaded file does not exists
		
	}*/
        

}
