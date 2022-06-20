$(document).ready(function (){
    $('form').on('submit', function (e){
        e.preventDefault()
        let data =  new FormData(this)
        let router = $(this)[0].getAttribute('action')
        $.ajax({
            url: router,
            type: 'POST',
            data: data,
            processData: false,
            contentType: false,
            success: function (data){
                $("span.error").remove();
                $("span.text-warning").remove();
                if (data.success === true){
                    if (data.type === 'insert'){
                        $('input#name').val('')
                        $('input#description').val('')
                        $('input#price').val('')
                        $('input#total_min').val('')
                        $('input#total_max').val('')
                        let t_name = 'categorie'
                        if ($('#type_coupon').val() == 'products'){
                            t_name = 'product'
                        }
                        $('select#items').val([]).select2({
                            placeholder: "Select items",
                            ajax: {
                                url: location.href + '?type=' + $('#type_coupon').val(),
                                data: function (params){
                                    let ids = $('select#items').val();
                                    return {
                                        [t_name]: params.term,
                                        ids: ids
                                    }
                                },
                                processResults: function (res){
                                    return {
                                        results: $.map(res, function (item){
                                            return {
                                                text: item.title,
                                                id: item.id
                                            }
                                        })
                                    }
                                }
                            }
                        })
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
                        if (val.search('invoice') !== -1){
                            let num = val.slice(val.indexOf('.') + 1, val.lastIndexOf('.'))
                            let name_ = val.slice(val.lastIndexOf('.') + 1)
                            $('select[name="invoice[' +num+']['+name_+']"').parent().append(`<span class="error">${data.messages[val][0]}</span>`)
                        }
                        $('input#' +val).parent().append(`<span class="error">${data.messages[val][0]}</span>`)
                        $('select#' +val).parent().append(`<span class="error">${data.messages[val][0]}</span>`)
                    })
                }
            }
        })
    })
})
