@extends('loginregisterlayout.master')
@section('title', 'Register')
@section('content')
    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    <div class="login-left">
                        <img class="img-fluid" src="{{ asset('admin/assets/img/login.png') }}" alt="Logo">
                    </div>
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Sign Up</h1>
                            <p class="account-subtitle">Enter details to create your account</p>

                            <form action="{{ route('register') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Username<span class="login-danger">* @error('username')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </label>
                                    <input class="form-control " type="text" name="username">
                                    <span class="profile-views"><i class="fas fa-user-circle"></i></span>
                                </div>

                                <div class="form-group">
                                    <label>Email<span class="login-danger">* @error('email')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </label>
                                    <input class="form-control " type="email" name="email">
                                    <span class="profile-views"><i class="fas fa-user-envelope"></i></span>
                                </div>

                                <div class="form-group">
                                    <label>Nrc<span class="login-danger">*@error('nrc')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </label>
                                    <input class="form-control" type="text" name="nrc">
                                    <span class="profile-views"><i class="fas fa-envelope"></i></span>
                                </div>

                                <div class="form-group">
                                    <label>Phone <span class="login-danger">*@error('phone')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </label>
                                    <input class="form-control" type="text" name="phone">
                                    <span class="profile-views"><i class="fas fa-phone"></i></span>
                                </div>


                                <div class="form-group">
                                    <label>Parent Code <span class="login-danger">*@error('parentCode')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </label>
                                    <input class="form-control " type="number" name="parentCode">
                                    <span class="profile-views"><i class="fas fa-code"></i></span>
                                </div>

                                <div class="form-group">
                                    <label>Address <span class="login-danger">*@error('address')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </label>
                                    <textarea name="address" id="" cols="30" rows="10" class="form-control "></textarea>
                                    <span class="profile-views"><i class="fas fa-location"></i></span>
                                </div>


                                <div class="form-group local-forms">
                                    <label>Gender <span class="login-danger">*@error('gender')
                                                {{ $message }}
                                            @enderror
                                        </span>

                                    </label>
                                    <select class="form-control  select" name="gender">
                                        <option value="">Select Gender</option>
                                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Password <span class="login-danger">* </span></label>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control  pass-input" type="password" name="password">
                                    <span class="profile-views feather-eye toggle-password"></span>
                                </div>

                                <div class="form-group">
                                    <label>Confirm password <span class="login-danger">*</label>
                                    @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control pass-confirm" type="password" name="password_confirmation">
                                    <span class="profile-views feather-eye reg-toggle-password"></span>
                                </div>
                                <div class=" dont-have">Already Registered? <a href="{{ route('loginPage') }}">Login</a>
                                </div>
                                <div class="form-group mb-0">
                                    <button class="btn btn-primary btn-block" type="submit">Register</button>
                                </div>
                            </form>

                            <div class="login-or">
                                <span class="or-line"></span>
                                <span class="span-or">or</span>
                            </div>

                            <div class="social-login">
                                <a href="#"><i class="fab fa-google-plus-g"></i></a>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
