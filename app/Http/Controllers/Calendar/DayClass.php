<?php

namespace App\Http\Controllers\Calendar;


class DayClass 
{
    public $year;
    public $month;
    public $day;

    public $DT;

    public $in_month;
    public $in_year;

     function __construct($year, $month, $day) {
       
     	  $this->year=$year;
    		$this->month=$month;
    		$this->day=$day;

    		$this->DT = new \DateTime();
        $this->DT->setDate($year, $month, $day);

   	}

   	public function getPrev() {

        $newday = new DayClass($this->year, $this->month, $this->day);
     		$prev=$newday->DT->sub(new \DateInterval('P1D'));

     		return new DayClass ($prev->format('Y'), (int)$prev->format('m'), (int)$prev->format('d'));

   	}

   	public function getNext() {

        $newday = new DayClass($this->year, $this->month, $this->day);
     		$prev=$newday->DT->add(new \DateInterval('P1D'));
        
     		return new DayClass ($prev->format('Y'), (int)$prev->format('m'), (int)$prev->format('d'));

   	}

    public function getWeekNumber () {
        return date("N", mktime(0,0,0, $this->month, $this->day, $this->year));
    }

}
