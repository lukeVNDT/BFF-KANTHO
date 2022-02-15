<?php

namespace App\HelperClass;

class Recusive
{
	private $data;
	private $html = '';

	public function __construct($data){
		$this->data = $data;
	}

	public function Recusivecategory($parentid=0, $id = 0, $text = '') {
		foreach ($this->data as $value) {
			if($value['parent_id'] == $id)
			{
				if(!empty($parentid) && $parentid == $value['category_id'])
				{
				$this->html .= "<option selected value='".$value->category_id."'>". $text . $value['category_name']."</option>";

				}
				else
				{
					$this->html .= "<option value='".$value->category_id."'>". $text . $value['category_name']."</option>";
				}
				$this->Recusivecategory($parentid, $value['category_id'], $text. '--');
			}
		} 
		return $this->html;
	}
	
}