<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StorageController extends MainController
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(){
        $this->setClass('storage');
    }
    public function index()
    {
        $user=User::where('id',session('user')->id)->first();
        $courses=$user->courses()->paginate(10);
        return view('admin.storage.index',compact('courses'));
    }

   
    public function destroy(string $id)
    {
        Enrollment::where('user_id',session('user')->id)->where('course_id',$id)->delete();
        return redirect()->back();
    }
}
