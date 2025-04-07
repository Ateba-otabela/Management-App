<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class profileController extends Controller
{
    public function profile(){
        return view('User.profiile');
    }

    public function setting(){
        return view('User.setting');
    }

    public function manage_task(){
        
        $todos = Todo::with('assignedTo')
        ->where('assigned_by', Auth::id())
        ->where('assigned_to', Auth::id())
        ->get();
        return view('Todo.Manage_task',compact('todos'));
    }

}