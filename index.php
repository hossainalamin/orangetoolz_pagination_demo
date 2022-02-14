<?php include('inc/header.php') ?>
<body>
	<div class="container">
		<div class="row mt-5">
			<div class="col-md-3">
				Show: 
				<select name="" id="entry">
					<option value="5">5</option>
				</select>
				entries
			</div>
			<div class="col-md-4"></div>
			<div class="col-md-4 mt-2">
				Search : <input type="text" name="search" id="search" style="height:30px; border:2px solid">
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col" id="table-data">
			</div>
		</div>
	</div>
	<script src="js/jquery-3.5.1.min.js"></script>
	<script>
		$(document).ready(function() {
			//show data
			function TableLoad() {
				$.ajax({
					url: "ajax -load.php",
					type: 'POST',
					success: function(data) {
						$('#table-data').html(data);
					}
				});
			}
			TableLoad();

			//live search 
			$("#search").on("keyup", function() {
				var search_term = $(this).val();
				$.ajax({
					url: "ajax-live-search.php",
					type: "POST",
					data: {
						search: search_term
					},
					success: function(data) {
						$('#table-data').html(data);
					}
				})
			});	
			//pagination
			function loadTable(page) {
				var limit = $("#entry").val();
				$.ajax({
					url: "ajax-pagination.php",
					type: "POST",
					data: {
						page_no: page,
						limit : limit
					},
					success: function(data) {
						$("#table-data").html(data);
					}
				});
			}
			loadTable();
			$(document).on("click", "#pagination a", function(e) {
				e.preventDefault();
				var pageId = $(this).attr("id");
				loadTable(pageId);
			});
		});
	</script>
	<?php include('inc/footer.php'); ?>