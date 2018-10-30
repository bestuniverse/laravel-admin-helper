@extends($config['extends'])

@section('footer_styles')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
<link rel="stylesheet" href="dist/themes/default/style.min.css" />

<link href="{{ asset('css/admin/libs/jstree/themes/default/style.min.css') }}" rel="stylesheet">
<script src="{{ asset('js/libs/jstree/jstree.min.js') }}"></script>
<script>
	
	

	$(document).ready( function () {

		attachCategoryJsTree();

	});

	function attachCategoryJsTree()
	{
		var tree = $('.jstree');

		tree.jstree({
		  "core" : {
		    "themes" : {
		      "variant" : "medium",
		      "icons" : false
		    },
		    "multiple": false
		  },
		  "checkbox" : {
		    "keep_selected_style" : true,
		    "three_state": false,
            "cascade": "none"
		  },
		  "plugins" : [ "wholerow", "checkbox" ]
		});
		// tree.jstree('hide_icons');
		tree.on('select_node.jstree', function (e, data) {
		    data.instance.open_node(data.node);
		    // console.log(data.node.data.id);
		    $('.jstree_dest_input').val(data.node.data.id);
		});



		expandCategoryNodesJsTree();

	}

	function expandCategoryNodesJsTree()
	{
		// console.log('expand all nodes');
		$(".jstree").jstree('open_all');  
	}

	function handleCategoryTree()
	{
		$(document).on('click', '#category-tree ul li a', function(event) {
			event.preventDefault();

			$('#last_node').val( $(this).data('last_node') );
			reloadMainContent($(this).data('id_category'), false, false, $(this).data('last_node'));
			$('#last_category').val($(this).data('id_category'));

			// console.log($(this).data('id_category'));
		});
	}

</script>

@endsection

@section($config['section'])

<div class="helper-form">
		
		<div class="card card-primary">
			<div class="card-header clearfix">
				{{ $title }}
			</div>
			<div class="card-body">
				
				{!! Form::model($object, ['url' => ['admin/'.$model, $object->id], 'method' => 'put', 'class' => 'form-horizontal row col-md-12', 'id' => 'form-id']) !!}
				
				@include('adminHelpers::form')
				
                {!! Form::close() !!}


			</div>
		</div>
		
</div>
@endsection

