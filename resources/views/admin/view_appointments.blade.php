@extends('admin.maindesign')

@section('view_appointments')
<table>
    <thead>
        <tr style="background-color: lightblue;">
            <th>Name</th>
            <th>Email</th>
            <th>Doctor</th>
            <th>Submission Date</th>
            <th>Speciality</th>
            <th>Number</th>
            <th>Message</th>
            <th>status</th>
            <th>Action</th>
           
        </tr>
        </thead>
        <tbody>
            @foreach($appointments as $appointment)
            <tr>
                <td>{{ $appointment->full_name }}</td>
                <td>{{ $appointment->email_address }}</td>
                <td>{{ $appointment->doctor }}</td>
                <td>{{ $appointment->submission_date }}</td>
                <td>{{ $appointment->speciality }}</td>
                <td>{{ $appointment->number }}</td>
                <td>{{ $appointment->message }}</td>
                <td>{{ $appointment->status }}</td>
                <td>
                    <form action="{{ route('changestatus',$appointment->id) }}" method="POST" class="d-flex align-items-center gap-2">
                      @csrf
                     <select name="status" id="status">
                      <option value="accept">Accept</option>
                      <option value="inprogress">in progress</option>
                     </select>
                     <input style="padding: 5px;" class="bg bg-primary" type="submit" name="submit" value="Change Status">
                   </form>
                </td>
            </tr>
            @endforeach
       
    </tbody>
    
</table>

@endsection