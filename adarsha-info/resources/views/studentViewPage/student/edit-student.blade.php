@extends('admin.dashboard')
@section('title')
    EditStudent
@endsection
@section('body')
    <style>
        .showPassword {
            position: relative;
        }
        .showPassword i{
            position: absolute;
            margin-left: 570px;
            bottom: 10px;
            cursor: pointer;
        }
    </style>
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
                            <h4 class="text-danger text-bold"> Edit Student
                                <a href="{{route('all-student')}}" class="btn btn-danger btn-sm float-right">
                                    <span class="mdi-hand-pointing-right"> </span>All Student</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('update-student')}}" method="POST" id="editCategoryForm" enctype="multipart/form-data"  class="form-horizontal" >
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="name"  class="col-sm-4 col-form-label text-right">Student Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="name" value="{{ $student->name }}" class="form-control" id="stu_name">
                                            <input type="hidden" name="stu_id" value="{{ $student->id }}" class="form-control" id="stu_id">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->has('name') ? $errors->first('name') : ' '  }}</strong>
                                                </span>
                                            @enderror                                          
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="roll" class="col-sm-4 col-form-label text-right">Student Roll</label>
                                        <div class="col-sm-8">
                                            <input type="number" name="roll" value="{{ $student->roll }}" class="form-control" id="name" >
                                            @error('roll')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->has('roll') ? $errors->first('roll') : ' '  }}</strong>
                                                </span>
                                            @enderror                                          
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="father_name" class="col-sm-4 col-form-label text-right">Father Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="father_name" value="{{ $student->father_name }}" class="form-control " id="name">
                                            @error('father_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->has('father_name') ? $errors->first('father_name') : ' '  }}</strong>
                                                </span>
                                            @enderror                                          
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="mother_name" class="col-sm-4 col-form-label text-right">Mother Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="mother_name" value="{{ $student->mother_name }}" class="form-control " id="mother_name">
                                            @error('mother_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->has('mother_name') ? $errors->first('mother_name') : ' '  }}</strong>
                                                </span>
                                            @enderror                                          
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-4 col-form-label text-right">Student Email</label>
                                        <div class="col-sm-8">
                                            <input id="email" type="email" name=_email" value="{{ $student->email }}" class="form-control " >
                                            <span class="text-danger" id="res"></span>
                                            @error('stu_email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->has('email') ? $errors->first('email') : ' '  }}</strong>
                                                </span>
                                            @enderror                                          
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-sm-4 col-form-label text-right">Password</label>
                                        <div class="col-sm-8 showPassword">
                                            <input id="password"  type="password" name="password" value="{{ $student->password }}" class="form-control " >
                                            <i class="mdi mdi-eye-off text-danger " id="togglePassword"></i>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->has('password') ? $errors->first('password') : ' '  }}</strong>
                                                </span>
                                            @enderror                                          
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password_confirm" class="col-sm-4 col-form-label text-right">Confirm Password</label>
                                        <div class="col-sm-8">
                                            <input id="password_confirm" onChange="checkPasswordMatch();"  type="password" name="password_confirmation" value="{{ old('password') }}" class="form-control " >
                                            <span class="text-danger" id="match"></span>
                                                                                    
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="admission_year	" class="col-sm-4 col-form-label text-right">Admission Year</label>
                                        <div class="col-sm-8">
                                            <input type="date" value="{{$student->admission_year}}" name="admission_year" class="form-control " id="admission_year">
                                            @error('admission_year	')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->has('admission_year	') ? $errors->first('admission_year	') : ' '  }}</strong>
                                                </span>
                                            @enderror                                          
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="address" class="col-sm-4 col-form-label text-right">Address</label>
                                        <div class="col-sm-8">
                                            <input type="text" value="{{ $student->address }}" name="address" class="form-control " id="name" >
                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->has('address') ? $errors->first('address') : ' '  }}</strong>
                                                </span>
                                            @enderror                                          
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone" class="col-sm-4 col-form-label text-right">Student Phone</label>
                                        <div class="col-sm-8">
                                            <input type="number" value="{{ $student->phone }}" name="phone" class="form-control " id="name">
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->has('phone') ? $errors->first('phone') : ' '  }}</strong>
                                                </span>
                                            @enderror                                          
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="class" class="col-sm-4 col-form-label text-right">Sudent Class</label>
                                        <div class="col-sm-8">
                                            <select name="class" class="form-select form-control " >
                                                <option  disabled selected >Student Class</option>
                                                <option value="six">Six</option>
                                                <option value="seven">Seven</option>
                                                <option value="eight">Eight</option>
                                                <option value="nine">Nine</option>
                                                <option value="ten">Ten</option>
                                            </select>
                                           
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="image" class="col-sm-4 col-form-label text-right">Student Image</label>
                                        <div class="col-sm-4">
                                            <input type="file" value="{{ old('image') }}" name="image" class="form-control " id="name" placeholder="Enter Stu Image">
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->has('image') ? $errors->first('image') : ' '  }}</strong>
                                                </span>
                                            @enderror                                          
                                        </div>
                                        <div class="col-sm-4">
                                            <img src="{{asset($student->image)}}" width='80px'; height="60px">                                                                                    
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
        document.forms['editCategoryForm'].elements['class'].value = '{!! $student->class !!}';
    </script>
    <script>
        function checkPasswordMatch() {
        var pwd = $("#password").val();
        var cpwd = $("#password_confirm").val();
        if (pwd != cpwd)
            $("#match").html("Passwords do not match!").addClass('text-danger').removeClass('text-success');
        else
            $("#match").html("Passwords match.").addClass('text-success').removeClass('text-danger');
        }
    </script>
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        togglePassword.addEventListener('click', function (e) {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            $("#togglePassword").toggleClass("fa-eye");
        });
    </script>
@endsection