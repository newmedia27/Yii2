<?php
	
	
	namespace frontend\assets;
	
	use yii\web\AssetBundle;
	
	
	class TopAsset extends AssetBundle
	{
		public $basePath = '@webroot';
		public $baseUrl = '@web';
		public $css= [
			'css/style.css',
			'css/component.css',
			'css/flexslider.css',
			'css/main.css',
		];
	
		public $depends = [
			'yii\web\YiiAsset',
			'yii\bootstrap\BootstrapAsset',
		];
		public $jsOptions=['position' => \yii\web\View::POS_HEAD];
		public $cssOptions=['position' => \yii\web\View::POS_HEAD];
		
	}