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
    public function index()
    {

        $lessons = DB::select("SELECT l.`name`, group_concat( g.`name` ) as groupp, concat(t.`name` , ' ', t.`surname` ,' ', t.`last_name`) as full_name,
            l.`start_time`, l.`finish_time`, l.`link`
            FROM study.lessons as l inner join study.teachers as t on t.`id` = l.`teacher_id` inner join study.group_lessons as gl
            on gl.`lesson_id` = l.`id` inner join study.groups as g on g.`id` = gl.`group_id`");

        return view('home', [
            'lessons' => $lessons
        ]);
    }


}
