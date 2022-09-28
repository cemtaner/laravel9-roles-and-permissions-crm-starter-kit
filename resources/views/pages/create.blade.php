@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Page</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('pages.index') }}"> <i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
    </div>

    <form action="{{ route('pages.store') }}" method="POST">
    	@csrf


         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Name:</strong>
		            <input type="text" name="name" class="form-control" placeholder="Name">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Detail:</strong>
		            <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
		    </div>
		</div>


    </form>
@endsection