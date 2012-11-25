 <?php

class View_Model
{
   
    private $data = array();

    
    private $render = FALSE;

  
    public function __construct($template)
    {

        $file = SERVER_ROOT . '/views/' . strtolower($template) . '.php';
    
        if (file_exists($file))
        {
           
            $this->render = $file;
        }        
    }

    /**
     * Receives data from controller
     * 
     * @param $variable
     * @param $value
     */
    public function assign($variable , $value)
    {
        $this->data[$variable] = $value;
    }

    public function __destruct()
    {      
        $data = $this->data;
    
        include($this->render);
    }
} 