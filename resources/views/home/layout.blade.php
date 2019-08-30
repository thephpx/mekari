<html>
    <head>
        <title>@yield('title')</title>
        <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/cerulean/bootstrap.min.css" rel="stylesheet" integrity="sha384-C++cugH8+Uf86JbNOnQoBweHHAe/wVKN/mb0lTybu/NZ9sEYbd+BbbYtNpWYAsNP" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>

        <script type="text/javascript" defer>
        	function todoGetAll()
        	{
        		var url  = '{{ URL::to("todo") }}';

        		$.get(url, function(r) {
        			if(r.length > 0){
        				for(var i=0; i < r.length; i++)
        				{
        					appendList(r[i]);	
        				}        				
        			}
        		});        		
        	}

        	function validate()
        	{
        		var item = $('input[name=item]').val();

        		if(item == '')
        		{
        			alert('You need to provide an item detail.');
        			return false;
        		}

        		return true
        	}

        	function todoCreate()
        	{
        		if(validate()){
	        		var url  = '{{ URL::to("todo") }}';
	        		var formdata = $('form').serialize();

	        		$.post(url, formdata, function(r) {
	        			if(r.id){
	        				appendList(r);
	        			}
	        		});        			
        		}
        	}

        	function appendList(item)
        	{        		
        		var html = '<li id="item_'+item.id+'" class="list-group-item d-flex justify-content-between align-items-center">'+item.item+'<button onClick="todoDelete('+item.id+');" class="btn btn-xs btn-danger">Delete</button></li>';

        		$('ul.list-group').append(html);

        	}

        	function todoDelete(id)
        	{
        		if(confirm('Are you sure you want to remove this item ?')){
	        		$.ajax({
	        			url: '{{ URL::to("todo") }}/'+id,
	        			type: 'DELETE',
	        			success: function(r) {
	        				if(r.result == true)
	        				{
	        					$('#item_'+id).remove();
	        				} else {
	        					alert('Item could not be removed!');
	        				}
	        			}
	        		});        			
        		}
        	}

        	(function() {		
        		$.ajaxSetup({
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    }
				});	    
				window.todoGetAll();
			})();
        </script>
    </body>
</html>