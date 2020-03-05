window.onload=function(){
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
					$("#select1").append(str);
				});
			}
		});
	});
}