@extends('admin.dashboard')
@section('title')
    Ten
@endsection
@section('body')
    <div class="breadcrumb-wrapper">
	    <div class="card-header">
            <h4 class="text-danger text-bold"> All Ten Student
                <a href="{{route('all-student')}}" class="btn btn-danger btn-sm float-right">
                    <span class="mdi-hand-pointing-right"> </span>All Student
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
							<tr class="text-center">
								<th>SL</th>
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
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						@php($i=1)
                        @foreach($tenStuDatas as $tenStuData)
							<tr >
								<td class="details-control">{{ $i++ }}</td>
								<td class="text-center">{{ $tenStuData->stu_name }}</td>
								<td class="text-center">{{ $tenStuData->stu_roll }}</td>
								<td class="text-center">{{ $tenStuData->father_name }}</td>
								<td class="text-center">{{ $tenStuData->mother_name }}</td>
								<td class="text-center">{{ $tenStuData->stu_email }}</td>
								<td class="text-center">{{ $tenStuData->stu_class }}</td>
								<td class="text-center">{{ $tenStuData->admission_year }}</td>
								<td class="text-center">{{ $tenStuData->address }}</td>
								<td class="text-center">{{ $tenStuData->stu_phone }}</td>
								<td>
									<img src="{{asset( $tenStuData->stu_image)}} " width='80px'; height="60px" alt="not showing" style="border-radius:50%;">
								</td>
								<td class="text-center">
									<button class="btn btn-outline-primary btn-sm">View</button>
									<button class="btn btn-outline-success btn-sm">Edit</button>
									<button class="btn btn-outline-danger btn-sm">Delete</button>
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