@extends('admin.master')

@section('title', 'Update Course')

@section('content')
    <div class="card card-preview">
        <div class="card-inner">
            <div class="preview-block">
                <span class="preview-title-lg overline-title">Update Course Information</span>

                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row gy-4">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label" for="default-01">Course Title</label>
                                <div class="form-control-wrap">
                                    <input type="text" name="name" class="form-control" id="default-01" placeholder=""
                                        value="{{ $course->name }}" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="default-01">Starting Date</label>
                                <div class="form-control-wrap">
                                    <input type="date" name="start_date" class="form-control" placeholder=""
                                        value="{{ $course->start_date }}" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="default-01">Ending Date</label>
                                <div class="form-control-wrap">
                                    <input type="date" name="end_date" class="form-control" id="default-01"
                                        placeholder="" value="{{ $course->end_date }}" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="default-01">Course Fee</label>
                                <div class="form-control-wrap">
                                    <input type="number" name="fee" class="form-control" id="default-01" placeholder=""
                                        value="{{ $course->fee }}" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="default-06">Image</label>
                                <div class="form-control-wrap">
                                    <div class="custom-file">
                                        <img src='{{ asset("$course->image") }}' class="card-img-top" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="default-textarea">Short Description</label>
                                <div class="form-control-wrap">
                                    <textarea disabled name="short_description" class="form-control no-resize" id="default-textarea" rows="5">{{ $course->short_description }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="default-01">Long Description</label>
                                <div class="form-control-wrap">
                                    <textarea disabled name="long_description" class="summernote-basic" id="" cols="30" rows="10">{!! $course->long_description !!}</textarea>
                                </div>
                            </div>

                            
                            <div class="form-group">
                                <label class="form-label" for="default-01">Status</label>
                                <div class="form-control-wrap">
                                    <label for=""><input name="status" type="radio" class="radio-sm" value="0"> Unapproved</label>
                                    <label for=""><input name="status" type="radio" class="radio-sm" value="1"> Approved</label>
                                    <label for=""><input name="status" type="radio" class="radio-sm" value="2"> Rejected</label>
                                </div>
                            </div>
                            
                            <div class="form-control-wrap">
                                  
                            </div>
                            <div class="form-control-wrap">
                                <input type="text" name="rejection_cause" class="form-control" id="default-01">
                            </div>
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <input type="submit" class="btn btn-primary form-control" id="default-01"
                                    value="Send">
                                </div>
                            </div>
                        </div>

                    </div>
                    
                </form>
            </div>
        </div>
    </div><!-- .card-preview -->
@endsection
