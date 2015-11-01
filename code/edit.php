<?php
require_once 'config.php';
function createPost($conn){
    $arr=range(50000,60000);
    shuffle($arr);
    $port=$arr[100];
    if(check($conn,$port,'port')){
        return $port;
    }else{
        createPost($conn);
    }
}
function check($conn,$thing,$project){
    $result=mysql_query("SELECT * FROM ".DATABASE_TABLE,$conn);
    for($i=0;$i<mysql_num_rows($result);$i++){
        $res_arr=mysql_fetch_assoc($result);
        $temp=$res_arr[$project];
        if($temp==$thing){
            return false;
        }
    }
    return true;
}
function createSocket($port,$passwd){
    $sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
    $msg = MANAGE_PASS.':'.$port.':'.$passwd.':1';
    $len = strlen($msg);
    socket_sendto($sock, $msg, $len, 0, MANAGE_BIND_IP, MANAGE_PORT);
    socket_close($sock);
}

$conn=connectDB();
$passwd=@$_POST['passwd'];
$email=@$_POST['email'];
$transfer=@$_POST['transfer']*1024*1024;
if($_POST['method']=='edit'){
    if(!empty($passwd)){
        mysql_query("UPDATE ".DATABASE_TABLE." SET passwd='$passwd' WHERE email='$email'");
    }
    if($transfer>0){
        mysql_query("UPDATE ".DATABASE_TABLE." SET transfer_enable=$transfer WHERE email='$email'");
    }
    if(mysql_errno()){
        echo '操作失败！';
    }else{
        echo '操作成功！';
    }
}elseif($_POST['method']=='add'){
    if(preg_match("/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i",$email)){
        if(check($conn,$email,'email')) {
            if(empty($passwd)||$transfer<=0){
                die('请输入正确的密码及流量值！');
            }
            $port = createPost($conn);
            mysql_query("INSERT INTO ".DATABASE_TABLE."(email,pass,transfer_enable,passwd,port,type) VALUE ('$email',123456,$transfer,'$passwd',$port,7)");
            if (mysql_errno()) {
                echo '操作失败！';
            } else {
                createSocket($port,$passwd);
                echo '操作成功！';
            }
        }else{
            echo '邮箱已存在！';
        }
    }else{
        echo '邮箱地址验证失败！';
    }
}elseif($_POST['method']=='delete'){
    $result=mysql_query("SELECT * FROM ".DATABASE_TABLE." WHERE email='$email'",$conn);
    $result_arr=mysql_fetch_assoc($result);
    $port=$result_arr['port'];
    $passwd=$result_arr['passwd'];
    if(mysql_errno()){
        echo "操作失败！";
    }else{
        $sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
        $msg = MANAGE_PASS.':'.$port.':'.$passwd.':0';
        $len = strlen($msg);
        socket_sendto($sock, $msg, $len, 0, MANAGE_BIND_IP, MANAGE_PORT);
        socket_close($sock);
        mysql_query("DELETE FROM ".DATABASE_TABLE." WHERE email='$email'");
        if(mysql_errno()){
            echo "操作失败！";
        }
        else{
            echo '操作成功！';
        }
    }
}
