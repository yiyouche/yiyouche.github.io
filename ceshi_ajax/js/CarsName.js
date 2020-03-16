window.onload=function(){
	$(function() {
		$.ajax({
			type: "GET",
			url: "php/DataBaseUsers.php",
			success: function(data) {
				console.log(eval(data));
        	data = eval(data);
				$.each(data, function(i, v) {
          let str="";
          str=str+"<ul class='list-group ' style='font-size:20px;'>"+
            "<li class='list-group-item active'>"+"姓名："+v[1]+"</li>"+
          "<li class='list-group-item'>"+"联系方式："+"<a href='tel:"+v[2]+"' style='text-decoration：none;'>"+v[2]+"</a>"+"</li>"+
          "<li class='list-group-item'>"+"中意车型："+v[3]+"</li>"+
		  "<li class='list-group-item'>"+"所在城市："+v[4]+"</li>"+
		  "<li class='list-group-item'>"+"时间："+v[5]+"</li>"+"</ul>";
          $("#user").append(str);
				});
			}
		});
	});
}