@extends('admin.master')

@section('title', 'Manage users')

@section('content')

    <div class="nk-block nk-block-lg">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title">All Admin Information</h4>
                {{-- <div class="nk-block-des">
                <p>Using the most basic table markup, here’s how <code class="code-class">.table</code> based tables look by default.</p>
            </div> --}}
            </div>
        </div>
        <div class="card-body">
            <table id="datatables-fixed-header" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <?php
                        $words = explode(' ', "$user->name");
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
                                        @if (isset($user->image))
                                            <img src='{{ asset("$user->image") }}' width="48" height="48"
                                                alt="" class="rounded-circle me-2">
                                        @else
                                            <span>{{ $acronym }}</span>
                                        @endif
                                    </div>
                                    <div class="user-info">
                                        <div class="tb-lead">{{ $user->name }}<div>
                                        <div class="">{{ $user->email }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="nk-tb-col tb-col-md">
                                <span>{{ $user->phone }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-lg" data-order="Email Verified - Kyc Unverified">

                                <span>{{ $user->address }}</span>
                            </td>

                            <td class="nk-tb-col nk-tb-col-tools">

                                <a href="{{route('admin.profile.edit', $user->id)}}" class="btn btn-trigger btn-icon"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                    <i class="align-middle" data-feather="edit"></i>
                                </a>

                                <a href="" class="btn btn-trigger btn-icon" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Delete"
                                    onclick="event.preventDefault(); confirm('Are you Sure?'); document.getElementById('deleteUser{{ $user->id }}').submit()">
                                    <i class="align-middle" data-feather="trash-2"></i>
                                </a>

                                <form action="{{route('admin.profile.delete', $user->id)}}" method="POST"
                                    id="deleteUser{{ $user->id }}">
                                    @csrf
                                </form>

                            </td>
                        </tr><!-- .nk-tb-item  -->
                    @endforeach

                </tbody>
            </table>
        </div>


    @endsection
