@extends('admin.master')

@section('title', 'Manage Teachers')

@section('content')

    <div class="row mb-2 mb-xl-3">
        <div class="col-12 col-lg-12 col-xxl-3 d-flex">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">All Teacher Information</h5>
                </div>
                <div class="card-body">
                    <table id="datatables-fixed-header" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>NID</th>
                                <th>Change Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teachers as $teacher)
                                <?php
                                $words = explode(' ', "$teacher->name");
                                $acronym = '';
                                foreach ($words as $w) {
                                    $acronym .= $w[0];
                                }
                                ?>
                                <tr class="nk-tb-item">
                                    <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                                        <span class="tb-amount">{{ $loop->iteration }}</span>
                                    </td>
                                    <td class="nk-tb-col">
                                        <div class="user-card">
                                            <div class="user-avatar bg-dim-primary d-none d-sm-flex">
                                                @if (isset($teacher->image))
                                                    <img src='{{ asset("$teacher->image") }}' width="48" height="48"
                                                        alt="" class="rounded-circle me-2">
                                                @else
                                                    <span>{{ $acronym }}</span>
                                                @endif
                                            </div>
                                            <div class="user-info">
                                                <span class="tb-lead">{{ $teacher->name }}<span
                                                        class="dot dot-success d-md-none ml-1"></span></span>
                                                <span>{{ $teacher->email }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="nk-tb-col tb-col-md">
                                        <span>{{ $teacher->phone }}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-lg" data-order="Email Verified - Kyc Unverified">

                                        <span>{{ $teacher->address }}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-lg">
                                        <span>{{ $teacher->nid }}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-md">
                                        <form action="{{ route('teacher.change.status', ['id' =>$teacher->id]) }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="btn {{ $teacher->status == 0 ? 'btn-danger' : 'btn-success' }}">
                                                {{ $teacher->status == 0 ? 'Inactive' : 'Active' }}
                                            </button>
                                        </form>

                                    </td>
                                    <td class="table-action">

                                        <a href="{{ route('teachers.edit', $teacher) }}">
                                            <i class="align-middle" data-feather="edit"></i>
                                        </a>

                                        <a href=""
                                            onclick="event.preventDefault();
                                                        document.getElementById('deleteTeacher{{ $teacher->id }}').submit();
                                                        return confirm('Are you sure?');">
                                            <i class="align-middle" data-feather="trash-2"></i>
                                        </a>

                                        <form action="{{ route('teachers.destroy', $teacher) }}" method="POST"
                                            id="deleteTeacher{{ $teacher->id }}">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>

@endsection
