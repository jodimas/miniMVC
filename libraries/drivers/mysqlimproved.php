 <?php
/**
 * The MySQL Improved driver extends the Database_Library to provide 
 * interaction with a MySQL database
 */
class MysqlImproved_Driver extends Database_Library
{
    /**
     * Connection holds MySQLi resource
     */
    private $connection;

    /**
     * Query to perform
     */
    private $query;

    /**
     * Result holds data retrieved from server
     */
    private $result;

    /**
     * Create new connection to database
     */ 
    public function connect()
    {

		$host = constant('DB_HOST');
        $user = constant('DB_USER');
        $password = constant('DB_PASSWORD');
        $database = constant('DB_NAME');
      
        //your implementation may require these...
        $port = NULL;
        $socket = NULL;    
    
        //create new mysqli connection
        $this->connection = new mysqli
        (
            $host , $user , $password , $database , $port , $socket
        );
 
		/* change character set to utf8 */
		$this->connection->set_charset("utf8");

        return TRUE;
    }

    /**
     * Break connection to database
     */
    public function disconnect()
    {
        //clean up connection!
        $this->connection->close();    
    
        return TRUE;
    }

    /**
     * Prepare query to execute
     * 
     * @param $query
     */
    public function prepare($query)
    {
        //store query in query variable
        $this->query = $query;    
    
        return TRUE;
    }

    /**
     * Execute a prepared query
     */
    public function query()
    {
        if (isset($this->query))
        {
            //execute prepared query and store in result variable
            $this->result = $this->connection->query($this->query);
    
            return TRUE;
        }
    
        return FALSE;        
    }

    /**
     * Fetch a row from the query result
     * 
     * @param $type
     */
    public function fetch($type = 'object')
    {
        if (isset($this->result))
        {
            switch ($type)
            {
                case 'array':
                     
                    //fetch a row as array
                    $row = $this->result->fetch_assoc();
                    
                break;
            
                case 'object':
            
                //fall through...
            
                default:
                
                    //fetch a row as object
                    $row = $this->result->fetch_object();    
                    
                break;
            }
        
            return $row;
        }
    
        return FALSE;
    }


    /**
     * Fetch a row from the query result
     * 
     * @param $type
     */
    public function fetchAll($type = 'object')
    {        
        if (isset($this->result))
        {
            switch ($type)
            {
                case 'array':
                      
                    //Fetches all result rows as an associative array
                    //$row = $this->result->fetch_array(MYSQLI_ASSOC);
                    $row = array();
            		    while ($rows = $this->result->fetch_assoc()) {
                          $row[] = $rows;
                    }

                break;
            
                case 'object':
            
                //fall through...
            
                default:
                
                    //Returns an array of objects representing the fields in a result set
                    $row = $this->result->fetch_fields();    
                    
                break;
            }
              
            return $row;
        }
    
        return FALSE;
    }
	
		
	/**
	 * Sanitize data to be used in a query
	 * 
	 * @param $data
	 */
	public function escape($data)
	{
	    return $this->connection->real_escape_string($data);
	}
} 
?>