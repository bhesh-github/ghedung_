{{-- @extends('setting::layouts.master')

@section('title', 'Add Video')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('gallery.index') }}">Video</a></li>
        <li class="breadcrumb-item active">Add</li>
    </ol>
@endsection --}}
@extends('layouts.app')

@section('content')
    <style>
        /* The switch - the box around the slider */
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        /* Hide default HTML checkbox */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('layouts.alert')   
        <section class="content-header">
            <div class="container-fluid">
                <form id="product-form" 
                action="{{ route('video.store') }}" 
                method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-header">
                                <h3 class="card-title float-left">Add Video</h3>
                                <a
                                 href="{{ route('video.index') }}" 
                                 class="btn btn-danger float-right">Back</a>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="text" name="title" value="{{ old('title') }}" class="form-control"
                                                    placeholder="Enter Title" required>
                                                @error('title')
                                                    <p style="color: red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="link">Link</label>
                                                <input type="text" class="form-control" name="link" id="link"
                                                    value="{{ old('link') }}" placeholder="Enter Link" required>
                                                @error('link')
                                                    <p style="color: red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                       {{-- <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="code">Code <small>( Note: If link is "https://www.youtube.com/watch?v=7l59ldBJpzY" then code is "7l59ldBJpzY" )</small></label>
                                                <input type="text" class="form-control" name="code" id="code"
                                                    value="{{ old('code') }}" placeholder="Enter Code" required>
                                                @error('code')
                                                    <p style="color: red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div> --}}
                                        <div class="col-md-6">
                                            <!-- Bootstrap Switch -->
                                            <div class="card card-secondary">
                                                <div class="card-header">
                                                    <h3 class="card-title">Show In Home</h3>
                                                </div>
                                                {{-- <div class="card-body">
                                                    <input type="checkbox" name="show_in_home" data-bootstrap-switch
                                                        data-off-color="danger" data-on-color="success">
                                                </div> --}}
                                                <label class="switch m-3">
                                                    <input type="checkbox" class="form-control" name="show_in_home" checked>
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <!-- Bootstrap Switch -->
                                            <div class="card card-secondary">
                                                <div class="card-header">
                                                    <h3 class="card-title">Publish</h3>
                                                </div>
                                                {{-- <div class="card-body">
                                                    <input type="checkbox" name="status" checked data-bootstrap-switch
                                                        data-off-color="danger" data-on-color="success">
                                                </div> --}}
                                                {{-- <label for="publish">Publish?</label><br> --}}
                                                <label class="switch m-3">
                                                    <input type="checkbox" class="form-control" name="status" checked>
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-md-12 text-center" style=" margin-top: 10px;margin-bottom: 10px;">
                                            <button type="submit" class="btn btn-primary">Add Video <i
                                                    class="bi bi-check"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
{{-- @section('script') --}}
    <!-- image preview -->
    <script type="text/javascript">
        function showPreview1(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-1-preview");
                preview.src = src;
                preview.style.display = "block";
            }
        }
    </script>
    <script>
        $('textarea.summernote').summernote({
            placeholder: 'Enter  Answer',
            tabsize: 2,
            height: 250,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'hr']],
                ['view', ['fullscreen', 'codeview']],
                ['help', ['help']]
            ],
        });
    </script>
    <script>
        $('.extra-fields-customer').click(function() {
            $('.customer_records').clone().appendTo('.customer_records_dynamic');
            $('.customer_records_dynamic .customer_records').addClass('single remove');
            $('.single .extra-fields-customer').remove();
            $('.single').append(
                '<a href="#" class="remove-field btn-remove-customer badge badge-danger">Remove Product</a>');
            $('.customer_records_dynamic > .single').attr("class", "remove");

            $('.customer_records_dynamic input').each(function() {
                var count = 0;
                var fieldname = $(this).attr("name");
                $(this).attr('name', fieldname + count);
                count++;
            });

        });

        $(document).on('click', '.remove-field', function(e) {
            $(this).parent('.remove').remove();
            e.preventDefault();
        });
    </script>

{{-- @endsection --}}
