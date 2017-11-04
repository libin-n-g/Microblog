<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
	public function search(Request $request)
    {
   		$foundusers = User::where('name', 'like', '%' . ($request->name) . '%')->paginate(20);
    	return view('searchresult')->withUsers($foundusers);
    }
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(20);
        return view('searchresult')->withUsers($users);
    }
        
       //  public function search(Request $request)
   //  {
   //  	if ($request->ajax()) {
   //  		$foundusers = User::where('name', 'like', '%'.$request->search.'%')->get();
   //  	}
   //  	foreach ($$foundusers as $key => $founduser) {
			// $output.= '<tr>'.$founduser->name'</tr>';
   //  	}
   //  	return Response($output);
   //  }
}
