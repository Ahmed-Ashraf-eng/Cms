<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role' , '!=' , 'admin')->get();
        return view('admin.index' , ['users'=> $users ]);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = User::where('role' , '!=' , null)->pluck('role')->unique();
      return view('admin.edit' , ['user' => $user , 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $validation = [
            'name' => 'required',
            'email' => "required|unique:users,email,$user->id",
            'role' => 'required'
        ];
        $this->validate($request , $validation);

        $user->update([
           'name' => $request->name,
           'email'=> $request->email,
           'role' => $request->role
        ]);

        return redirect(route('user.index'));

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
       $user->providers()->delete($user);
       $user->delete();

        return redirect(route('user.index'));
    }


    /*
    * check if the user isActive and can sign in or not
    */

    public function is_active(User $user){
        $user->is_active == 1 ? $user->is_active = 0 : $user->is_active = 1 ;
        $user->save();
        return redirect()->back();
    }


     /*
     *  view dashboard with the number of registerd users per day
     *
     */

    public function dashboardView(){
        $users = User::orderBy('created_at' , 'ASC')->where('role' , '!=' , 'admin')->get();
        $arrOfDates = [];
        foreach ($users as $user){
            $arrOfDates[] = $user->created_at->format('l j-n-Y');
        }
        $arrOfCounts = array_count_values($arrOfDates);


    return view('admin.dashboard' , ['arrOfCounts' => $arrOfCounts]);

    }


     /*
     * search for an exist user
     */
    public function search(Request $request){
        $search = $request->search ;
        $users = User::where('role' , '!=' , 'admin');

        if(!$search){
            return view('admin.index' , ['users'=> $users->get()]);
        }
        $users = $users->where('name'  , $search)->orwhere('email' , $search)->get();
        return view('admin.index' , ['users'=> $users ]);
    }



}
