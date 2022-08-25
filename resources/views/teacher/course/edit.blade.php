@extends('teacher.master')

@section('title', 'Update Course')

@section('content')

<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Update Course Information</h4>
        </div>
    </div>
</div> 
    <div class="card card-preview">
        <div class="card-inner">
            <div class="preview-block">

                <form action="{{ route('courses.update', $course) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row gy-4">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="default-01">Course Title</label>
                                <div class="form-control-wrap">
                                    <input type="text" name="name" class="form-control" id="default-01" placeholder=""
                                        value="{{ $course->name }}">
                                <span class="text-danger">{{ $errors->has('name')? $errors->first('name'): '' }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="default-01">Starting Date</label>
                                <div class="form-control-wrap">
                                    <input type="date" name="start_date" class="form-control" placeholder=""
                                        value="{{ $course->start_date }}">
                                <span class="text-danger">{{ $errors->has('start_date')? $errors->first('start_date'): '' }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="default-01">Ending Date</label>
                                <div class="form-control-wrap">
                                    <input type="date" name="end_date" class="form-control" id="default-01"
                                        placeholder="" value="{{ $course->end_date }}">
                                <span class="text-danger">{{ $errors->has('end_date')? $errors->first('end_date'): '' }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="default-01">Course Fee</label>
                                <div class="form-control-wrap">
                                    <input type="number" name="fee" class="form-control" id="default-01" placeholder=""
                                        value="{{ $course->fee }}">
                                <span class="text-danger">{{ $errors->has('fee')? $errors->first('fee'): '' }}</span>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label" for="default-textarea">Short Description</label>
                                <div class="form-control-wrap">
                                    <textarea name="short_description" class="form-control no-resize" id="default-textarea" rows="5">{{ $course->short_description }}</textarea>
                                    <span class="text-danger">{{ $errors->has('short_description')? $errors->first('short_description'): '' }}</span>
                            
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label class="form-label" for="default-06">Image</label>
                            <div class="form-control-wrap">
                                <div class="custom-file">
                                    <img src='{{ asset("$course->image") }}' class="card-img-top" style="height: 200px; object-fit:cover" alt="">
                                    <input class="form-control" type="file" name="image" multiple class="custom-file-input"
                                        id="customFile">
                                    <span class="text-danger">{{ $errors->has('image')? $errors->first('image'): '' }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="default-01">Long Description</label>
                            <div class="form-control-wrap">
                                <textarea name="long_description" id="summernote" id="" cols="30" rows="10">{!! $course->long_description !!}</textarea>
                                <span class="text-danger">{{ $errors->has('long_description')? $errors->first('long_description'): '' }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <div class="form-control-wrap">
                            <input type="submit" class="btn btn-primary form-control" id="default-01"
                                value="Update Course Informations">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- .card-preview -->
@endsection
