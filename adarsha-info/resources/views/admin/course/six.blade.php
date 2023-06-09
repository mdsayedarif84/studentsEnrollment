@extends('admin.dashboard')
@section('title')
    Six
@endsection
@section('body')
    <div class="breadcrumb-wrapper">
	    <div class="card-header">
            <h4 class="text-danger text-bold"> All Six Student
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
					<table id="expendable-data-table" class="table display table-hover nowrap" style="width:100%">
						<thead>
							<tr class="text-center">
								<th>SL</th>
								<th> Name</th>
								<th>Email</th>
								<th> Class</th>
								<th>Admission Year</th>
								<th>Address</th>
								<th>Phone Nbr.</th>
								<th> Image</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						@php($i=1)
                        @foreach($sixStuDatas as $sixStuData)
							<tr >
								<td class="details-control">{{ $i++ }}</td>
								<td class="text-center">{{ $sixStuData->name }}</td>
								<td class="text-center">{{ $sixStuData->email }}</td>
								<td class="text-center">{{ $sixStuData->class }}</td>
								<td class="text-center">{{ $sixStuData->admission_year }}</td>
								<td class="text-center">{{ $sixStuData->address }}</td>
								<td class="text-center">{{ $sixStuData->phone }}</td>
								<td>
									<img src="{{asset( $sixStuData->image)}} " width='80px'; height="60px" alt="not showing" style="border-radius:50%;">
								</td>
								<td class="text-center">
								<a href="{{route('view-student',['id'=>$sixStuData->id])}}" class="btn btn-outline-primary btn-sm">View</a>
								<a href="{{route('six-pdf',['id'=>$sixStuData->id])}}" class="btn btn-outline-success btn-sm" title="pdf">
											<span class=" mdi mdi-cloud-download"></span>
									PDF</a>
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