@extends('layouts.master')

@section('title', 'View Users')

@section('content')

    <div class="container-fluid px-4">

        <div class="card mt-4">

            <div class="card-header">
                <h4>View Users</h4>
            </div>

            <div class="card-body">

                @if (session('status'))
                    <div class="atert alert-success p-3">{{ session('status') }}</div>
                @endif

                <div class="table-responsive">
                    <table id="myTable" class="table table-bordered">

                        <thead>
    
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>E-mail</th>
                                <th>Role</th>
                                <th>Edit</th>
                            </tr>
    
                        </thead>
    
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role_as == '1' ? 'Admin' : 'User' }}</td>
                                    <td>
                                        <a href="{{ URL('admin/edit-user/'.$user->id) }}" class="btn btn-success">Edit</a>
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
