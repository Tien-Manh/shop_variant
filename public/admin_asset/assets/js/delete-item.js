$(document).on('click','.item-delete', function (e){
    e.preventDefault()
    url = e.currentTarget.href
    let pagenum = $('select.form-select').val()
    let search = $('input[type=search]').val()
    let page = $('.pagination .page-item.active span.page-link').text()
    Swal.fire({
        text: text_,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: confirm,
        cancelButtonText: cancel
    }).then((result) => {
        if (result.isConfirmed) {
            ajaxDelete(url, {pagenum, search, page})
        }
        else {
            toastr.error("", cancel_delete, {
                closeButton: !0,
                tapToDismiss: !1
            })
        }
    })
    function ajaxDelete(url, data){
        $.ajax({
            url: url,
            type: 'get',
            data: data,
            success:function (data){
                if(data.success === true){
                    toastr.success("", data.message, {
                        closeButton: !0,
                        tapToDismiss: !1
                    })
                    $('.showPage').html(data.messages)
                }
            }
        })
    }
})
