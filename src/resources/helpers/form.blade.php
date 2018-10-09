@foreach ($list['input'] as $key => $value)
	
	<div class="form-group row">
		@if ($value['type'] == 'text')
			{!! Form::label($value['name'], $value['label'], array('class' => 'col-md-3 col-form-label')) !!} 
			<div class="col-md-9">
				{!! Form::text($value['name'], null, [
					'class' => 'form-control',
					'placeholder' => (isset($value['placeholder']) && $value['placeholder'] ? $value['placeholder'] : '')
				]) !!}
			</div>
		@endif

		@if ($value['type'] == 'textarea')
			
				{!! Form::label($value['name'], $value['label'], array('class' => 'col-md-3 col-form-label')) !!} 
				<div class="col-md-9">
					{!! Form::textarea($value['name'], null, [
						'class' => 'form-control rte_autoload',
						'placeholder' => (isset($value['placeholder']) && $value['placeholder'] ? $value['placeholder'] : ''),
						'rows' => $value['rows']
					]) !!}
				</div>
		@endif

		@if ($value['type'] == 'checkbox')
			@if (isset($value['values']) && count($value['values']) > 0)
				{!! Form::label($value['name'], $value['label'], array('class' => 'col-md-3 col-form-label')) !!} 
				@foreach ($value['values'] as $input)
						
					<div class="form-group">
						<label>
							{!! Form::checkbox($value['name'].'[]', $input->id) !!}
							{{ $input['name'] }}
						</label>
					</div>
					
				@endforeach
				
			@endif
			
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

