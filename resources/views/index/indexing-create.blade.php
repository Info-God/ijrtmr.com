@extends('layouts/contentNavbarLayout')

@section('title', ' Horizontal Layouts - Forms')

@section('content')
    <!-- <h4 class="py-3 mb-4">Add Indexing</h4> -->

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Add Indexing</h5> <small class="text-muted float-end">Default label</small>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('index-store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Indexing Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control  is-invalid" name="indexing_name"
                                    id="basic-default-name" placeholder="Enter the Indexing Name"
                                    value="{{ old('indexing_name') }}" />

                                @if ($errors->has('indexing_name'))
                                    <div class="invalid-feedback"><strong>{{ $errors->first('indexing_name') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="index-url">Indexing URL</label>
                            <div class="col-sm-10">
                                <input type="text" name="indexing_url" class="form-control is-invalid" id="index-url"
                                    placeholder="Indexing URL" value="{{ old('indexing_url') }}" />
                                @if ($errors->has('indexing_url'))
                                    <span class="invalid-feedback">
                                        <Strong>{{ $errors->first('indexing_url') }}</Strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Indexing Image</label>
                            <input class="form-control is-invalid" name="indexing_image_url" type="file" id="formFile"
                                value="{{ old('indexing_image_url') }}">
                            @if ($errors->has('indexing_image_url'))
                                <span class="invalid-feedback">
                                    <Strong>{{ $errors->first('indexing_image_url') }}</Strong>
                                </span>
                            @endif
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">ADD</button>
                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                <a href="{{ route('index-home') }}" class="btn btn-danger">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
