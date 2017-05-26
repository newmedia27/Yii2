<?php
	$params = array_merge(
		require(__DIR__ . '/../../common/config/params.php'),
		require(__DIR__ . '/../../common/config/params-local.php'),
		require(__DIR__ . '/params.php'),
		require(__DIR__ . '/params-local.php')
	);
	
	return [
		'id' => 'app-backend',
		'basePath' => dirname(__DIR__),
		'controllerNamespace' => 'backend\controllers',
		'bootstrap' => ['log'],
		'modules' => [
			'modules' => [
				'yii2images' => [
					'class' => 'rico\yii2images\Module',
					//be sure, that permissions ok
					//if you cant avoid permission errors you have to create "images" folder in web root manually and set 777 permissions
					'imagesStorePath' => '../../frontend/web/upload/store', //path to origin images
					'imagesCachePath' => '../../frontend/web/upload/cache', //path to resized copies
					'graphicsLibrary' => 'GD', //but really its better to use 'Imagick'
					'placeHolderPath' => '', // if you want to get placeholder when image not exists, string will be processed by Yii::getAlias
					'imageCompressionQuality' => 100, // Optional. Default value is 85.
				],
			],
		],
		
		'components' => [
			'request' => [
				'csrfParam' => '_csrf-backend',
//				'baseUrl' => 'http://admin.e-shop.local',
			],
			'user' => [
//        	'class'=>'yii\web\User',
				'identityClass' => 'common\models\User',
				'enableAutoLogin' => true,
				'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
			],
			
			
			'session' => [
				// this is the name of the session cookie used for login on the backend
				'name' => 'advanced-backend',
			],
			'log' => [
				'traceLevel' => YII_DEBUG ? 3 : 0,
				'targets' => [
					[
						'class' => 'yii\log\FileTarget',
						'levels' => ['error', 'warning'],
					],
				],
			],
			'errorHandler' => [
				'errorAction' => 'site/error',
			],
			
			
			'urlManager' => [
				'baseUrl' => 'http://admin.e-shop.local',
				'enablePrettyUrl' => true,
				'showScriptName' => false,
				'rules' => [
				],
			],

			'urlManagerFrontend' => [
				'class' => 'yii\web\urlManager',
				'baseUrl' => 'http://e-shop.local',
				'enablePrettyUrl' => true,
				'showScriptName' => false,
				'rules' => [
					'product/<id:\d+>' => 'product/index',
					'category/<id:\d+>/page/<page:\d+>' => 'category/view',
					'category/<id:\d+>' => 'category/view',
					'search' => 'category/search',
					'cart/<id:\d+>'=>'cart/add',
					'cart'=>'cart/view',
				],
			],
		
		],
		'params' => $params,
	];
