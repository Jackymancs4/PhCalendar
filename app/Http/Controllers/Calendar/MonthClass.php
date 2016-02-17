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

    		$WC=new WeekClass($year, $month, 1);

    		for ($i=1; $i<=6; $i++) {

    			$this->weeks[$i]=$WC;
    			$WC=$WC->getNext();

          if($WC->days[1]->year!=$year) {
            $WC = new WeekClass($WC->days[1]->year, $WC->days[1]->month, $WC->days[1]->day, true, true);
          } elseif($WC->days[1]->month!=$month) {
            $WC = new WeekClass($WC->days[1]->year, $WC->days[1]->month, $WC->days[1]->day, true);
          }

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
