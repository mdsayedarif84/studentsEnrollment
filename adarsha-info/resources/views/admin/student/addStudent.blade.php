@extends('admin.dashboard')
@section('title')
    AddStudent
@endsection
@section('body')
    <style>
        .showPassword {
            position: relative;
        }
        .showPassword i{
            position: absolute;
            margin-left: 250px;
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
                            <h4 class="text-danger text-bold"> Add Student
                                <a href="{{route('all-student')}}" class="btn btn-danger btn-sm float-right">
                                    <span class="mdi-hand-pointing-right"> </span>All Student</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('save-student')}}" method="POST" enctype="multipart/form-data"  class="form-horizontal" >
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label text-right">Student Name</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter name">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->has('name') ? $errors->first('name') : ' '  }}</strong>
                                                </span>
                                            @enderror                                          
                                        </div>
                                        <label for="roll" class="col-sm-2 col-form-label text-right">Student Roll</label>
                                        <div class="col-sm-4">
                                            <input type="number" name="roll" value="{{ old('roll') }}" class="form-control @error('roll') is-invalid @enderror" id="roll" placeholder="Enter roll">
                                            @error('roll')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->has('roll') ? $errors->first('roll') : ' '  }}</strong>
                                                </span>
                                            @enderror                                          
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="father_name" class="col-sm-2 col-form-label text-right">Father Name</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="father_name" value="{{ old('father_name') }}" class="form-control @error('father_name') is-invalid @enderror" id="name" placeholder="Enter father_name ">
                                            @error('father_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->has('father_name') ? $errors->first('father_name') : ' '  }}</strong>
                                                </span>
                                            @enderror                                          
                                        </div>
                                        <label for="mother_name" class="col-sm-2 col-form-label text-right">Mother Name</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="mother_name" value="{{ old('mother_name') }}" class="form-control @error('mother_name') is-invalid @enderror" id="mother_name" placeholder="Enter mother_name">
                                            @error('mother_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->has('mother_name') ? $errors->first('mother_name') : ' '  }}</strong>
                                                </span>
                                            @enderror                                          
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-2 col-form-label text-right">Student Email</label>
                                        <div class="col-sm-4">
                                            <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror"  placeholder="Enter email">
                                            <span class="text-danger" id="res"></span>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->has('email') ? $errors->first('email') : ' '  }}</strong>
                                                </span>
                                            @enderror                                          
                                        </div>
                                        <label for="admission_year	" class="col-sm-2 col-form-label text-right">Admission Year</label>
                                        <div class="col-sm-4">
                                            <input type="date" value="{{ old('admission_year	') }}" name="admission_year" class="form-control @error('admission_year	') is-invalid @enderror" id="admission_year" placeholder="Enter admission_year">
                                            @error('admission_year	')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->has('admission_year	') ? $errors->first('admission_year	') : ' '  }}</strong>
                                                </span>
                                            @enderror                                          
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-sm-2 col-form-label text-right">Password</label>
                                        <div class="col-sm-4 showPassword">
                                            <input id="password"  type="password" name="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" placeholder="Enter password">
                                            <i class="mdi mdi-eye-off text-danger " id="togglePassword"></i>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->has('password') ? $errors->first('password') : ' '  }}</strong>
                                                </span>
                                            @enderror                                          
                                        </div>
                                        <label for="password_confirm" class="col-sm-2 col-form-label text-right">Confirm Password</label>
                                        <div class="col-sm-4">
                                            <input id="password_confirm" onChange="checkPasswordMatch();"  type="password" name="password_confirmation" value="{{ old('password') }}" class="form-control " placeholder="Enter password">
                                            <span class="text-danger" id="match"></span>
                                                                                    
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="address" class="col-sm-2 col-form-label text-right">Address</label>
                                        <div class="col-sm-4">
                                            <input type="text" value="{{ old('address') }}" name="address" class="form-control @error('address') is-invalid @enderror" id="name" placeholder="Enter Address">
                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->has('address') ? $errors->first('address') : ' '  }}</strong>
                                                </span>
                                            @enderror                                          
                                        </div>
                                        <label for="phone" class="col-sm-2 col-form-label text-right">Student Phone</label>
                                        <div class="col-sm-4">
                                            <input type="number" value="{{ old('phone') }}" name="phone" class="form-control @error('phone') is-invalid @enderror" id="name" placeholder="Enter Stu Phone">
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->has('phone') ? $errors->first('phone') : ' '  }}</strong>
                                                </span>
                                            @enderror                                          
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone" class="col-sm-2 col-form-label text-right">Student Phone</label>
                                        <div class="col-sm-4">
                                            <input type="number" value="{{ old('phone') }}" name="phone" class="form-control @error('phone') is-invalid @enderror" id="name" placeholder="Enter Stu Phone">
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->has('phone') ? $errors->first('phone') : ' '  }}</strong>
                                                </span>
                                            @enderror                                          
                                        </div>
                                        <label for="class" class="col-sm-2 col-form-label text-right">Sudent Class</label>
                                        <div class="col-sm-4">
                                            <select name="class" class="form-select form-control @error('class') is-invalid @enderror" >
                                                <option  disabled selected >Student Class</option>
                                                @foreach($activeClasses as $activeClass)
                                                <option value="{{ $activeClass->class_name}}">{{ $activeClass->class_name}}</option>
                                                @endforeach
                                            </select>
                                            @error('class')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->has('class') ? $errors->first('class') : ' '  }}</strong>
                                                </span>
                                            @enderror 
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="image" class="col-sm-2 col-form-label text-right"></label>
                                        <label for="image" class="col-sm-2 col-form-label text-right">Student Image</label>
                                        <div class="col-sm-4">
                                            <input type="file" value="{{ old('image') }}" name="image" class="form-control @error('image') is-invalid @enderror" id="name" placeholder="Enter Stu Image">
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->has('image') ? $errors->first('image') : ' '  }}</strong>
                                                </span>
                                            @enderror                                          
                                        </div>
                                        <label for="image" class="col-sm-2 col-form-label text-right"></label>
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
    <script>
        var email           =   document.getElementById('email');
        email.onblur        =   function (){
            var email       =   document.getElementById('email').value;
            var xmlHttp     =   new XMLHttpRequest();
            var serverPage  =   "http://127.0.0.1:8000/addStudent/email-check/"+email;
            xmlHttp.open('GET', serverPage);
            xmlHttp.onreadystatechange  =   function (){
                if (xmlHttp.readyState == 4 && xmlHttp.status  ==  200){
                    document.getElementById('res').innerHTML   =   xmlHttp.responseText;
                    if (xmlHttp.responseText == 'This Email Already exist.Try new email'){
                        document.getElementById('regBtn').disabled  =    true;
                    }else {
                        document.getElementById('regBtn').disabled  =    false;
                    }
                }
            }
            xmlHttp.send(null);
        }
    </script>
@endsection