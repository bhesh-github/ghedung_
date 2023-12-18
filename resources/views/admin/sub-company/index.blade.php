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
          <p><a 
            href="{{ route('admin.home') }}"
            >Home</a> / Sub Companies</p>
        </div>
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title float-left">Sub Company Lists</h3>
              <a
               href="{{ route('sub-company.create') }}"
                class="btn btn-success float-right"><i class="fa fa-plus"></i> Create</a>
            </div>
            <!-- /.card-header -->
            <table id="datatable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Company Name</th>
                        <th>Logo</th>
                        <th>View Profile</th>
                        <th>View Sections</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sub_companies as $value)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $value->company_name }}</td>
                        <td class="text-center">
                          @if ($value->company_logo != null)
                            <img 
                            src="{{ asset('upload/images/sub_company/company_profile/'.$value->company_logo) }}"
                             alt="Logo" width="100px">
                          @else
                            <img 
                            src="{{ asset('no-image.jpg') }}"
                             alt="Logo" width="100px">
                          @endif
                        </td>
                        <td>
                          <a href="{{ route('sub-company.profile',$value->slug) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i>
                          </a>
                      </td>
                      <td>
                        <a href="{{ route('sub-company.sections.index',$value->slug) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i>
                        </a>
                    </td>
                        <td class="text-center">
                          @if ($value->status == "on")
                            <a 
                            href="{{ route('sub-company.status',$value->id) }}" 
                            class="btn btn-success btn-sm" onclick="return confirm('Are you sure want to continue?')">On</a>
                          @else
                            <a
                             href="{{ route('sub-company.status',$value->id) }}"
                              class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to continue?')">Off</a>
                          @endif
                        </td>
                        <td>
                            <a
                             href="{{ route('sub-company.edit',$value['id']) }}" 
                             class="badge badge-warning" ><i class="fa fa-edit"></i> Edit</a>

                              <form 
                              action="{{ route('sub-company.delete') }}"
                               method="post" class="mt-1">
                                @csrf
                                <input type="hidden" name="id" id="id" value="{{ $value['id'] }}">
                                <button type="submit" class="badge badge-danger" onclick="return confirm('Are you sure want to continue?')"><i class="fa fa-trash"></i> Remove</button>
                              </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
          <!-- /.card -->

        </div>
        </div>
        <!--/.col (left) -->

      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
</div>
</div>

@endsection
