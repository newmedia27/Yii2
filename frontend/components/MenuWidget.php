<?php
	/**
	 * Created by PhpStorm.
	 * UserAdmin: jart
	 * Date: 03.05.2017
	 * Time: 23:27
	 */
	
	/**
	 * this widget for build menu tree
	 */
	
	namespace frontend\components;
	
	use frontend\models\Categories;
	use Yii;
	use yii\base\Widget;
	
	class MenuWidget extends Widget
	{
		/**
		 * @var options menu (select || ul)
		 */
		public $tpl;
		/**
		 * @var options menu
		 */
		public $model;
		/**
		 * @var category on db []
		 */
		public $data;
		/**
		 * @var [] tree
		 */
		public $tree;
		/**
		 * @var Html menu from $tpl
		 */
		public $menuHtml;
		
		public function init()
		{
			parent::init();
			if ($this->tpl === null) {
				$this->tpl = 'menu';
			}
			$this->tpl .= '.php';
		}
		
		/**
		 * @return options
		 */
		public function run()
		{
			// get cache
			if ($this->tpl == 'upMenu.php') {
				$menu = Yii::$app->cache->get('menuKey');
			}
			
			if ($menu) return $menu;
			
			$this->data = Categories::find()->indexBy('id')->asArray()->all();
			$this->tree = $this->getTree();
			$this->menuHtml = $this->getMenuHtml($this->tree);
			
			// set cache
			if ($this->tpl == 'upMenu.php') {
			
			}
			
			
			return $this->menuHtml;
		}
		
		/**
		 * @return array
		 */
		protected function getTree()
		{
			$tree = [];
			foreach ($this->data as $id => &$node) {
				if (!$node['parent_id']) {
					$tree[$id] = &$node;
				} else {
					$this->data[$node['parent_id']]['child'][$node['id']] = &$node;
				}
			}
			
			return $tree;
		}
		
		/**
		 * @param $tree
		 * @return string
		 */
		protected function getMenuHtml($tree, $tab = '')
		{
			$str = '';
			foreach ($tree as $category) {
				$str .= $this->catToTemplate($category, $tab);
			}
			
			return $str;
		}
		
		/**
		 * @param $category
		 * @return string
		 */
		protected function catToTemplate($category, $tab)
		{
			ob_start();
			include __DIR__ . '/menu_tpl/' . $this->tpl;
			
			return ob_get_clean();
		}
		
	}