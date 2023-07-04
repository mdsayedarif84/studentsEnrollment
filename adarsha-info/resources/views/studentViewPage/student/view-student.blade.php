@extends('StudentViewPage.dashboard')
@section('title')
    ViewStudent
@endsection
@section('body')
<div class="bg-white border rounded">
  <div class="row no-gutters">
    <div class="col-lg-12 col-xl-12 col-sm-12">
      <div class="profile-content-left profile-left-spacing pt-5 pb-3 px-3 px-xl-5">
        <div class="card text-center widget-profile px-0 border-0">
          <div class="card-img mx-auto rounded-circle">
		  <img src="{{asset( $student->image)}}" width='100px'; height="100px" style="border-radius:50%;" alt="user image">
          </div>
          <div class="card-body">
            <h4 class="py-2 text-dark">{{ $student->name }}</h4>
            <p class="text-danger">{{ $student->email }}</p>
          </div>
        </div>
        <hr class="w-100">
		<div class="row">
		<div class="col-12 col-sm-12">
			<div class="card card-default">
				<div class="card-body">
					<div class="expendable-data-table">
						<table  class="table display nowrap" style="width:100%">
							<thead>
								<tr class="text-center">
									<th> ID </th>
									<th> Roll </th>
									<th> Father Name </th>
									<th> Mother Name </th>
									<th> Class</th>
									<th> Admission</th>
									<th>Address</th>
									<th>Phone Nbr.</th>
									<th>Create At</th>
							</thead>
							<tbody>
								<tr >
									<td class="text-center">{{ $student->id }}</td>
									<td class="text-center">{{ $student->roll }}</td>
									<td class="text-center">{{ $student->father_name }}</td>
									<td class="text-center">{{ $student->mother_name }}</td>
									<td class="text-center">{{ $student->class }}</td>
									<td class="text-center">{{ $student->admission_year }}</td>
									<td class="text-center">{{ $student->address }}</td>
									<td class="text-center">{{ $student->phone }}</td>
									<td class="text-center">{{ $student->created_at }}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
      </div>
    </div>
  </div>
</div>
@endsection