<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTeacherRequest;
use App\Models\Group;
use App\Models\Teacher;
use Illuminate\Http\Request;

class CreateTeacherController extends Controller
{
    public function index()
    {
        $groups = Group::all();

        return view('create_teacher', [
            'groups' => $groups
        ]);
    }


    public function create(CreateTeacherRequest $request)
    {
        $post = $request->validated();

        $teacher = new Teacher();
        $teacher->surname = $post['surname'];
        $teacher->name = $post['name'];
        $teacher->last_name =  $post['last_name'] ?? '';
        $teacher->save();

        if (isset($request['teacher_group'])) {
            foreach ($request['teacher_group'] as $group) {
                $teacher->groups()->attach($group);
            }
        }

        return redirect(route('teachers'));
    }
}
