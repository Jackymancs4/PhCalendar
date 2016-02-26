<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\TodoRepository;
use App\Pool;
use App\Poolwindow;
use App\Todo;

class CalendarController extends Controller
{

    public function __construct()
    {
        $this->middleware('date');
    }

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

    public function getAllPoolWindows() {

        $repo=new TodoRepository();
        return $repo->getAllPoolWindows();

    }

    public function getAllLeafTodos() {

        $repo=new TodoRepository();
        $list=array();

        foreach($repo->getAllTodos() as $todo) {
            if($todo->childRelation->count() == 0) {
                $list[$todo->id]=$todo;
            }
        }

        return $list;

    }

    public function weekView($year, $month, $day)
    {

        $table=array();

        $actualday=new Calendar\DayClass();

        $todolist=$this->getAllLeafTodos();
        $pwlist=$this->getAllPoolWindows();

        $lastweekday=$actualday->ndayweek;


        while (count($todolist)!=0) {

            foreach ($pwlist as $poolwindow) {

                if ($poolwindow->weekday >= $actualday->ndayweek) {

                    //echo "actualday:".$actualday->ndayweek." - lastweek:".$lastweekday." - poolweek:".$poolwindow->weekday."<br>";

                    if($actualday->ndayweek<= $poolwindow->weekday) {
                        $distance=$poolwindow->weekday-$actualday->ndayweek;
                    } else {
                        $distance=7-$actualday->ndayweek+$poolwindow->weekday;
                    }

                    echo "distance:".$distance."<br>";
                    for ($i=0; $i < $distance; $i++) {
                        $actualday=$actualday->getNext();
                    }

                    $endquarter=$actualday->hours[1]->quarters[1]->getDayindexfromString ($poolwindow->end_time);
                    $startquarter=$actualday->hours[1]->quarters[1]->getDayindexfromString ($poolwindow->start_time);

                    $dimension=($endquarter-$startquarter)*15;

                    //echo "poolid:".$poolwindow->id."- poolweek:".$poolwindow->weekday."- dimension:".$dimension."<br>";

                    foreach($todolist as $todo) {

                        if($todo->pool==$poolwindow->pool && ($dimension-$todo->duration)>0) {
                            $table[$poolwindow->id.$actualday->day.$actualday->month.$actualday->year][]=$todo->name;
                            unset($todolist[$todo->id]);
                            $lastweekday=$actualday->ndayweek;
                            $dimension-=$todo->duration;

                            //echo "todoid:".$todo->id."- dimension".$dimension."<br>";

                        }

                    }
                
                }

            }
            $actualday=$actualday->getNext();
           
        }

        $WC = new Calendar\WeekClass($year, $month, $day);
        return view("date.weekView", ["week"=> $WC, "prevweek" => $WC->getPrev(), "nextweek" => $WC->getNext(), "list" => $table]);
    }

    public function dayView($year, $month, $day)
    {
        $DC = new Calendar\DayClass($year, $month, $day);
        return view("date.dayView", ["day"=> $DC, "prevday" => $DC->getPrev(), "nextday" => $DC->getNext()]);
    }

    public function todayView() {

        $WC = new Calendar\WeekClass(date('Y'), (int)date('m'), (int)date('d'));
        return view("date.weekView", ["week"=> $WC, "prevweek" => $WC->getPrev(), "nextweek" => $WC->getNext()]);

    }


}
