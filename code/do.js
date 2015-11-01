/**
 * Created by gin on 2015/7/17.
 */
$(document).ready(function(){
    $('#editArea').on('click','#submitEdit',function(){
        $.post('/edit.php',{email:$('#email').val(),passwd:$('#passwd').val(),transfer:$('#transfer').val(),method:'edit'},function(returnData){
            alert(returnData);
            $('#showUser').trigger('click');
        });
    });
    $('#editArea').on('click','#submitAdd',function(){
        $.post('/edit.php',{email:$('#email').val(),passwd:$('#passwd').val(),transfer:$('#transfer').val(),method:'add'},function(returnData){
            alert(returnData);
            $('#showUser').trigger('click');
        });
    });
    $('#editArea').on('click','#submitDbEdit',function(){
        $.post('/dbsetting.php',{address:$('#address').val(),port:$('#port').val(),user:$('#user').val(),passwd:$('#passwd').val(),dbname:$('#dbname').val(),mpass:$('#mpass').val(),mip:$('#mip').val(),mport:$('#mport').val()},function(returnData){
            alert(returnData);
            $('#showUser').trigger('click');
        });
    });
    $('#editArea').on('click','#submitDel',function(){
        var con=confirm('确定删除？');
        if(con==true) {
            $.post('/edit.php', {
                email: $('#email').val(),
                method: 'delete'
            }, function (returnData) {
                alert(returnData);
                $('#showUser').trigger('click');
            });
        }else{
            alert('已取消!');
        }
    });
    $('#editUser').click(function(){
        document.getElementById('editArea').innerHTML='' +
            '<label>邮箱：</label><input type="text" id="email"/><br>' +
            '<label>密码：</label><input type="text" id="passwd"/><br>' +
            '<label>流量：</label><input type="text" id="transfer"/><br>' +
            '<input type="submit" id="submitEdit" value="确认编辑"/>';
    });
    $('#addUser').click(function(){
        document.getElementById('editArea').innerHTML='' +
            '<label>邮箱：</label><input type="text" id="email"/><br>' +
            '<label>密码：</label><input type="text" id="passwd"/><br>' +
            '<label>流量：</label><input type="text" id="transfer"/><br>' +
            '<input type="submit" id="submitAdd" value="确认添加"/>';
    });
    $('#deleteUser').click(function(){
        document.getElementById('editArea').innerHTML='' +
            '<label>邮箱：</label><input type="text" id="email"/><br>' +
            '<input type="submit" id="submitDel" value="确认删除"/>';
    });
    $('#showUser').click(function(){
        $.post('/getdata.php',function(result){
            document.getElementById('result').innerHTML=result;
        });
    });
});