<?php

namespace App\Http\Controllers\Admin;


use App\Pictures;
use App\Profile;
use App\User;
use DB;
use Validator;
use Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class PictureController extends Controller
{

	  public function index()
    {
      
      
        $user = Auth::user()->id;
        $picture = DB::table('users')
        ->join('pictures','users.id','=','pictures.user_id')
        ->select('pictures.id as picid','users.id as userid','pictures.company','pictures.caption','pictures.pics')
        ->where('pictures.user_id','=',$user)
        
        ->get();
        $id=Auth::user()->id;
         $notifications = DB::table('notifications')
        ->where('user_id','=',$id)
        ->paginate(1);
        $countnotif=$notifications->count();

        
        
       return view ('picture/view',compact('picture','notifications','countnotif'));

    }
   public function create(Request $request)
    { 

        $request->validate([
            'user_id'=>['required','string','max:10'],
            'company'=>['required','string','max:50'],
            'caption'=>['required','string','max:250'],
            'pics'=>['mimes:png,jpg,jpeg,bmp|max:10048',]
           
            ]); 

        // if (request()->has('picture')) {

        //     $user=request('user_email');
        //     $file = $request->file('pic');
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = $user.time().'.'. $extension;
        //     $file->move('uploads/pics/',$filename);
        //     $picture->pics = $filename;
           
        // }

         if(Input::hasFile('picture')) {

        $path = "uploads/pics/";

        $file_name= Input::file('documents');   
        $original_file_name = $file_name->getClientOriginalName();

        $extension       = $file_name->getClientOriginalExtension();
        $fileWithoutExt  = str_replace(".","",basename($original_file_name, $extension));  
        $updated_fileName = $fileWithoutExt."_".rand(0,99).".".$extension; 

        $uploaded = $file_name->move($path, $updated_fileName);

        echo $updated_fileName;

    }

        else{
        Pictures::updateOrCreate(['id' => $request->id],
            [


                // 'user_id' => $request->user_id,
                // 'pics' => $request->picture,
                'company' => $request->company,
                'caption' => $request->caption,
                  
            ]); 
             
        }      
   
        return response()->json();
    }




     public function store(Request $request)
    {
         $picture = new Pictures();

        //Check that current user isn't editing themselves

            $request->validate([
            'user_id'=>['required','string','max:10'],
            'company'=>['required','string','max:50'],
            'caption'=>['required','string','max:250'],
            'pics'=>['mimes:png,jpg,jpeg,bmp|max:10048',]
           
            ]); 


       if (request()->has('pics')) {

            $user=request('user_email');
            $file = $request->file('pics');
            $extension = $file->getClientOriginalExtension();
            $filename = $user.time().'.'. $extension;
            $file->move('uploads/pics/',$filename);
            $picture->pics = $filename;
           
        }
        else
        {

            $picture->user_id=request('user_id');
        }
       

        $picture->user_id=request('user_id');
        $picture->company = request('company');
        $picture->caption = request('caption');
     
      
    $picture->save();
    //return redirect('success','You Have successfully Created a Profile!');
    return redirect ()->back() ->with ('success',' Successfully Picture Added!');
    }


     public function delete($id)
    {
        //
        
        Pictures::find($id)->delete();
        return response()->json(['success' => 'success']);
    }

    public function edit($id) {
        $picture = Pictures::find($id);
        return response()->json($picture);
    }

    public function update(Request $request){
        
        $picture = new Pictures();


       if (request()->has('picture')) {

            $user=request('user_email');
            $file = $request->file('pics');
            $extension = $file->getClientOriginalExtension();
            $filename = $user.time().'.'. $extension;
            $file->move('uploads/pics/',$filename);
            $picture->pics = $filename;
           
        }



        else
        {

            $picture->user_id=request('user_id');
        }
       

        $picture->user_id=request('user_id');
        $picture->company = request('company');
        $picture->caption = request('caption');
     
      
        $picture->save();
        //return redirect('success','You Have successfully Created a Profile!');
        return redirect ()->back() ->with ('success',' Successfully Picture Added!');
    }
}
