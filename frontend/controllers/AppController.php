<?php
	/**
	 * Created by PhpStorm.
	 * UserAdmin: jart
	 * Date: 07.05.2017
	 * Time: 19:29
	 */
	
	namespace frontend\controllers;
	
	
	use yii\web\Controller;
	
	class AppController extends Controller
	{
		
		protected function setMetaTags($title = null, $keywords = null, $description = null)
		{
			
			$this->view->title = $title;
			$this->view->registerMetaTag(['name' => 'keywords', 'content' => "$keywords"]);
			$this->view->registerMetaTag(['name' => 'description', 'content' => "$description"]);
			
		}
		
	}