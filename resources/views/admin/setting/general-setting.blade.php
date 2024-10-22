@extends('admin.layouts.app')
@section('content')
<div id="layout-wrapper">



    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header card-header-bordered">
                                <h3 class="card-title">General Setting <small>Login/Register Page</small></h3>
                            </div>
                            <div class="card-body">


                                <form class="row g-3" action="{{route('admin.generalsettingUpdate')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-4">
                                        <label for="title" class="form-label">Title </label>
                                        <input type="text" class="form-control" id="title" name="login_title"
                                            value="{{ $settings->login_title }}" />
                                    </div>

                                    <div class="col-md-4">
                                        <label for="logo" class="form-label">Logo</label>
                                        <input type="file" class="form-control" id="logo" name="logo" accept="image/*"
                                            onchange="previewLogo(event)" />

                                        @if($settings->logo)
                                        <div class="mt-2">
                                            <img src="{{ asset('admin/setting/' . $settings->logo) }}"
                                                alt="Current Logo" style="width: 100px; margin-top: 10px;"
                                                id="current-logo">
                                        </div>
                                        @endif
                                        <div class="mt-2">
                                            <img id="new-logo-preview" alt="New Logo Preview"
                                                style="width: 100px; margin-top: 10px; display: none;">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="background_image" class="form-label">Background Image </label>
                                        <input type="file" class="form-control" id="background_image"
                                            name="background_image" accept="image/*"
                                            onchange="previewBackgroundImage(event)" />

                                        @if($settings->background_image)
                                        <div class="mt-2">
                                            <img src="{{ asset('admin/setting/' . $settings->background_image) }}"
                                                alt="Current Background Image" style="width: 100px; margin-top: 10px;"
                                                id="current-bg-image">
                                        </div>
                                        @endif
                                        <div class="mt-2">
                                            <img id="new-bg-image-preview" alt="New Background Image Preview"
                                                style="width: 100px; margin-top: 10px; display: none;">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="description_title" class="form-label">Description Title </label>
                                        <input type="text" class="form-control" id="description_title" name="description_title"
                                            value="{{ $settings->description_title }}" />
                                    </div>
                                    <div class="col-8">
                                        <label for="description" class="form-label">Description 
                                            <small>Minimum 15 Word Description</small></label>
                                        <input type="text" class="form-control" id="description"
                                            
                                            value="{{ $settings->description }}" name="description" />
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    @push('scripts')
    <script>
    function previewLogo(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('new-logo-preview');
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block'; 
        }

        if (file) {
            reader.readAsDataURL(file);
        }
    }

    function previewBackgroundImage(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('new-bg-image-preview');
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block'; 
        }

        if (file) {
            reader.readAsDataURL(file);
        }
    }
    </script>
    @endpush
    @endsection