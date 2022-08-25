@extends('teacher.master')

@section('title', 'Manage Courses')

@section('content')


    <div class="nk-block nk-block-lg">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title">All course Information</h4>
            </div>
        </div>
    </div>

    <div class="card-body">
        <table id="datatables-fixed-header" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Course Title</th>
                    <th>Starting Day</th>
                    <th>Ending Day</th>
                    <th>Fee</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                    <tr class="nk-tb-item">
                        <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                            <span class="tb-amount">{{ $loop->iteration }}</span>
                        </td>
                        <td class="nk-tb-col">
                            <div class="user-card">
                                <div class="user-info">
                                    <span class="tb-lead">{{ $course->name }}<span
                                            class="dot dot-success d-md-none ml-1"></span></span>
                                </div>
                            </div>
                        </td>
                        <td class="nk-tb-col tb-col-md">
                            <span>{{ $course->start_date }}</span>
                        </td>
                        <td class="nk-tb-col tb-col-lg" data-order="Email Verified - Kyc Unverified">

                            <span>{{ $course->end_date }}</span>
                        </td>
                        <td class="nk-tb-col tb-col-lg">
                            <span>{{ $course->fee }}</span>
                        </td>
                        <td class="nk-tb-col tb-col-md">
                            <span
                                class="tb-status
                    @if ($course->status == 0) {{ 'text-warning' }}
                    @elseif ($course->status == 1)
                        {{ 'text-success' }}
                    @elseif ($course->status == 2)
                        {{ 'text-danger' }} @endif
                    ">
                                @if ($course->status == 0)
                                    {{ 'Unapproved' }}
                                @elseif ($course->status == 1)
                                    {{ 'Approved' }}
                                @elseif ($course->status == 2)
                                    {{ 'Rejected' }}
                                @endif

                            </span>
                        </td>

                        <td class="nk-tb-col nk-tb-col-tools">
                            
                            <a href="{{ route('courses.show', $course) }}" class="btn"
                            data-bs-toggle="tooltip" data-bs-placement="top" title="Show">
                                <i class="align-middle" data-feather="check-circle"></i>
                            </a>
                            <a href="{{ route('courses.edit', $course) }}" class="btn btn-trigger btn-icon"
                            data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                <i class="align-middle" data-feather="edit"></i>
                            </a>

                            <a href="" class="btn btn-trigger btn-icon"
                            data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"
                                onclick="event.preventDefault(); confirm('Are you Sure?'); document.getElementById('deleteCourse{{ $course->id }}').submit()">
                                <i class="align-middle" data-feather="trash-2"></i>
                            </a>

                            <form action="{{ route('courses.destroy', $course) }}" method="POST"
                                id="deleteCourse{{ $course->id }}">
                                @csrf
                                @method('delete')
                            </form>

                        </td>
                    </tr><!-- .nk-tb-item  -->
                @endforeach

            </tbody>
        </table>
    </div>

@endsection
