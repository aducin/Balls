<?php

class Output{

	protected $twig;

	public function __construct(){
		$root_dir = $_SERVER['DOCUMENT_ROOT'].'/Balls';
		$vendor_dir = $root_dir.'/Vendor';
		$cache_dir = $root_dir.'/Cache';
		$templates_dir = $root_dir.'/Templates';
		$twig_lib = $vendor_dir.'/Twig/lib/Twig';
		require_once $twig_lib . '/Autoloader.php';
		Twig_Autoloader::register();
		$loader = new Twig_Loader_Filesystem( $templates_dir );
		$this->twig = new Twig_Environment( $loader, array(
			'cache' => $cache_dir,
		));
	}
}
