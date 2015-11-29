<?php

$root_dir = $_SERVER['DOCUMENT_ROOT'].'/Balls';
$vendor_dir = $root_dir.'/Vendor';
$cache_dir = $root_dir.'/Cache';
$templates_dir = $root_dir.'/Templates';

require_once $root_dir.'/Classes/ball.class.php';
require_once $root_dir.'/Classes/basket.class.php';
require_once $root_dir.'/Classes/universe.class.php';

$twig_lib = $vendor_dir.'/Twig/lib/Twig';
require_once $twig_lib . '/Autoloader.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem($templates_dir);
$twig = new Twig_Environment($loader, array(
	'cache' => $cache_dir,
));

$universe = new Universe();
$basketsContent = $universe -> displayOrdinaryBaskets();
$userBasketContent = $universe -> generateUserBasket();
$taskB = $universe->checkTaskB();
$taskC = $universe->checkTaskC();
foreach ( $basketsContent as $singleBasket ){
	echo $singleBasket."<br>";
}
echo $userBasketContent;

if ( !empty ($taskB)){
	echo '<br><br>Some Results to Task B have been matched!<br>';
	foreach ($taskB as $singleResult ){
		echo 'Basket number : '.($singleResult['basketNumber']+1).' - Number : '.implode( ", ",$singleResult['numbers'] ).'<br>';
	}
}
if ( !empty ($taskC)){
	echo '<br><br>Some Results to Task C have been matched!<br>';
	foreach ($taskC as $singleResult ){
		echo 'Basket number : '.($singleResult['basketNumber']+1).' - Number : '.implode( " ",$singleResult['numbers'] ).'<br>';
	}
}

/*$output = $twig->render('/ballsTemplate.twig.html', array(
			'basketsContent' => $basketsContent,
			'userBasketContent' => $userBasketContent,
			));
echo $output;*/