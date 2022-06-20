$(document).ready(function (){
    $('form#banner').on('submit', function (e){
        e.preventDefault()
        let router = $(this)[0].getAttribute('action')
        let data = new FormData(this)
        let contents = $('.contents .ql-editor').html()
        data.append('contents', contents)
        $.ajax({
            type: 'post',
            url: router,
            data: data,
            dataType:"json",
            processData: false,
            contentType: false,
            success: function (res){
                $("span.error").remove();
                if (res.success == true){
                    if (res.type == 'insert'){
                        $('form#banner')[0].reset()
                        $('#blog-feature-image').attr('src', '/admin_asset/app-assets/images/banner/banner-9.jpg')
                        $('.contents .ql-editor').html('')
                    }
                    toastr.success("", res.message, {
                        closeButton: !0,
                        tapToDismiss: !1
                    })
                }
                else if(res.success == false){
                    toastr.error("", res.message, {
                        closeButton: !0,
                        tapToDismiss: !1
                    })
                    $.each(res.messages, function (key, val){
                        $('input[name=' +key + ']').parent().append(`<span class="error">${val[0]}</span>`)
                        $('select[name=' +key+']').parent().append(`<span class="error">${val[0]}</span>`)
                    })
                }
            }
        })
    })

})
