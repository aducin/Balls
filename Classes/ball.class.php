<?php

class Ball {

	const minimumRange = 1;
	const maximumRange = 150;

	static function generateBall(){
		return mt_rand( self::minimumRange, self::maximumRange );
	}
}
