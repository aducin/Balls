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

	public function generateUserBasket( $amount = null ){
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
		$taskB = array();
		$counter = 0;
		$innerCounter = 0;
		foreach ( $this->ordinaryBaskets as $singleBasket ){
			$tempIntersectionB = array_intersect( $singleBasket->getContent(), $this->userBasket->getContent()  );
			// I had doubts whether single ball (when ordinaryBasket contains only one ball) should be also valid or not.
			//Plural in this situation is not 100% clear so I decided so ("B. find baskets, that have only balls owned by the user")
			if ( $singleBasket->getCurrentAmount() == count( $tempIntersectionB ) ){
				$taskB[$innerCounter] = array( 
					'basketNumber' => $counter + 1, 
					'numbers' => implode( ", ", $tempIntersectionB )
					);
				$innerCounter++;
			}
			$counter++;
		}
		return count( $taskB ) ? $taskB : 0;
	}

	public function checkTaskC(){
		$taskC = array();
		$counter = 0;
		$innerCounter = 0;
		foreach ( $this->ordinaryBaskets as $singleBasket ){
			$tempIntersectionC = array_intersect( $singleBasket->getContent(), $this->userBasket->getContent()  );
			if ( count( $tempIntersectionC ) == 1 ){
				$taskC[$innerCounter] = array( 
					'basketNumber' => $counter + 1, 
					'number' =>implode( ", ", $tempIntersectionC ) 
					);
				$innerCounter++;
			}
			$counter++;
		}
		return count( $taskC ) ? $taskC : 0;
	}
}
