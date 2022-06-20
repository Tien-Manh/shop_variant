$(document).ready(function (){
    $('.attribute').select2({
        placeholder: 'Attribute name'
    });
    $('#cate_id').select2({
        placeholder: 'Select cate name'
    });
    $('#brand_id').select2({
        placeholder: 'Select brand name'
    });
    $('.attribute_value').select2({
        placeholder: 'Attribute value'
    });
    // check box
    $(document).on('click', 'input[type=checkbox]#is_default', function (){
        $('input[type=checkbox]#is_default').prop( "checked", false );
        $(this).prop("checked", true)
    })
    //
    $(document).on('change', '.attribute_value', function (e){
        let that = $(this)
        let text = ''
        let indexOff = that.attr('name').slice(that.attr('name').indexOf('[') +1, that.attr('name').indexOf(']'))
        $.each(that.find('option:selected'), function (key, val){
            text += val.textContent[0]
        })
        let sku = $('#sku').val()
        let newSku = sku + '-' +text.toUpperCase() + (parseInt(indexOff) +1)+ '-' +text.toUpperCase()
        that.parents('.invoice').find('#sku_detail').val(newSku)

        that.parent().find('.error').remove()
       $.each($('select.attribute_value').not(that), function (){
           if ($(this).val().length > 0 && $(this).val().sort().join(',') == that.val().sort().join(',')){
              that.parent().append(`<span class="error">${message_p}</span>`)
           }
       })
    })
    $('form#products').on('submit', function (e){
        e.preventDefault()
        $('body').append(`<div class="button button-ts">
                                            <span class="loading loading-1"> </span>
                                        </div>`)
        let files = $('#dpz-remove-thumb')[0].dropzone.files
        let router = $(this)[0].getAttribute('action')
        let content = $('.contents .ql-editor').html()
        let data = new FormData(this)
        data.append('contents', content)
        files.forEach((val) => {
            if (typeof val.id != 'undefined'){
                data.append('files_ids[]', JSON.stringify(val.id))
            }
            else {
                data.append('files_img[]', val)
            }
        })
        $.ajax({
            url: router,
            type: 'POST',
            data: data,
            processData: false,
            contentType: false,
            success: function (data){
                $("span.error").remove();
                setTimeout(function (){
                    $('.button-ts').remove()
                }, 500)
                if (data.success === true){
                    if (data.type === 'insert'){
                        $('form#products')[0].reset()
                        $('.blog-feature-image').attr('src', '/admin_asset/app-assets/images/slider/03.jpg')
                    }else {
                        if (data.quantity){
                            Object.entries(data.quantity).forEach((val) => {
                                $('#' + val[0]).val(val[1])
                            })
                        }
                    }
                    toastr.success("", data.message, {
                        closeButton: !0,
                        tapToDismiss: !1
                    })
                    location.reload()
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
                            $('input[name="invoice[' +num+']['+name_+']"').parent().append(`<span class="error">${data.messages[val][0]}</span>`)
                        }
                        else {
                            $('input[name="' +val+'"]').parent().append(`<span class="error">${data.messages[val][0]}</span>`)
                        }
                        $('select#' +val).parent().append(`<span class="error">${data.messages[val][0]}</span>`)
                    })
                }
            }
        })
    })
    $('form#attributes').on('submit', function (e){
        e.preventDefault()
        let router = $(this)[0].getAttribute('action')
        let data = new FormData(this)
        $.ajax({
            url: router,
            type: 'POST',
            data: data,
            processData: false,
            contentType: false,
            success: function (data){
                $("span.error").remove();
                if (data.success === true){
                    if (data.type === 'insert'){
                        $('form#attributes')[0].reset()
                    }
                    if (data.attribute){
                        $('.attribute').append(data.attribute)
                        $('#attribute1').append(data.attribute)
                        $("#inlineForm .btn-close").click()
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
                    })
                }
            }
        })
    })
    $('#sku').focusout(function (){
        let nslug = slug($(this).val())
        $(this).val(nslug.toUpperCase())
    })
    $('form#attribute_values').on('submit', function (e){
        e.preventDefault()
        let router = $(this)[0].getAttribute('action')
        let attrId = $('#attribute1 option:selected').attr('value')
        let data = new FormData(this)
        $.ajax({
            url: router,
            type: 'POST',
            data: data,
            processData: false,
            contentType: false,
            success: function (data){
                $("span.error").remove();
                if (data.success === true){
                    if (data.type === 'insert'){
                        $('input#value-attribute').val('')
                    }
                    if (data.attrvalue){
                        $('.attribute_value optgroup[delete-id='+attrId+']').append(data.attrvalue)
                        $("#inlineForm1 .btn-close").click()
                        // $('.attribute_value').parents('.invoice').find('.select2-container').remove()
                        $('.attribute_value').select2()
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
