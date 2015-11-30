<?php

abstract class Basket {

	protected $minimumAmount = 1;
	protected $currentAmount;
	protected $content = array();

	function __construct( $amount = null ){
		if ($amount){
			$this->generateAmount( $amount );
		} else {
			$this->generateAmount();
		}
		$this->generateNumbers();
	}

	protected function generateAmount( $amount = null){
		if ( $amount ){
			$this->currentAmount = $amount;
		} else {
			$this->currentAmount = mt_rand( $this->minimumAmount, $this->maximumAmount );
		}
	}

	protected function generateNumbers(){
		for ( $i = 0; $i < $this->currentAmount; ){
			$singleBall = Ball::generateBall();
			if ( !isset( $this->content[$singleBall] )){
				$this->content[$singleBall] = $singleBall;
				$i++;
			}
		}
		usort( $this->content, "strnatcmp" );
	}

	public function getContent(){
		return $this->content;
	}

	public function getCurrentAmount(){
		return $this->currentAmount;
	}
}

