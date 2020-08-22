$(document).ready(function() {
	$("#rsm").change(function() {
		var rsmid = $(this).val();
		if(rsmid != "") {
			$.ajax({
				url:"get-stat.php",
				data:{r_id:rsmid},
				type:'POST',
				success:function(response) {
					var resp = $.trim(response);
					$("#sm").html(resp);
				}
			});
		} else {
			$("#sm").html("<option value=''>------- Select --------</option>");
		}
	});
});
