<?php
session_start();

//getting root and host values for database table = init
	//echo __DIR__.'<br>';							//root
	//echo 'http://'.$_SERVER['HTTP_HOST'].'<br>';	//host
	
//error reporting
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

//defining various constants
	define("CRYPT", 'hello_ENTOMIST*123', true);

//database connection LOCALHOST
	/*$dbhost     = "localhost";
	$dbname     = "t1c_quotation";
	$dbuser     = "root";
	$dbpass     = "";
	
	$db = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);*/

//database connection Digital Ocean 
	$dbhost     = "localhost";
	$dbname     = "t1c_quotation";
	$dbuser     = "root";
	$dbpass     = "That1card";
	
	$db = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//extract Root and Host
	try {
			$query = $db->query("SELECT * FROM `init` WHERE `name` = 'root' OR `name` = 'host'");
		} catch (PDOException $e)
		{ 
			die($e->getMessage()); 
		}
		
		while($row = $query->fetch(PDO::FETCH_ASSOC)) {
			if($row['name'] == 'root') {
				define("ROOT", $row['value'], true);
			} else {
				define("HOST", $row['value'], true);
			}
		}

/*define("ROOT", '/var/www/that1card.com/process', true);
define("HOST", 'http://process.that1card.com', true);*/
//loading the CLASSES
	function __autoload($className) {
		include(ROOT.'/users/objects/'.$className.'.php');
	}

//setting to Indian time
	date_default_timezone_set("Asia/Kolkata");

	
//including PHP Mailer
	//include(ROOT.'/PHPMailer/PHPMailerAutoload.php');

//user activity record
	/* if(isset($_SESSION['email'])) {
		User::recordActivity($db,User::getUserID($db,$_SESSION['email']),basename($_SERVER['PHP_SELF']));
	} */
?>