<?php

// PDO Database Class
// other models are going to use this class

class Database
{
   private $host = DB_HOSTS;
   private $user = DB_USER;
   private $pass = DB_PASS;
   private $dbname = DB_NAME;

   private $db_handler;
   private $stmt;
   private $error;

   public function __construct()
   {
      $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;

      $option = array(

         //have persistent connection
         PDO::ATTR_PERSISTENT => true,

         //set error mode to exception.(for catch block)
         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      );

      try {
         $this->db_handler = new PDO($dsn, $this->user, $this->pass);

      } catch (PDOException $e) {
         $this->error = $e->getMessage();
         echo $this->error;

      }
   }

   // prepare statement
   public function query($sql)
   {
      $this->stmt = $this->db_handler->prepare($sql);
   }
   //bind values
   public function bind($param, $value, $type = null)
   {
      if (is_null($type)) {
         switch (true) {
            case is_int($value);
            $type = PDO::PARAM_INT;
            break;
            case is_bool($value);
            $type = PDO::PARAM_BOOL;
            break;
            case is_null($value);
            $type = PDO::PARAM_NULL;
            break;
            default:
            case is_int($value);
            $type = PDO::PARAM_STR;
         }
      }

   $this->stmt->bindValue($param, $value, $type);
}

   public function execute(){

      return $this->stmt->execute();
   }

   public function resultSet(){

      $this->execute();
      return $this->stmt->fetchAll(PDO::FETCH_OBJ);
   }

   public function single()
   {

      $this->execute();
      return $this->stmt->fetch(PDO::FETCH_OBJ);
   }
   public function rowCount(){
     return  $this->stmt->rowCount();
   }
   
}
