@extends('layouts.hospital')

@section('title','Configuration')

@section('content')
    <script src="{{asset('assets/js/datepicker.min.js')}}"></script>
    <link href="{{asset('assets/css/datepicker.min.css')}}" rel="stylesheet">

    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-center">
                <div class="col-md-8">
                    <h3 class="bfh-fonts hospital-title d-flex justify-content-center mt-5"
                        data-font="Arial">Hospital Management System Configuration
                    </h3>
                    <div style="display: flex !important; justify-content:center !important;border-radius: 16px !important;"
                         class="card shadow-lg p-3 mt-5 bg-whitesmoke">
                        <div class="card-body">
                            <h6 class="d-flex justify-content-center text-uppercase">Hospital Info </h6>
                            <span id="title_text" class="d-flex justify-content-center"></span>

                            @include('hospitals._create-form')
                        </div>
                    </div>
                    @include('hospitals.validation-error')
                </div>
            </div>
        </div>
    </div>
    <script>
        (function ($) {
            $( "#date" ).datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true});

            FilePond.registerPlugin(FilePondPluginFileValidateType);
            const inputElement = document.querySelector('input[id="logo"]');
            // FilePond.create( inputElement );
            FilePond.create(inputElement, {
                labelIdle: '<p style="font-size: 11px">' +
                    '         Drag &amp; Drop your logo or <span class="filepond--label-action" tabindex="0">Browse</span><br>\n' +
                    '      </p>'
            });
            FilePond.setOptions({
                server: {
                    url :'/media',
                    headers: {
                        'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                    },
                    process: '/upload',
                    revert: '/delete',
                }
            });

        })(jQuery);
    </script>
    @include('hospitals._domain-check')
    @include('hospitals._multi-step-form')

@endsection
