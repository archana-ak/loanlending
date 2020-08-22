$(document).ready(function() {
	$("#nsm").change(function() {
		var nsmid = $(this).val();
		if(nsmid != "") {
			$.ajax({
				url:"get-states.php",
				data:{c_id:nsmid},
				type:'POST',
				success:function(response) {
					var resp = $.trim(response);
					$("#zsm").html(resp);
				}
			});
		} else {
			$("#zsm").html("<option value=''>------- Select --------</option>");
		}
	});
});
