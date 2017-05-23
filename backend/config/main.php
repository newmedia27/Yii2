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
					'imagesStorePath' => '@frontend/upload/store', //path to origin images
					'imagesCachePath' => '@frontend/upload/cache', //path to resized copies
					'graphicsLibrary' => 'GD', //but really its better to use 'Imagick'
					'placeHolderPath' => '@webroot/images/placeHolder.png', // if you want to get placeholder when image not exists, string will be processed by Yii::getAlias
					'imageCompressionQuality' => 100, // Optional. Default value is 85.
				],
			],
		],
		'controllerMap' => [
			'elfinder' => [
				'class' => 'mihaildev\elfinder\PathController',
				'access' => ['@'],
				'root' => [
					'path' => '@frontend/upload/',
					'name' => 'Global'
				],
//					'watermark' => [
//						'source' => __DIR__ . '/logo.png', // Path to Water mark image
//						'marginRight' => 5,          // Margin right pixel
//						'marginBottom' => 5,          // Margin bottom pixel
//						'quality' => 95,         // JPEG image save quality
//						'transparency' => 70,         // Water mark image transparency ( other than PNG )
//						'targetType' => IMG_GIF | IMG_JPG | IMG_PNG | IMG_WBMP, // Target image formats ( bit-field )
//						'targetMinPixel' => 200         // Target image minimum pixel size
//					]
			]
		],
		'components' => [
			'request' => [
				'csrfParam' => '_csrf-backend',
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
				'baseUrl' => '',
				'enablePrettyUrl' => true,
				'showScriptName' => false,
				'rules' => [
				],
			],

//			'urlManagerFrontend' => [
//				'class' => 'yii\web\urlManager',
//				'baseUrl' => '',
//				'enablePrettyUrl' => true,
//				'showScriptName' => false,
//				'rules' => [
//					'product/<id:\d+>' => 'product/index',
//					'category/<id:\d+>/page/<page:\d+>' => 'category/view',
//					'category/<id:\d+>' => 'category/view',
//					'search' => 'category/search',
//					'cart/<id:\d+>'=>'cart/add',
//					'cart'=>'cart/view',
//				],
//			],
		
		],
		'params' => $params,
	];
