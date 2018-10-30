<li data-id="{{ $value->id }}"  >
	<a href="#" class="{{ $object->getAttribute($data['name']) == $value->id ? 'jstree-clicked' : ''}}">
		{{ $value->id }} {{ $value->name }} 
	</a>
	@if (isset($value->childs) && count($value->childs) > 0)
		<ul>
			@foreach ($value->childs as $element)
				@include('adminHelpers::tree.node', ['value' => $element])
			@endforeach
		</ul>
	@endif
</li>