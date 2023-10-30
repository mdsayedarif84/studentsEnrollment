@extends('admin.dashboard')
@section('title')
    ManageSubject
@endsection
@section('body')
    <div class="breadcrumb-wrapper">
	    <div class="card-header">
            <h4 class="text-danger text-bold">  Manage Subject
                <a href="{{route('subject')}}" class="btn btn-danger btn-sm float-right">
                    <span class="mdi-hand-pointing-right"> </span>Add Subject
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
									<th> Subject Name</th>
									<th> Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@php($i=1) 
								@foreach($getSubjects as $getSubject)
									<tr >
										<td class="details-control">{{$i++}}</td>
										<td class="text-center">{{$getSubject->subject_name}}</td>
										<td class="text-center">{{$getSubject->status == 1 ? 'Active' : 'Inactive'}}</td>
										<td class="text-center">
											@if($getSubject->status == 1)
                                                <a class="btn btn-info btn-sm" href="{!! route('inactive-subject', ['id'=>$getSubject->id]) !!}" title="Active">
                                                    <span class="mdi mdi-arrow-up-bold"></span>
                                                </a>
                                            @else
                                                <a class="btn btn-warning btn-sm" href="{!! route('active-subject', ['id'=>$getSubject->id]) !!}" title="Inactive">
                                                    <span class=" mdi mdi-arrow-down-bold"></span>
                                                </a>
                                            @endif
											<a href="{!! route('edit-subject', ['id'=>$getSubject->id]) !!}" title="Edit" class="btn btn-outline-success btn-sm">
												<span class="mdi mdi-playlist-edit"></span>
											</a>
											<a href="" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this ??')" id="delete" title="delete">
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