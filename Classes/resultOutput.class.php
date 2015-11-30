<?php

class resultOutput extends Output{

	public function renderResultView( $basketsContent, $userBasketContent, $taskB, $taskC ){
		$output = $this->twig->render('/ballsTemplate.twig.html', array(
		'basketsContent' => $basketsContent,
		'userBasketContent' => $userBasketContent,
		'taskB' => $taskB,
		'taskC' => $taskC,
		));
		echo $output;
	}
}