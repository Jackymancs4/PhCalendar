<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CalendarController extends Controller
{

	public function yearView($year)
    {
        $YC=new Calendar\YearClass($year);
    	return view("date.yearView", ["year"=>$YC, "prevyear" => $YC->getPrev(), "nextyear" => $YC->getNext()]);
    }

    public function monthView($year, $month)
    {

        $MC=new Calendar\MonthClass($year, $month);
    	return view("date.monthView", ["month"=> $MC, "prevmonth" => $MC->getPrev(), "nextmonth" => $MC->getNext()]);
    }

    public function weekView($year, $month, $day)
    {
        $WC = new Calendar\WeekClass($year, $month, $day);
    	return view("date.weekView", ["week"=> $WC, "prevweek" => $WC->getPrev(), "nextweek" => $WC->getNext()]);
    }

    public function dayView($year, $month, $day)
    {
        $DC = new Calendar\DayClass($year, $month, $day);
        return view("date.dayView", ["day"=> $DC, "prevday" => $DC->getPrev(), "nextday" => $DC->getNext()]);
    }

}
