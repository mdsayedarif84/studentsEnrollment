@extends('admin.dashboard')
@section('title')
    ManageClasswiseSubject
@endsection
@section('body')
    <div class="breadcrumb-wrapper">
	    <div class="card-header">
            <h4 class="text-danger text-bold">  Manage ClassWiseSubject
                <a href="{{route('add-classBaseSubject')}}" class="btn btn-danger btn-sm float-right">
                    <span class="mdi-hand-pointing-right"> </span>Add ClassWiseSubject
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
								<tr>
									<th>SL</th>
									<th> Class Name</th>
									<th> Subject Name</th>
									<th> Status</th>
								</tr>
							</thead>
							<tbody>
								@php($i=1)
								@foreach($classWiseData as  $item)
									<tr >
										<td class="details-control">{{$i++}}</td>
										<td class="text-center">{{$item['class_name']}}</td>
										<td>
                                            @foreach($item['subjects']  as  $subName)
                                                <span class="badge bg-danger ">{{ $subName}}</span>
                                            @endforeach
                                        </td>
										<td class="text-center">{{$item['status']}}</td>
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