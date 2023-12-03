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
    <!-- page content -->
<div class="content-wrapper">
    <div class="right_col" role="main">
        @include('layouts.alert')
        <section class="content-header">
            <div class="container-fluid">
                <div class="col-md-12 text-right">
                    <p><a 
                        {{-- href="{{ route('home') }}" --}}
                        >Home</a> / <a 
                        href="{{ route('article.index') }}"
                        >Article</a> / Add</p>
                </div>
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title float-left">Edit Article</h3>
                        <a href="{{ route('article.index') }}" class="btn btn-danger float-right">Back</a>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('article.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $article->id }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" name="title" id="title"
                                            value="{{ $article->title }}" placeholder="Enter Title" required>
                                        @error('title')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="subtitle">Subtitle</label>
                                        <input type="text" class="form-control" name="subtitle" id="subtitle"
                                            value="{{ $article->subtitle }}" placeholder="Enter Subtitle" required>
                                        @error('subtitle')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image">Change Image</label>
                                        <input type="file" id="file-ip-1" accept="image/*" class="form-control border"
                                            onchange="showPreview1(event);" name="image">
                                        <div class="invalid-feedback">Please choose the product image.</div>
                                        @error('image')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror
                                        <div class="preview mt-2">
                                            <img src="{{ asset('upload/images/article/' . $article['image']) }}"
                                                id="file-ip-1-preview" width="200px">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="article_post_date">Article Post Date</label>
                                        <input type="text" class="form-control" name="article_post_date" id="article_post_date"
                                            value="{{  $article->article_post_date }}" placeholder="Enter Article Post Date" required>
                                        @error('article_post_date')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea id="summernote" name="description" value="" placeholder="Enter Description Here" required>{{ $article->description }}</textarea>
                                        @error('description')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="writer_name">Writer Name</label>
                                        <input type="text" class="form-control" name="writer_name" id="writer_name"
                                            value="{{ $article->writer_name  }}" placeholder="Enter Writer Name" required>
                                        @error('writer_name')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="writer_address">Writer Address</label>
                                        <input type="text" class="form-control" name="writer_address" id="writer_address"
                                            value="{{$article->writer_address }}" placeholder="Enter Writer Address" required>
                                        @error('writer_address')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="writer_image">Writer Image</label>
                                        <input type="file" id="file-ip-2" accept="image/*"
                                            class="form-control border" value="{{ old('writer_image') }}"
                                            onchange="showPreview2(event);" name="writer_image" 
                                            {{-- required --}}
                                            >
                                        <div class="invalid-feedback">Please choose a writer image.</div>
                                        @error('writer_image')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror
                                        <div class="preview mt-2">
                                      <img 
                                src="{{ asset('upload/images/article/'.$article['writer_image']) }}" id="file-ip-2-preview" width="200px"  >
                                        </div>
                                    </div>
                                </div>
                                <!-- Rounded switch -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="publish">Publish?</label><br>
                                        <label class="switch">
                                            @if ($article->status == 'on')
                                                <input type="checkbox" class="form-control" name="status" checked>
                                            @else
                                                <input type="checkbox" class="form-control" name="status">
                                            @endif
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div>
</div>

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
        function showPreview2(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-2-preview");
                preview.src = src;
                preview.style.display = "block";
            }
        }
    </script>
@endsection
