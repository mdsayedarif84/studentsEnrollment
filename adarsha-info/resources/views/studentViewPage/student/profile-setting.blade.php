@extends('studentViewPage.dashboard')
@section('title')
    ProfileSetting
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
            <marquee><h3 class="text-danger font-weight-bolder">Welcome Back Our Student Profile Setting Page.</h3></marquee>
            <div class="card">
                @if($message   =   Session::get('message'))
                    <h1 class="text-center text-primary" id="msg">{{ $message }}</h1>
                @endif
                <div class="card-body">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-danger text-bold">Student Setting Profile
                                <a href="" class="btn btn-danger btn-sm float-right">
                                    <span class="mdi-hand-pointing-right"> </span>All Student</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('profile_update')}}" method="POST" id="editCategoryForm" enctype="multipart/form-data"  class="form-horizontal" >
                                @csrf
                                <div class="card-body">
								<div class="form-group row">
                                        <label for="phone" class="col-sm-4 col-form-label text-right">Student Phone</label>
                                        <div class="col-sm-8">
                                            <input type="number" value="{{ $student->phone}}" name="phone" class="form-control " id="name">
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->has('phone') ? $errors->first('phone') : ' '  }}</strong>
                                                </span>
                                            @enderror                                          
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-sm-4 col-form-label text-right">Password</label>
                                        <div class="col-sm-8 showPassword">
                                            <input id="password"  type="password" name="password" value="{{ $student->password}}" class="form-control " >
                                            <i class="mdi mdi-eye-off text-danger " id="togglePassword"></i>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->has('password') ? $errors->first('password') : ' '  }}</strong>
                                                </span>
                                            @enderror                                          
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label for="address" class="col-sm-4 col-form-label text-right">Address</label>
                                        <div class="col-sm-8">
                                            <input type="text" value="{{ $student->address}}" name="address" class="form-control " id="name" >
                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->has('address') ? $errors->first('address') : ' '  }}</strong>
                                                </span>
                                            @enderror                                          
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" :disabled="form.busy" class="btn btn-outline-success offset-sm-4">Update</button>
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
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        togglePassword.addEventListener('click', function (e) {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            $("#togglePassword").toggleClass("fa-eye");
        });
    </script>
@endsection