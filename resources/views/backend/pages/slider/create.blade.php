@extends('backend.layout.app')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add a slider</h4>
                    {{-- <p class="card-description">
                        Basic form elements
                    </p> --}}
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif
                    <form method="POST" action="{{ route('admin.slider.store')}}" enctype="multipart/form-data" class="forms-sample">
                        @csrf
                        <div class="form-group">
                            <label for="sliderTitle">Slider Title</label>
                            <input type="text" class="form-control" id="sliderTitle" name="name"
                                placeholder="Slider Title">
                        </div>
                        <div class="form-group">
                            <label for="sliderContent">Slider Content</label>
                            <textarea name="content" id="sliderContent" cols="10" rows="5" class="form-control"
                                placeholder="Slider Content"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="sliderLink">Slider Link</label>
                            <input type="text" class="form-control" id="sliderLink" name="link"
                                placeholder="Slider Link">
                        </div>
                        <div class="form-group">
                            <label>File upload</label>
                            <input type="file" name="image" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled
                                    placeholder="Upload Image">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="0">Passive</option>
                                <option value="1" selected>Active</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
