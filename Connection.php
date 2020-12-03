<?php 

  class Connection {

    private $name_host = 'localhost';
    private $name_db = 'nextsale';
    private $name_user = 'root';
    private $password = 'Bismillah';
    private $connexion;

    public function connect() 
	{
      $this->connexion = null;

      try 
	  { 
        $this->connexion = new PDO('mysql:host=' . $this->name_host . ';dbname=' . $this->name_db, $this->name_user, $this->password);
        $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } 
	  catch(PDOException $e) { echo 'Bazaya qoşulmada problem oldu: ' . $e->getMessage(); }

      return $this->connexion;
    }
  }