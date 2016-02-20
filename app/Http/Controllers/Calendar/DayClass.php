<?php

namespace App\Http\Controllers\Calendar;


class DayClass 
{
    public $year;
    public $month;
    public $day;

    public $DT;

    public $out_month=false;
    public $out_year=false;

    public $out="not";

    public $today=false;
    public $hours = array();

    function __construct($year=false, $month=false, $day=false) {
       
        if($year==false || $month==false || $day==false) {
            $year=date('Y');
            $month=date('m');
            $day=date('d');
        }

        if($year==date('Y') && $month==date('m') && $day==date('d')) {
            $this->today=true;
        }

        $this->year=$year;
    	$this->month=$month;
    	$this->day=$day;

    	$this->DT = new \DateTime();
        $this->DT->setDate($this->year, $this->month, $this->day);

        for ($i=1; $i<=24; $i++) {
            $this->hours[$i]= new HourClass($this->year, $this->month, $this->day, $i);
        }

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
