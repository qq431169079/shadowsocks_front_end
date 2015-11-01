<?php
require_once 'config.php';
$conn=connectDB();
if($conn!='false') {
    echo "<table class='table table-striped table-bordered table-responsive'><thead><td>ID</td><td>Email</td><td>端口</td><td>密码</td><td>最后连接时间</td><td>上载流量(M)</td><td>下载流量(M)</td><td>总允许流量(M)</td></thead><tbody>";
    $result = @mysql_query("SELECT * FROM ".DATABASE_TABLE, $conn);
    if (mysql_errno()) {
        echo '连接失败！';
    } else {
        for ($i = 0; $i < mysql_num_rows($result); $i++) {
            $res_arr = mysql_fetch_assoc($result);
            $id = $res_arr['id'];
            $email = $res_arr['email'];
            $password = $res_arr['passwd'];
            $port = $res_arr['port'];
            $t = $res_arr['t'];
            $t += 12 * 3600;
            $t = date('Y-m-d H:i:s', $t);
            $u = sprintf('%.2f',$res_arr['u'] / 1024 / 1024);
            $d = sprintf('%.2f',$res_arr['d'] / 1024 / 1024);
            $transfer_enable = sprintf('%.2f',$res_arr['transfer_enable']/ 1024 / 1024);
//            $transfer_enable=($res_arr['transfer_enable']);
            if ($u + $d >= $transfer_enable) {
                echo "<tr><td>" . $id . "</td><td>" . $email . "</td><td>" . $port . "</td><td>" . $password . "</td><td>" . $t . "</td><td>" . $u . "</td><td>" . $d . "</td><td style=\"color:red\">" . $transfer_enable . "</td></tr>";
            } else {
                echo "<tr><td>" . $id . "</td><td>" . $email . "</td><td>" . $port . "</td><td>" . $password . "</td><td>" . $t . "</td><td>" . $u . "</td><td>" . $d . "</td><td>" . $transfer_enable . "</td></tr>";
            }
        }
        echo "</tbody></table>";
    }
}
?>