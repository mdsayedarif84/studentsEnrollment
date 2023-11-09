@extends('admin.dashboard')
@section('title')
    ClassWiseSubjectEdit
@endsection
@section('body')
    <div class="content-wrapper ">
        <div class="container">
            <marquee><h3 class="text-danger font-weight-bolder">Welcome Back Our Edit Class Subject Page.</h3></marquee>
            <div class="card">
                @if($message   =   Session::get('message'))
                    <h1 class="text-center text-primary" id="msg">{{ $message }}</h1>
                @endif
                <div class="card-body">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-danger text-bold"> Edit ClassWiseSubject
                                <a href="{{route('manage-ClassWiseSubject')}}" class="btn btn-danger btn-sm float-right">
                                    <span class="mdi-hand-pointing-right"> </span>Manage ClassWiseSubject</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form id="editData" action="{{route('save-classubject')}}" method="POST" enctype="multipart/form-data"  class="form-horizontal" >
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="class" class="col-sm-4 col-form-label text-right">Class Name</label>
                                        <div class="col-sm-8">
                                            
                                            <select name="class_id" class="form-select form-control @error('status') is-invalid @enderror" >
                                                <option  disabled selected >Select Class</option>
                                                @foreach($getClasses as $class)
                                                    <option value="{{$class->id}}" {{ $class->id === $classId->class_id ? 'selected' : '' }}>{{$class->class_name}}</option>
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
                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 col-form-label text-right">Choice Subject </label>
                                        <div class="col-sm-8">
                                            @foreach($getSubjects as $subject)
                                                <div class="form-check form-check-inline">
                                                    <input name="subjects[]" value="{{$subject->id}}"  class="form-check-input" type="checkbox" {{ in_array($subject->id, $classId->subjects->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                    <label class="form-check-label">{{$subject->subject_name}}</label>
                                                </div>
                                            @endforeach
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
    <script>
        document.forms['editData'].elements['status'].value = '{!! $class->status !!}';
    </script>
@endsection