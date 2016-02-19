<?php

namespace App\Http\Controllers\Calendar;


class QuarterClass 
{
    public $year;
    public $month;
    public $day;
    public $hour;


    function __construct($year, $month, $day, $hour, $quarter) {
       
     	$this->year=$year;
    	$this->month=$month;
    	$this->day=$day;
        $this->hour=$hour;
        $this->quarter=$quarter;

}
