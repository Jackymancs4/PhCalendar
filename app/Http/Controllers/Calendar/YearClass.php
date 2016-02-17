<?php

namespace App\Http\Controllers\Calendar;


class YearClass 
{
    public $year;

    public $months = array();

     function __construct($year) {
       
     	$this->year=$year;
     	$this->yearBuild($year);

   	}

	public function yearBuild ($year) 
	{

		$MC=new MonthClass($year, 1);

		for ($i=1; $i <= 12; $i++) { 
			$this->months[$i]=$MC;
			$MC=$MC->getNext();;
		}

	}

	public function getPrev() {

		$firstDay= new DayClass($this->year, 1, 1);

   		$prev=$firstDay->DT->sub(new \DateInterval('P1Y'));
   		return new YearClass ($prev->format('Y'), (int)$prev->format('m'));

   	}

   	public function getNext() {

		$firstDay= new DayClass($this->year, 1, 1);

   		$prev=$firstDay->DT->add(new \DateInterval('P1Y'));
   		return new YearClass ($prev->format('Y'), (int)$prev->format('m'));

   	}

}
