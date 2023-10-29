@extends('admin.dashboard')
@section('title')
    EditSubject
@endsection
@section('body')
    <div class="content-wrapper ">
        <div class="container">
            <marquee><h3 class="text-danger font-weight-bolder">Welcome Back Our Add Subject Page.</h3></marquee>
            <div class="card">
                @if($message   =   Session::get('message'))
                    <h1 class="text-center text-primary" id="msg">{{ $message }}</h1>
                @endif
                <div class="card-body">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-danger text-bold"> Edit Subject
                                <a href="{{route('manage-subject')}}" class="btn btn-danger btn-sm float-right">
                                    <span class="mdi-hand-pointing-right"> </span>Manage Subject</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('subject-update')}}" method="POST" id="editData" enctype="multipart/form-data"  class="form-horizontal" >
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="subject_name" class="col-sm-4 col-form-label text-right">Subject Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="subject_name" value="{{ $editSubject->subject_name }}" class="form-control @error('subject_name') is-invalid @enderror" id="name" placeholder="Enter name">
                                            <input type="hidden" name="sub_id" value="{{ $editSubject->id }}" class="form-control " >
                                            @error('subject_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->has('subject_name') ? $errors->first('subject_name') : ' '  }}</strong>
                                                </span>
                                            @enderror                                          
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="class" class="col-sm-4 col-form-label text-right">Class Name</label>
                                        <div class="col-sm-8">
                                            <select name="class_id" class="form-select form-control @error('status') is-invalid @enderror" >
                                                <option  disabled selected >Select Class</option>
                                                @foreach($getClasses as $value)
                                                    <option value="{{$value->id}}">{{$value->class_name}}</option>
                                                @endforeach                                            
                                            </select>
                                            @error('status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->has('status') ? $errors->first('status') : ' '  }}</strong>
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
        document.forms['editData'].elements['status'].value = '{!! $editSubject->status !!}';
        document.forms['editData'].elements['class_id'].value = '{!! $editSubject->class_id!!}';
    </script>
@endsection