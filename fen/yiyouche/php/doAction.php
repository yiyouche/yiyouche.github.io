<?php
//单文件上传
    header('content-type:text/html;charset=utf-8');
    //$_FILES上传文件信息
    //print_r($_FILES);
    /*Array ( [myUpFile] => Array ( 
       [name] => A3进取型三厢.jpg
       [type] => image/jpeg
       [tmp_name] => C:\Windows\php370.tmp
       [error] => 0 
       [size] => 128028 ) )*/
    //    include_once 'DataBaseInfos.php';

       $filename=$_FILES['myUpFile']['name'];
       $type=$_FILES['myUpFile']['type'];
       $tmp_name=$_FILES['myUpFile']['tmp_name'];
       $error=$_FILES['myUpFile']['error'];
       $size=$_FILES['myUpFile']['size'];
       $maxSize=2097152;//允许最大值
       $allowExt=array('jpeg','jpg','png','gif');


       //判断错误
        if($error==UPLOAD_ERR_OK){
            //判断上传文件大小
            if($size>$maxSize){
                exit('上传文件过大');
            }
            //判断上传文件的类型
            //取出文件的扩展名
            $ext=pathinfo($filename,PATHINFO_EXTENSION);
            if(!in_array($ext,$allowExt)){
                exit("非法的文件类型");
            }
            //判断文件是否通过HTTP_POST方式上传的
            if(!is_uploaded_file($tmp_name)){
                exit('文件不是通过HTTP_POST方式上传的');
            }
            $path='uploads';
            if(!file_exists($path)){
                mkdir($path,0777,true);
                chmod($path,0777);
            }

            // MySql($filename,$type,$tmp_name,$size);
            //为确保文件名唯一，防止重名产生覆盖
            $RootDir = $_SERVER['DOCUMENT_ROOT']; //php中的根目录
            $uniName=md5(uniqid(microtime(true),true)).'.'.$ext;
            $destination=$RootDir.'/'.$path.'/'.$filename;
            //将服务器上的临时文件移动到指定目录下
            if(@move_uploaded_file($tmp_name,$destination)){
                echo "文件保存成功".$filename;
            }else{
                echo "文件保存失败".$filename;
            }

        }else{
            //匹配下错误号
            switch($error){
                case 1:
                    echo '上传文件超过了php配置文件中upload_max_filesize选项的值';
                    break;
                case 2:
                    echo '超过表单MAX_FILE_SIZE限制的大小';
                break;
                case 3:
                    echo '文件部分被上传';
                break;
                case 4:
                    echo '没有选择文件';
                break;
                case 6:
                    echo "没有找到临时目录";
                break;
                case 7:
                case 8:
                    echo '系统错误';
                break;
            }
        }

        //客户端限制
        //通过表单隐藏域限制上传文件的最大值
        // <input type='hidden' name='MAX_FILE_SIZE' value='字节数' />

        //通过accept属性限制上传文件类型
        //  <input type='file' name='myUpFile' accept='文件的MIME类型' />

        //服务端配置
       //php.ini配置
       //file_uploads=On
       //upload_tem_dir=临时文件保存目录
      //upload_max_filesize=允许上传文件最大值
     //max_file_uploads=允许一次上传的最大文件数
     //post_max_size=POST发送数据的最大值

     //服务端的限制
      
     


?>