<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function addtsak(){
        $developer = User::where('role_id',2)->get();
        return view('pages/addtask',['developers'=>$developer]);

    }
    public function addDeveloperTsak(Request $request){
        $task_name = $request->post('name');
        $assigned_to = $request->post('assigned_to');
        $status = $request->post('status');
        $description = $request->post('description');
        $created_by = Auth::id();

        $task = new Task();
        $task->name = $task_name;
        $task->created_by = $created_by;
        $task->assigned_to = $assigned_to;
        $task->status = $status;
        $task->description = $description;
        $task->save();
        return redirect()->back();

    }
    public function mytask(){
        $mytask = Task::where('created_by',Auth::id())->with('assigned_to_developer')->get();

        return view('pages/mytask',['mytasks'=>$mytask]);

    }
    public function deletetask($id){
        Task::find($id)->delete();
        return redirect()->back();
    }
    public function edittask($id){
        $edit_task = Task::find($id);
        $developer = User::where('role_id',2)->get();

        return view('pages/edittask',['edit_task'=>$edit_task,'developers'=>$developer]);
    }
    public function editDeveloperTsak(Request $request){
        $task_id = $request->post('task_id');
        $task_name = $request->post('name');
        $assigned_to = $request->post('assigned_to');
        $status = $request->post('status');
        $description = $request->post('description');


        $task = Task::find($task_id);
        $task->name = $task_name;
        $task->assigned_to = $assigned_to;
        $task->status = $status;
        $task->description = $description;
        $task->save();
        return redirect()->route('mytask');

    }

    public function alltask(){
        $allTask = Task::with('assigned_to_developer')->get();

        return view('pages/alltask',['allTasks'=>$allTask]);
    }
    public function viewsingletask($id){
        $singleTask = Task::find($id);
        return view('pages/singletask',['singleTask'=>$singleTask]);

    }
    public function taskstatus(Request $request){
        $task_id = $request->get('task_id');
        $task_status = $request->get('task_status');
        $esit_status = Task::find($task_id);
        $esit_status->status = $task_status;
        $esit_status->save();

        return response()->json(['message'=>'Status change']);

    }
    public function search(Request $request){
        $search= $request->get('search');

        $result = Task::where('name', 'like', '%' . $search . '%')->get();
        return view('pages/searchresult',['result'=>$result]);

    }
}
