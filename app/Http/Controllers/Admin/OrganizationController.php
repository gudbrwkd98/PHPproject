<?php

namespace App\Http\Controllers\Admin;

use App\Organizations;
use App\Profile;
use App\User;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrganizationController extends Controller
{

     public function index()
    {
      
        $user = Auth::user()->id;
        $orgs = DB::table('users')
        ->join('organizations','users.id','=','organizations.user_id')
        ->select('organizations.id as orgid','users.id as userid','organizations.org_name','organizations.positionLvl')
        ->where('organizations.user_id','=',$user)
        
       ->get();
        $id=Auth::user()->id;
         $notifications = DB::table('notifications')
        ->where('user_id','=',$id)
        ->paginate(1);
        $countnotif=$notifications->count();
       return view ('organization/view',compact('orgs','notifications','countnotif'));

         //return view('organization/view')->with('orgs', Organizations::paginate(15));
    }


      public function store(Request $request)
    {
         $organization = new Organizations();
        //Check that current user isn't editing themselves
            $request->validate([
            'user_id'=>['required','string','max:10'],
            'org_name'=>['required','string','max:50'],
            'positionLvl'=>['required','string','max:20'],
           
            ]); 
       

        $organization->user_id=request('user_id');
        $organization->org_name = request('org_name');
        $organization->positionLvl = request('positionLvl');
      
    $organization->save();
    //return redirect('success','You Have successfully Created a Profile!');
    return redirect ()->back() ->with ('success',' Successfully Organization Added!');
    }


    public function destroy($id)
    {
        //
        
        Organizations::destroy($id);
         return redirect ()->back() ->with ('success',' Successfully Organization Deleted!');
    }


        public function edit($id) {
        $organization = Organizations::find($id);
        return response()->json($organization);
    }

      public function delete($id)
    {
        //
        
        Organizations::find($id)->delete();
        return response()->json(['success' => 'success']);
    }

    public function create(Request $request)
    { 

   
        Organizations::updateOrCreate(['id' => $request->id],
            [
               
                
                'org_name' => $request->orgs_name,
                'positionLvl' => $request->positionLvls,
                  
            ]);        
   
        return response()->json();
    }

     
}
