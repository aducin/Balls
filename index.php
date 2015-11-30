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
	if ( $_POST['usersBasketAmount'] !="" ){
		$userBasketContent = $universe -> generateUserBasket( $_POST['usersBasketAmount'] );
	} else {
		$userBasketContent = $universe -> generateUserBasket();
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