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
          <p><a href="{{ route('admin.home') }}" >Home</a> / Company Sections</p>
        </div>
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title float-left">{{$sub_company->company_name}} Sections</h3>
              <a
              style="margin-left:10px"
              href="{{ route('sub-company.index') }}" 
               class="btn btn-danger float-right"></i> Back</a>
            </div>
            <!-- /.card-header -->
            <table id="datatable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Sections</th>
                        <th>View Section</th>
                        {{-- <th>Status</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach($company_sections as $value)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $value->section_name }}</td>
                      <td>
                        <a href="{{ route('sub-company.section', ['sec_slug' => $value->slug, 'comp_slug' => $sub_company->slug]) }}" class="btn btn-info btn-sm">

                          
                          <i class="fa fa-eye"></i>
                      </a>
                    {{-- </td>
                        <td >
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
                    </tr> --}}
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
