<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        $params = $request->validate([
            'group' => 'sometimes',
            'date_start' => 'sometimes',
            'date_end' => 'sometimes',
            'full_name_teacher' => 'sometimes'
        ]);

        $lessons = DB::select("SELECT l.name,
        ( select group_concat( g.name ) from study.group_lessons as gl inner join study.groups as g on g.id = gl.group_id where gl.lesson_id = l.id ) as groupp,
        concat(t.name , ' ' , t.surname ,' ', t.last_name) as full_name, l.`start_time`, l.`finish_time`,  l.link
        FROM study.lessons as l inner join study.teachers as t on t.id = l.teacher_id ");

        if (isset($params['group']) && !empty($params['group'])) {
            $lessons = DB::select("SELECT l.`name`, g.`name` as groupp, concat(t.`name` , ' ', t.`surname` ,' ', t.`last_name`) as full_name,
            l.`start_time`, l.`finish_time`, l.`link`
            FROM study.lessons as l inner join study.teachers as t on t.`id` = l.`teacher_id` inner join study.group_lessons as gl
            on gl.`lesson_id` = l.`id` inner join study.groups as g on g.`id` = gl.`group_id` where g.`name` = " . $params['group']);
        }

        if (isset($params['date_start']) && !empty($params['date_start'])) {

            $date_start = new \DateTime($params['date_start']);
            $date_start = $date_start->format('Y-m-d H:m:s');
            $date_end = new \DateTime($params['date_end']);
            $date_end = $date_end->format('Y-m-d H:m:s');
            $lessons = DB::select("SELECT `l`.name,
            (select group_concat(`g`.name ) from study.group_lessons as gl inner join study.groups as g on g.id = gl.group_id where gl.lesson_id = l.id ) as groupp,
            concat(`t`.`name` , ' ' , `t`.`surname` ,' ', `t`.`last_name`) as full_name, `l`.`start_time`, `l`.`finish_time`,  `l`.`link`
            FROM study.lessons as l inner join study.teachers as t on `t`.`id` = `l`.`teacher_id`
            where `l`.`start_time` between '$date_start' and '$date_end'");
        }

        if (isset($params['full_name_teacher']) && !empty($params['full_name_teacher'])) {

            $full_name = $params['full_name_teacher'];
            $lessons = DB::select("SELECT `l`.name,
            (select group_concat(`g`.name ) from study.group_lessons as gl inner join study.groups as g on g.id = gl.group_id where gl.lesson_id = l.id ) as groupp,
            concat(`t`.`name` , ' ' , `t`.`surname` ,' ', `t`.`last_name`) as full_name, `l`.`start_time`, `l`.`finish_time`,  `l`.`link`
            FROM study.lessons as l inner join study.teachers as t on `t`.`id` = `l`.`teacher_id`
            where concat(`t`.`name` , ' ' , `t`.`surname` ,' ', `t`.`last_name`) = '$full_name'");
        }


        return view('home', [
            'lessons' => $lessons
        ]);
    }


}
