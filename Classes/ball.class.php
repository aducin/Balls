<?php

class Ball {

	const minimumRange = 1;
	const maximumRange = 999;

	static function generateBall(){
		return mt_rand( self::minimumRange, self::maximumRange );
	}
}
