$(document).on('click', '.product__color__select label', function () {
    $that = $(this)
    let attrValue = $(this).attr('attribute-value-id')
    let attrId = $(this).attr('attr-id')
    let productId = $(this).attr('product-id')
    let url = $(this).attr('data-url')
    let data = {
        attrValue: attrValue,
        attrId: attrId,
        productId: productId
    }
    $.ajax({
        url: url,
        data: data,
        success: function (res) {
            $that.parents('.showpProduct').html(res)
            $('.set-bg').each(function () {
                var bg = $(this).data('setbg');
                $(this).css('background-image', 'url(' + bg + ')');
            });
        }
    })
    return false
})
$(document).on('click', '.product__details__option label', function () {
    $that = $(this)
    let values = $(this).parents('.product__details__option').find('label.active')
    let attrValue = []
    let attrId = []
    $.each(values, function () {
        attrId.push($(this).attr('attr-name-id'))
        attrValue.push($(this).attr('attr-value-id'))
    })
    let productId = $(this).attr('product-id')
    let url = $(this).attr('data-url')
    let data = {
        attrValue: attrValue,
        attrId: attrId,
        productId: productId
    }
    ajaxGet(url, data)
    return false
})

window.onscroll = function () {
    myFunction()
};

// Get the header
var header = document.getElementById("myHeader");

// Get the offset position of the navbar
var sticky = header.offsetTop;

// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
    if (window.pageYOffset > sticky) {
        header.classList.add("sticky");
    } else {
        header.classList.remove("sticky");
    }
}

function ajaxGet(url, data) {
    $.ajax({
        url: url,
        data: data,
        success: function (res) {
            $('.getStock .oustock').remove()
            if (res.product) {
                if (parseInt(res.product.sub_quantity) <= 0) {
                    $('.getStock').html(`<div class="oustock"><div class="stocke m-auto"><h6 >${res.message}</h6></div></div>`)
                    $('.cart-add').attr('href', 'javascript:void(0)')
                } else {
                    $('.cart-add').attr('href', res.product.add_cart)
                }
                if (parseInt(res.product.sell_price) > 0 && parseInt(res.product.sell_price) < parseInt(res.product.price)) {
                    $('.shop-details .product__details__text h3').html(`${res.product.sell_price} VNĐ<span>${res.product.price} VNĐ</span>`)
                } else {
                    $('.shop-details .product__details__text h3').text(`${res.product.price} VNĐ`)
                }
                $('.tab-content .active .product__details__pic__item img').attr('src', res.product.photo_thumb)
                if (res.getwishList == true){
                    $('.add-wishlist i').addClass('text-danger')
                }
                else {
                    $('.add-wishlist i').removeClass('text-danger')
                }
                let getvalue = $('.pro-qty input').val()
                if (getvalue > res.product.sub_quantity) {
                    $('.pro-qty input').val(res.product.sub_quantity)
                }
                $('.pro-qty input').attr('max', res.product.sub_quantity)
            } else {
                $('.cart-add').attr('href', 'javascript:void(0)')
                $('.getStock').html(`<div class="oustock"><div class="stocke m-auto"><h6 >${res.message}</h6></div></div>`)
            }
        }
    })
}
$(document).on('click', '.cart-add', function (e) {
    e.preventDefault()
    let url = $(this).attr('href')
    let value = $(this).parents('.product__details__cart__option').find('.quantity input').val()
    $.ajax({
        url: url,
        data: {value: value},
        success: function (res) {
            if (res.message == true) {
                $('.sum_total').text(res.total)
                $('.sum_price').text(res.price_sum)
            }
        }
    })
})
$(document).on('click', '.add-cart', function (e) {
    e.preventDefault()
    let url = $(this).attr('href')
    $.ajax({
        url: url,
        success: function (res) {
            if (res.message == true) {
                $('.sum_total').text(res.total)
                $('.sum_price').text(res.price_sum)
            }
        }
    })
})
$(document).on('click', '.code-rm', function () {
    $('#submi-check input').val('')
    $('#submi-check input').attr('readonly', false)
    $('.show-message .text-success').remove()
    $(this).remove()
    $.ajax({
        url: location.href,
        success: function (res) {
            $('.sum_ub_total span').text(res.subTotal)
            $('.sum_total span').text(res.total)
        }
    })
})
let btnks = $('#submi-check input').val()
if (btnks != '') {
    $.ajax({
        url: location.href,
        data: {discoun: btnks},
        success: function (res) {
            if (res.flag == true) {
                $('#submi-check input').attr('readonly', true)
            } else {
                $('#submi-check input').val('')
            }
            $('.show-message').html(res.message)
            $('.sum_ub_total span').text(res.subTotal)
            $('.sum_total span').text(res.total)
        }
    })
}

$('#submi-check').on('submit', function (e) {
    e.preventDefault()
    let discoun = $(this).find('input').val()
    if (discoun != '') {
        $.ajax({
            url: location.href,
            data: {discoun: discoun},
            success: function (res) {
                if (res.flag == true) {
                    $('#submi-check input').attr('readonly', true)
                } else {
                    $('#submi-check input').val('')
                }
                $('.show-message').html(res.message)
                $('.sum_ub_total span').text(res.subTotal)
                $('.sum_total span').text(res.total)
            }
        })
    }
})
$(document).on('click', '.cart__close', function () {
    let url = $(this).attr('cart-id')
    $.ajax({
        url: url,
        success: function (res) {
            location.reload()
        }
    })
})

$(document).on('click', '.update-cart', function (e) {
    e.preventDefault()
    let url = $(this).attr('href')
    let token = $('input[name="__token"]').val()
    let data = [];
    $.each($('.cart-quantity input'), function (key, vaue) {
        data.push({id: $(this).attr('product-id'), quantity: $(this).val()})
    })
    $.ajax({
        url: url,
        type: 'POST',
        data: {_token: token, data: data},
        success: function (res) {
            location.reload()
        }
    })
})

$(document).on('click', '.save-address', function (e) {
    let url = $('#form-f').attr('action')
    let token = $('input[name=_token]').val()
    let text = $('input[name=ship_address]').val()
    let check = $('input[name=check_default]').is(':checked')
    if (check == true) {
        check = 1
    } else {
        check = 0
    }
    $.ajax({
        url: url,
        type: 'POST',
        data: {_token: token, text: text, check: check},
        success: function (res) {
            $('#form-f span.text-danger').remove()
            if (res.text) {
                $('input[name=ship_address]').parent().append(`<span class="text-danger"> ${res.text}</span>`)
            } else {
                let op = `<option value="${res.data.address}">${res.data.address}</option>`
                let li = `<li data-value="${res.data.address}" class="option focus">${res.data.address}</li>`
                $('select[name=ship_address]').append(op)
                $('ul.list').append(li)
                $('#exampleModal').modal('hide')
                if (res.data.is_default == 1) {
                    $('select[name=ship_address]').val(res.data.address).trigger('change')
                    $('.nice-select .current').text(res.data.address)
                }
            }
        }
    })
})
$('.side-menu ul li').on('click', function(){
    $('.side-menu ul li').removeClass('active')
    $(this).addClass('active')
    if ($(this).attr('re') == 'paswword'){
        $('#tab2').show()
        $('#tab1').hide()
    }
    else {
        $('#tab2').hide()
        $('#tab1').show()
    }
})

let keySearch = '';
let priceStart = '';
let priceEnd = '';
let size = '';
let color = '';
let pageNum ='';
$(document).on('keyup', '#key-search', function (e){
    keySearch = $(this).val();
    search()
})
$(document).on('click', '.get-price li', function (e){
    priceStart = $(this).attr('price-start');
    priceEnd = $(this).attr('price-end');
    search()
})
$(document).on('click', '.shop__sidebar__size label', function (e){
    size = $(this).attr('attr-id-size');
    search()
    return false
})
$(document).on('click', '.shop__sidebar__color label', function (e){
    color = $(this).attr('attr-id-color');
    search()
    return false
})
$(document).on('click', '.product__pagination a', function(event){
    event.preventDefault();
    pageNum = $(this).attr('href').split('page=')[1];
    search()
});

function search(){
    let url = location.href + '?page=' + pageNum + '&filter=true&keySearch='+keySearch
        + '&priceStart=' + priceStart + '&priceEnd=' + priceEnd + '&size=' + size + '&color='+color
    $.ajax({
        url: url,
        success: function (res){
            $('.show-ajax').html(res)
            $('.set-bg').each(function () {
                var bg = $(this).data('setbg');
                $(this).css('background-image', 'url(' + bg + ')');
            });
            window.scrollTo({ top: 420, behavior: 'smooth' });
        }
    })
}

$(document).on('click', '.add-wishlist', function (e){
    e.preventDefault()
    $that = $(this)
    let url = $(this).attr('href')
    let getX = e.screenX+5
    let getY = e.screenY - 110
    let toX = $('.wishlist-show').offset().left
    let toY = 36
    $('body').append(`<i class="fa fa-heart fly-icon-wilish"></i>`)
    $('.fly-icon-wilish')[0].style.transition = "all 2s"
    $('.fly-icon-wilish').css({
        'left': getX,
        'top': getY
    })
        $.ajax({
            url: url,
            success: function (res){
                if (res){
                    setTimeout(function (){
                        $('.fly-icon-wilish').css({
                            'left': toX+1,
                            'top': toY,
                            'font-size': '1rem'
                        })
                    },10)
                    setTimeout(function (){
                        $('.fly-icon-wilish').remove()
                        $that.find('img').attr('src', res.img)
                        if (res.flag == true){
                            $('.add-wishlist i').addClass('text-danger')
                        }
                        else {
                            $('.add-wishlist i').removeClass('text-danger')
                        }
                    }, 2200)

                }
            }
        })
})
