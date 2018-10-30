
<div class="jstree">
	<ul class="">
		@foreach ($data['values'] as $value)
			
			@include('adminHelpers::tree.node', ['value' => $value])

		@endforeach
	</ul>
</div>

<input type="hidden" name="{{ $data['name'] }}" class="jstree_dest_input" value="{{ $object->getAttribute($data['name']) }}">

