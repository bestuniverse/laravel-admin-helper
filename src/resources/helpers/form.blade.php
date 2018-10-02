@foreach ($list['input'] as $key => $value)
	
	<div class="form-group row">
		@if ($value['type'] == 'text')
			{!! Form::label($value['name'], $value['label'], array('class' => 'col-md-3 col-form-label')) !!} 
			<div class="col-md-9">
				{!! Form::text($value['name'], null, [
					'class' => 'form-control',
					'placeholder' => $value['placeholder']
				]) !!}
			</div>
		@endif

		@if ($value['type'] == 'textarea')
			
				{!! Form::label($value['name'], $value['label'], array('class' => 'col-md-3 col-form-label')) !!} 
				<div class="col-md-9">
					{!! Form::textarea($value['name'], null, [
						'class' => 'form-control rte_autoload',
						'placeholder' => $value['placeholder'],
						'rows' => $value['rows']
					]) !!}
				</div>
		@endif

		@if ($value['type'] == 'checkbox')
			
		@endif
	</div>

@endforeach
	

@if (isset($list['submit']) && $list['submit'])
	<div class="form-position">
		<div class="col-md-12 text-right">

			<div class="form-group">
				{!! Form::submit($list['submit']['title'], ['class' => $list['submit']['class']]) !!}
			</div>
			
		</div>
	</div>
@endif

