@extends('home.layout')

@section('title', 'Todo App')

@section('content')
    <div class="row">
    	<div class="col-lg-12">
    		<h1 class="text-center">Todo App</h1>
    	</div>
    	<div class="col-lg-12">
    		<form>
				<div class="input-group mb-3">
					{{ csrf_field() }}
					<input type="text" class="form-control" name="item" value="" placeholder="Todo item" />
			      <div class="input-group-append">
			        <button type="button" class="btn btn-xs btn-primary" onclick="todoCreate();">Add to list</button>
			      </div>
			    </div>
    			<div class="form-group">
    			</div>
    		</form>
    	</div>
    	<div class="col-lg-12">
			<ul class="list-group">
			</ul>    		
    	</div>
    </div>
@endsection