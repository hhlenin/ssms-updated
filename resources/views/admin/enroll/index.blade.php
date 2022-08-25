@extends('admin.master')

@section('title', 'Manage enrolls')

@section('content')

    <div class="row mb-2 mb-xl-3">
        <div class="col-12 col-lg-12 col-xxl-3 d-flex">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">All enroll Information</h5>
                </div>
                <div class="card-body">
                    <table id="datatables-fixed-header" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Student Name</th>
                                <th>Course Name</th>
                                <th>Starting Date</th>
                                <th>Ending Date</th>
                                <th>Payment Type</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($enrolls as $enroll)
                            
                                <tr class="nk-tb-item">
                                    
                                    <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                                        <span class="tb-amount">{{ $loop->iteration }}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                                        <span class="tb-amount">{{ $enroll->student->name }}</span>
                                    </td>
                                    
                                    <td class="nk-tb-col">
                                        <span>{{ $enroll->course->name }}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-md">
                                        <span>{{ $enroll->course->start_date }}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-lg" data-order="Email Verified - Kyc Unverified">
                                        <span>{{ $enroll->course->end_date }}</span>
                                    </td>
                                    <td>
                                        <span class="{{ $enroll->status == 0 ? 'text-warning' : 'text-success' }}">
                                                {{ $enroll->status == 0 ? 'Pending' : 'Approved' }}
                                            </span>
                                    </td>
                                    
                                    <td class="nk-tb-col tb-col-lg">
                                        <span>{{ $enroll->payment_type == 1? 'Paid' : 'Pay Later' }}</span>
                                    </td>
                                    <td>
                                        <a href="{{ route('enroll.change.status',  $enroll->id) }}" onclick="confirm('Are you sure want to aprrove this?')">
                                            <i class="align-middle" data-feather="repeat"></i>
                                        </a>
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
