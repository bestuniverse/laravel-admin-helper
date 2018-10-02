{{-- helper edit --}}

<div class="helper-form">
		
		<div class="card card-primary">
			<div class="card-header clearfix">
				{{ $title }}
			</div>
			<div class="card-body">
				
				{!! Form::model($object, ['url' => ['admin/'.$model, $object->id], 'method' => 'put', 'class' => 'form-horizontal col-md-6', 'id' => 'form-id']) !!}
				
				@include('admin.helpers.form')
				
                {!! Form::close() !!}


			</div>
		</div>
		
</div>

{{-- 
<script>
	$(document).ready( function () {

	} );
</script> --}}
