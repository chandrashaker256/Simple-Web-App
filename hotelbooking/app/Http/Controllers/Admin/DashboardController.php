<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Contact;

class DashboardController extends Controller
{
    public function register(){
        $users = User::all();
        // return response()->json($users);
        // return User::all();
        return view('admin.register')->with('users',$users);
    }
    
    public function user_data(Request $request){
        // $users = User::all();
    $columnsArr = array(
      0 => 'name',
      1 => 'email',
      2 => 'usertype',
      3 => 'action',
    );

    $DatatableOrder = $columnsArr[$request->input('order.0.column')];
    $DatatableOrderDirection = $request->input('order.0.dir');
    $DatatableOffset = $request->input('start');
    $DatatableLimit = $request->input('length');

    $TotalUsers = User::get()->count();
   
    if ($request->input('search.value')) {

      $searchByUser = $request->input('search.value');

      $Users = User::where(function ($Query) use ($searchByUser) {
        $Query->where('name', 'like', "%" . $searchByUser . "%")
        ->orwhere('email', 'like', "%" . $searchByUser . "%");
      })->offset($DatatableOffset)
      ->limit($DatatableLimit)
      ->orderBy('id', 'desc')
      ->get();

      $TotalFilteredUsers = User::where(function ($Query) use ($searchByUser) {
        $Query->where('name', 'like', "%" . $searchByUser . "%");
      })->get()->count();
    } else {
      $Users = User::offset($DatatableOffset)
        ->limit($DatatableLimit)
        ->get();

      $TotalFilteredUsers = $TotalUsers;
    }

    $DataArray = array();

    foreach ($Users as $value) {

      $DataArray['name'] = $value->name;
      $DataArray['email'] = $value->email;
      $DataArray['usertype'] = $value->usertype;
      $DataArray['action'] = '<a href="/user-edit/'.$value->id. '"><i class="fas fa-edit"></i> </a> | <a class="del" href="/user-delete/' . $value->id . '"><i class="fas fa-trash-alt"></i></a>';

      $Records[] = $DataArray;
    }
    $ResponseArray = array(
      'draw' => $request->input('draw'),
      'recordsTotal' => $TotalUsers,
      'recordsFiltered' => $TotalFilteredUsers,
      'data' => $Records,
    );
    return response()->json($ResponseArray, 200);
    }

    public function registeredit(Request $request, $id){
        $users = User::findOrFail($id);
        return view('admin.registeredit')->with('users',$users);
    }

    public function registerupdate(Request $request, $id){
        $users = User::find($id);
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->usertype = $request->input('usertype');
        $users->update();
        return redirect('/user-roles')->with('status','Data is updated'); 
    }

    public function registerdelete($id){
        $users = User::findOrFail($id);
        $users->delete();
        return redirect('/user-roles')->with('status','Data is deleted');

    }

    public function contact(Request $request){
        $contact = new Contact();

        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->description = $request->input('description');
        $contact->save();

        return redirect('/contact')->with('status','Your contact saved successfully');
                            
    }
}
