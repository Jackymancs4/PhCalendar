<?php

namespace App\Http\Controllers\Calendar;

use App\Repositories\TodoRepository;

class HourClass 
{
    public $year;
    public $month;
    public $day;
    public $hour;

    public $quarters = array();

    function __construct($year, $month, $day, $hour) {
       
     	$this->year=$year;
    	$this->month=$month;
    	$this->day=$day;
        $this->hour=$hour;

        for ($i=1; $i<=4; $i++) {
            $this->quarters[$i]= new QuarterClass($this->year, $this->month, $this->day, $this->hour, $i);
        }
	}

    public function getPoolwindow() {

        $poolwindows = new TodoRepository();
        return $poolwindows->getPoolwindowsforHour($this->hour.":00:00");

    }

}
