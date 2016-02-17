<?php

namespace App\Http\Controllers\Calendar;


class MonthClass 
{
    public $year;
    public $month;

    public $weeks = array();

    function __construct($year, $month) {
       
     	$this->year=$year;
		$this->month=$month;

		$this->monthBuild ($year, $month);

   	}

   	public function monthBuild ($year, $month) {

        $day=1;
		$WC=new WeekClass($year, $month, $day);

		for ($i=1; $i<=6; $i++) {

			$this->weeks[$i]=$WC;
			$WC=$WC->getNext();

		}

	}

	public function getPrev() {

	 	  $firstDay= new DayClass($this->year, $this->month, 1);

   		$prev=$firstDay->DT->sub(new \DateInterval('P1M'));
   		return new MonthClass ($prev->format('Y'), (int)$prev->format('m'));

   	}

   	public function getNext() {

		  $firstDay= new DayClass($this->year, $this->month, 1);

   		$prev=$firstDay->DT->add(new \DateInterval('P1M'));
   		return new MonthClass ($prev->format('Y'), (int)$prev->format('m'));

   	}

}
