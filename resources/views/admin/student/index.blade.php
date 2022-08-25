@extends('admin.master')

@section('title', 'Manage students')

@section('content')

    <div class="row mb-2 mb-xl-3">
        <div class="col-12 col-lg-12 col-xxl-3 d-flex">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">All student Information</h5>
                </div>
                <div class="card-body">
                    <table id="datatables-fixed-header" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Change Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <?php
                                $words = explode(' ', "$student->name");
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
                                                @if (isset($student->image))
                                                    <img src='{{ asset("$student->image") }}' width="48" height="48"
                                                        alt="" class="rounded-circle me-2">
                                                @else
                                                    <span>{{ $acronym }}</span>
                                                @endif
                                            </div>
                                            <div class="user-info">
                                                <p class="p-0 m-0">{{ $student->name }}</p>
                                                <p class="p-0 m-0">{{ $student->email }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="nk-tb-col tb-col-md">
                                        <span>{{ $student->phone }}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-lg" data-order="Email Verified - Kyc Unverified">

                                        <span>{{ $student->address }}</span>
                                    </td>
                                
                                    <td class="nk-tb-col tb-col-md">
                                        <form action="{{ route('student.change.status', ['id' =>$student->id]) }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="btn {{ $student->status == 0 ? 'btn-danger' : 'btn-success' }}">
                                                {{ $student->status == 0 ? 'Inactive' : 'Active' }}
                                            </button>
                                        </form>

                                    </td>
                                    <td class="table-action">

                                        <a href=""
                                            onclick="event.preventDefault();
                                                        document.getElementById('deletestudent{{ $student->id }}').submit();
                                                        return confirm('Are you sure?');">
                                            <i class="align-middle" data-feather="trash-2"></i>
                                        </a>

                                        <form action="{{ route('students.destroy', $student) }}" method="POST"
                                            id="deletestudent{{ $student->id }}">
                                            @csrf
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
