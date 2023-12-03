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
        <div class="right_col" role="main">
            <section class="content">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-md-12 text-right">
                    </div>
                    <div class="col-md-12 mt-3">
                      <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title float-left">{{$sub_company->company_name}} Member</h3>
                        </div>
                      {{-- <form id="product-form" action="{{ route('sub-company.team.update', $sub_company_team->id) }}" method="POST" --}}
                      <form id="product-form" action="{{ route('sub-company.team.update', ['id'=>$sub_company_team->id,'comp_slug'=>$sub_company->slug, 'sec_slug'=>$sec_slug]) }}" method="POST"
                        enctype="multipart/form-data">
                        {{-- ['id'=>$value->id,'comp_slug'=> $sub_company->slug, 'sec_slug'=> $sec_slug] --}}
                        @csrf
                        @method('patch') 
                        <input type="hidden" name="id" value="{{ $sub_company_team->id }}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-primary">
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Full Name</label>
                                                    <input type="text" name="name" class="form-control"
                                                        placeholder="Enter Full Name" value="{{ $sub_company_team->name }}" required>
                                                    @error('name')
                                                        <p style="color: red">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Email</label>
                                                    <input type="email" name="email" class="form-control"
                                                        placeholder="Enter Email" value="{{ $sub_company_team->email }}">
                                                    @error('email')
                                                        <p style="color: red">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="phone">Contact Number</label>
                                                    <input type="number" name="phone" class="form-control"
                                                        placeholder="Enter Contact " value="{{ $sub_company_team->phone }}">
                                                    @error('phone')
                                                        <p style="color: red">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="designation">Designation</label>
                                                    <input type="text" name="designation" class="form-control"
                                                        placeholder="Enter designation" value="{{ $sub_company_team->designation }}"
                                                        required>
                                                    @error('designation')
                                                        <p style="color: red">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="facebook">Facebook Link</label>
                                                    <input type="text" name="facebook" class="form-control" placeholder="Enter Facebook Link" value="{{ $sub_company_team->facebook }}">
                                                    @error('facebook')
                                                    <p style="color: red">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="twitter">Twitter Link</label>
                                                    <input type="text" name="twitter" class="form-control" placeholder="Enter Twitter Link" value="{{ $sub_company_team->twitter }}">
                                                    @error('twitter')
                                                    <p style="color: red">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="instagram">Instagram Link</label>
                                                    <input type="text" name="instagram" class="form-control" placeholder="Enter Instagram Link" value="{{ $sub_company_team->instagram }}">
                                                    @error('instagram')
                                                    <p style="color: red">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="image">Image </label>
    
                                                    <input type="file" id="file-ip-1" accept="image/*" class="form-control-file border" value="{{ old('image') }}" onchange="showPreview1(event);" name="image">
                                                    <img src="{{ asset('upload/images/sub-company/team/'.$sub_company_team->image) }}" alt="{{ $sub_company_team->title }}" width="200px">
                                                    @error('image')
                                                            <p style="color: red">{{ $message }}</p>
                                                        @enderror
                                                    <div class="preview mt-2">
                                                        <img src="" id="file-ip-1-preview" width="200px">
                                                    </div>
    
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Bootstrap Switch -->
                                                <div class="card card-secondary">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Publish</h3>
                                                    </div>
                                                    <label class="switch m-3">
                                                        @if($sub_company_team->status == 'on')
                                                                <input type="checkbox" class="form-control" name="status" checked>
                                                        @else
                                                            <input type="checkbox" class="form-control" name="status">
                                                        @endif
                                                    <span class="slider round"></span>
                                                    </label>
    
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="col-md-12 text-center" style=" margin-top: 10px;margin-bottom: 10px;">
                                                <button type="submit" class="btn btn-primary">Update <i
                                                        class="bi bi-check"></i></button>
                                            </div>
    
                                        </div>
                                    </div>
                        </div>
                    </form>
                    </div>
                    </div>
                </div>
                </div><!-- /.container-fluid -->
              </section>
            </div>
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
    <script>
        $('textarea.summernote').summernote({
            placeholder: 'Enter  Company Description',
            tabsize: 2,
            height: 100,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'hr']],
                ['view', ['fullscreen', 'codeview']],
                ['help', ['help']]
            ],
        });
    </script>
    <script>
        $('.extra-fields-customer').click(function() {
            $('.customer_records').clone().appendTo('.customer_records_dynamic');
            $('.customer_records_dynamic .customer_records').addClass('single remove');
            $('.single .extra-fields-customer').remove();
            $('.single').append(
                '<a href="#" class="remove-field btn-remove-customer badge badge-danger">Remove Product</a>');
            $('.customer_records_dynamic > .single').attr("class", "remove");

            $('.customer_records_dynamic input').each(function() {
                var count = 0;
                var fieldname = $(this).attr("name");
                $(this).attr('name', fieldname + count);
                count++;
            });

        });

        $(document).on('click', '.remove-field', function(e) {
            $(this).parent('.remove').remove();
            e.preventDefault();
        });
    </script>
@endsection
