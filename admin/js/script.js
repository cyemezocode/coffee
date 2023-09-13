
$(document).ready(function(){
    $('.form').submit(function(e){
        e.preventDefault();
        let data = new FormData(this);
        $.ajax({
            url:'driver/action.php',
            method:'POST',
            data:data,
            processData:false,
            contentType:false,
            success:function(data){
                if(data.status == 'success'){
                    $('.form').trigger('reset');
                    if(data.url){
                        window.location = data.url
                    }
                    if(data.msg){
                        alert(data.msg)
                    window.location.reload()

                    }
                    
                }
                if(data.status == 'fail'){
                    alert(data.msg)
                }
            }
        })
    })
    $('.deleteRow').click(function(){
        let id = $(this).data('id');
        let table = $(this).data('table');
        let column = $(this).data('column');
        let conf = confirm('Do you want to delete?');
        if(conf){
            $.ajax({
                url:'driver/action.php',
                method:'POST',
                data:{deleteData:true,table:table,column:column,id:id},
                success:function(data){
                    alert(data.msg)
                    window.location.reload()
                }
            })
        }
    })
    $('.updateData').click(function(){
        let id = $(this).data('id');
        let table = $(this).data('table');
        $.ajax({
            url:'driver/update.php',
            method:'POST',
            data:{updateData:true,table:table,id:id},
            success:function(data){
                $('.updateHolder').html(data)
            }
        })
    })
})