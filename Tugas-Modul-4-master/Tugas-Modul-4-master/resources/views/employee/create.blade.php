<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle }}</title>
    @vite('resources/sass/app.scss')
</head>
<body>
    @php
    $currentRouteName = Route::currentRouteName();
    @endphp

    {{-- <nav class="navbar navbar-expand-md navbar-dark bg-primary">
        <div class="container">
            <a href="{{ route('home') }}" class="navbar-brand mb-0 h1"><i class="bi-hexagon-fill me-2"></i> Data Master</a>
            <button type="button" class="navbar-toggler" data-bstoggle="collapse" data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <hr class="d-md-none text-white-50">
                <ul class="navbar-nav flex-row flex-wrap">
                    <li class="nav-item col-2 col-md-auto"><a href="{{ route('home') }}" class="nav-link @if($currentRouteName ==
    'home') active @endif">Home</a></li>
                    <li class="nav-item col-2 col-md-auto"><a href="{{ route('employees.index') }}" class="nav-link
    @if($currentRouteName == 'employees.index') active
    @endif">Employee</a></li>
                </ul>
                <hr class="d-md-none text-white-50">
                <a href="{{ route('profile') }}" class="btn btn-outline-light
    my-2 ms-md-auto"><i class="bi-person-circle me-1"></i> My Profile</a>
            </div>
        </div>
    </nav> --}}

    @extends('layouts.app')

    @section('content')
    <div class="container-sm mt-5">
        <form action="{{ route('employees.store') }}" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="p-5 bg-light rounded-3 border col-xl-6">

                    {{-- @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show">
                               {{ $error }}
                               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endforeach
                    @endif --}}

                    <div class="mb-3 text-center">
                        <i class="bi-person-circle fs-1"></i>
                        <h4>Create Employee</h4>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName" class="form-label">First Name</label>
                            <input class="form-control {{ $errors->any() ? ($errors->first('firstName') ? 'is-invalid' : 'is-valid') : '' }} " type="text" name="firstName" id="firstName" value="{{ old('firstName') }}" placeholder="Enter First Name">
                            <div class="invalid-feedback">{{ $errors->first('firstName') }}</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input class="form-control {{ $errors->any() ? ($errors->first('lastName') ? 'is-invalid' : 'is-valid') : '' }}" type="text" name="lastName" id="lastName" value="{{ old('lastName') }}" placeholder="Enter Last Name">
                            <div class="invalid-feedback">{{ $errors->first('lastName') }}</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input class="form-control {{ $errors->any() ? ($errors->first('email') ? 'is-invalid' : 'is-valid') : '' }}" type="text" name="email" id="email" value="{{ old('email') }}" placeholder="Enter Email">
                            <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="age" class="form-label">Age</label>
                            <input class="form-control {{ $errors->any() ? ($errors->first('age') ? 'is-invalid' : 'is-valid') : '' }}" type="text" name="age" id="age" value="{{ old('age') }}" placeholder="Enter Age">
                            <div class="invalid-feedback">{{ $errors->first('age') }}</div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="position" class="form-label">Position</label>
                            <select name="position" id="position" class="form-select">
                                {{-- <option value="1" selected>FE - Front End Developer</option>
                                <option value="2" >BE - Back End Developer</option>
                                <option value="3" >SA - System Analyst</option> --}}
                                @foreach ($positions as $position)
                                <option value="{{ $position->id }}" {{ old('position') == $position->id ? 'selected' : '' }}>{{ $position->code.' - '.$position->name }}</option>
                                @endforeach
                            </select>
                            @error('position')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>

                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-md-6 d-grid">
                            <a href="{{ route('employees.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i> Cancel</a>
                        </div>
                        <div class="col-md-6 d-grid">
                            <button type="submit" class="btn btn-dark btn-lg mt-3"><i class="bi-check-circle me-2"></i> Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @endsection
    @vite('resources/js/app.js')
</body>
</html>
