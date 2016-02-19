<?php

namespace App\Http\Controllers\Calendar;


class HourClass 
{
    public $year;
    public $month;
    public $day;
    public $hour;


    function __construct($year, $month, $day, $hour) {
       
     	$this->year=$year;
    	$this->month=$month;
    	$this->day=$day;
        $this->hour=$hour;


}
