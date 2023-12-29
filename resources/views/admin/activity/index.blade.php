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
            {{-- href="{{ route('home') }}" --}}
            >Home</a> / Activity</p>
        </div>
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title float-left">Activity Lists</h3>
              <a
               href="{{ route('activity.create') }}"
                class="btn btn-success float-right"><i class="fa fa-plus"></i> Create</a>
            </div>
            <!-- /.card-header -->
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
                    @foreach($activity as $value)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $value->title }}</td>
                        <td>{{ $value->subtitle }}</td>
                        <td class="text-center">
                          @if ($value->image != null)
                            <img 
                            src="{{ asset('upload/images/activity/'.$value->image) }}"
                             alt="Image" width="100px">
                          @else
                            <img 
                            src="{{ asset('no-image.jpg') }}"
                             alt="Image" width="100px">
                          @endif
                        </td>
                        <td>
                          {!! $value->description !!}
                            {{-- <textarea name="description" id="" cols="30" rows="10" class="form-control" style="width: 250px" readonly>{{ $value->description }}</textarea> --}}
                        </td>
                        <td>{{ $value->activity_post_date }}</td>
                        <td class="text-center">
                          @if ($value->status == "on")
                            <a 
                            href="{{ route('activity.status',$value->id) }}" 
                            class="btn btn-success btn-sm" onclick="return confirm('Are you sure want to continue?')">On</a>
                          @else
                            <a
                             href="{{ route('activity.status',$value->id) }}"
                              class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to continue?')">Off</a>
                          @endif
                        </td>
                        <td>
                            <a
                             href="{{ route('activity.edit',$value['id']) }}" 
                             class="badge badge-warning" ><i class="fa fa-edit"></i> Edit</a>

                              <form 
                              action="{{ route('activity.delete') }}"
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
        <div class="row">
          {{$activity->links('pagination::simple-bootstrap-4')}}
      </div>
        </div>
        <!--/.col (left) -->

      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
</div>
</div>

@endsection
