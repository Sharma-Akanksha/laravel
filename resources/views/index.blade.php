<!DOCTYPE html>
<html>
	<head>
		<title>Skill Test</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<meta name="csrf-token" content="{{ csrf_token() }}" />
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-8 offset-2">
					<h2 class="text-center mt-5 mb-5">Laravel Skill Test</h2>
					<form>
					  <div class="form-group row">
					    <label for="product" class="col-md-3">Product Name</label>
					    <input type="text" name="product" class="form-control col-md-7" id="product" placeholder="Enter Product Name">
					  </div>
					  <div class="form-group row">
					    <label for="quantity" class="col-md-3">Quantity</label>
					    <input type="number" name="quantity" class="form-control col-md-7" id="quantity" placeholder="Enter Quantity">
					  </div>
					  <div class="form-group row">
					    <label for="price" class="col-md-3">Price</label>
					    <input type="number" name="price" class="form-control col-md-7" id="price" placeholder="200">
					  </div>
					  <button type="submit" class="btn btn-primary mb-2 mt-2 submit">Submit</button>
					</form>
					
				</div>
			</div>
			
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script type="text/javascript">
			$.ajaxSetup({

		        headers: {

		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

		        }

		    });


		    $( '.submit' ).on( 'click', function(e) {
		        e.preventDefault();

		        var product = $('#product').val();
		        var quantity = $('#quantity').val();
		        var price = $('#price').val();

		        $.ajax({
		            type: "POST",
		            url: '/form',
		            data: { product:product, quantity:quantity, price:price }, 
			        success: function( result ) {
			        	$('.container').next('#result').empty();
			        	$('.container').after('<div class="row" id="result"><div class="col-md-8 offset-2 mt-3"><h3>Result</h3><div class="result">');
			            $.each( result, function( key, value ) {
                            $('.result').append('<ul class="list-group list-group-flush"><li class="list-group-item"><b>'+ key +' : </b>'+ value +'</li></ul>');
                       	});
                       	$('.container').after('</div></div></div>');
                    }
		        });

		    });

		</script>
	</body>
</html>
