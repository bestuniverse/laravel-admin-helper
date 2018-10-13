@foreach ($list['input'] as $key => $value)
	
	<div class="form-group row">
		@if ($value['type'] == 'text')
			
			@if (isset($value['lang']) && $value['lang'])
				
				@foreach (config('translatable.locales') as $lang)
					@include('adminHelpers::inputs.text', ['lang' => $lang])
				@endforeach

			@else
				@include('adminHelpers::inputs.text')
			@endif

		@endif

		@if ($value['type'] == 'textarea')
				
			@if (isset($value['lang']) && $value['lang'])
				
				@foreach (config('translatable.locales') as $lang)
					@include('adminHelpers::inputs.textarea', ['lang' => $lang])
				@endforeach

			@else
				@include('adminHelpers::inputs.textarea')
			@endif

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

		@if ($value['type'] == 'radio')

			@if (isset($value['values']) && count($value['values']) > 0)
				{!! Form::label($value['name'], $value['label'], array('class' => 'col-md-3 col-form-label')) !!} 
				@foreach ($value['values'] as $input)
					
					<div class="form-group ">
						<label>
							{!! Form::radio($value['name'], $input->id) !!}
							{{ $input['title'] }}
						</label>
					</div>
					{{-- name field --}}
					<div class="form-group">
						{!! Form::label('name', 'Label:') !!} 
					</div>
					

				@endforeach
				
			@endif
		@endif
	</div>

@endforeach
	

@if (isset($list['submit']) && $list['submit'])
	<div class="form-position row">
		<div class="col-md-6 text-left">
			<a href="{{ redirect()->back()->getTargetUrl() }}" class="btn btn-secondary">{{ __('admin.helper.back') }}</a>
		</div>
		<div class="col-md-6 text-right">
			<div class="form-group">
				{!! Form::submit($list['submit']['title'], ['class' => $list['submit']['class']]) !!}
			</div>
		</div>
	</div>
@endif

