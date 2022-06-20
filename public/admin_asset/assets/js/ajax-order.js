function handleTotal(url, type = null) {
    let $this = $('form')[0]
    let data = new FormData($this)
    let flag = true
    $.each($('.invoice').find('.product'), function (key, val) {
        let product_detail_id = $(this).parents('.invoice').find('#pr').attr('data-pr-detail')
        let name = val.getAttribute('name').slice(0, val.getAttribute('name').indexOf('[product]'))
        data.append(name + '[product_detail_id]', product_detail_id)
        if (product_detail_id == undefined){
            flag = false
        }
    })
    if ($('input#discount-code') && type != 'check') {
        data.set('discount', $('input#discount-code').val())
    }
    if ($('input#discount-code') && type == 'remove') {
        data.set('discount', 'undefined')
    }
    if (flag){
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            processData: false,
            contentType: false,
            success: function (res) {
                $('.order-check').html(res)
                if ($('.discount-remove').length > 0) {
                    $('.checkCoupon').prop('disabled', true)
                    $('#coupon').prop('disabled', true)
                } else {
                    $('.checkCoupon').prop('disabled', false)
                    $('#coupon').prop('disabled', false)
                }
            }
        })
    }
}

$(document).ready(function () {
    $('form').on('submit', function (e) {
        e.preventDefault()
        let data = new FormData(this)
        $.each($('.invoice').find('.product'), function (key, val) {
            let product_detail_id = $(this).parents('.invoice').find('#pr').attr('data-pr-detail')
            let name = val.getAttribute('name').slice(0, val.getAttribute('name').indexOf('[product]'))
            data.append(name + '[product_detail_id]', product_detail_id)
        })
        if ($('input#discount-code')) {
            data.set('discount', $('input#discount-code').val())
        }
        let router = $(this)[0].getAttribute('action')
        $.ajax({
            url: router,
            type: 'POST',
            data: data,
            processData: false,
            contentType: false,
            success: function (data) {
                $("span.error").remove();
                if (data.success === true) {
                    if (data.type === 'insert') {
                        $('form')[0].reset()
                        $("div[data-repeater-item]").remove()
                        $('.order-check').find('.rs-total').text(' 0 VND ')
                        autoRmCode()
                    }
                    toastr.success("", data.message, {
                        closeButton: !0,
                        tapToDismiss: !1
                    })
                    $('.product').each(function (index) {
                        $(this).trigger('change')
                    })
                } else if (data.success === false) {
                    keys = Object.keys(data.messages)
                    toastr.error("", data.message, {
                        closeButton: !0,
                        tapToDismiss: !1
                    })
                    keys.forEach((val) => {
                        if (val.search('invoice') !== -1) {
                            let num = val.slice(val.indexOf('.') + 1, val.lastIndexOf('.'))
                            let name_ = val.slice(val.lastIndexOf('.') + 1)
                            if (name_ == 'product_detail_id' && keys.indexOf('invoice.' + num + '.product') == -1) {
                                $('select[name="invoice[' + num + '][' + 'product' + ']"').parent().append(`<span class="error">${data.messages[val][0]}</span>`)
                            } else if (name_ == 'quantity' && keys.indexOf('invoice.' + num + '.product') == -1 && keys.indexOf('invoice.' + num + '.product_detail_id') == -1) {
                                $('select[name="invoice[' + num + '][' + 'product' + ']"').parent().append(`<span class="error">${data.messages[val][0]}</span>`)
                            }
                            $('select[name="invoice[' + num + '][' + name_ + ']"').parent().append(`<span class="error">${data.messages[val][0]}</span>`)
                        }
                        $('select#' + val).parent().append(`<span class="error">${data.messages[val][0]}</span>`)
                    })
                }
            }
        })
    })
})
