<?php
	
	namespace frontend\assets;
	
	use yii\web\AssetBundle;
	
	/**
	 * Main frontend application asset bundle.
	 */
	class AppAsset extends AssetBundle
	{
		public $basePath = '@webroot';
		public $baseUrl = '@web';
		
		public $js = [
			'js/main.js',
			'js/imagezoom.js',
			'js/responsive-tabs.js',
			'js/tabs.js',
			'js/test.js',
			'js/responsiveslides.min.js',
			'js/jquery.flexisel.js',
			'js/cbpViewModeSwitch.js',
			'js/classie.js',
			'js/jquery.flexslider.js',
		];
		
		
	}
