
<?php
require '../server_modules/autoload.php';
class HeroesDatabase {
   private $database;
   function __construct() {
        $this->database = new medoo([
	      'database_type' => 'mysql',
	      'database_name' => 'heroes',
	      'server' => 'localhost',
	      'username' => 'root',
	      'password' => '',
	      'charset' => 'utf8',
        ]);
   }
   function getAllHeroes() {
     $datas = $this->database->select("heroes", [
 	    "name",
 	    "id"
     ]);
     return $datas;
   }
}
?>
