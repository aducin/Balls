<?php

$root_dir = $_SERVER['DOCUMENT_ROOT'].'/Balls';

require_once $root_dir.'/Classes/ball.class.php';
require_once $root_dir.'/Classes/basket.class.php';
require_once $root_dir.'/Classes/ordinaryBasket.class.php';
require_once $root_dir.'/Classes/output.class.php';
require_once $root_dir.'/Classes/universe.class.php';
require_once $root_dir.'/Classes/userBasket.class.php';

$output = new output();
if (isset($_POST['back'])){
	unset ($_POST);
	$output -> renderStandardView();
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$universe = new Universe();
	$basketsContent = $universe -> displayOrdinaryBaskets();
	if (preg_match( '/^[0-9]{1,3}$/', $_POST['usersBasketAmount'] )){
		if ( $_POST['usersBasketAmount'] >=1 AND $_POST['usersBasketAmount'] <=100 ){
		$userBasketContent = $universe -> generateUserBasket( $_POST['usersBasketAmount'] );
		} else {
			$error = 'Please insert the number between 1 and 100';
			$output -> renderStandardView( $error );
		}
	} else {
		if ( $_POST['usersBasketAmount'] != '' ){
			$error = 'Please insert the number between 1 and 100';
			$output -> renderStandardView( $error );
		} else {
		$userBasketContent = $universe -> generateUserBasket();
		}
	}
	$taskB = $universe->checkTaskB();
	$taskC = $universe->checkTaskC();
	$output -> renderResultView( $basketsContent, $userBasketContent, $taskB, $taskC );
} else {
	$output -> renderStandardView();
}