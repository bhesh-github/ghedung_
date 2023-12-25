@extends('layouts.app')
@section('content')
    <!-- page content -->
<div class="content-wrapper">

    <div class="right_col" role="main">
        @include('layouts.alert')
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('company.profile.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id" 
                    {{-- value="{{ $profile['id'] }}" --}}
                    >
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <p><a href="{{ route('admin.home') }}">Home</a> / Company Profile</p>
                        </div>
                        <div class="col-md-12 text-left">
                            <h1>Company Profile</h1>
                        </div>
                        <!-- left column -->
                        <div class="col-md-7">
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
                                            value="{{ $profile->company_name }}" placeholder="Enter Company Name">
                                        @error('name')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="company_name_nepali">Company Name (Nepali)</label>
                                        <input type="text" class="form-control" name="company_name_nepali" id="company_name_nepali"
                                            value="{{ $profile->company_name_nepali }}" placeholder="Enter Company Name (Nepali)">
                                        @error('company_name_nepali')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Tibetan Lipi</label>
                                        <input type="text" class="form-control" name="tibetan_lipi" id="tibetan_lipi"
                                            value="{{ $profile->tibetan_lipi }}" >
                                        @error('name')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <label for="flag">Flag</label>
                                    <div class="form-group" id="flag">
                                        <div class="form-group">
                                            <input type="file" id="file-ip-3" accept="image/*"
                                                class="form-control-file border" value="{{ old('image') }}"
                                                onchange="showPreview3(event);" name="company_flag">
                                            <div class="invalid-feedback">Please choose the about us image.</div>
                                            @error('flag')
                                                <p style="color: red">{{ $message }}</p>
                                            @enderror
                                            <div class="preview mt-2">
                                                <img src="{{ asset('upload/images/company_profile/' . $profile['company_flag']) }}" id="file-ip-1-preview3" height="100px">
                                            </div>
                                        </div>
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
                                                <img src="{{ asset('upload/images/company_profile/' . $profile['company_logo']) }}" id="file-ip-1-preview" height="100px">
                                            </div>
                                        </div>
                                    </div>
                                    <label for="favicon">Favicon</label>
                                    <div class="form-group" id="image">
                                        <div class="form-group">
                                            <input type="file" id="file-ip-2" accept="image/*"
                                                class="form-control-file border" value="{{ old('favicon') }}"
                                                onchange="showPreview2(event);" name="favicon">
                                            <div class="invalid-feedback">Please choose the product image.</div>
                                            @error('favicon')
                                                <p style="color: red">{{ $message }}</p>
                                            @enderror
                                            <div class="preview mt-2">
                                                <img src="{{ asset('upload/images/company_profile/' . $profile['favicon']) }}" id="file-ip-1-preview2" height="100px">
                                            </div>
                                        </div>
                                    </div>
                                 

                                </div>
                                <!-- /.card-body -->
                                <!-- /.card -->

                            </div>
                        </div>
                        <!-- right column -->
                        <div class="col-md-5">
                            <!-- Form Element sizes -->
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Other Informations</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            value="{{ $profile->email }}" placeholder="Enter email">
                                        @error('email')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" name="phone" id="phone"
                                            value="{{ $profile->phone }}" placeholder="Enter Number">
                                        @error('phone')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" name="address" id="address"
                                            value="{{ $profile->address }}" placeholder="Enter Address">
                                        @error('address')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="address_nepali">Address (Nepali)</label>
                                        <input type="text" class="form-control" name="address_nepali" id="address_nepali"
                                            value="{{ $profile->address_nepali }}" placeholder="Enter Address (Nepali)">
                                        @error('address_nepali')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="map">Map</label>
                                        <input type="text" class="form-control" name="map" id="map"
                                            value="{{ $profile->map }}" placeholder="Enter Map">
                                        @error('address')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="facebook">Facebook</label>
                                        <input type="url" class="form-control" name="facebook" id="facebook"
                                            value="{{ $profile->facebook }}" placeholder="Enter Facebook">
                                        @error('facebook')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="twitter">Twitter</label>
                                        <input type="url" class="form-control" name="twitter" id="twitter"
                                            value="{{ $profile->twitter }}" placeholder="Enter Twitter">
                                        @error('twitter')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div> --}}
                                    <div class="form-group">
                                        <label for="youtube">Youtube</label>
                                        <input type="url" class="form-control" name="youtube" id="youtube"
                                            value="{{ $profile->youtube }}" placeholder="Enter Youtube">
                                        @error('youtube')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="instagram">Instagram</label>
                                        <input type="url" class="form-control" name="instagram" id="instagram"
                                            value="{{ $profile->instagram }}" placeholder="Enter Instagram">
                                        @error('instagram')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div> --}}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <!-- Form Element sizes -->
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Detail Informations</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="introduction">Introduction</label>
                                        <textarea id="summernote" name="introduction" placeholder="Enter Company's Introduction">
                                        {{ $profile->introduction }}
                                    </textarea>
                                        @error('introduction')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="mission">Our Mission</label>
                                        <textarea id="summernote" name="mission" placeholder="Enter Company's Mission">
                                        {{ $profile->mission }}
                                    </textarea>
                                        @error('mission')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="vision">Our Vision</label>
                                        <textarea id="summernote" name="vision" placeholder="Enter Company's Vision">
                                        {{ $profile->vision }}
                                    </textarea>
                                        @error('vision')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div> --}}
                            
                                                                        
                                    {{-- <div class="row">
                                        <div class="col-md-12">
                                            <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Message From Chairperson</h2>
                                                    <ul class="nav navbar-right panel_toolbox">
                                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                        </li>
                                                    </ul>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <section class="content invoice">
                                                        @if ($profile['chairperson_image'])
                                                            <label for="chairperson">Chairperson Image</label>
                                                        @endif

                                                        <div class="form-group" id="image">
                                                            <div class="form-group">
                                                                <input type="file" id="file-ip-4" accept="image/*"
                                                                    class="form-control-file border"
                                                                    onchange="showPreview4(event);" name="chairperson">
                                                                <div class="invalid-feedback">Please choose the product
                                                                    image.</div>
                                                                @error('chairperson')
                                                                    <p style="color: red">{{ $message }}</p>
                                                                @enderror
                                                                <div class="preview mt-2">
                                                                    <img src="{{ asset('upload/images/company_profile/' . $profile['chairperson_image']) }}" id="file-ip-1-preview4"
                                                                        width="200px">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <textarea id="summernote" name="chairperson_message" placeholder="Enter Message">
                                                {{ $profile->chairperson_message }}
                                            </textarea>
                                                            @error('chairperson_message')
                                                                <p style="color: red">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </section>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary"
                            onclick="return confirm('Are you sure want to continue?')">Update</button>
                    </div>
                </form>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
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

        function showPreview2(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-1-preview2");
                preview.src = src;
                preview.style.display = "block";
            }
        }

        function showPreview3(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-1-preview3");
                preview.src = src;
                preview.style.display = "block";
            }
        }

        function showPreview4(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-1-preview4");
                preview.src = src;
                preview.style.display = "block";
            }
        }
    </script>
</div>

@endsection
