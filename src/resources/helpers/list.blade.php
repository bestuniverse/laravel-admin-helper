@extends($config['extends'])

@section('footer_styles')

<link href="{{ asset('css/admin/libs/datatables.css') }}" rel="stylesheet">
<script src="{{ asset('js/libs/datatables.js') }}"></script>

<script>
	$(document).ready( function () {

	    $('.datatable').DataTable({
	    	"paging": false
	    });

	} );
</script>

@endsection

@section('toolbar')
	@if (in_array('add', $actions))
		<div class="add_new">
			<a href="#" title="Add new "{{ $model }}>
				<i class="livicon" data-name="plus-alt" data-size="50" data-c="#1DA1F2" data-hc="#1DA1F2" data-loop="false"></i>
	        	<span class="title">Add new {{ $model }}</span>
			</a>
		</div>
	@endif
@endsection

@section($config['section'])

<div class="helper-list">
	@if (isset($data) && count($data) > 0)
		
		<div class="card card-primary table-tools">
			<div class="card-header clearfix">
				{{ $title }}
			</div>
			<div class="card-body table-responsive">
				<table class="{{ $config['datatable'] === true ? "datatable" : "table table-sm table-hover" }}">
				<thead class="thead-light">
					<tr>
						<th></th>
						@foreach ($list as $input_name => $input)
							<th>
								{{ $input['title'] }}
							</th>
						@endforeach
						@if (isset($actions) && count($actions) > 0)
						<th>
							{{ __('admin/helper/list.actions') }}
						</th>
						@endif
					</tr>
				</thead>
				<tbody>
					@foreach ($data as $key => $item)
						<tr>
							<td><input type="checkbox" name="{{ $model }}_bulk[]" value="{{ $item->id }}"></td>
						@foreach ($list as $input_name => $input)
							<td>{{ $item->$input_name }}</td>
						@endforeach
							<td>
								{{-- view --}}
								@if (in_array('view', $actions))
									<a target="_blank" href="{{ route($model.'.show', $item->id) }}" class="btn btn-secondary btn-sm float-left">
										view
									</a>
								@endif

								{{-- edit --}}
								@if (in_array('edit', $actions))
									<a target="_blank" href="{{ route($model.'.edit', $item->id) }}" class="btn btn-primary btn-sm float-left">
										edit
									</a>
								@endif

								{{-- delete --}}
								@if (in_array('delete', $actions))
						            {!! Form::open(['url' => ['admin/'.$model, $item->id], 'method' => 'DELETE', 'class' => 'float-left']) !!}
						            	{{ Form::hidden('id', $item->id) }}
						                {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) }}
						            {{ Form::close() }}
								@endif
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			{{ $data->links() }}
			</div>
		</div>
		
	@else
		<p>{{ __('admin/helper/list.there is no items') }}</p>	
	@endif
</div>
@endsection

