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
         
        <!-- left column -->
        <div class="col-md-12 mt-3">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title float-left">{{$sub_company->company_name}} <span style='text-transform:capitalize'>{{$sec_slug}}</span></h3>
              <a
                  @if ($sec_slug === 'team')
                  <a
                  href="{{ route('sub-company.team.create', [$sec_slug, $comp_slug]) }}"
                    class="btn btn-success float-right"><i class="fa fa-plus">
                      </i> Create</a>
                      @elseif($sec_slug === 'activities')
                      <a
                      href="{{ route('sub-company.activity.create', [$sec_slug, $comp_slug]) }}"
                        class="btn btn-success float-right"><i class="fa fa-plus">
                          </i> Create</a>
                          @endif
            </div>
            <table id="datatable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Title</th>
                        <th>Subtitle</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Activity Post Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-center">
                        
                        </td>
                        <td>
                        </td>
                        <td></td>
                        <td class="text-center">
                        
                        </td>
                        <td>
                          
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
</div>
</div>

@endsection
