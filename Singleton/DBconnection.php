<!--Author: Lim Shao Fan-->
<?php             
  
   class DBconnection{
       private static $instance = NULL;
       private $conn;
       private $host = 'localhost';
       private $user = 'root';
       private $pass = '';
       private $name = 'food-order';
       
       private function __construct() {
           $this->conn = new PDO("mysql:host=$this->host;dbname=$this->name", $this->user,$this->pass);
    }
       
       public static function getInstance(){
           if(self::$instance == null)
           {
               self::$instance = new DBconnection();    
           }
           
           return self::$instance;
       }
       
       public function getConnection(){
           return $this->conn;
       }
      
   }




