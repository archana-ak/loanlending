$(document).ready(function() {
	$("#zsm").change(function() {
		var zsmid = $(this).val();
		if(zsmid != "") {
			$.ajax({
				url:"get-state.php",
				data:{z_id:zsmid},
				type:'POST',
				success:function(response) {
					var resp = $.trim(response);
					$("#rsm").html(resp);
				}
			});
		} else {
			$("#rsm").html("<option value=''>------- Select --------</option>");
		}
	});
});
