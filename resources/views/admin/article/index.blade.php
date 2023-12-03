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
            >Home</a> / Article</p>
        </div>
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title float-left">Article Lists</h3>
              <a
               href="{{ route('article.create') }}"
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
                        <th>Writer Name</th>
                        <th>Writer Address</th>
                        <th>Writer Image</th>
                        <th>Article Post Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($article as $value)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $value->title }}</td>
                        <td>{{ $value->subtitle }}</td>
                        <td class="text-center">
                          @if ($value->image != null)
                            <img 
                            src="{{ asset('upload/images/article/'.$value->image) }}"
                             alt="Image" width="100px">
                          @else
                            <img 
                            src="{{ asset('no-image.jpg') }}"
                             alt="Image" width="100px">
                          @endif
                        </td>
                        {{-- <td>
                            <textarea name="short_description" id="" cols="30" rows="10" class="form-control" style="width: 250px" readonly>{{ $value->short_description }}</textarea>
                        </td> --}}
                        <td>
                          {!! $value->description !!}
                            {{-- <textarea name="description" id="" cols="30" rows="10" class="form-control" style="width: 250px" readonly>{{ $value->description }}</textarea> --}}
                        </td>
                        <td>{{ $value->writer_name }}</td>
                        <td>{{ $value->writer_address }}</td>
                        <td class="text-center">
                          @if ($value->writer_image != null)
                            <img 
                            src="{{ asset('upload/images/article/'.$value->writer_image) }}"
                             alt="Image" width="100px">
                          @else
                            <img 
                            src="{{ asset('no-image.jpg') }}"
                             alt="Image" width="100px">
                          @endif
                        </td>
                        <td>{{ $value->article_post_date }}</td>
                        <td class="text-center">
                          @if ($value->status == "on")
                            <a 
                            href="{{ route('article.status',$value->id) }}" 
                            class="btn btn-success btn-sm" onclick="return confirm('Are you sure want to continue?')">On</a>
                          @else
                            <a
                             href="{{ route('article.status',$value->id) }}"
                              class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to continue?')">Off</a>
                          @endif
                        </td>
                        <td>
                            <a
                             href="{{ route('article.edit',$value['id']) }}" 
                             class="badge badge-warning" ><i class="fa fa-edit"></i> Edit</a>

                              <form 
                              action="{{ route('article.delete') }}"
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
