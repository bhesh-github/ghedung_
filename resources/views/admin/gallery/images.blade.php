@extends('layouts.app')
@section('content')
    <!-- page content -->
<div class="content-wrapper">
    <div class="right_col" role="main">
        @include('layouts.alert')
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title float-left">{{ $gallery->name }}'s Images</h2>
                                <h3 class="card-title float-right"><a class="btn btn-danger text-white"
                                        href="{{ route('gallery.index') }}">Back</a> </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('gallery-images.store', $gallery->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $gallery->id }}">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="images">Upload Image</label><br>
                                                    <input id="fileupload" type="file" name="images[]"
                                                        multiple="multiple" required/>
                                                    @error('images')
                                                        <p style="color: red">{{ $message }}</p>
                                                    @enderror
                                                    <hr />
                                                    <b>Live Preview</b>
                                                    <br />
                                                    <br />
                                                    <div id="dvPreview">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer text-center">
                                        <button type="submit" class="btn btn-primary">Upload</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($images as $value)
                        <div class="col-md-3 col-sm-12 mt-3">
                            <div class="card">
                                <img class="card-img-top" src="{{ asset('upload/images/gallery/' . $value['image']) }}"
                                    alt="Card image cap" height="200px" width="auto">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 text-center">
                                            <button id="delete" class="btn btn-danger btn-sm"
                                                        onclick="
                                    event.preventDefault();
                                    if (confirm('Are you sure? It will delete the data permanently!')) {
                                        document.getElementById('destroy{{ $value->id }}').submit()
                                    }
                                    ">
                                                        <i class="fa fa-trash"></i>
                                                        <form id="destroy{{ $value->id }}" class="d-none"
                                                            action="{{ route('gallery-images.destroy', $value->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('delete')
                                                        </form>
                                                    </button>
                                        </div>
                                        <div class="col-md-6 text-center">
                                            @if ($value->status == 'on')
                                                <a href="{{ route('gallery-images.status', $value->id) }}"
                                                    class="btn btn-success"
                                                    onclick="return confirm('Are you sure want to continue?')">On</a>
                                            @else
                                                <a href="{{ route('gallery-images.status', $value->id) }}"
                                                    class="btn btn-danger"
                                                    onclick="return confirm('Are you sure want to continue?')">Off</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div>
</div>

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

<script language="javascript" type="text/javascript">
    window.onload = function() {
        var fileUpload = document.getElementById("fileupload");
        fileUpload.onchange = function() {
            if (typeof(FileReader) != "undefined") {
                var dvPreview = document.getElementById("dvPreview");
                dvPreview.innerHTML = "";
                var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp|.webp)$/;
                for (var i = 0; i < fileUpload.files.length; i++) {
                    var file = fileUpload.files[i];
                    if (regex.test(file.name.toLowerCase())) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            var img = document.createElement("IMG");
                            img.height = "100";
                            img.width = "100";
                            img.src = e.target.result;
                            dvPreview.appendChild(img);
                        }
                        reader.readAsDataURL(file);
                    } else {
                        alert(file.name + " is not a valid image file.");
                        dvPreview.innerHTML = "";
                        return false;
                    }
                }
            } else {
                alert("This browser does not support HTML5 FileReader.");
            }
        }
    };
</script>
@endsection
