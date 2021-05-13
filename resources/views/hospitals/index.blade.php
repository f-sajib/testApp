@extends('layouts.hospital')

@section('title','Configuration')

@section('content')
    <script src="{{asset('assets/js/datepicker.min.js')}}"></script>
{{--    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>--}}
    <link href="{{asset('assets/css/datepicker.min.css')}}" rel="stylesheet">

    <style>
        .datepicker  {
            color: deeppink !important;
        }
        .datepicker table tr td.today:active {
            color: deeppink !important;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="bfh-fonts d-flex justify-content-center mt-5"
                    data-font="Arial">Hospital Management System Configuration
                </h1>
                <div class="shadow-lg p-3 mt-5 bg-white rounded">
                    <h6 class="d-flex justify-content-center text-uppercase">Hospital Info </h6>
                    <span id="title_text" class="d-flex justify-content-center"></span>
                    <form class="full-form" method="POST" action="{{route('hospital.create')}}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-section">
                            <input required
                                   type="text"
                                   name="name"
                                   placeholder="Hospital Name"
                                   class="form-control mt-3 p-3 b-color-pink">
                            <input required
                                   type="email"
                                   name="email"
                                   class="form-control mt-3 p-3 b-color-pink"
                                   placeholder="Hospital Email">
                            <input required
                                   type="text"
                                   name="phone"
                                   class="form-control mt-3 p-3 b-color-pink"
                                   placeholder="Hospital Phone">
                        </div>

                        <div class="form-section">
                            <input required type="text" name="website" placeholder="website"
                                   class="form-control mt-3 p-3 b-color-pink">
                            <textarea required
                                      type="text"
                                      name="description"
                                      class="form-control mt-3 p-3 b-color-pink"
                                      placeholder="Description"></textarea>
{{--                            <input required--}}
{{--                                   type="date"--}}
{{--                                   name="establishment_date"--}}
{{--                                   class="form-control mt-3 p-3 b-color-pink"--}}
{{--                                   placeholder="Establishment Date">--}}
                            <input required
                                   id="date"
                                   placeholder="Establishment Date"
                                   name="establishment_date"
                                   class="form-control mt-3 p-3 b-color-pink"
                                   type="text">

                            <input required
                                   type="text"
                                   name="address"
                                   class="form-control mt-3 p-3 b-color-pink"
                                   placeholder="Address">
                            <input type="file"
                                   name="logo"
                                   class="form-control mt-3 p-3 b-color-pink">
                        </div>

                        <div class="form-section">
                            <input name="social[facebook]"
                                   type="text"
                                   placeholder="Facebook"
                                   class="form-control mt-3 p-3 b-color-pink">
                            <input name="social[instagram]"
                                   type="text"
                                   class="form-control mt-3 p-3 b-color-pink"
                                   placeholder="Instagram">
                            <input name="social[twitter]"
                                   type="text"
                                   placeholder="Twitter"
                                   class="form-control mt-3 p-3 b-color-pink">
                        </div>

                        <div class="form-section">
                            <input name="user[name]"
                                   required type="text"
                                   placeholder="Name"
                                   class="form-control mt-3 p-3 b-color-pink">
                            <input name="user[email]"
                                   required type="email"
                                   class="form-control
                                   mt-3 p-3 b-color-pink"
                                   placeholder="Email">
                            <input name="user[password]"
                                   required
                                   type="password"
                                   placeholder="Password"
                                   class="form-control mt-3 p-3 b-color-pink">
                            <input name="user[password_confirmation]"
                                   required
                                   type="password"
                                   placeholder="Confirm Password"
                                   class="form-control mt-3 p-3 b-color-pink">

                        </div>


                        <div class="form-navigator d-flex justify-content-center">
                            <button type="button" class="previous btn mt-5 mb-3 btn-grey">previous</button>
                            <button type="button" class="next btn mt-5 mb-3 btn-pink">Next</button>
                            <button type="submit" class="btn mt-5 mb-3 btn-blue">Submit</button>
                        </div>

                    </form>

                </div>

                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <script>
        (function ($) {
            $( "#date" ).datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true});

            var sections = $('.form-section');

            function naviagateTo(index) {
                title(index)
                sections.removeClass('current').eq(index).addClass('current');
                $('.form-navigator .previous').toggle(index > 0);
                var atTheEnd = index >= sections.length - 1;
                $('.form-navigator .next').toggle(!atTheEnd);
                $('.form-navigator [type=submit]').toggle(atTheEnd);

            }

            function curIndex() {
                return sections.index(sections.filter('.current'))
            }

            $('.form-navigator .previous').click(function () {
                naviagateTo(curIndex() - 1)
            });

            $('.form-navigator .next').click(function () {
                $('.full-form').parsley().whenValidate({
                    group: 'block-' + curIndex()
                }).done(function () {
                    naviagateTo(curIndex() + 1);
                })
            });

            sections.each(function (index, section) {
                $(section).find(':input').attr('data-parsley-group', 'block-' + index)
            })

            function title(index) {
                if (index === 0) {
                    $('#title_text').text('Enter Your Hospital Information')
                } else if (index === 1) {
                    $('#title_text').text('Continue Entering Your Information')
                } else if (index === 2) {
                    $('#title_text').text('Your Presence In Social Site')
                } else {
                    $('#title_text').text('Your Login Credentials')
                }
            }

            naviagateTo(0);
            title(0);


        })(jQuery);
    </script>

@endsection
