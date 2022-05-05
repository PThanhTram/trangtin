<?php 
	require __DIR__.'/vendor/autoload.php';

	use Kreait\Firebase\Factory;
	
	$factory = (new Factory)
	->withServiceAccount('firebasetrangtin.json')
	->withDatabaseUri('https://trangtin-eb263-default-rtdb.firebaseio.com/');
	$database = $factory->createDatabase();

?>
