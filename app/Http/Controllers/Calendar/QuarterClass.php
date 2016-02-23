<?php

namespace App\Http\Controllers\Calendar;

use App\Repositories\TodoRepository;

class QuarterClass 
{
    public $year;
    public $month;
    public $day;
    public $hour;
    public $quarter;

    public $dayindex;

    function __construct($year, $month, $day, $hour, $quarter) {
       
     	$this->year=$year;
    	$this->month=$month;
    	$this->day=$day;
        $this->hour=$hour;
        $this->quarter=$quarter;

        $this->dayindex=$this->getDayindex($hour, $quarter);

    }

    public function getDayindex($hour, $quarter) {
        return (($hour*4)+($quarter-1));
    }

    public function getPoolwindow() {

        $poolwindows = new TodoRepository();
        $actualday=date("N", mktime(0,0,0,$this->month, $this->day, $this->year));

        return $poolwindows->getPoolwindowsforHour($this->hour.":".(($this->quarter-1)*15).":00", $actualday);

    }

    public function roundQuarter($minutes) {

        return (round($minutes/15)+1);

    }

    public function getDayindexfromString ($string) {

        $timearray=explode(':', $string);

        //print_r($timearray); 

        $timearray[1]=($this->roundQuarter($timearray[1]));

        return $this->getDayindex($timearray[0], $timearray[1]);

    }

}
