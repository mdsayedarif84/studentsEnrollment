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
    <div class="row">
	<div class="col-12">
		<div class="card card-default">
			<div class="card-body">
				<div class="expendable-data-table">
					<table id="expendable-data-table" class="table display nowrap" style="width:100%">
						<thead>
							<tr>
								<th>ID</th>
								<th>Stu Name</th>
								<th>Stu Roll </th>
								<th>Father Name</th>
								<th>Mother Name</th>
								<th>Email</th>
								<th>Stu Class</th>
								<th>Admission Year</th>
								<th>Address</th>
								<th>Phone Nbr.</th>
								<th>Stu Image</th>
							</tr>
						</thead>
						<tbody>
						@php($i=1)
                        @foreach($stuDatas as $stuData)
							<tr>
								<td class="details-control">{{ $i++ }}</td>
								<td>{{ $stuData->stu_name }}</td>
								<td>{{ $stuData->stu_roll }}</td>
								<td>{{ $stuData->father_name }}</td>
								<td>{{ $stuData->mother_name }}</td>
								<td>{{ $stuData->stu_email }}</td>
								<td>{{ $stuData->stu_class }}</td>
								<td>{{ $stuData->admission_year }}</td>
								<td>{{ $stuData->address }}</td>
								<td>{{ $stuData->stu_phone }}</td>
								<td>
									<img src="{{asset( $stuData->stu_image)}} " width='100px'; height="50px" alt="not showing">
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection