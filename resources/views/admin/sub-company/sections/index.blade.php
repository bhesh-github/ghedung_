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
                        <p><a href="{{ route('admin.home') }}">Home</a> / Sub Company Sections</p>
                    </div>
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title float-left">{{$sub_company->company_name}} Sections List</h3>
                                <a 
                                href="{{ route('sub-company.index') }}" 
                                class="btn btn-danger text-white float-right ml-2">Back</a>
                                <a class="btn btn-success text-white float-right" data-toggle="modal"
                                    data-target="#exampleModal"><i class="fa fa-plus"></i> Create</a>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-dark" id="exampleModalLabel">Create Section</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('sub-company.section.store') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                  <div class="form-group">
                                                    <input type="hidden" name="sub_company_id" value="{{ $sub_company->id }}" class="form-control">
                                                  </div>
                                                    <div class="form-group">
                                                        <label for="section_name" class="text-dark">Section Name</label>
                                                        <input type="text" name="section_name" class="form-control"
                                                            placeholder="Enter Section Name" required>
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
                                        <th>Sections</th>
                                        <th>View Section</th>
                                        <th class="text-center">Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($company_sections as $value)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $value->section_name }}</td>
                                            <td>
                                              <a 
                                              href="{{ route('sub-company.section-contents.index',['company_slug' => $sub_company->slug, 'section_slug' => $value->slug]) }}"
                                              class="btn btn-info btn-sm">
                                              <i class="fa fa-eye"></i>
                                              </a>

                                              {{-- <a href="{{ route('sub-company.section-contents.index',['company_slug' => $sub_company->slug, 'section_slug' => $value->slug] }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i>
                                              </a> --}}
                                          </td>
                                            <td class="text-center">
                                                @if ($value->status == 'on')
                                                    <a href="{{ route('sub-company.section.status', $value->id) }}"
                                                        class="btn btn-success btn-sm"
                                                        onclick="return confirm('Are you sure want to continue?')">On</a>
                                                @else
                                                    <a href="{{ route('sub-company.section.status', $value->id) }}"
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
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Section 
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="{{ route('sub-company.section.update') }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <input type="hidden" name="id"
                                                                value="{{ $value->id }}">
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="section_name">Section Name</label>
                                                                        <input type="text" name="section_name"
                                                                            class="form-control" placeholder="Enter Section Name"
                                                                            value="{{ $value->section_name }}" required>
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
                                                action="{{ route('sub-company.section.delete') }}"
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
                        {{-- <div class="row">
                            {{$notice->links('pagination::simple-bootstrap-4')}}
                        </div> --}}
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
