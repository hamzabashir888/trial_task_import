<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function index()
    {
        $users = User::get();

        return view('users', compact('users'));
    }
    public function import()
    {
        try{
        Excel::import(new UsersImport,request()->file('file'));
        return back();
        }
        catch (\Maatwebsite\Excel\Validators\ValidationException $failures)
        {
            return back()->with(['type' => 'success', 'title' => 'Import', 'message' =>$failures]);
        }
    }
}
