<?php

$root_dir = $_SERVER['DOCUMENT_ROOT'].'/Balls';
$vendor_dir = $root_dir.'/Vendor';
$cache_dir = $root_dir.'/Cache';
$templates_dir = $root_dir.'/Templates';

require_once $root_dir.'/Classes/ball.class.php';
require_once $root_dir.'/Classes/basket.class.php';
require_once $root_dir.'/Classes/ordinaryBasket.class.php';
require_once $root_dir.'/Classes/universe.class.php';
require_once $root_dir.'/Classes/userBasket.class.php';

$twig_lib = $vendor_dir.'/Twig/lib/Twig';
require_once $twig_lib . '/Autoloader.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem($templates_dir);
$twig = new Twig_Environment($loader, array(
	'cache' => $cache_dir,
));

if (isset($_POST['back'])){
	unset ($_POST);
	$output = $twig->render('/startPage.twig.html');
	echo $output;
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$universe = new Universe();
	$basketsContent = $universe -> displayOrdinaryBaskets();
	if (preg_match( '/^[0-9]{1,3}$/', $_POST['usersBasketAmount'] )){
		if ( $_POST['usersBasketAmount'] >=1 AND $_POST['usersBasketAmount'] <=100 ){
		$userBasketContent = $universe -> generateUserBasket( $_POST['usersBasketAmount'] );
		} else {
			$output = $twig->render('/startPage.twig.html', array(
				'error' => 'Please insert the number between 1 and 100',
			));
			echo $output;
		}
	} else {
		if ( $_POST['usersBasketAmount'] != '' ){
			$output = $twig->render('/startPage.twig.html', array(
				'error' => 'Please insert the number between 1 and 100',
			));
			echo $output;
		} else {
		$userBasketContent = $universe -> generateUserBasket();
		}
	}
	$taskB = $universe->checkTaskB();
	$taskC = $universe->checkTaskC();
	
	$output = $twig->render('/ballsTemplate.twig.html', array(
		'basketsContent' => $basketsContent,
		'userBasketContent' => $userBasketContent,
		'taskB' => $taskB,
		'taskC' => $taskC,
		));
	echo $output;
} else {
	$output = $twig->render('/startPage.twig.html');
	echo $output;
}