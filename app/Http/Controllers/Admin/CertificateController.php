<?php

namespace App\Http\Controllers\Admin;

use App\Certificates;
use App\Profile;
use App\User;
use DB;
use Validator;
use Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;


class CertificateController extends Controller
{
    public function index()
    {
      
      
        $user = Auth::user()->id;
        $certificate = DB::table('users')
        ->join('certificates','users.id','=','certificates.user_id')
        ->select('certificates.id as certid','users.id as userid','certificates.title','certificates.certificates','certificates.narrative_report')
        ->where('certificates.user_id','=',$user)
        ->paginate(15);
         $id=Auth::user()->id;
         $notifications = DB::table('notifications')
        ->where('user_id','=',$id)
        ->paginate(1);
        $countnotif=$notifications->count();
        

        
        
       return view ('certificate/view',compact('certificate','notifications','countnotif'));

    }


      public function store(Request $request)
    {
         $certificate = new Certificates();

        //Check that current user isn't editing themselves
            $request->validate([
            'user_id'=>['required','string','max:10'],
            'title'=>['required','string','max:50'],
            'narrative'=> ['mimes:docx,pdf,txt,odt,ott,sxw,stw|max:10048',],
            'certificate'=>['mimes:docx,pdf,odt,ott,sxw,stw,png,jpg,jpeg,bmp|max:10048',],
           
           	

            ]); 


       if (request()->has('narrative')) {

            $user=request('user_email');
            $file = $request->file('narrative');
            $extension = $file->getClientOriginalExtension();
            $filename = $user.time().'.'. $extension;
            $file->move('uploads/certificatesNarrative/',$filename);
            $certificate->narrative_report = $filename;
           
        }


       if (request()->has('certificate')) {

            $user=request('user_email');
            $file = $request->file('certificate');
            $extension = $file->getClientOriginalExtension();
            $filename = $user.time().'.'. $extension;
            $file->move('uploads/certificates/',$filename);
            $certificate->certificates = $filename;
           
        }
       
       

        $certificate->user_id=request('user_id');
        $certificate->title = request('title');
     
      
    $certificate->save();
    //return redirect('success','You Have successfully Created a Profile!');
    return redirect ()->back() ->with ('success',' Successfully Certificate Added!');
    }


    public function destroy($id)
    {
        //
        
        Certificates::destroy($id);
         return redirect ()->back() ->with ('success',' Successfully Certificate Deleted!');
    }


     public function delete($id)
    {
        //
        
        Certificates::find($id)->delete();
        return response()->json(['success' => 'success']);
    }

        public function edit($id) {
        $certificate = Certificates::find($id);
        return response()->json($certificate);
    }
}
