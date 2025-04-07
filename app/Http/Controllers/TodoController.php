<?php

namespace App\Http\Controllers;
use App\Mail\taskadded;
use App\Models\Todo;
use App\Models\User;
use App\Notifications\Todoassigned;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class TodoController extends Controller
{
    public function index(){
        return view('Todo.index');
    }
    public function Task_list(){
        $todos = Todo::with('assignedBy')
               ->where('assigned_to', Auth::id())
               ->where('assigned_by', '!=', Auth::id())
               ->get();
         //dd($todos);
        
        $users = User::all();
        return view('Todo.Task_List', compact('users', 'todos'));
    }
    public function Add_task(){
        $users = User::all();
        return view('Todo.add_task',compact('users'));
    }
    public function User_todo(){
        $todos = Todo::all();
        return view('Todo.User_todo', compact('todos'));
    }
    public function create_todo(Request $request){
        
        //validate the form
       $validated = $request->validate([
         'title' => ['required','string','max:225'],
         'date' => ['required', 'date'],
         'time' => ['required'],
         
         
        ]);
   //dd($validated);
    //create new todo
    $todo = Todo::create([
        'assigned_by' => Auth::user()->id,
        'assigned_to' => Auth::user()->id,
        'title' => request('title'),
        'date' => request('date'),
        'time' => request('time')
    ]);
    Mail::to($todo->assignedTo->email)->send(
        new taskadded($todo)
     );

        return redirect('manage_task')->with('success', 'Todo item created succesfullly!');
    }
    public function delete_todo($id)
    {   
        $todo = Todo::find($id);
        if (Gate::denies('action', $todo)){
            abort(403);
        }
        // Find the todo item by its ID
        
    
        // Check if the todo item exists
        if (!$todo) {
            // If not found, redirect back with an error message
            return back()->with('error', 'Todo item not found.');
        }
    
        // Delete the todo item
        
        if ($todo->assignedBy->isNot(Auth::user())){
            abort(403);
        }
        $todo->delete();
        // Redirect back with a success message
        return back()->with('success', 'Todo item deleted successfully!');
    }
    
 
    public function search(Request $request){
        //dd('ok');
        $search = $request->search;

        $todos = Todo::where('title','LIKE','%'.$search.'%')
        ->orwhere('Status','LIKE','%'.$search.'%')
        ->orwhere('Date','LIKE','%'.$search.'%')
        ->orwhere('Time','LIKE','%'.$search.'%')->get();
        return view('Todo.Manage_task',compact('todos'));
    }
    public function edit_show($id){
        $todo = Todo::findorfail($id);

        Gate::define('edit-todo', function(User $user,Todo $todo){
            return $todo->assignedBy->is($user);
            
           });

        if (Auth::guest()){
            return redirect('/login');
        }
        //check if the user who assigned this todo is the want that is currently auth
     
       
        Gate::authorize('edit-todo', $todo);

         return view('Todo.edit',compact('todo'));
    }
   
public function update_todo(Request $request, $id)
{    
    //dd($request);
    
    // Find the todo by ID
    // Validate the incoming request data
    $validate = $request->validate([
        'title' => 'required|string|max:255',
        'date' => 'required|date',
        'time' => 'required',
        'status' => 'required'
    ]);
    $todo = Todo::findorfail($id);
     //dd($todo);
    // Update the todo item with the validated data
     $todo->update($validate);


    // Redirect back with a success message
    return redirect('manage_task')->with('success', 'Todo edited successfully');
}

public function assignTodo(Request $request)
{
    //dd($request->title);
    $request->validate([
        'assigned_to' => 'required|exists:users,id',
        'title' => 'required|string|max:255',
        'date' => 'required',
        'time' =>'required',
        
    ]);
  
    $todo = Todo::create([
        'assigned_by' => auth()->id(), // The logged-in user
        'assigned_to' => $request->assigned_to, // The user who gets the task
        'title' => $request->title,
        'date' => $request->date,
        'time' => $request->time
    ]);
    //dd($todo);

    $assignedUser = User::find($request->assigned_to);
    $assignedUser->notify(new TodoAssigned($todo)); // Send notification

    return back()->with('success','Task assigned successfully!');
}
public function showAssignForm()
{
    $users = User::all(); // Get all users
    return view('Todo.assign-task', compact('users')); // Send users to the view
}
}
