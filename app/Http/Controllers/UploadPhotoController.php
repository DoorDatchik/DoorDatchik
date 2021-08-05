<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use Couchbase\UserSettings;
use Illuminate\Http\Request;

class UploadPhotoController extends Controller
{
    public function index()
    {
        $groups = Group::where('name', '!=', '0')->get();
        $students = User::where('group_id', '!=', 1)->get();

        return view('uplod_files', [
            'groups' => $groups,
            'students' => $students
        ]);
    }

    public function upload(Request $request)
    {
        dd($request);
    }
}
