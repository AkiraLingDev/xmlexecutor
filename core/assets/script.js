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

    $(".subscribe-form-submit").click(function(){
        var valid = true;
        if($(".subscribe-form-period").val() == ''){
            $(".subscribe-form-period").css("border","1px solid red");
            valid = false;
        }
        if($(".subscribe-form-url").val() == ''){
            $(".subscribe-form-url").css("border","1px solid red");
            valid = false;
        }
        if(valid){
            $.ajax({
                url: '/core/components/add_subscribe/ajax.php',
                method: 'post',
                dataType: 'json',
                data: {ajax: true, url: $(".subscribe-form-url").val(), period: $(".subscribe-form-period").val()},
                complete: function(data){
                    alert('Подписка успешно добавлена!');
                    window.location.reload();
                }
            });
        }
        e.preventDefault();
    });

    $(".subscribe-delete-button").click(function(){
        $.ajax({
            url: '/core/components/subscribe_list/ajax.php',
            method: 'post',
            dataType: 'json',
            data: {ajax: true, action: 'delete', id: $(this).data('id')},
            complete: function(data){
                alert('Подписка успешно удалена!');
                window.location.reload();
            }
        });
        e.preventDefault();
    });


    $('#xml-main-button').click(function () {
        window.location = '/xmlexecute/index.php?url='+$('#xml-input-main').val();
    });


});