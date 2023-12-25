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
    <div class="content-wrapper">
    @include('layouts.alert')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            
                            <div class="card-header">
                               
              <h3 class="card-title float-left">{{$samiti->title}} Members List</h3>
              <a
              style="margin-left:10px"
              href="{{ route('samiti.index') }}"
               class="btn btn-danger float-right"></i> Back</a>
                            <a
                            href="{{ route('samiti-member-card.create',$samiti->slug) }}"
                             class="btn btn-success float-right"><i class="fa fa-plus"></i> Create</a>
                             
                             {{-- <h3 class="card-title float-right"><a class="btn btn-info text-white" href="{{ route('team.create') }}"><i class="fa fa-plus"></i> Create</a> </h3> --}}
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                  <th>S.N</th>
                                  <th>Name</th>
                                  <th class="text-center">Image</th>
                                  <th>Email</th>
                                  {{-- <th>Phone</th> --}}
                                  <th>Designation</th>
                                  <th class="text-center">Status</th>
                                  <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($member_card as $key => $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td class="text-center"><img src="{{ asset('upload/images/samitis/'.$value->image) }}" width="120px" alt="{{ $value->name }}"> </td>
                                        <td>{{ $value->email }}</td>
                                        {{-- <td>{{ $value->phone }}</td> --}}
                                        <td>{{ $value->designation }}</td>
                                        <td class="text-center">
                                            @if($value->status == 'on')
                                            <a href="{{ route('samiti-member-card.status',$value->id) }}" class="btn btn-success" onclick="return confirm('Are you sure want to continue?')">On</a>
                                            @else
                                            <a href="{{ route('samiti-member-card.status',$value->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure want to continue?')">Off</a> 
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a 
                                            href="{{ route('samiti-member-card.edit',['id'=>$value->id,'samiti_slug'=> $samiti->slug]) }}"
                                             class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>

                                            <button id="delete" class="btn btn-danger btn-sm" onclick="
                                            event.preventDefault();
                                            if (confirm('Are you sure? It will delete the data permanently!')) {
                                                document.getElementById('destroy{{ $value->id }}').submit()
                                            }
                                            ">
                                            <i class="fa fa-trash"></i>
                                            <form
                                            id="destroy{{ $value->id }}" class="d-none" action="{{ route('samiti-member-card.delete', $value->id) }}" method="POST">
                                                @csrf
                                            </form>
                                        </button>
                                        </td>
                                      </tr>
                                    @endforeach
                                </tbody>
                              </table>
                            </div>
                            <div class="row ml-auto mr-3">
                                {{$member_card->links('pagination::simple-bootstrap-4')}}
                            </div>
                            <!-- /.card-body -->    
                          </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
