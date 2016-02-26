<?php

namespace App\Http\Controllers\Calendar;

class WeekClass 
{
    public $year;
    public $month;
    public $day;

    public $days = array();

    public $nweek;

    function __construct($year=false, $month=false, $day=false, $month_out=false, $year_out=false) {

        if($year==false || $month==false || $day==false) {
            $year=date('Y');
            $month=date('m');
            $day=date('d');
        }

        $this->year=$year;
        $this->month=$month;
        $this->day=$day;

        $this->weekBuild($year, $month, $day, $month_out, $year_out);

    }

    public function weekBuild ($year, $month, $day, $month_out=false, $year_out=false) {

        $DC=new DayClass($year, $month, $day);

        //ISO-8601 numeric representation of the day of the week (1-7)
        $nactualday=$DC->ndayweek;

        for($i=1; $i<$nactualday; $i++) {
            $DC=$DC->getPrev();
        }

        $this->nweek=date("W", mktime(0,0,0,$DC->month,$DC->day,$DC->year));

        for($i=1; $i<8; $i++) {

            if ($month_out==true || $month!=$DC->month) {
                //echo (int)$month_out."a";
                $DC->out="month";
            }

            if ($year_out==true || $year!=$DC->year) {
                $DC->out="year";
            }

            $this->days[$i]=$DC;
            $DC=$DC->getNext();
        }

    }

    public function getPrev($month_out=false, $year_out=false) {

        $firstDay= new DayClass($this->days[1]->year, $this->days[1]->month, $this->days[1]->day);
        $prev=$firstDay->DT->sub(new \DateInterval('P7D'));

        return new WeekClass ($prev->format('Y'), (int)$prev->format('m'), (int)$prev->format('d'), $month_out, $year_out);

    }

    public function getNext($month_out=false, $year_out=false) {

        $firstDay= new DayClass($this->days[1]->year, $this->days[1]->month, $this->days[1]->day);
        $prev=$firstDay->DT->add(new \DateInterval('P7D'));

        return new WeekClass ($prev->format('Y'), (int)$prev->format('m'), (int)$prev->format('d'), $month_out, $year_out);

    }

}
