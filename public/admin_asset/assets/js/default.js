$('#create-password').on('click', function () {
    $('#user-password').val('123456')
    $('#user-password').attr('type', 'text')
    $('#eye-user').children('.feather.feather-eye').remove()
    $('#eye-user').children('.feather.feather-eye-off').remove()
    $('#eye-user').append('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye-off font-small-4"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg>')
})
$('select').select2()
//slug
$('#title').on('keyup', function (e){
    let nslug = slug(e.currentTarget.value)
    $('#slug').val(nslug)
})

$('#slug').focusout( function (){
    let nslug = slug($(this).val())
    $('#slug').val(nslug)
})

// switch status
$(document).on('click','.form-switch input[type=checkbox]', function (e){
    e.stopPropagation()
    e.preventDefault()
    let that = $(this)
    let url  = location.href + '/status-active/' + $(this).attr('active-id')
    $.ajax({
        url: url,
        type: 'get',
        success:function (data){
            if (data.message){
                if (data.np_ == 1){
                    that.prop('checked', true)
                }
                else {
                    that.prop('checked', false)
                }
                toastr.success("", data.message, {
                    closeButton: !0,
                    tapToDismiss: !1
                })
            }
        }
    })
})

// cate type
$('.type-cate').on('change', function (){
    let url = location.href + '?type=' + $(this).val()
    $.ajax({
        url: url,
        type: 'get',
        success: function (res){
            if (res){
                $('#parent_id').html(res)
            }
        }
    })
})



//check select

$(document).ready(function (){
    $(document).on('select2:selecting', '.attribute_value', function(e){
        let sibling_elements = e.params.args.data.element.parentElement.children
        for(let i = 0; i < sibling_elements.length; i++) {
            sibling_elements[i].selected = false
        }
    })
})
var arr1 = []
$(document).on('click','.select2-selection', function (){
    arr1 = $('.attribute').val()
})
$(document).on('change','.attribute', function (){
    let router = location.protocol + '//' + location.host + '/admin-cp/product/attribute-value-list'
    let p =$($(this).val()).not(arr1).get()
    if (p.length > 0){
        $('#attribute1').val(p[0]).trigger('change')
        let data = {'attr_id' : p[0]}
        ajaxGetAttrVal(router, data)
    }
    else {
        let p_ =$(arr1).not($(this).val()).get()
        if ($(this).val()[$(this).val().length-1] == undefined){
            $('#attribute1').val('nodata').trigger('change')
        }
        else {
            $('#attribute1').val($(this).val()[$(this).val().length-1]).trigger('change')
        }
        $('.attribute_value').find('[delete-id='+p_[0]+']').remove()

    }
    arr1 = $(this).val()
})

function ajaxGetAttrVal(router, data){
    $.ajax({
        url: router,
        type: 'get',
        data: data,
        success: function (data){
            if (data){
                $('.attribute_value').append(data.data)
            }
        }
    })
}

//files upload
// language

//slug
function slug(str){
    // Chuyển hết sang chữ thường
    str = str.toLowerCase();

    // xóa dấu
    str = str.replace(/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/g, 'a');
    str = str.replace(/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/g, 'e');
    str = str.replace(/(ì|í|ị|ỉ|ĩ)/g, 'i');
    str = str.replace(/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/g, 'o');
    str = str.replace(/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/g, 'u');
    str = str.replace(/(ỳ|ý|ỵ|ỷ|ỹ)/g, 'y');
    str = str.replace(/(đ)/g, 'd');
    // Xóa ký tự đặc biệt
    str = str.replace(/([^0-9a-z-\s])/g, '');
    // Xóa khoảng trắng thay bằng ký tự -
    str = str.replace(/(\s+)/g, '-');
    // xóa phần dự - ở đầu
    str = str.replace(/^-+/g, '');
    // xóa phần dư - ở cuối
    str = str.replace(/-+$/g, '');
    // return
    return str;
}
