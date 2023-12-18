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
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Add {{$sub_company->company_name}}  Member</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
    <section class="content-header">
    <div class="container-fluid">
        <form id="product-form" action="{{ route('sub-company.team.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-row">
                                <input type="hidden"  name="section_id" class="form-control" value={{$sub_company_section->id}}>
                                <input type="hidden"  name="section_slug" class="form-control" value={{$sub_company_section->slug}}>
                                <input type="hidden" name="company_id" class="form-control" value={{$sub_company->id}}>
                                <input type="hidden" name="company_slug" class="form-control" value={{$sub_company->slug}}>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Full Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter Full Name" value="{{old('name')}}" required>
                                        @error('name')
                                        <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Enter Email" value="{{old('email')}}" >
                                        @error('email')
                                        <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Contact Number</label>
                                        <input type="number" name="phone" class="form-control" placeholder="Enter Contact " value="{{old('phone')}}">
                                        @error('contact')
                                        <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="designation">Designation</label>
                                        <input type="text" name="designation" class="form-control" placeholder="Enter designation" value="{{old('designation')}}" required>
                                        @error('designation')
                                        <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="facebook">Facebook Link</label>
                                        <input type="text" name="facebook" class="form-control" placeholder="Enter Facebook Link" value="{{old('facebook')}}">
                                        @error('facebook')
                                        <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="twitter">Twitter Link</label>
                                        <input type="text" name="twitter" class="form-control" placeholder="Enter Twitter Link" value="{{old('twitter')}}">
                                        @error('twitter')
                                        <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="instagram">Instagram Link</label>
                                        <input type="text" name="instagram" class="form-control" placeholder="Enter Instagram Link" value="{{old('instagram')}}">
                                        @error('instagram')
                                        <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="introduction">Introduction</label>
                                        <textarea type="text" name="introduction" class="summernote" placeholder="Enter Answer" >{{old('introduction')}}</textarea>
                                        @error('introduction')
                                        <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div> --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image">Image </label>
                                        <input type="file" id="file-ip-1" accept="image/*"
                                            class="form-control-file border" value="{{ old('image') }}"
                                            onchange="showPreview1(event);" name="image">
                                        @error('image')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror
                                        <div class="preview mt-2">
                                            <img src="" id="file-ip-1-preview" width="200px">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Bootstrap Switch -->
                                    <div class="card card-secondary">
                                        <div class="card-header">
                                            <h3 class="card-title">Publish</h3>
                                        </div>
                                        <label class="switch m-3">
                                            <input type="checkbox" class="form-control" name="status" checked>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-md-12 text-center" style=" margin-top: 10px;margin-bottom: 10px;">
                                    <button type="submit" class="btn btn-primary">Create <i class="bi bi-check"></i></button>
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
@section('script')
    <!-- image preview -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
    <script>
        $('textarea#summernote').summernote({
            placeholder: 'Write Description Here .......',
            tabsize: 2,
            height: 300,
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
            placeholder: 'Enter  Company Description',
            tabsize: 2,
            height: 100,
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
            $('.single').append('<a href="#" class="remove-field btn-remove-customer badge badge-danger">Remove Product</a>');
            $('.customer_records_dynamic > .single').attr("class", "remove");

            $('.customer_records_dynamic input').each(function() {
                var count = 0;
                var fieldname = $(this).attr("name");
                $(this).attr('name', fieldname + count );
                count++;
            });

        });

        $(document).on('click', '.remove-field', function(e) {
            $(this).parent('.remove').remove();
            e.preventDefault();
        });
    </script>
@endsection
