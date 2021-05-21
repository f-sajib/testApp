@extends('layouts.hospital')

@section('title','Login')


@section('content')

    <div class="container">
        <div class="row">
            <div class="left-side col-md-6">
                <div class=" bg-transparent p-4 mt-5 rounded login-image">
                    <img src="{{asset('assets/images/login.svg')}}">
                    <span class="d-flex justify-content-center"
                        style="font-weight:bolder; font-size: 20px; color: darkcyan">We aim to make your life better
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

                    <div
                        class="login-form card shadow-lg p-4 m-t-50 bg-whitesmoke">

                        <div class="login-logo d-flex justify-content-end">
{{--                            @if($hospital->logo)--}}
{{--                                <img class="img-fluid mx-auto d-block shadow-lg" src="{{$hospital->logo}}">--}}
{{--                            @else--}}
                                <img class="img-fluid mx-auto dis-block" src="{{asset('assets/images/hospital.png')}}">
{{--                            @endif--}}
                        </div>
                        <div class="card-body login-box">
                            <span class="m-t-50 d-flex justify-content-center">Welcome To &nbsp; <b class="text-capitalize">{{$hospital->name}}</b></span>
                            <form method="POST" action="{{route('user.login')}}">
                                @csrf
                                <div class="login-input">
                                    <input
                                        type="email"
                                        name="email"
                                        required
                                        value="{{old('email')}}"
                                        class="form-control p-3 m-2">
                                    <div class="m-2 underline"></div>
                                    <label class="p-3 m-2 label-1">Email</label>
                                </div>
                                <div class="login-input">
                                    <input
                                        type="password"
                                        name="password"
                                        required
                                        class="form-control p-3 m-2">
                                    <div class="m-2 underline-2"></div>
                                    <label class="p-3 m-2 label-2">Password</label>
                                </div>

                                <button type="submit"
                                        class="mt-4 btn login-button">Login</button>

                            </form>
                        </div>
{{--                        <h5 style="margin-top:100px" class="d-flex justify-content-center">Login</h5>--}}


                    </div>
                </div>

        </div>

    </div>
@endsection
