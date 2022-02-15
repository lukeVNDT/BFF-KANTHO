<?php
namespace App;
class cart{
	public $products = null;
	public $totalprice = 0;
	public $totalquantity = 0;

	public function _constant($cart){
		if($cart){
			$this->products = $cart->products;
			$this->totalprice = $cart->totalprice;
			$this->totalquantity = $cart->totalquantity;
		}
	}
	public function addtocart($product, $id){
		$newproduct = ['quantity'=> 0, 'price'=> $product->price, 'productinfo'=> $product];
		if($this->products){
			if(array_key_exists($id, $products)){
				$newproduct = $products[$id];
			}
		}
		$newproduct['quantity']++;
		$newproduct['price'] = $newproduct['quantity'] * $product->price;
		$this->products[$id] = $newproduct;
		$this->totalprice += $product->price;
		$this->totalquantity++;
	}
}
?>