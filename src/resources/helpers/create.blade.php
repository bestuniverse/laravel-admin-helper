{{-- helper create --}}


<div class="helper-form">
		
		<div class="card card-primary">
			<div class="card-header clearfix">
				{{ $title }}
			</div>
			<div class="card-body">
				
                {!! Form::open(['url' => 'admin/'.$model, 'method' => 'post', 'class' => 'form-horizontal col-md-6', 'id' => 'create-'.$model.'-form']) !!}
					
					@include('admin.helpers.form')
				
                {!! Form::close() !!}


			</div>
		</div>
		
</div>

{{-- <script>
	$(document).ready( function () {

	} );
</script>
 --}}