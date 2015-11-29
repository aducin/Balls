<?php

class Universe {
	private $userBasket = array();
	private $ordinaryBaskets = array();
	private $basketCount = 30;

	function __construct(){
		$this->userBasket = new UserBasket();
		$this->generateOrdinaryBaskets();
	}

	public function displayOrdinaryBaskets(){
		$basketsContent = array();
		$counter = 1;
		foreach ( $this->ordinaryBaskets as $singleBasket ){
			$basketContent[$counter] = 'Basket number <b>'.$counter."</b> : ".implode( ", ", $singleBasket->getContent() );
			$counter++;
		}
		return $basketContent;
	}

	public function generateUserBasket(){
		$result = array();
		$result['amount'] = count( $this->userBasket->getContent() );
		$result['numbers'] = implode ( ", ", $this->userBasket->getContent() );
		return $result;
	}

	protected function generateOrdinaryBaskets(){
		for ( $i=0; $i<$this->basketCount; $i++ ){
			$this->ordinaryBaskets[$i] = new OrdinaryBasket();
		}
	}

	public function checkTaskB(){
		$checkTaskB = array();
		$counter = 0;
		$innerCounter = 0;
		foreach ( $this->ordinaryBaskets as $singleBasket ){
			$resultTaskB = array_intersect( $singleBasket->getContent(), $this->userBasket->getContent()  );
			if ( count( $resultTaskB ) > 1 ){
				$basketMatches = count( $resultTaskB );
				if ( $singleBasket->getCurrentAmount() == $basketMatches ){
					$taskB[$innerCounter] = array( 'basketNumber' => $counter, 'numbers' => $resultTaskB );
					$innerCounter++;
				}
			}
			$counter++;
		}
		if ( isset ( $taskB )){
			return $taskB;
		}
	}

	public function checkTaskC(){
		$taskC = array();
		$counter = 0;
		$innerCounter = 0;
		foreach ( $this->ordinaryBaskets as $singleBasket ){
			$resultTaskC = array_intersect( $singleBasket->getContent(), $this->userBasket->getContent()  );
			if ( count( $resultTaskC ) == 1 ){
				$taskC[$innerCounter] = array( 'basketNumber' => $counter, 'numbers' =>$resultTaskC );
				$innerCounter++;
			}
			$counter++;
		}
		if ( isset ( $taskC )){
			return $taskC;
		}
	}
}
