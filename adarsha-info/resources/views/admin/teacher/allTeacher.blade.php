@extends('admin.dashboard')
@section('title')
    Teacher
@endsection
@php 
	function convert_department($value){
		$values=[
			1=>'Scicence',
			2=>'Business Studies',
			3=>'Humanites',
			4=>'General',
		];
		return $values[$value];
	}
@endphp
@section('body')
<div class="breadcrumb-wrapper">
	    <div class="card-header">
            <h4 class="text-danger text-bold"> All Teacher
                <a href="{{route('add-teacher')}}" class="btn btn-danger btn-sm float-right">
                    <span class="mdi-hand-pointing-right"> </span>Add Teacher
                </a>
            </h4>
        </div>
    </div>
	@if($message   =   Session::get('message'))
        <h1 class="text-center text-primary" id="msg">{{ $message }}</h1>
    @endif
    <div class="row">
		<div class="col-12">
			<div class="card card-default">
				<div class="card-body">
					<div class="expendable-data-table">
						<table id="expendable-data-table" class="table display nowrap" style="width:100%">
							<thead>
								<tr class="text-center">
									<th>SL</th>
									<th>Name</th>
									<th>Designation </th>
									<th>Email</th>
									<th>Department</th>
									<th>Address</th>
									<th>Phone Nbr.</th>
									<th>Joining Date</th>
									<th>Image</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@php($i=1)
								@foreach($teacherDatas as $teacherData)
									<tr >
										<td class="details-control">{{ $i++ }}</td>
										<td class="text-center">{{ $teacherData->teacher_name }}</td>
										<td class="text-center">{{ $teacherData->designation }}</td>
										<td class="text-center">{{ $teacherData->teacher_email }}</td>
										<td class="text-center">{{ convert_department($teacherData->department) }}</td>
										<td class="text-center">{{ $teacherData->address }}</td>
										<td class="text-center">{{ $teacherData->teacher_phone }}</td>
										<td class="text-center">{{ $teacherData->joining_date }}</td>
										<td>
											<img src="{{asset( $teacherData->teacher_image)}} " width='80px'; height="60px" alt="not showing" style="border-radius:50%;">
										</td>
										<td class="text-center">
											<a href="{{route('edit-teacher',['id'=>$teacherData->id])}}" title="Edit" class="btn btn-outline-success btn-sm">
												<span class="mdi mdi-playlist-edit"></span>
											</a>
											<a href="{{route('teacher-pdf',['id'=>$teacherData->id])}}" class="btn btn-outline-success btn-sm" title="pdf">
												<span class=" mdi mdi-cloud-download"></span>
											</a>
											<a href="{{route('delete-student',['id'=>$teacherData->id])}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this ??')" id="delete" title="delete">
												<span class="mdi mdi-trash-can"></span>
											</a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection