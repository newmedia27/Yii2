<?php
	/**
	 * Created by PhpStorm.
	 * UserAdmin: jart
	 * Date: 18.05.2017
	 * Time: 14:13
	 */
	
	namespace frontend\models;
	
	
	use yii\db\ActiveRecord;
	
	class Cart extends ActiveRecord
	{
		public function behaviors()
		{
			return [
				'image' => [
					'class' => 'rico\yii2images\behaviors\ImageBehave',
				]
			];
		}
		public function addToCart($product, $quantity = 1)
		{
			$mainImg = $product->getImage();
			
			
			if (isset($_SESSION['cart'][$product['id']])) {
				$_SESSION['cart'][$product['id']]['count'] += $quantity;
			} else {
				$_SESSION['cart'][$product['id']] = [
					'count' => $quantity,
					'name' => $product['name'],
					'price' => $product['price'],
					'img' => $mainImg->getUrl('x100'),
				];
			}
			//count items in cart
			$_SESSION['cart.count'] = isset($_SESSION['cart.count']) ? $_SESSION['cart.count'] + $quantity : $quantity;
			//sum item in cart
			$_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $quantity * $product['price'] : $quantity * $product['price'];
		}
		
		public function recalc($id)
		{
			if (!isset($_SESSION['cart'][$id])){
				return false;
			}
			$dellItem = $_SESSION['cart'][$id]['count'];
			$dellSum = $_SESSION['cart'][$id]['count'] * $_SESSION['cart'][$id]['price'];
			$_SESSION['cart.count'] -= $dellItem;
			$_SESSION['cart.sum'] -= $dellSum;
			unset($_SESSION['cart'][$id]);
		}
	}