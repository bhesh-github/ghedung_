@extends('layouts.app')
@section('content')
    <!-- page content -->
<div class="content-wrapper">

    <div class="right_col" role="main">
        @include('layouts.alert')
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('sub-company.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id" 
                    value="{{ $sub_company['id'] }}"
                    >
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <p><a href="{{ route('admin.home') }}">Home</a> / Sub Company Profile</p>
                        </div>
                        <div class="col-md-12 text-left">
                            <h4>Sub Company Profile</h4>
                            
                        </div>
                        <!-- left column -->
                        <div class="col-md-12 p-x">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">General Informations</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Company Name</label>
                                        <input type="text" class="form-control" name="company_name" id="name"
                                            value="{{ $sub_company->company_name }}" placeholder="Enter Company Name">
                                        @error('name')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <label for="logo">Logo</label>
                                    <div class="form-group" id="image">
                                        <div class="form-group">
                                            <input type="file" id="file-ip-1" accept="image/*"
                                                class="form-control-file border" onchange="showPreview1(event);"
                                                name="company_logo">
                                            <div class="invalid-feedback">Please choose the product image.</div>
                                            @error('logo')
                                                <p style="color: red">{{ $message }}</p>
                                            @enderror
                                            <div class="preview mt-2">
                                                <img src="{{ asset('upload/images/sub_company/company_profile/' . $sub_company['company_logo']) }}" id="file-ip-1-preview" height="100px">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Detail Informations</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="introduction">Introduction</label>
                                        <textarea id="summernote" name="introduction" placeholder="Enter Company's Introduction">
                                        {{ $sub_company->introduction }}
                                    </textarea>
                                        @error('introduction')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-md-5">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Other Informations</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            value="{{ $sub_company->email }}" placeholder="Enter email">
                                        @error('email')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" name="phone" id="phone"
                                            value="{{ $sub_company->phone }}" placeholder="Enter email">
                                        @error('phone')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" name="address" id="address"
                                            value="{{ $sub_company->address }}" placeholder="Enter email">
                                        @error('address')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="map">Map</label>
                                        <input type="text" class="form-control" name="map" id="map"
                                            value="{{ $sub_company->map }}" placeholder="Enter Map">
                                        @error('address')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="facebook">Facebook</label>
                                        <input type="url" class="form-control" name="facebook" id="facebook"
                                            value="{{ $sub_company->facebook }}" placeholder="Enter Facebook">
                                        @error('facebook')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="twitter">Twitter</label>
                                        <input type="url" class="form-control" name="twitter" id="twitter"
                                            value="{{ $sub_company->twitter }}" placeholder="Enter Twitter">
                                        @error('twitter')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="youtube">Youtube</label>
                                        <input type="url" class="form-control" name="youtube" id="youtube"
                                            value="{{ $sub_company->youtube }}" placeholder="Enter Youtube">
                                        @error('youtube')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="instagram">Instagram</label>
                                        <input type="url" class="form-control" name="instagram" id="instagram"
                                            value="{{ $sub_company->instagram }}" placeholder="Enter Instagram">
                                        @error('instagram')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary"
                            onclick="return confirm('Are you sure want to continue?')">Update</button>
                    </div>
                </form>
            </div>
        </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
    <script>
        $('textarea#summernote').summernote({
            placeholder: 'Write Introduction Here ......',
            tabsize: 2,
            height: 250,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                // ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                //['fontname', ['fontname']],
                // ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'hr']],
                //['view', ['fullscreen', 'codeview']],
                ['help', ['help']]
            ],
        });
    </script>

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
</div>

@endsection
