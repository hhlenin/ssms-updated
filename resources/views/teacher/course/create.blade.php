@extends('teacher.master')

@section('title', 'Add Course')

@section('content')


    <div class="card">
        <a href="#" class="close" data-dismiss="modal" aria-label="Close">
            <em class="icon ni ni-cross"></em>
        </a>
        <div class="card-header">
            <h5 class="title">Create New Course</h5>
        </div>
        <form action="{{ route('courses.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row gy-4">
                    <div class="col-sm-6">

                        <div class="form-group">
                            <label class="form-label" for="default-01">Course Title</label>
                            <div class="form-control-wrap">
                                <input type="text" name="name" class="form-control" id="default-01" placeholder="">
                                <span class="text-danger">{{ $errors->has('name')? $errors->first('name'): '' }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="default-01">Starting Date</label>
                            <div class="form-control-wrap">
                                <input type="date" name="start_date" class="form-control" id="default-01" placeholder="">
                                <span class="text-danger">{{ $errors->has('start_date')? $errors->first('start_date'): '' }}</span>
                            
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="default-01">Ending Date</label>
                            <div class="form-control-wrap">
                                <input type="date" name="end_date" class="form-control" id="default-01" placeholder="">
                                <span class="text-danger">{{ $errors->has('end_date')? $errors->first('end_date'): '' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="default-01">Course Fee</label>
                            <div class="form-control-wrap">
                                <input type="number" name="fee" class="form-control" id="default-01" placeholder="">
                                <span class="text-danger">{{ $errors->has('fee')? $errors->first('fee'): '' }}</span>
                            </div>
                        </div>

                    </div>

                    <div class="col-sm-6">

                        <div class="form-group">
                            <label class="form-label" for="default-06">Image</label>
                            <div class="form-control-wrap">
                                <div class="custom-file">
                                    <input type="file" name="image" class="form-control" multiple
                                        class="custom-file-input" id="customFile">
                                <span class="text-danger">{{ $errors->has('image')? $errors->first('image'): '' }}</span>
                                    {{-- <label class="custom-file-label" for="customFile">Choose An Image</label> --}}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="default-textarea">Short Description</label>
                            <div class="form-control-wrap">
                                <textarea name="short_description" class="form-control no-resize" id="default-textarea" rows="5"></textarea>
                                <span class="text-danger">{{ $errors->has('short_description')? $errors->first('short_description'): '' }}</span>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="form-label" for="default-01">Long Description</label>
                        <div class="form-control-wrap">
                            <textarea id="summernote" rows="18" name="long_description"></textarea>
                            <span class="text-danger">{{ $errors->has('long_description')? $errors->first('long_description'): '' }}</span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-footer bg-light">
                <div class="form-group">
                    <div class="form-control-wrap">
                        <input type="submit" class="btn btn-primary form-control" id="default-01"
                            value="Save Course Informations">
                    </div>
                </div>
            </div>
        </form>

    </div>
    

@endsection
