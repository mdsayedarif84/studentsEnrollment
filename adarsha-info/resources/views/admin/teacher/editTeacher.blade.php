@extends('admin.dashboard')
@section('title')
    AddTeacher
@endsection
@section('body')
    <div class="content-wrapper ">
        <div class="container">
            <marquee><h3 class="text-danger font-weight-bolder">Welcome Back Our Add Teacher Page.</h3></marquee>
            <div class="card">
                @if($message   =   Session::get('message'))
                    <h1 class="text-center text-primary" id="msg">{{ $message }}</h1>
                @endif
                <div class="card-body">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-danger text-bold"> Add Teacher
                                <a href="{{route('all-teacher')}}" class="btn btn-danger btn-sm float-right">
                                    <span class="mdi-hand-pointing-right"> </span>All Teacher</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('update-teacher')}}" method="POST" id="editTeacherForm" enctype="multipart/form-data"  class="form-horizontal" >
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="teacher_name" class="col-sm-4 col-form-label text-right">Teacher Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="teacher_name" value="{{ $teacher->teacher_name }}" class="form-control @error('teacher_name') is-invalid @enderror" id="teacher_name">
                                            <input type="hidden" name="teacher_id" value="{{ $teacher->id }}" class="form-control @error('teacher_id') is-invalid @enderror" id="teacher_id">
                                            @error('teacher_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->has('teacher_name') ? $errors->first('teacher_name') : ' '  }}</strong>
                                                </span>
                                            @enderror                                          
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="teacher_email" class="col-sm-4 col-form-label text-right">Teacher Email</label>
                                        <div class="col-sm-8">
                                            <input id="teacher_email" type="email" name="teacher_email" value="{{ $teacher->teacher_email }}" class="form-control @error('teacher_email') is-invalid @enderror"  ">
                                            <span class="text-danger" id="res"></span>
                                            @error('teacher_email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->has('teacher_email') ? $errors->first('teacher_email') : ' '  }}</strong>
                                                </span>
                                            @enderror                                          
                                        </div>
                                    </div>
                                   
                                    <div class="form-group row">
                                        <label for="joining_date" class="col-sm-4 col-form-label text-right">Joining Date</label>
                                        <div class="col-sm-8">
                                            <input type="date" value="{{ $teacher->joining_date }}" name="joining_date" class="form-control @error('joining_date') is-invalid @enderror" >
                                            @error('joining_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->has('joining_date') ? $errors->first('joining_date') : ' '  }}</strong>
                                                </span>
                                            @enderror                                          
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="address" class="col-sm-4 col-form-label text-right">Address</label>
                                        <div class="col-sm-8">
                                            <input type="text" value="{{ $teacher->address }}" name="address" class="form-control @error('address') is-invalid @enderror" id="name" >
                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->has('address') ? $errors->first('address') : ' '  }}</strong>
                                                </span>
                                            @enderror                                          
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="teacher_phone" class="col-sm-4 col-form-label text-right">Teacher Phone</label>
                                        <div class="col-sm-8">
                                            <input type="number" value="{{ $teacher->teacher_phone }}" name="teacher_phone" class="form-control @error('teacher_phone') is-invalid @enderror" id="name">
                                            @error('teacher_phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->has('teacher_phone') ? $errors->first('teacher_phone') : ' '  }}</strong>
                                                </span>
                                            @enderror                                          
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="department" class="col-sm-4 col-form-label text-right">Department Teacher</label>
                                        <div class="col-sm-8">
                                            <select name="department" class="form-select form-control @error('department') is-invalid @enderror" >
                                                <option  disabled selected >department</option>
                                                <option value="1">Science</option>
                                                <option value="2">Business Studies</option>
                                                <option value="3">Humanities</option>
                                                <option value="4">General</option>
                                            </select>
                                            @error('department')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->has('department') ? $errors->first('department') : ' '  }}</strong>
                                                </span>
                                            @enderror 
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="designation" class="col-sm-4 col-form-label text-right">Designation</label>
                                        <div class="col-sm-8">
                                            <input type="text" value="{{ $teacher->designation }}" name="designation" class="form-control @error('designation') is-invalid @enderror" id="name">
                                            @error('designation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->has('designation') ? $errors->first('designation') : ' '  }}</strong>
                                                </span>
                                            @enderror                                          
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="teacher_image" class="col-sm-4 col-form-label text-right">Teacher Image</label>
                                        <div class="col-sm-4">
                                            <input type="file" value="{{ old('teacher_image') }}" name="teacher_image" class="form-control @error('teacher_image') is-invalid @enderror" id="name" >
                                            @error('teacher_image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->has('teacher_image') ? $errors->first('teacher_image') : ' '  }}</strong>
                                                </span>
                                            @enderror                                          
                                        </div>
                                        <div class="col-sm-4">
                                            <img src="{{asset($teacher->teacher_image)}}" width='80px'; height="60px">                                                                                    
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" :disabled="form.busy" class="btn btn-outline-success offset-sm-4">Update Data</button>
                                    <button type="reset" class="btn btn-outline-danger ">Reset</button>
                                </div>
                                <!-- /.card-footer -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.forms['editTeacherForm'].elements['department'].value = '{!! $teacher->department !!}';
    </script>
@endsection