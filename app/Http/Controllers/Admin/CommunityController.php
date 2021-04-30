<?php

namespace App\Http\Controllers\Admin;

use App\Organizations;
use App\Communities;
use App\Profile;
use App\User;
use DB;
use Validator;
use Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;


class CommunityController extends Controller
{

     public function index()
    {
      
      
        $user = Auth::user()->id;
        $comm = DB::table('users')
        ->join('communities','users.id','=','communities.user_id')
        ->select('communities.id as commid','users.id as userid','communities.description','communities.narrative_report')
        ->where('communities.user_id','=',$user)
        
        ->get();
        $id=Auth::user()->id;
         $notifications = DB::table('notifications')
        ->where('user_id','=',$id)
        ->paginate(1);
        $countnotif=$notifications->count();

        
        
       return view ('community/view',compact('comm','notifications','countnotif'));

    }


      public function store(Request $request)
    {
         $comm = new Communities();

        //Check that current user isn't editing themselves
            $request->validate([
            'user_id'=>['required','string','max:10'],
            'desc'=>['required','string','max:50'],
            'narrative'=> ['mimes:docx,pdf,txt,odt,ott,sxw,stw|max:10048',],
           
            ]); 


       if (request()->has('narrative')) {

            $user=request('user_email');
            $file = $request->file('narrative');
            $extension = $file->getClientOriginalExtension();
            $filename = $user.time().'.'. $extension;
            $file->move('uploads/narrative/',$filename);
            $comm->narrative_report = $filename;
           
        }
        else
        {

            $comm->user_id=request('user_id');
        }
       

        $comm->user_id=request('user_id');
        $comm->description = request('desc');
     
      
    $comm->save();
    //return redirect('success','You Have successfully Created a Profile!');
    return redirect ()->back() ->with ('success',' Successfully Community Added!');
    }


    public function destroy($id)
    {
        //
        
        Communities::destroy($id);
         return redirect ()->back() ->with ('success',' Successfully Community Deleted!');
    }

     public function delete($id)
    {
        //
        
        Communities::find($id)->delete();
        return response()->json(['success' => 'success']);
    }
}
