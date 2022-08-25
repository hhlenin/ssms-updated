@extends('admin.master')

@section('title', 'Update Profile')

@section('content')
    <div class="card card-preview">
        <div class="card-inner">
            <div class="preview-block">
                <span class="preview-title-lg overline-title">Admin Informations Store Form</span>
                <form action="{{ route('admin.profile.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row gy-4">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="default-01">Full Name</label>
                                <div class="form-control-wrap">
                                    <input type="text" name="name" class="form-control" id="default-01"
                                        >
                                    <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="default-01">Email</label>
                                <div class="form-control-wrap">
                                    <input type="text" name="email" class="form-control" id="default-01"
                                        >
                                    <span
                                        class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="default-01">Password</label>
                                <div class="form-control-wrap">
                                    <input type="text" name="password" class="form-control" id="default-01"
                                        placeholder="Update your password">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="default-06">Photo</label>
                                <div class="form-control-wrap">
                                    <div class="custom-file">
                                        <input class="form-control" type="file" name="image" multiple
                                            class="custom-file-input" id="customFile">
                                        <span
                                            class="text-danger">{{ $errors->has('image') ? $errors->first('image') : '' }}</span>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="default-01">Phone Number</label>
                                <div class="form-control-wrap">
                                    <input type="text" name="phone" class="form-control" id="default-01"
                                       >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="default-textarea">Address</label>
                                <div class="form-control-wrap">
                                    <textarea name="address" class="form-control no-resize" id="default-textarea" rows="12"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <input type="submit" class="btn btn-primary form-control" id="default-01"
                                        value="Save Admin Informations">
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
