<?php

$root_dir = $_SERVER['DOCUMENT_ROOT'].'/Balls';

require_once $root_dir.'/Classes/ball.class.php';
require_once $root_dir.'/Classes/basket.class.php';
require_once $root_dir.'/Classes/ordinaryBasket.class.php';
require_once $root_dir.'/Classes/output.class.php';
require_once $root_dir.'/Classes/resultOutput.class.php';
require_once $root_dir.'/Classes/standardOutput.class.php';
require_once $root_dir.'/Classes/universe.class.php';
require_once $root_dir.'/Classes/userBasket.class.php';

if (isset($_POST['back'])){
	unset ($_POST);
	$output = new standardOutput();
	$output -> renderStandardView();
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$universe = new Universe();
	$basketsContent = $universe -> displayOrdinaryBaskets();
	if (preg_match( '/^[0-9]{1,3}$/', $_POST['usersBasketAmount'] )){
		if ( $_POST['usersBasketAmount'] >=1 AND $_POST['usersBasketAmount'] <=100 ){
		$userBasketContent = $universe -> generateUserBasket( $_POST['usersBasketAmount'] );
		} else {
			$error = true;
		}
	} else {
		if ( $_POST['usersBasketAmount'] != '' ){
			$error = true;
		} else {
		$userBasketContent = $universe -> generateUserBasket();
		}
	}
	if ( !isset( $error )){
		$taskB = $universe->checkTaskB();
		$taskC = $universe->checkTaskC();
		$output = new resultOutput();
		$output -> renderResultView( $basketsContent, $userBasketContent, $taskB, $taskC );
	} else {
		$output = new standardOutput();
		$output -> renderStandardView( $error );
	}
} else {
	$output = new standardOutput();
	$output -> renderStandardView();
}