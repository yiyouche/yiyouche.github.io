window.onload=function(){
    $(function() {
		$.ajax({
			type: "GET",
            url: "php/DataBaseCarsInfos.php",
			success: function(data) {
        	    data = eval(data);
				$.each(data, function(i, v) {
                    console.log(v);
                    let str="";
                    str=str+"<li class='list-group-item'>"+"车型："+v[1]+
                        "<br/>"+
                        "指导价："+v[2]+
                        "<br/>"+
                        "<a href='php/DataBaseCarsdel.php?id="+v[0]+"'>"+"删除车型"+"</a>"+
                        "&nbsp;"+
                        "<a href='carsup.html?id="+v[0]+"&name="+v[1]+"&price="+v[2]+"'>"+"修改车型"+"</a>"+
                        "</li>";
                    $("#cars").append(str);
                });
            }
            
		});
    });
}