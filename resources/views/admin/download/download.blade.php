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
                        <p><a href="{{ route('admin.home') }}">Home</a> / Downloads</p>
                    </div>
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title float-left">Download Lists</h3>
                                <a class="btn btn-success text-white float-right" data-toggle="modal"
                                    data-target="#exampleModal"><i class="fa fa-plus"></i> Create</a>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Create Download</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('downloads.store') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="title">Title</label>
                                                        <input type="text" name="title" class="form-control"
                                                            placeholder="Enter Title" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="download_type">Download Type</label>
                                                        <select name="download_type" class="form-control" required>
                                                            <option value="" disabled selected>Select Download Type</option>
                                                            @foreach ($types as $type)
                                                            <option value="{{ $type->id }}">{{ $type->title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="file">File</label>
                                                        <input type="file" id="file-ip-1" accept="file/*"
                                                            class="form-control border" value="{{ old('file') }}"
                                                            onchange="showPreview1(event);" name="file">
                                                        @error('file')
                                                            <p style="color: red">{{ $message }}</p>
                                                        @enderror
                                                        <div class="preview mt-2">
                                                            <img src="" id="file-ip-1-preview" width="200px">
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
                                        <th>Type</th>
                                        <th>File</th>
                                        <th class="text-center">Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($downloads as $value)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $value->title }}</td>
                                            <td>{{ $value->type->title }}</td>
                                            <td>
                                                <a href="{{ asset('upload/files/downloads/'.$value->file) }}" target="__blank">{{ $value->file }}</a>
                                            </td>
                                            <td class="text-center">
                                                @if ($value->status == 'on')
                                                    <a href="{{ route('downloads.status', $value->id) }}"
                                                        class="btn btn-success btn-sm"
                                                        onclick="return confirm('Are you sure want to continue?')">On</a>
                                                @else
                                                    <a href="{{ route('downloads.status', $value->id) }}"
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
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Download
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="{{ route('downloads.update', $value->id) }}"
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
                                                                        <label for="download_type">Download Type</label>
                                                                        <select name="download_type" class="form-control" required>
                                                                            <option value="" disabled selected>Select Download Type</option>
                                                                            @foreach ($types as $type)
                                                                            <option value="{{ $type->id }}" {{ $value->download_type_id == $type->id?'selected':'' }}>{{ $type->title }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="file">File</label>
                                                                        <input type="file" id="file-ip-1"
                                                                            accept="file/*" class="form-control border"
                                                                            value="{{ old('file') }}"
                                                                            onchange="edit{{ $value->id }}(event);" name="file">
                                                                        @error('file')
                                                                            <p style="color: red">{{ $message }}</p>
                                                                        @enderror
                                                                        <div class="preview mt-2">
                                                                            <img src="{{ asset('upload/files/downloads/' . $value->file) }}"
                                                                                id="file-ip-1-edit{{ $value->id }}" width="200px">
                                                                        </div>
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

                                                <form action="{{ route('downloads.delete') }}" method="post"
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
                            {{$downloads->links('pagination::simple-bootstrap-4')}}
                        </div>
                    </div>
                    <!--/.col (left) -->

                    <!-- /.row -->
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

    @foreach ($downloads as $value)
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
    @endforeach
<div class="content-wrapper">

@endsection
