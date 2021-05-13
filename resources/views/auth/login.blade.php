@extends('layouts.hospital')

@section('title','Login')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class=" bg-transparent p-4 mt-5 rounded login-image">
                    <img src="{{asset('assets/images/login.svg')}}">
                    <span class="d-flex justify-content-center"
                        style="font-weight:bolder; color: deeppink">We aim to make your life better
                    </span>
                </div>

            </div>
            <div class="col-md-6">
                <div class="login">
                    @if($errors->any())
                        <div class="container-fluid">
                            <div class="row">
                                <div class="dis-flex justify-content-end mb-3">
                                    <div class="alert alert-danger mb-3 alert-dismissible alert-absolute fade show " role="alert" data-mdb-color="secondary">
                                        <div class="alert-body d-flex">
                                            <div style="margin-right: 10px !important;">
                                                {{$errors->first()}}
                                            </div>
                                            <button class="close" data-mdb-dismiss="alert" aria-label="Close" data-dismiss="alert">
                                                <span>×</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endif
                    <div style="height:500px;max-height: 500px" class="shadow-lg p-4 mt-5  bg-white rounded">

                        <h5 class="d-flex justify-content-center">Login</h5>
                        <span class="d-flex justify-content-center">Welcome To &nbsp; <b>{{$hospital->name}}</b></span>
                        <div class="mt-3 d-flex justify-content-center">
                            @if($hospital->logo)
                                <img style="height: auto;width: 20%" src="{{$hospital->logo}}">
                            @else
                                <img style="height: auto;width: 20%" src="{{asset('assets/images/hospital.png')}}">
                            @endif
                        </div>
                        <form method="POST" action="{{route('user.login')}}">
                            @csrf
                            <div class="login-input">
                                <input
                                    type="email"
                                    name="email"
                                    required
                                    value="{{old('email')}}"
                                    class="form-control p-3 m-2"
                                    placeholder="Email">
                            </div>
                            <div class="login-input">
                                <input
                                    type="password"
                                    name="password"
                                    required
                                    class="form-control p-3 m-2"
                                    placeholder="Password">
                            </div>

                                <button type="submit"
                                        class="btn mt-4 btn-pink">Login</button>

                        </form>

                    </div>
                </div>

        </div>

    </div>
@endsection
