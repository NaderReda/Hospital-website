<?php

namespace App\Http\Controllers;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function addDoctors(){
        return view('admin.add_doctors');
    }

    public function postAddDoctors(Request $request){
        $doctor = new Doctor();
        $doctor->doctors_name = $request->doctors_name;
        $doctor->doctors_phone = $request->doctors_phone;
        $doctor->speciality = $request->speciality;
        $doctor->room_number = $request->room_number;
        $image = $request->doctor_image;
        if ($request->hasFile('doctor_image')) {
            $image = $request->doctor_image;
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move('project_img', $image_name);
    
            $doctor->doctor_image = $image_name;
        }
        $doctor->save();

      
        return redirect()->back()->with('doctor_addmessage','Doctor Added Successfully!');
    }   

    public function viewDoctors(){
        $doctors=Doctor::all();
        return view('admin.view_doctors',compact('doctors'));
    }

    public function deleteDoctor($id){
        $doctor=Doctor::find($id);
        $doctor->delete();
        return redirect()->back();
    }

    public function updateDoctor($id){
        $doctor=Doctor::find($id);
        return view('admin.update_doctors',compact('doctor'));
    }

    public function postUpdateDoctor(Request $request,$id){
        $doctor=Doctor::find($id);
        $doctor->doctors_name = $request->doctors_name;
        $doctor->doctors_phone = $request->doctors_phone;
        $doctor->speciality = $request->speciality;
        $doctor->room_number = $request->room_number;
        $image = $request->doctor_image;
        if ($request->hasFile('doctor_image')) {
            $image = $request->doctor_image;
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move('project_img', $image_name);
    
            $doctor->doctor_image = $image_name;
        }
        $doctor->save();
       
        return redirect()->back()->with('doctor_updatemessage','Doctor Updated Successfully!');
    }

    public function viewAppointment(){
        $appointments=Appointment::all();
        return view('admin.view_appointments',compact('appointments'));
    }

    public function changeStatus(Request $request,$id){
       $appiontment=Appointment::find($id);
       $appiontment->status=$request->status;
       $appiontment->save();
       return redirect()->back();

    }

  
}
