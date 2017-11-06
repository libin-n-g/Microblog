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
    public function showuser($name)
    {
      $user = User::where('name', 'like', ($name))->first();
      return view('users.userpage')->withUser($user);
    }
    public function follow(Request $request, User $user)
    {
      if($request->user()->canFollow($user))
      {
        $request->user()->following()->attach($user);
      }
      return redirect()->back();
    }
    public function unfollow(Request $request, User $user)
    {
        if($request->user()->canUnfollow($user))
        {
          $request->user()->following()->detach($user);   
        }
        return redirect()->back();
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
