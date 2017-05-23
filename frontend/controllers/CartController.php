<?php
	/**
	 * Created by PhpStorm.
	 * UserAdmin: jart
	 * Date: 18.05.2017
	 * Time: 14:09
	 */
	
	namespace frontend\controllers;
	
	use frontend\models\Cart;
	use frontend\models\Order;
	use frontend\models\OrderItem;
	use frontend\models\Product;
	use Yii;
	
	class CartController extends AppController
	{
		/**
		 * @param $id
		 * @return bool|string
		 */
		public function actionAdd($id)
		{
			$quantity = (int)Yii::$app->request->get('quantity');
			$quantity = !$quantity ? 1 : $quantity;
			$product = Product::findOne($id);
			if (empty($product)) {
				return false;
			}
//			echo '<pre>';
//			print_r($product);
//			echo '</pre>';
			
			$session = Yii::$app->session;
			$session->open();
			$cart = new Cart();
			$cart->addToCart($product, $quantity);
			$this->layout = false;
			
			return $this->render('modalTableCart', ['session' => $session]);
		}
		
		/**
		 * @return string
		 */
		public function actionClear()
		{
			$session = Yii::$app->session;
			$session->open();
			$session->remove('cart');
			$session->remove('cart.count');
			$session->remove('cart.sum');
			$this->layout = false;
			
			return $this->render('modalTableCart', ['session' => $session]);
		}
		
		/**
		 * @return string
		 */
		public function actionDelItem()
		{
			$id = Yii::$app->request->get('id');
			$session = Yii::$app->session;
			$session->open();
			$cart = new Cart();
			$cart->recalc($id);
			$this->layout = false;
			
			return $this->render('modalTableCart', ['session' => $session]);
		}
		
		/**
		 * @return string
		 */
		public function actionShowCart()
		{
			$session = Yii::$app->session;
			$session->open();
			$this->layout = false;
			
			return $this->render('modalTableCart', ['session' => $session]);
		}
		
		/**
		 * @return string|\yii\web\Response
		 */
		public function actionView()
		{
			$session = Yii::$app->session;
			$session->open();
			$this->setMetaTags('Корзина');
			
			$order = new Order();
			
			if ($order->load(Yii::$app->request->post())) {
				$order['quantity'] = $session['cart.count'];
				$order['sum'] = $session['cart.sum'];
				
				if ($order->save()) {
					$this->saveOrderItem($session['cart'], $order['id']);
					
					Yii::$app->session->setFlash('success', 'Ваш заказ принят. Менеджер свяжеться с Вами в ближайшее время.');
					
//					//Send msil to client
//					Yii::$app->mailer->compose('orderCart', ['session' => $session])
//						->setFrom(['newmedia27@mail.ru'=>'E-SHOP'])
//						->setTo($order->email)
//						->setSubject('Заказ')
//						->send();
//
//					//Send mail to admin
//					Yii::$app->mailer->compose('orderCart', ['session' => $session])
//						->setFrom(['newmedia27@mail.ru'=>'E-SHOP'])
//						->setTo(Yii::$app->params['adminEmail'])
//						->setSubject('Заказ')
//						->send();
					
					//delete cart
					$session->remove('cart');
					$session->remove('cart.count');
					$session->remove('cart.sum');
					
					return $this->refresh();
				} else {
					Yii::$app->session->setFlash('error', 'error');
				}
				
				
			}
			
			
			return $this->render('view', ['session' => $session, 'order' => $order]);
		}
		
		protected function saveOrderItem($items, $order_id)
		{
			foreach ($items as $id => $item) {
				$orderItem = new OrderItem();
				$orderItem->order_id = $order_id;
				$orderItem->product_id = $id;
				$orderItem->name = $item['name'];
				$orderItem->price = $item['price'];
				$orderItem->quantity_item = $item['count'];
				$orderItem->sum_item = $item['count'] * $item['price'];
				$orderItem->save();
				
			}
		}
	}