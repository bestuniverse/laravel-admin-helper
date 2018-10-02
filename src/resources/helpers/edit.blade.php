@extends($config['extends'])

@section('footer_styles')

<script>
	$(document).ready( function () {

	} );
</script>

@endsection


@section($config['section'])

<div class="helper-form">
		
		<div class="card card-primary">
			<div class="card-header clearfix">
				{{ $title }}
			</div>
			<div class="card-body">
				
				{!! Form::model($object, ['url' => ['admin/'.$model, $object->id], 'method' => 'put', 'class' => 'form-horizontal col-md-6', 'id' => 'form-id']) !!}
				
				@include('adminHelpers::form')
				
                {!! Form::close() !!}


			</div>
		</div>
		
</div>
@endsection

