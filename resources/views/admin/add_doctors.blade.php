@extends('admin.maindesign')
@section('add_doctors')

@if(session('doctor_addmessage'))
<div class="alert alert-success">
    {{ session('doctor_addmessage') }}
</div>
@endif
<form action="{{ route('post_add_doctors') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <input type="text" name="doctors_name" placeholder="Enter Doctor's Name">
    </div>
    <br>
    <div>
        <input type="number" name="doctors_phone" placeholder="Enter Doctor's Phone">
    </div>
    <br>
    <div>
        <input type="text" name="speciality" placeholder="Enter Doctor's speciality">
    </div>
    <br>
    <div>
        <input type="number" name="room_number" placeholder="Enter Room Number">
    </div>
    <br>
    <div>
        <label style="border-radius: 12px; padding: 8px;" class="bg bg-primary" for="doctor_image">Upload Doctor's Image Here</label><br>
        <input type="file" name="doctor_image">
    </div>
    <br>
    <div>
        <input type="submit" name="submit" value="Add Doctor">
    </div>
  
</form>

@endsection