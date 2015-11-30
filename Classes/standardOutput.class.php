<?php

class standardOutput extends Output{

	public function renderStandardView( $error = null ){
		if ( !isset( $error )){
		$output = $this->twig->render('/startPage.twig.html');
		} else {
			$output = $this->twig->render('/startPage.twig.html', array(
				'error' => 'Please insert the number between 1 and 100',
			));
		}
		echo $output;
	}
}