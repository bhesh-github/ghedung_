@extends('layouts.app')
@section('content')
    <!-- page content -->
<div class="content-wrapper">

    <div class="right_col" role="main">
        @include('layouts.alert')
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <p><a href="{{ route('admin.home') }}">Home</a> / Section Contents</p>
                    </div>
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title float-left">
                                    {{$sub_company->company_name}} 
                                    {{$sub_company_section->section_name}}
                                     List</h3>
                                     <a class="btn btn-danger text-white float-right ml-2" 
                                     href={{route('sub-company.sections.index', $sub_company->slug)}}
                                     > Back</a>
                                <a class="btn btn-success text-white float-right" data-toggle="modal"
                                    data-target="#exampleModal"><i class="fa fa-plus"></i> Create</a>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-dark" id="exampleModalLabel">Create {{$sub_company_section->section_name}}</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('sub-company.section-content.store') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <input type="hidden" name="sub_company_id" class="form-control" value="{{$sub_company->id}}">
                                                        <input type="hidden" name="sub_company_section_id" class="form-control" value="{{$sub_company_section->id}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="title" class="text-dark">Title</label>
                                                        <input type="text" name="title" class="form-control"
                                                            placeholder="Enter Title" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="image" class="text-dark">Upload Image</label>
                                                        <input type="file" id="file-ip-2" accept="image/*"
                                                                class="form-control border" value="{{ old('image') }}"
                                                                onchange="showPreview2(event);" name="image">
                                                        <div class="invalid-feedback">Please choose the product image.</div>
                                                            @error('image')
                                                                <p style="color: red">{{ $message }}</p>
                                                            @enderror
                                                        <div class="preview mt-2">
                                                            <img src="" id="file-ip-2-preview" width="200px"  >
                                                        </div>
                                                        </div>
                                                    <div class="form-group">
                                                        <label for="file" class="text-dark">Upload PDF</label>
                                                        <input type="file" id="file-ip-1" accept="file/*"
                                                            class="form-control border" value="{{ old('file') }}"
                                                            onchange="showPreview1(event);" name="file">
                                                        @error('file')
                                                            <p style="color: red">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="publish" class="text-dark">Publish?</label><br>
                                                            <label class="switch">
                                                                <input type="checkbox" class="form-control" name="status" checked>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <table id="datatable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>PDF</th>
                                        <th class="text-center">Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($section_contents as $value)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $value->title }}</td>
                                            <td class="text-center">
                                                @if ($value->image != null)
                                                  <img 
                                                  src="{{ asset('upload/images/sub_company/section_content/'.$value->image) }}"
                                                   alt="Image" width="100px">
                                                @else
                                                  <img 
                                                  src="{{ asset('no-image.jpg') }}"
                                                   alt="Image" width="100px">
                                                @endif
                                              </td>
                                            <td>
                                                <a href="{{ asset('upload/files/sub_company/section_content/'.$value->pdf) }}" target="__blank">{{ $value->pdf }}</a>
                                            </td>
                                            <td class="text-center">
                                                @if ($value->status == 'on')
                                                    <a href="{{ route('sub-company.section-content.status', $value->id) }}"
                                                        class="btn btn-success btn-sm"
                                                        onclick="return confirm('Are you sure want to continue?')">On</a>
                                                @else
                                                    <a href="{{ route('sub-company.section-content.status', $value->id) }}"
                                                        class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Are you sure want to continue?')">Off</a>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="" class="badge badge-warning" data-toggle="modal"
                                                    data-target="#edit{{ $value->id }}"><i class="fa fa-edit"></i>
                                                    Edit</a>
                                                <!-- Modal -->
                                                <div class="modal fade" id="edit{{ $value->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit {{$sub_company_section->section_name}}
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="{{ route('sub-company.section-content.update') }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <input type="hidden" name="id"
                                                                value="{{ $value->id }}">
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="title">Title</label>
                                                                        <input type="text" name="title"
                                                                            class="form-control" placeholder="Enter Title"
                                                                            value="{{ $value->title }}" required>
                                                                    </div>
                                                                        <div class="form-group">
                                                                            <label for="image">Change Image</label>
                                                                            <input type="file" id="file-ip-3" accept="image/*" class="form-control border"
                                                                                onchange="showPreview3(event);" name="image">
                                                                            <div class="invalid-feedback">Please choose the product image.</div>
                                                                            @error('image')
                                                                                <p style="color: red">{{ $message }}</p>
                                                                            @enderror
                                                                            <div class="preview mt-2">
                                                                                <img src="{{ asset('upload/images/sub_company/section_content/' . $value->image) }}"
                                                                                    id="file-ip-3-preview" width="200px">
                                                                            </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="file">Change PDF</label>
                                                                        <input type="file" id="file-ip-1"
                                                                            accept="file/*" class="form-control border"
                                                                            value="{{ old('file') }}"
                                                                            onchange="edit{{ $value->id }}(event);" name="file">
                                                                        @error('file')
                                                                            <p style="color: red">{{ $message }}</p>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save
                                                                        changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <form 
                                                action="{{ route('sub-company.section-content.delete') }}"
                                                 method="post"
                                                    class="mt-1">
                                                    @csrf
                                                    <input type="hidden" name="id" id="id"
                                                        value="{{ $value['id'] }}">
                                                    <button type="submit" class="badge badge-danger"
                                                        onclick="return confirm('Are you sure want to continue?')"><i
                                                            class="fa fa-trash"></i> Remove</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- /.card -->
                        </div>
                        <div class="row">
                            {{$section_contents->links('pagination::simple-bootstrap-4')}}
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
        </section>
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

       <!-- image preview -->
       <script type="text/javascript">
        function showPreview2(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-2-preview");
                preview.src = src;
                preview.style.display = "block";
            }
        }
    </script>

    <!-- image preview -->
    <script type="text/javascript">
        function showPreview3(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-3-preview");
                preview.src = src;
                preview.style.display = "block";
            }
        }
    </script>

    {{-- @foreach ($notice as $value)
        <script type="text/javascript">
            function edit{{ $value->id }}(event) {
                if (event.target.files.length > 0) {
                    var src = URL.createObjectURL(event.target.files[0]);
                    var preview = document.getElementById("file-ip-1-edit{{ $value->id }}");
                    preview.src = src;
                    preview.style.display = "block";
                }
            }
        </script>
    @endforeach --}}
<div class="content-wrapper">

@endsection