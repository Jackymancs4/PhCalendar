<?php

namespace App\Http\Controllers\Calendar;

class WeekClass 
{
    public $year;
    public $month;
    public $day;

    public $days = array();

    public $nweek;

    function __construct($year, $month, $day) {

        $this->year=$year;
        $this->month=$month;
        $this->day=$day;

        $this->weekBuild($year, $month, $day, $out=false);

    }

    public function weekBuild ($year, $month, $day, $out=false) {

        $DC=new DayClass($year, $month, $day);

        //ISO-8601 numeric representation of the day of the week (1-7)
        $actualday=date("N", mktime(0,0,0,$month, $day, $year));

        for($i=1; $i<$actualday; $i++) {
            $DC=$DC->getPrev();
        }

        $this->nweek=date("W", mktime(0,0,0,$DC->month,$DC->day,$DC->year));

        for($i=1; $i<8; $i++) {
            $this->days[$i]=$DC;
            $DC=$DC->getNext();
        }

    }

    public function getPrev() {

        $firstDay= new DayClass($this->days[1]->year, $this->days[1]->month, $this->days[1]->day);
        $prev=$firstDay->DT->sub(new \DateInterval('P7D'));

        return new WeekClass ($prev->format('Y'), (int)$prev->format('m'), (int)$prev->format('d'));

    }

    public function getNext() {

        $firstDay= new DayClass($this->days[1]->year, $this->days[1]->month, $this->days[1]->day);
        $prev=$firstDay->DT->add(new \DateInterval('P7D'));

        return new WeekClass ($prev->format('Y'), (int)$prev->format('m'), (int)$prev->format('d'));

    }

}
