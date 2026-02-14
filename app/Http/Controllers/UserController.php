<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\ContactMessage;

class UserController extends Controller
{
    public function dashboard(){
        if(Auth::check()&&Auth::user()->user_type=='user'){
            return view('dashboard');
        }elseif(Auth::check()&&Auth::user()->user_type=='admin'){
            return view('admin.dashboard');

        }else{
            return redirect('/');
        }

    }

    public function Index(){
        $doctors=Doctor::all();
        return view('index',compact('doctors'));
    }

    public function allDoctors(){
        $doctors=Doctor::all();
        return view('doctors',compact('doctors'));
    }

    public function MakeAnAppointment(Request $request){
        $appointment = new Appointment();
        $appointment->user_id = Auth::id();
        $appointment->full_name = $request->full_name;
        $appointment->email_address = $request->email_address;
        $appointment->submission_date = $request->submission_date;
        $appointment->speciality = $request->speciality;
        $appointment->number = $request->number;
        $appointment->message = $request->message;
        $appointment->save();
        return redirect()->back()->with('appointment_message','Appointment request sent Successfully!');
    }

    public function AboutUs(){
        return view('about');
    }

    public function contact(){
        return view('contact');
    }

    public function sendcontact(Request $request){
        ContactMessage::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);
        return redirect()->back()->with('success','Message sent Successfully');
    }

    public function Myappointments(){
        $userid=Auth::id();
        $appoint=Appointment::where('user_id',$userid)->get();
        return view('my_appointments',compact('appoint'));
    }
    public function Cancelappoint($id){
         $data=Appointment::find($id);
         if($data){
          $data->status='Canceled';
          $data->save();
          $data->delete();
         }
         
         return redirect()->back();
    }
}
