

@php
	if (isset($lang) && $lang) {
		$value['name'] = $value['name'].':'.$lang;
		$value['label'] = $value['label'].':'.$lang;
	}
@endphp

{!! Form::label($value['name'], $value['label'], array('class' => 'col-md-3 col-form-label')) !!} 
<div class="col-md-9">
	{!! Form::textarea($value['name'], null, [
		'class' => 'form-control rte_autoload',
		'placeholder' => (isset($value['placeholder']) && $value['placeholder'] ? $value['placeholder'] : ''),
		'rows' => $value['rows']
	]) !!}
</div>