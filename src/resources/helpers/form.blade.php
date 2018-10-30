<div class="col-md-6">
@foreach ($list['input'] as $key => $value)
	@include('adminHelpers::section',  ['value' => $value])
@endforeach
</div>


<div class="col-md-6">
@foreach ($list['input_right'] as $key => $value)
	@include('adminHelpers::section',  ['value' => $value])
@endforeach
</div>

	

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

