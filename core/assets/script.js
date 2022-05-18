$( document ).ready(function(){
    $("#auth-button").click(function(){
        var valid = true;
        if($("input[name=login]").val() == ''){
            $("input[name=login]").css("border","1px solid red");
            valid = false;
        }
        if($("input[name=password]").val() == ''){
            $("input[name=password]").css("border","1px solid red");
            valid = false;
        }
        if(valid){
            $.ajax({
                url: '/core/components/auth/ajax.php',
                method: 'post',
                dataType: 'json',
                data: {ajax: true, login: $("input[name=login]").val(), password: $("input[name=password]").val()},
                success: function(data){
                    alert(data);
                }
            });
        }
        e.preventDefault();
    });

    $('#xml-main-button').click(function () {
        window.location = '/xmlexecute/index.php?url='+$('#xml-input-main').val();
    });


});