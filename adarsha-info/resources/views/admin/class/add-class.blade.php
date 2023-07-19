@extends('admin.dashboard')
@section('title')
    AddClass
@endsection
@section('body')
    <div class="content-wrapper ">
        <div class="container">
            <marquee><h3 class="text-danger font-weight-bolder">Welcome Back Our Add Student Page.</h3></marquee>
            <div class="card">
                @if($message   =   Session::get('message'))
                    <h1 class="text-center text-primary" id="msg">{{ $message }}</h1>
                @endif
                <div class="card-body">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-danger text-bold"> Add Class
                                <a href="{{route('manage-class')}}" class="btn btn-danger btn-sm float-right">
                                    <span class="mdi-hand-pointing-right"> </span>Manage Class</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('save-class')}}" method="POST" enctype="multipart/form-data"  class="form-horizontal" >
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-4 col-form-label text-right">Class Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="class_name" value="{{ old('class_name') }}" class="form-control @error('class_name') is-invalid @enderror" id="name" placeholder="Enter name">
                                            @error('class_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->has('class_name') ? $errors->first('class_name') : ' '  }}</strong>
                                                </span>
                                            @enderror                                          
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="class" class="col-sm-4 col-form-label text-right">Status</label>
                                        <div class="col-sm-8">
                                            <select name="status" class="form-select form-control @error('status') is-invalid @enderror" >
                                                <option  disabled selected >Select Status</option>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                                
                                            </select>
                                            @error('status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->has('status') ? $errors->first('status') : ' '  }}</strong>
                                                </span>
                                            @enderror 
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" :disabled="form.busy" class="btn btn-outline-success offset-sm-4">Save Data</button>
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
@endsection