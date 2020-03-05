window.onload = function() {
		$(function() {
			$('#myTab li:eq(1) a').tab('show');
		});	
		$(function() {
			$.ajax({
					type: "GET", 
					url: "php/cars_name.php",
					success: function(data) {
					console.log(eval(data));
					data = eval(data);
					$.each(data, function(i, v) {
					console.log(v[1]);
					let str = "<option>" + v[1] + "</option>";
					$("#select").append(str);
				});
			}
		});
	});
}