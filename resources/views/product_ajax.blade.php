<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	
	<title>Product</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<style type="text/css" media="screen">
		body{
			margin-top: 30px;
		}
	</style>
</head>
<body>
	<div class="container">
		<a href="#" class="btn btn-success btn-add">Add</a>
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>CODE</th>
						<th>NAME</th>
						<th>PRICE</th>
						<th>QUANTITY</th>
					</tr>
				</thead>
				<tbody>
					
					{{-- biến $todos được controller trả cho view
					chứa dữ liệu tất cả các bản ghi trong bảng todos. Dùng foreach để hiển
					thị từng bản ghi ra table này. --}}
					
					@foreach ($products as $product)
					<tr>
						<td>{{$product->id}}</td>
						<td>{{$product->code}}</td>
						<td>{{$product->name}}</td>
						<td>{{$product->price}}</td>
						<td>{{$product->quantity}}</td>
						<td>
							<button type="button" class="btn btn-info btn-show" data-url = "{{route('products-ajax.show',$product->id)}}">Details</button>
							<button type="button" class="btn btn-warning btn-edit" data-url="{{ route('products-ajax.edit',$product->id) }}">Edit</button>
							<button type="button" class="btn btn-danger btn-delete" data-url="{{ route('products-ajax.destroy',$product->id) }}">Delete</button>
	
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

	{{-- Modal show chi tiết todo --}}
	<div class="modal fade" id="modal-show">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Show name</h4>
				</div>
				<div class="modal-body" style="text-align: center;">
					<div class="row">
						<p style="font-size: 24px">Code: </p>
						<p id = "code-show"></p>
					</div>
					<div class="row">
						<p style="font-size: 24px">Name:</p>
						<p id = "name-show"></p>
					</div>
					<div class="row">
						<p style="font-size: 24px">Price:</p>
						<p id = "price-show"></p>
					</div>
					<div class="row">
						<p style="font-size: 24px">Quantity:</p>
						<p id = "quantity-show"></p>
					</div>
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	{{-- Modal thêm mới todo --}}
	<div class="modal fade" id="modal-add">
		<div class="modal-dialog">
			<div class="modal-content">

				<form action="" data-url="{{ route('products-ajax.store') }}" id="form-add" method="POST" role="form">
				 {{ csrf_field() }}
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Add product</h4>
				</div>
				<div class="modal-body">
					
						<div class="form-group">
							<label for="">Code</label>
							<input type="text" class="form-control" id="code-add" placeholder="Code">
						</div>
						<div class="form-group">
							<label for="">Name</label>
							<input type="text" class="form-control" id="name-add" placeholder="Name">
						</div>
						<div class="form-group">
							<label for="">Price</label>
							<input type="text" class="form-control" id="price-add" placeholder="Price">
						</div>
						<div class="form-group">
							<label for="">Quantity</label>
							<input type="text" class="form-control" id="quantity-add" placeholder="Quantity">
						</div>
					
						
					
				</div>
				<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Add</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	{{-- Modal sửa todo --}}
	<div class="modal fade" id="modal-edit">
		<div class="modal-dialog">
			<div class="modal-content">

				<form action="" id="form-edit" method="POST" role="form">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Edit product</h4>
				</div>
				<div class="modal-body">
					
						<div class="form-group">
							<label for="">CODE</label>
							<input type="text" class="form-control" id="code-edit" placeholder="code">
						</div>
						<div class="form-group">
							<label for="">NAME</label>
							<input type="text" class="form-control" id="name-edit" placeholder="name">
						</div>
						<div class="form-group">
							<label for="">PRICE</label>
							<input type="text" class="form-control" id="price-edit" placeholder="price">
						</div>
						<div class="form-group">
							<label for="">QUANTITY</label>
							<input type="text" class="form-control" id="quantity-edit" placeholder="quantity">
						</div>
					
						
					
				</div>
				<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Edit</button>
					
				</div>
				</form>
			</div>
		</div>
	</div>

</body>
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" type="text/javascript" charset="utf-8" async defer></script>
	<script type="text/javascript" charset="utf-8">
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
			 
		});

		$(document).ready(function () {
		//bat su kien khi click nut detail
			$('.btn-show').click(function(){
				$('#modal-show').modal('show');
				var url = $(this).attr('data-url');
				$.ajax({
					type:'get',
					url: url,
					success:function(response){
						$('#code-show').text(response.data.code);
						$('#name-show').text(response.data.name);
						$('#price-show').text(response.data.price);
						$('#quantity-show').text(response.data.quantity);	
					},
					error: function(jqXHR,textStatus,errorThown){
						
					}
				})
			})
			//bắt sự kiện click vào nút add
			$('.btn-add').click(function (e) {
				e.preventDefault();
				//hiện modal show
				$('#modal-add').modal('show');
			})

			//bắt sự kiện submit form thêm mới
			$('#form-add').submit(function (e) {
				e.preventDefault();
					//lấy attribute data-url của form lưu vào biến url
				var url=$(this).attr('data-url');
				var data = {
						"_token": $("input[name='_token']").val(),			
						"code": $('#code-add').val(),
						"name": $('#name-add').val(),
						"price": $('#price-add').val(),
						"quantity": $('#quantity-add').val()						
					};
				//console.log(data);

				$.ajax({
					//sử dụng phương thức post
					type: 'post',
					url: url,
					//dataType: 'json',
					data: data,
					success: function (response) {
						if($.isEmptyObject(response.errors)){
							toastr.success('Add new product success!')
							$('#modal-add').modal('hide');
							setTimeout(function () {
								window.location.href="{{ route('products-ajax.index') }}";
							},800);
						}
						else{
							$.each(response.errors, function(key,value){
								toastr.warning(value)
							});
						}
						// hiện thông báo thêm mới thành công bằng toastr
						//toastr.success('Add new product success!')
						//ẩn modal add đi
						//console.log(response);
						//$('#modal-add').modal('hide');
						// setTimeout(function () {
						// 	window.location.href="{{ route('products-ajax.index') }}";
						// },800);
					},
					error: function (jqXHR, textStatus, errorThrown) {
						
					}
				})
			})
			
			$('.btn-delete').click(function () {
				//lấy attribute data-url của nút xoá lưu vào url
				var url=$(this).attr('data-url');
				//hiển thị dialogbox xác nhận xoá
				if (confirm("Are you sure?")){
					$.ajax({
						//phương thức delete
						type: 'delete',
						url: url,
						success: function (response) {
							//thông báo xoá thành công bằng toastr
							toastr.warning('delete product success!')
							setTimeout(function () {
								window.location.href="{{ route('products-ajax.index') }}";
							},800);
						},
						error: function (error) {
							
						}
					})
				}
			})

			//bắt sự kiện click vào nút edit
			$('.btn-edit').click(function (e) {
				//mở modal edit lên
				$('#modal-edit').modal('show');
				e.preventDefault();
				//lấy data-url của nút edit
				var url=$(this).attr('data-url');
				$.ajax({
					//phương thức get
					type: 'get',
					url: url,
					success: function (response) {
						//đưa dữ liệu controller gửi về điền vào input trong form edit.
						//console.log(response);
						$('#code-edit').val(response.data.code);
						$('#name-edit').val(response.data.name);
						$('#price-edit').val(response.data.price);
						$('#quantity-edit').val(response.data.quantity);
						//thêm data-url chứa route sửa todo đã được chỉ định vào form sửa.
						$('#form-edit').attr('data-url','{{ asset('products-ajax/') }}/'+response.data.id)
					},
					error: function (error) {
						
					}
				})
			})

			//bắt sự kiện submit form edit
			$('#form-edit').submit(function (e) {
				e.preventDefault();
				//lấy data-url của form edit
				var url=$(this).attr('data-url');
				console.log($('#code-edit').val());
				$.ajax({
					//phương thức put
					type: 'put',
					url: url,
					//lấy dữ liệu trong form
					data: {
						code: $('#code-edit').val(),
						name: $('#name-edit').val(),
						price: $('#price-edit').val(),
						quantity: $('#quantity-edit').val()
					},
					success: function (response) {
						if($.isEmptyObject(response.errors)){
							//thông báo update thành công
							toastr.success('edit product success!')
							//ẩn modal edit
							$('#modal-edit').modal('hide');
							setTimeout(function () {
								window.location.href="{{ route('products-ajax.index') }}";
							},800);
						}
						else{
							$.each(response.errors, function(key, value){
								toastr.warning(value)
							});
						}
						
					},
					error: function (jqXHR, textStatus, errorThrown) {
						//xử lý lỗi tại đây
					}
				})
			})
		})
	</script>
</html>