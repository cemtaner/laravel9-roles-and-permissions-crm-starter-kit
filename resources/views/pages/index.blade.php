@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Pages</h2>
            </div>
            <div class="pull-right">
                @can('page-create')
                <a class="btn btn-success" href="{{ route('pages.create') }}"> <i class="fa fa-plus"></i> Create New page</a>
                @endcan
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($pages as $page)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $page->name }}</td>
	        <td>{{ $page->detail }}</td>
	        <td>
                <form action="{{ route('pages.destroy',$page->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('pages.show',$page->id) }}">Show</a>
                    @can('page-edit')
                    <a class="btn btn-primary" href="{{ route('pages.edit',$page->id) }}">Edit</a>
                    @endcan

                    @csrf
                    @method('DELETE')
                    @can('page-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>
@endsection