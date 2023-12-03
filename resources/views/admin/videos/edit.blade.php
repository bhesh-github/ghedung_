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
        <section class="content-header">
            <div class="container-fluid">
                <form id="product-form"
                 {{-- action="{{ route('gallery.video.update', $video->id) }}" --}}
                 action="{{ route('video.update') }}"
                  method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    {{-- @method('patch') --}}
                    <input type="hidden" name="id" value="{{ $video->id }}">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <button class="btn btn-primary">Update <i class="fa fa-check"></i></button>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="title">Title </label>
                                                <input type="text" name="title" value="{{ $video->title }}" class="form-control"
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
                                                    value="{{ $video->link }}" placeholder="Enter Link" required>
                                                @error('link')
                                                    <p style="color: red">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <!-- Bootstrap Switch -->
                                            <div class="card card-secondary">
                                                <div class="card-header">
                                                    <h3 class="card-title">Show In Home</h3>
                                                </div>
                                                <label class="switch m-3">
                                                    @if ($video->show_in_home == 'on')
                                                        <input type="checkbox" class="form-control" name="show_in_home" checked>
                                                    @else
                                                        <input type="checkbox" class="form-control" name="show_in_home">
                                                    @endif
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
                                                <label class="switch m-3">
                                                    @if ($video->status == 'on')
                                                        <input type="checkbox" class="form-control" name="status" checked>
                                                    @else
                                                        <input type="checkbox" class="form-control" name="status">
                                                    @endif
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-md-12 text-center" style=" margin-top: 10px;margin-bottom: 10px;">
                                            <button type="submit" class="btn btn-primary">Update <i
                                                    class="fa fa-check"></i></button>
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
@endsection
