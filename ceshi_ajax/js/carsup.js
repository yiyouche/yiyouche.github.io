window.onload=function(){
    $(function() {
        var url = document.location.toString();//获取url地址
        var urlParmStr = url.slice(url.indexOf('?')+1);//获取问号后所有的字符串
        var arr = urlParmStr.split('&');//通过&符号将字符串分割转成数组
        var courseId = arr[0].split("=")[1];//获取数组中第一个参数
        var unit_title=arr[1].split("=")[1];//第二个参数
        courseId=decodeURI(courseId);//转码将解码方式unscape换为decodeURI，将中文参数获取
        unit_title=decodeURI(unit_title);
        document.getElementById("id").setAttribute('value',courseId);
        document.getElementById("name").setAttribute('value',unit_title);
    });
}