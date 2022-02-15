<?php

namespace App\HelperClass;

class Date
{
	public static function getallday(){
		$arrday = [];
		$month = date('m');
		$year = date('Y');
		//get all day in month
		for ($date = 1; $date <= 31; $date ++) 
		{
			$time = mktime(12,0,0, $month, $date, $year);
			if(date('m',$time)== $month)
				$arrday[] = date('Y-m-d', $time);
		}
		return $arrday;
	}
}