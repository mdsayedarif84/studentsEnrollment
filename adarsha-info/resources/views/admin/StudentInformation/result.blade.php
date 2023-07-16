@extends('admin.dashboard')
@section('title')
    Result
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
                            <h4 class="text-danger text-bold"> Student Result Sheet
                                <a href="{{route('all-student')}}" class="btn btn-danger btn-sm float-right">
                                    <span class="mdi-hand-pointing-right"> </span>All Student</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('save-student')}}" method="POST" enctype="multipart/form-data"  class="form-horizontal" >
                                @csrf
                                <div class="card-body">
                                    
                                    <div class="form-group row">
                                        <label for="class" class="col-sm-4 col-form-label text-right">Sudent Class</label>
                                        <div class="col-sm-8">
                                            <select name="class" class="form-select form-control @error('class') is-invalid @enderror" >
                                                <option  disabled selected >Student Class</option>
                                                <option value="six">Six</option>
                                                <option value="seven">Seven</option>
                                                <option value="eight">Eight</option>
                                                <option value="nine">Nine</option>
                                                <option value="ten">Ten</option>
                                                <option value="ssc">SSC</option>
                                            </select>
                                            @error('class')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->has('class') ? $errors->first('class') : ' '  }}</strong>
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