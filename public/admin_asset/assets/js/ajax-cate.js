$(document).ready(function (){
    $('form').on('submit', function (e){
        e.preventDefault()
        let router = $(this)[0].getAttribute('action')
        $.ajax({
            url: router,
            type: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function (data){
                $("span.error").remove();
                if (data.success === true){
                    if (data.type === 'insert'){
                        $('form')[0].reset()
                        $(".type-cate").val($('.type-cate option:eq(0)').val()).trigger('change')
                        $('#blog-feature-image').attr('src', '/admin_asset/app-assets/images/slider/03.jpg')
                    }
                    if (data.cate){
                        $('#parent_id').append(data.cate)
                    }
                    toastr.success("", data.message, {
                        closeButton: !0,
                        tapToDismiss: !1
                    })
                }
                else if (data.success === false) {
                    keys = Object.keys(data.messages)
                    toastr.error("", data.message, {
                        closeButton: !0,
                        tapToDismiss: !1
                    })
                    keys.forEach((val) => {
                        $('input[name=' +val).parent().append(`<span class="error">${data.messages[val][0]}</span>`)
                        $('select#' +val).parent().append(`<span class="error">${data.messages[val][0]}</span>`)
                    })
                }
            }
        })
    })
})

!function (e, t, o) {
    "use strict";
    var l = o("#blog-feature-image"), r = t.getElementById("blog-image-text"), a = o("#blogCustomFile");
    $(document).on("change", '.blog_CustomFile', function (e) {
        var t = new FileReader, o = e.target.files;
        let getElment = $(this).parents('.featured-info').prev().children('img')
        t.onload = function () {
            getElment.attr("src", t.result)
        }, t.readAsDataURL(o[0])
    })
}(window, document, jQuery);
