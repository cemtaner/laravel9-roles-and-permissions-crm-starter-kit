@extends('layouts.admin')


@section('content')
<h1 class="mt-4">Users Management</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active"><a class="btn btn-primary" href="{{ route('users.create') }}"> <i class="fa fa-plus"></i> New User</a></li>
</ol>

<div class="card mb-4">
    <div class="card-header"> <i class="fas fa-users"></i> User List </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th style="10px">#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th width="130px">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($data as $key => $user)
              <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                  @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $v)
                      <label class="bg bg-success text-white p-1">{{ $v }}</label>
                    @endforeach
                  @endif
                </td>
                <td>
                  <a class="btn btn-primary btn-sm text-white" href="{{ route('users.edit',$user->id) }}">Edit</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                </td>
              </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection