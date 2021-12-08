<?php  
namespace App\Helpers;
use Carbon\Carbon;
class Date
{
	public static function getListDayMonth(){
		$arrayDay = [];
		$month = date('m');
		$year = date('Y');
		//lay full ngay trong thang
		for ($day = 1; $day<=31; $day++)
		{
			$time = mktime(12, 0, 0, $month,$day,$year);
			if(date('m',$time)==$month)
				$arrayDay[] = date('Y-m-d',$time);
		}

		return $arrayDay;
	}

	public static function getLastDayMonth(){
		$arrayLast = [];
		$month = date('m',strtotime("-1 month"));
		$year = date('Y');
		//lay full ngay trong thang
		for ($day = 1; $day<=31; $day++)
		{
			$time = mktime(12, 0, 0, $month,$day,$year);
			
			if(date('m',$time)==$month)
				$arrayLast[] = date('Y-m-d',$time);
		}
		// dd($arrayLast);
		return $arrayLast;
	}
}

?>