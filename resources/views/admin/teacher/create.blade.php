@extends('admin.master')

@section('title', 'Create Teacher')

@section('content')
    <div class="card card-preview">
        <div class="card-inner">
            <div class="preview-block">
                <form action="{{ route('teachers.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row gy-4">
                        <div class="col-sm-6">

                            <div class="form-group">
                                <label class="form-label" for="default-01">Full Name</label>
                                <div class="form-control-wrap">
                                    <input type="text" name="name" class="form-control" id="default-01"
                                        placeholder="">
                                    <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="default-01">Email</label>
                                <div class="form-control-wrap">
                                    <input type="text" name="email" class="form-control" id="default-01"
                                        placeholder="">
                                    <span
                                        class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="default-01">Password</label>
                                <div class="form-control-wrap">
                                    <input type="text" name="password" class="form-control" id="default-01"
                                        placeholder="">
                                    <span
                                        class="text-danger">{{ $errors->has('password') ? $errors->first('password') : '' }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="default-01">Phone Number</label>
                                <div class="form-control-wrap">
                                    <input type="text" name="phone" class="form-control" id="default-01"
                                        placeholder="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="default-06">Photo</label>
                                <div class="form-control-wrap">
                                    <div class="custom-file">
                                        <input type="file" name="image" multiple class="custom-file-input"
                                            id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose An Image</label>
                                        <span
                                            class="text-danger">{{ $errors->has('image') ? $errors->first('image') : '' }}</span>

                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="default-06">Designation</label>
                                <div class="form-control-wrap">
                                    <div class="custom-file">
                                        <input type="text" name="designation" class="form-control">
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="form-label" for="default-06">Links(Twitter/linkedIn/Github/Personal)</label>
                                <div class="form-control-wrap">
                                    <div class="custom-file">
                                        <input type="text" name="link_1" class="form-control">
                                        <span class="text-danger">{{ $errors->has('link_1') ? $errors->first('link_1') : '' }}</span>

                                        <input type="text" name="link_2" class="form-control">
                                        <span class="text-danger">{{ $errors->has('link_2') ? $errors->first('link_2') : '' }}</span>

                                        <input type="text" name="link_3" class="form-control">
                                        <span class="text-danger">{{ $errors->has('link_3') ? $errors->first('link_3') : '' }}</span>

                                        <input type="text" name="link_4" class="form-control">
                                        <span class="text-danger">{{ $errors->has('link_4') ? $errors->first('link_4') : '' }}</span>

                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-6">

                            <div class="form-group">
                                <label class="form-label" for="default-textarea">Address</label>
                                <div class="form-control-wrap">
                                    <textarea name="address" class="form-control no-resize" id="default-textarea" rows="12"></textarea>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="form-label" for="default-01">NID</label>
                                <div class="form-control-wrap">
                                    <input type="text" name="nid" class="form-control" id="default-01"
                                        placeholder="National Identification Number">
                                    <span class="text-danger">{{ $errors->has('nid') ? $errors->first('nid') : '' }}</span>

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="default-01">District</label>
                                <div class="form-control-wrap">
                                    <input type="text" name="district_id" class="form-control" id="default-01"
                                        placeholder="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="default-01">Status</label>
                                <div class="custom-control custom-control-sm custom-radio">
                                    <input type="radio" name="status" value="1" id="customRadio1"
                                        name="customRadio" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio1">Active</label>
                                </div>
                                <div class="custom-control custom-control-sm custom-radio">
                                    <input type="radio" name="status" value="0" id="customRadio2"
                                        name="customRadio" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio2">Inactive</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <input type="submit" class="btn btn-primary form-control" id="default-01"
                                        value="Save Teacher Informations">
                                </div>

                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div><!-- .card-preview -->
@endsection
