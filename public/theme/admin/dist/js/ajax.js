$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});
$(document).ready(function () {
	$('.edit').click(function () {

		let id = $(this).data('id');
		//Edit
		$.ajax({
			url: '/admin/category/' + id + '/edit',
			dataType: 'json',
			type: 'get',
			success: function ($result) {
				$('.name').val($result.data.name);
				$('.title').text($result.data.name);
				$('#parent_id').html($result.option);
				if ($result.data.status == 1) {
					$('.ht').attr('selected', 'selected');
				} else {
					$('.kht').attr('selected', 'selected');
				}
			}
		});
		$('.update').on('click', function () {
			let ten = $('.name').val();
			let status = $('.status').val();
			let parent_id = $('#parent_id').val();
			$.ajax({
				url: '/admin/category/' + id,
				data: {
					name: ten,
					parent_id: parent_id,
					status: status,

				},
				type: 'put',
				dataType: 'json',
				success: function ($result) {

					$('#edit').modal('hide');
					location.reload();
				},
				error: function (error) {
					var errors = JSON.parse(error.responseText);
					$('.error').show();
					$('.error').text(errors.errors);
				}
			});
		});
	});
	//Delete category
	$('.delete').click(function () {
		let id = $(this).data('id');
		$('.del').click(function () {
			Swal.fire({
				title: 'Are you sure?',
				text: "You won't be able to revert this!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
				if (result.isConfirmed) {

					$.ajax({
						url: '/admin/category/' + id,
						dataType: 'json',
						type: 'delete',
						success: function (data) {
							if (data.code == 200) {
								that.parent().parent().remove();
								Swal.fire(
									'Deleted!',
									'Your file has been deleted.',
									'success'
								)
							}
						}
					})

				}
			})



		});
	});

	//Edit ProductType
	$('.editProducttype').click(function () {
		$('.error').hide();
		let id = $(this).data('id');
		$.ajax({
			url: '/admin/producttype/' + id + '/edit',
			dataType: 'json',
			type: 'get',
			success: function ($result) {
				$('.name').val($result.producttype.name);
				var html = '';
				$.each($result.category, function ($key, $value) {
					if ($value['id'] == $result.producttype.categori_id) {
						html += '<option value=' + $value['id'] + ' selected>';
						html += $value['name'];
						html += '</option>';
					} else {
						html += '<option value=' + $value['id'] + '>';
						html += $value['name'];
						html += '</option>';
					}
				});
				$('.idCategory').html(html);
				if ($result.producttype.status == 1) {
					$('.ht').attr('selected', 'selected');
				} else {
					$('.kht').attr('selected', 'selected');
				}
			}
		});
		$('.updateProductType').click(function () {
			let idCategory = $('.idCategory').val();
			let name = $('.name').val();
			let status = $('.status').val();
			$.ajax({
				url: '/admin/producttype/' + id,
				dataType: 'json',
				data: {
					categori_id: idCategory,
					name: name,
					status: status,
				},
				type: 'put',
				success: function ($result) {


					$('#edit').modal('hide');
					location.reload();

				}
			})
		});
	});
	$('.deleteProducttype').click(function () {
		let id = $(this).data('id');
		$('.delProductType').click(function () {
			Swal.fire({
				title: 'Are you sure?',
				text: "You won't be able to revert this!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
				if (result.isConfirmed) {

					$.ajax({
						url: '/admin/producttype/' + id,
						dataType: 'json',
						type: 'delete',
						success: function ($data) {
							if (data.code == 200) {
								that.parent().parent().remove();
								Swal.fire(
									'Deleted!',
									'Your file has been deleted.',
									'success'
								)
							}
						}
					});

				}
			})

		});
	});
	$('.cateProduct').change(function () {
		let idCate = $(this).val();
		$.ajax({
			url: 'getproducttype',
			data: {
				idCate: idCate
			},
			type: 'get',
			dataType: 'json',
			success: function (data) {
				let html = '';
				$.each(data, function ($key, $value) {
					html += '<option value=' + $value['id'] + '>';
					html += $value['name'];
					html += '</option>';
				});
				$('.proTypeProduct').html(html);
			}
		});
	});
	//Edit product
	$('.editProduct').click(function () {
		$('.errorName').hide();
		$('.errorQuantity').hide();
		$('.errorPrice').hide();
		$('.errorPromotional').hide();
		$('.errorImage').hide();
		$('.errorDescription').hide();
		let id = $(this).data('id');
		$('.idProduct').val(id);
		$.ajax({
			url: 'admin/product/' + id + '/edit',
			dataType: 'json',
			type: 'get',
			success: function (data) {
				$('.name').val(data.product.name);
				$('.quantity').val(data.product.quantity);
				$('.price').val(data.product.price);
				$('.promotional').val(data.product.promotional);
				$('.imageThum').attr('src', 'img/upload/product/' + data.product.image);
				if (data.product.status == 1) {
					$('.ht').attr('selected', 'selected');
				} else {
					$('.kht').attr('selected', 'selected');
				}
				CKEDITOR.instances['demo'].setData(data.product.description);
				let html1 = '';
				$.each(data.category, function (key, value) {
					if (data.product.idCategory == value['id']) {
						html1 += '<option value="' + value['id'] + '" selected>';
						html1 += value['name'];
						html1 += '</option>';
					} else {
						html1 += '<option value="' + value['id'] + '">';
						html1 += value['name'];
						html1 += '</option>';
					}
				});
				$('.cateProduct').html(html1);
				let html2 = '';
				$.each(data.producttype, function (key, value) {
					if (data.product.idProductType == value['id']) {
						html2 += '<option value="' + value['id'] + '" selected>';
						html2 += value['name'];
						html2 += '</option>';
					} else {
						html2 += '<option value="' + value['id'] + '">';
						html2 += value['name'];
						html2 += '</option>';
					}
				});
				$('.proTypeProduct').html(html2);
			}
		});
		$('#updateProduct').on('submit', function (event) {
			//chặn form submit
			event.preventDefault();
			$.ajax({
				url: 'admin/updatePro/' + id,
				data: new FormData(this),
				contentType: false,
				processData: false,
				cache: false,
				type: 'post',
				success: function (data) {
					toastr.success(data.result, 'Thông báo', { timeOut: 5000 });
					$('#edit').modal('hide');
					location.reload();
				},
				error: function (error) {
					var errors = JSON.parse(error.responseText);
					if (errors.errors.name != '') {
						$('.errorName').show();
						$('.errorName').text(errors.errors.name);
					}
					if (errors.errors.description != '') {
						$('.errorDescription').show();
						$('.errorDescription').text(errors.errors.description);
					}
					if (errors.errors.quantity != '') {
						$('.errorQuantity').show();
						$('.errorQuantity').text(errors.errors.quantity);
					}
					if (errors.errors.price != '') {
						$('.errorPrice').show();
						$('.errorPrice').text(errors.errors.price);
					}
					if (errors.errors.promotional != '') {
						$('.errorPromotional').show();
						$('.errorPromotional').text(errors.errors.promotional);
					}
					if (errors.errors.image != '') {
						$('.errorImage').show();
						$('.errorImage').text(errors.errors.image);
					}
				}
			});
		});
	});
	//Delete product
	$('.deleteProduct').click(function () {
		let id = $(this).data('id');
		$('.delProduct').click(function () {
			$.ajax({
				url: 'admin/product/' + id,
				type: 'delete',
				dataType: 'json',
				success: function (data) {
					toastr.success(data.result, 'Thông báo', { timeOut: 5000 });
					$('#delete').modal('hide');
					location.reload();
				}
			});
		});
	});





	$('.adddm').click(function () {

		let id = $(this).data('id');
		//Edit
		$.ajax({
			url: '/admin/categorys/adddm',
			dataType: 'json',
			type: 'get',
			success: function ($result) {
				
				$('.idCategorydm').append($result.option);
				
			}
		});
		$('.updatedm').on('click', function () {
			let ten = $('.namedm').val();
			let status = $('.statusdm').val();
			let parent_id = $('.idCategorydm').val();
			$.ajax({
				url: '/admin/categorys/savedm',
				data: {
					name: ten,
					parent_id: parent_id,
					status: status,

				},
				type: 'post',
				dataType: 'json',
				success: function ($result) {

					$('#edit').modal('hide');
					
				},
				error: function (error) {
					var errors = JSON.parse(error.responseText);
					$('.error').show();
					$('.error').text(errors.errors);
				}
			});
		});
	});
	$('.addloai').click(function () {

		let id = $(this).data('id');
		//Edit
		$.ajax({
			url: '/admin/producttypes/addloai',
			dataType: 'json',
			type: 'get',
			success: function ($result) {
				
				
				$('.idCategoryloai').html($result.option);

			}
		});
		$('.updateloai').on('click', function () {
			let ten = $('.nameloai').val();
			let status = $('.statusloai').val();
			let category_id = $('.idCategoryloai').val();
			$.ajax({
				url: '/admin/producttypes/saveloai',
				data: {
					name: ten,
					category_id: category_id,
					status: status,

				},
				type: 'post',
				dataType: 'json',
				success: function ($result) {

					$('#addloai').modal('hide');
				
				},
				error: function (error) {
					var errors = JSON.parse(error.responseText);
					$('.error').show();
					$('.error').text(errors.errors);
				}
			});
		});
	});
});