<?php

class Universe {
	private $userBasket = array();
	private $ordinaryBaskets = array();
	private $basketCount = 30;

	function __construct(){
		$this->generateOrdinaryBaskets();
	}

	public function displayOrdinaryBaskets(){
		$basketsContent = array();
		$counter = 1;
		foreach ( $this->ordinaryBaskets as $singleBasket ){
			$basketContent[$counter] = array( 
				'counter' => $counter, 
				'numbers' => implode( ", ", $singleBasket->getContent() )
				);
			$counter++;
		}
		return $basketContent;
	}

	public function generateUserBasket( $amount = null){
		$result = array();
		if ( $amount ){
			$this->userBasket = new UserBasket( $amount );
		} else {
			$this->userBasket = new UserBasket();
		}
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
					$taskB[$innerCounter] = array( 
						'basketNumber' => $counter + 1, 
						'numbers' => implode( ", ", $resultTaskB )
						);
					$innerCounter++;
				}
			}
			$counter++;
		}
		if ( isset ( $taskB )){
			return $taskB;
		} else {
			return 0;
		}
	}

	public function checkTaskC(){
		$taskC = array();
		$counter = 0;
		$innerCounter = 0;
		foreach ( $this->ordinaryBaskets as $singleBasket ){
			$resultTaskC = array_intersect( $singleBasket->getContent(), $this->userBasket->getContent()  );
			if ( count( $resultTaskC ) == 1 ){
				$taskC[$innerCounter] = array( 
					'basketNumber' => $counter + 1, 
					'number' =>implode( ", ", $resultTaskC ) 
					);
				$innerCounter++;
			}
			$counter++;
		}
		if ( isset ( $taskC )){
			return $taskC;
		} else {
			return 0;
		}
	}
}
