<?php
define('DATABASE_HOST','localhost');
define('DATABASE_USER','root');
define('DATABASE_PASSWORD','');
define('DATABASE_PORT','3306');
define('DATABASE_DBNAME','shadowsocks');
define('DATABASE_TABLE','');
define('MANAGE_PASS','');
define('MANAGE_BIND_IP','127.0.0.1');
define('MANAGE_PORT','23333');
function connectDB(){
    $conn=@mysql_connect(DATABASE_HOST,DATABASE_USER,DATABASE_PASSWORD,DATABASE_PORT);
    if($conn){
        mysql_select_db(DATABASE_DBNAME,$conn);
        if(mysql_errno()){
            return 'flase';
        }else {
            return $conn;
        }
    }
    else{
        echo("数据库连接失败！");
        return 'false';
    }
}
