@extends('admin.dashboard')
@section('title')
    AllStudent
@endsection
@section('body')
    <div class="breadcrumb-wrapper">
	    <div class="card-header">
            <h4 class="text-danger text-bold"> All Student
                <a href="{{route('add-student')}}" class="btn btn-danger btn-sm float-right">
                    <span class="mdi-hand-pointing-right"> </span>Add Student
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
									<th>Stu Name</th>
									<th>Stu Roll </th>
									<th>Email</th>
									<th>Stu Class</th>
									<th>Address</th>
									<th>Phone Nbr.</th>
									<th>Stu Image</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							@php($i=1)
							@foreach($stuDatas as $stuData)
								<tr >
									<td class="details-control">{{ $i++ }}</td>
									<td class="text-center">{{ $stuData->stu_name }}</td>
									<td class="text-center">{{ $stuData->stu_roll }}</td>
									<td class="text-center">{{ $stuData->stu_email }}</td>
									<td class="text-center">{{ $stuData->stu_class }}</td>
									<td class="text-center">{{ $stuData->address }}</td>
									<td class="text-center">{{ $stuData->stu_phone }}</td>
									<td>
										<img src="{{asset( $stuData->stu_image)}} " width='80px'; height="60px" alt="not showing" style="border-radius:50%;">
									</td>
									<td class="text-center">
										<a href="{{route('view-student',['id'=>$stuData->id])}}" class="btn btn-outline-primary btn-sm">View</a>
										<a href="{{route('edit-student',['id'=>$stuData->id])}}" class="btn btn-outline-success btn-sm">Edit</a>
										<a href="{{route('delete-student',['id'=>$stuData->id])}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this ??')" id="delete" title="delete">Delete</a>
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