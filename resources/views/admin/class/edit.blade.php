@extends('admin.layout')
@section('content')
    
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>General Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Academic Year</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">

                    <div class="card card-primary">
                        @include('message')
                        <div class="card-header">
                            <h3 class="card-title">Add Academic Year</h3>
                        </div>


                        <form action="{{ route('class.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="{{ $data->id  }}" name="id">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="academic-year">Academic Year</label>
                                    <input type="text" class="form-control @error('class') is-invalid @enderror" name="class" id="class"
                                        placeholder="Enter Academic Year" value="{{ old('class',$data->name) }}">
                                        @error('class')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update Class</button>
                            </div>
                        </form>
                    </div>


            </div>

        </div>
    </section>

</div>
@endsection

@section('customJs')

<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<script>
    $(function() {
        bsCustomFileInput.init();
    });
</script>

@endsection