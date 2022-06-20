$(document).ready(function (){
    $('.cate_id').select2({
        placeholder: 'Select cate name'
    });
    $('form#post').on('submit', function (e){
        e.preventDefault()
        let router = $(this)[0].getAttribute('action')
        let data = new FormData(this)
        let contents = $('.contents .ql-editor').html()
        data.append('contents', contents)
        $('body').append(`<div class="button button-ts">
                                            <span class="loading loading-1"> </span>
                                        </div>`)
        $.ajax({
            type: 'post',
            url: router,
            data: data,
            dataType:"json",
            processData: false,
            contentType: false,
            success: function (res){
                setTimeout(function (){
                    $('.button-ts').remove()
                }, 500)
                $("span.error").remove();
                if (res.success == true){
                    if (res.type == 'insert'){
                        $('form#post')[0].reset()
                        $('#blog-feature-image').attr('src', '/admin_asset/app-assets/images/slider/03.jpg')
                        $('.contents .ql-editor').html('')
                        $('#blog-edit-category').val([]).select2({
                            placeholder: "Selected cate name"
                        })
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
                        if ($('input[name=' +key + ']')){
                            console.log(1)
                            $('input[name=' +key + ']').parent().append(`<span class="error">${val[0]}</span>`)
                        }
                       if ($('select[name=' +key+']')){
                           console.log(2)
                           $('select[name=' +key+']').parent().append(`<span class="error">${val[0]}</span>`)
                       }
                       if ($('select#' +key + '')){
                           $('select.' +key).parent().append(`<span class="error">${val[0]}</span>`)
                       }
                    })
                }
            }
        })
    })

})
