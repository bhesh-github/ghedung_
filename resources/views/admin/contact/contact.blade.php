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
                        <p><a href="{{ route('admin.home') }}">Home</a> / contact</p>
                    </div>
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Contact Lists</h3>
                            </div>
                            <!-- /.card-header -->
                            <table id="datatable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Company Name</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($contacts as $key => $contact)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ date('d M, Y', strtotime($contact->created_at)) }}</td>
                                            <td>{{ $contact->name }}</td>
                                            <td><a
                                                    href="mailto:{{ $contact->email }}?subject={{ $contact->subject }} Reply">{{ $contact->email }}</a>
                                            </td>
                                            <td>{{ $contact->phone }}</td>
                                            <td>{{ $contact->company_name }}</td>
                                            <td>Subject Input</td>
                                            <td>
                                                <textarea name="message" id="" class="form-control" rows="5" readonly>{{ $contact->message }}</textarea>
                                            </td>
                                            <td>
                                                <form action="{{ route('contact.delete') }}" method="post" class="mt-1">
                                                    @csrf
                                                    <input type="hidden" name="id" id="id"
                                                        value="{{ $contact['id'] }}">
                                                    <button type="submit" class="badge badge-danger"
                                                        onclick="return confirm('Are you sure want to continue?')"><i
                                                            class="fa fa-trash"></i> Remove</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td>
                                                <p>No Records Found!!</p>
                                            </td>
                                        </tr>
                                    @endforelse

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
