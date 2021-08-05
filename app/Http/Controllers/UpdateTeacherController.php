<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateTeacherRequest;
use App\Models\Group;
use App\Models\Teacher;
use Illuminate\Http\Request;

class UpdateTeacherController extends Controller
{
    public function index($id)
    {
        $teacher = Teacher::with(['groups'])->findOrFail($id);
        $groups = Group::where('name', '!=', '0')->get();

        return view('update_teacher', [
            'teacher' => $teacher,
            'groups' => $groups
        ]);
    }

    public function update(UpdateTeacherRequest $request, $id)
    {
        $post = $request->validated();

        $teacher = Teacher::findOrFail($id);
        $teacher->surname = $post['surname'];
        $teacher->name = $post['name'];
        $teacher->last_name =  $post['last_name'] ?? '';
        $teacher->save();

        $this->updateGroups($teacher, $request['teacher_group'] ?? []);

        return redirect(route('teachers'));
    }

    private function updateGroups($teacher, $groups) {

        $updateGroups = [];

        foreach ($groups as $group) {
            if (isset($group)) {
                $updateGroups [] = $group;
            }
        }

        $teacher->groups()->sync($updateGroups);
    }
}
