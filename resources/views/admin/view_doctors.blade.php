@extends('admin.maindesign')

@section('view_doctors')
<table class="table">
    <thead>
        <tr style="background-color: lightblue;">
            <th>Name</th>
            <th>Phone</th>
            <th>Speciality</th>
            <th>Room Number</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach($doctors as $doctor)
            <tr>
                <td>{{ $doctor->doctors_name }}</td>
                <td>{{ $doctor->doctors_phone }}</td>
                <td>{{ $doctor->speciality }}</td>
                <td>{{ $doctor->room_number }}</td>
                <td><img style="width: 100px; height: 100px; border-radius: 50%;" src="{{ asset('project_img/'.$doctor->doctor_image) }}" alt="{{ $doctor->doctor_image }}"></td>
                 <td><a class="btn btn-danger" href="{{ route('delete_doctor', $doctor->id) }}" style="text-decoration: none; padding: 10px; color: white;" onclick="return confirm('Are you sure you want to delete this doctor?')">Delete</a>
                 <a class="btn btn-primary" href="{{ route('update_doctor', $doctor->id) }}" style="text-decoration: none; padding: 10px; color: white;">Update</a></td>
            </tr>
            @endforeach
       
    </tbody>
    
</table>
@endsection