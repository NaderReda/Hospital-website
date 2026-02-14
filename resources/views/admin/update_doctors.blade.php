@extends('admin.maindesign')
<base href="/public">
@section('view_doctors')

@if(session('doctor_updatemessage'))
<div class="alert alert-success">
    {{ session('doctor_updatemessage') }}
</div>
@endif
<form action="{{ route('post_update_doctors',$doctor->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <input type="text" name="doctors_name" value="{{ $doctor->doctors_name }}"  placeholder="Enter Doctor's Name">
    </div>
    <br>
    <div>
        <input type="number" name="doctors_phone" value="{{ $doctor->doctors_phone }}" placeholder="Enter Doctor's Phone">
    </div>
    <br>
    <div>
        <input type="text" name="speciality" value="{{ $doctor->speciality }}" placeholder="Enter Doctor's speciality">
    </div>
    <br>
    <div>
        <input type="number" name="room_number" value="{{ $doctor->room_number }}" placeholder="Enter Room Number">
    </div>
    <br>
    <div>
        <label style="border-radius: 12px; padding: 8px;" class="bg bg-primary" for="doctor_image">Old Image</label><br>
        <img style="width: 100px; height: 100px; border-radius: 50%;" src="{{ asset('project_img/'.$doctor->doctor_image) }}" alt="{{ $doctor->doctor_image }}">
    </div>
    <br>
    <div>
        <label style="border-radius: 12px; padding: 8px;" class="bg bg-primary" for="doctor_image">Upload Doctor's Image Here</label><br>
        <input type="file" name="doctor_image">
    </div>
    <br>
    <div>
        <input class="btn btn-primary" type="submit" name="submit" value="Update Doctor">
    </div>
  
</form>







@endsection