<?php
include '../controllers/index.php';

class IndexControllerTest extends PHPUnit_Framework_TestCase
{
    //protected $controller = '';
	protected function setUp()
    {
    	$this->controller = new Index_Controller();
    }
	
    protected function tearDown()
    {
    	unset($this->controller);
    }
    
	public function testController()
    {    	
        $template = $this->controller->template;
        $this->assertEquals('index', $template);
      
    }
}
?>