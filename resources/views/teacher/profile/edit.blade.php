@extends('teacher.master')

@section('title', 'Update Profile')

@section('content')
    <div class="card card-preview">
        <div class="card-inner">
            <div class="preview-block">
                <span class="preview-title-lg overline-title">Teacher Information</span>
                <form action="{{ route('teachers.profile.update', $teacher) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row gy-4">
                        <div class="col-sm-6">

                            <div class="form-group">
                                <label class="form-label" for="default-01">Full Name</label>
                                <div class="form-control-wrap">
                                    <input type="text" name="name" class="form-control" id="default-01"
                                        value="{{ $teacher->name }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="default-01">Email</label>
                                <div class="form-control-wrap">
                                    <input type="text" name="email" class="form-control" id="default-01"
                                    value="{{ $teacher->email }}">
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
                                <label class="form-label" for="default-01">Phone Number</label>
                                <div class="form-control-wrap">
                                    <input type="text" name="phone" class="form-control" id="default-01"
                                    value="{{ $teacher->phone }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="default-06">Photo</label>
                                <div class="form-control-wrap">
                                    <img src='{{ asset("$teacher->image") }}' alt="No Image Found" class="user-avatar" style="height: 150px; width: 150px; object-fit: cover">
                                    <div class="custom-file">
                                        <input type="file" name="image" multiple class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose An Image</label>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-6">

                            <div class="form-group">
                                <label class="form-label" for="default-textarea">Address</label>
                                <div class="form-control-wrap">
                                    <textarea name="address" class="form-control no-resize" id="default-textarea" rows="12">{{ $teacher->address }}</textarea>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="form-label" for="default-01">NID</label>
                                <div class="form-control-wrap">
                                    <input type="text" name="nid" class="form-control" id="default-01"
                                    value="{{ $teacher->nid }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="default-01">District</label>
                                <div class="form-control-wrap">
                                    <input type="text" name="district_id" class="form-control" id="default-01" value="{{ $teacher->district_id }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="default-01">Status</label>
                                <div class="custom-control custom-control-sm custom-radio">
                                    <input type="radio" name="status" value="1" id="customRadio1" name="customRadio" class="custom-control-input"
                                    {{ $teacher->status == 1? "checked": '' }}
                                    >
                                    <label class="custom-control-label" for="customRadio1">Active</label>
                                </div>
                                <div class="custom-control custom-control-sm custom-radio">
                                    <input type="radio" name="status" value="0" id="customRadio2" name="customRadio" class="custom-control-input"
                                    {{ $teacher->status == 0? "checked": '' }}
                                    >
                                    <label class="custom-control-label" for="customRadio2">Inactive</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <input type="submit" class="btn btn-primary form-control"
                                        id="default-01" value="Update Teacher Informations">
                                </div>
                                
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div><!-- .card-preview -->
@endsection
