@extends('layouts.layout-full')
@section('title')
    <title data-i18n="Add">{{__('Add')}}</title>
@endsection
@section('vendor-css')
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin_asset/app-assets/vendors/css/pickers/pickadate/pickadate.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin_asset/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
@endsection
@section('page-css')
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin_asset/app-assets/css/pages/app-ecommerce-details.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin_asset/app-assets/css/pages/page-blog.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin_asset/app-assets/css/plugins/forms/pickers/form-flat-pickr.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin_asset/app-assets/css/plugins/forms/pickers/form-pickadate.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin_asset/app-assets/css/plugins/forms/form-validation.css')}}">
@endsection
@if(@$breadcrumb)
@section('bcb')
    @include('breadcrumbs.breadcrumbs', $breadcrumb)
@endsection
@endif
@section('content')
    <div class="ecommerce-application">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body app-ecommerce-details">
                        <!-- Form -->
                        <form id="post" action="{{route('coupon-add-save')}}" method="post"
                              enctype="multipart/form-data" class="mt-2 invoice-repeater">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <label class="form-label" for="name">{{__('Name')}}</label>
                                        <input
                                            type="text"
                                            id="name"
                                            class="form-control"
                                            placeholder="Name"
                                            name="name"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <label class="form-label" for="description">{{__('Description')}}</label>
                                        <input
                                            type="text"
                                            id="description"
                                            class="form-control"
                                            placeholder="Description"
                                            name="description"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="mb-2">
                                        <label class="form-label" for="type_coupon">{{__('Type coupon')}}</label>
                                        <select class="select2 form-select" name="type_coupon" id="type_coupon">
                                            <option value="total order"
                                                    data-i18n="Total Order">{{__('Total Order')}}</option>
                                            <option value="products" data-i18n="Products">{{__('Products ')}}</option>
                                            <option value="categories"
                                                    data-i18n="categories">{{__('Categories ')}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="mb-2">
                                        <label class="form-label"
                                               for="type_coupon_code">{{__('Type of coupon code')}}</label>
                                        <select class="select2 form-select" name="type_coupon_code"
                                                id="type_coupon_code">
                                            <option value="fixed price"
                                                    data-i18n="Fixed price">{{__('Fixed price')}}</option>
                                            <option value="percent price"
                                                    data-i18n="Percent price">{{__('Percent price')}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <label class="form-label" for="date_start">{{__('Date start')}}</label>
                                        <input
                                            type="text"
                                            id="date_start"
                                            class="form-control"
                                            placeholder="02-01-2022 to 20-01-2022"
                                            name="date_start"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-9 col-12 total-order">
                                    <div class="mb-2">
                                        <label class="form-label" for="code">{{__('Code')}}</label>
                                        <div class="input-group form-password-toggle">
                                            <button class="btn btn-outline-primary waves-effect" id="create-code"
                                                    type="button" data-i18n="Create">Create
                                            </button>
                                            <input
                                                type="text"
                                                id="code"
                                                class="form-control"
                                                placeholder="RTX-578000"
                                                name="code"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-12 items">
                                    <div class="mb-2">
                                        <label class="form-label" for="items">{{__('Products or Cates')}}</label>
                                        <select class="select2 form-select" name="items[]" id="items" multiple disabled>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6 total-order">
                                    <div class="mb-2">
                                        <label class="form-label" for="amount_code">{{__('Amount code')}}</label>
                                        <input
                                            type="number"
                                            id="amount_code"
                                            class="form-control"
                                            placeholder="20"
                                            name="amount_code"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="mb-2">
                                        <label class="form-label" i18-v="{{__('Price')}}"
                                               for="price">{{__('Price')}}</label>
                                        <input
                                            type="number"
                                            id="price"
                                            class="form-control"
                                            placeholder="5.000"
                                            name="price"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-3 col-6 total-order">
                                    <div class="mb-2">
                                        <label class="form-label" for="total_min">{{__('Total min')}}</label>
                                        <input
                                            type="number"
                                            id="total_min"
                                            class="form-control"
                                            placeholder="1.000"
                                            name="total_min"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-3 col-6 total-order">
                                    <div class="mb-2">
                                        <label class="form-label" for="total_max">{{__('Price coupon max')}}</label>
                                        <input
                                            type="number"
                                            id="total_max"
                                            class="form-control"
                                            placeholder="30.000"
                                            name="total_max"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-3 col-6" id="status-p">
                                    <div class="mb-2">
                                        <label class="form-label" for="status">{{__('Status')}}</label>
                                        <select class="select2 form-select" name="status" id="status">
                                            <option value="1" data-i18n="Active">{{__('Active')}}</option>
                                            <option value="0" data-i18n="Inactive">{{__('Inactive')}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 mt-50">
                                    <button type="submit" class="btn btn-primary me-1">{{__('Save Changes')}}</button>
                                    <button type="reset" class="btn btn-outline-secondary">{{__('Cancel')}}</button>
                                </div>
                            </div>
                        </form>
                        <!--/ Form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('vendor-js')
    <script src="{{asset('admin_asset/app-assets/vendors/js/pickers/pickadate/picker.js')}}"></script>
    <script src="{{asset('admin_asset/app-assets/vendors/js/pickers/pickadate/picker.date.js')}}"></script>
    <script src="{{asset('admin_asset/app-assets/vendors/js/pickers/pickadate/picker.time.js')}}"></script>
    <script src="{{asset('admin_asset/app-assets/vendors/js/pickers/pickadate/legacy.js')}}"></script>
    <script src="{{asset('admin_asset/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
@endsection
@section('page-js')
    <script src="{{asset('admin_asset/app-assets/js/scripts/forms/form-number-input.js')}}"></script>
    <script src="{{asset('admin_asset/assets/js/ajax-coupon.js')}}"></script>
    <script>
        $('.items').hide()
        $('#date_start').flatpickr({
            mode: 'range',
            dateFormat: 'd-m-Y',
            onOpen: function (selectedDates, dateStr, instance) {
                if (dateStr == '') {
                    instance.setDate(new Date());
                }
            }
        });

        $('#create-code').on('click', function () {
            const d = new Date();
            let ms = d.valueOf()
            let mx = 5;
            let my = 2;
            let charter = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ' + ms
            let lengthChar = charter.length
            let result = ''
            let last = ''
            for (let j = 0; j < mx; j++) {
                last += charter.charAt(Math.floor(Math.random() *
                    lengthChar));
            }
            for (let i = 0; i < my; i++) {
                for (let j = 0; j < mx; j++) {
                    result += charter.charAt(Math.floor(Math.random() *
                        lengthChar));
                }
                result += '-'
            }
            let coupon = "RTX-" + result + last
            $('#code').val(coupon)
        })
        $('#type_coupon_code').on('change', function () {
            if ($(this).val() == 'percent price') {
                $('#price').prev().html($('#price').prev().attr('i18-v') + ' % 0 -> 100')
            } else {
                $('#price').prev().text($('#price').prev().attr('i18-v'))
            }
        })

        var arr1 = []
        $(document).on('click', '.items .select2-selection', function () {
            arr1 = $('#items').val()
        })
        $('select#items').on('change', function () {
            let ids_ = $(this).val()
            let p_ = $($(this).val()).not(arr1).get()
            $(".items span.text-warning").remove();
            $(".items span.error").remove();
            if (p_.length > 0) {
                $.ajax({
                    url: location.href + '?type=' + $('#type_coupon').val() + '&getIds=' + p_,
                    success: function (res) {
                        $('select#items').parent().append(`<span style="font-size: 0.857rem" class="text-warning">${res}</span>`)
                    }
                })
            }
            arr1 = ids_
        })
        $('#type_coupon').on('change', function () {
            if ($(this).val() == 'total order') {
                $('.total-order').find('input').prop('disabled', false)
                $('#items').prop('disabled', true)
                $('.total-order').slideDown()
                $('.items').slideUp()
            } else {
                $('.items').slideDown()
                $('.total-order').find('input').prop('disabled', true)
                $('#items').prop('disabled', false)
                $('.total-order').slideUp()
                let t_name = 'categorie'
                if ($(this).val() == 'products') {
                    t_name = 'product'
                }
                $('select#items').val([]).select2({
                    placeholder: "Select items",
                    ajax: {
                        url: location.href + '?type=' + $(this).val(),
                        data: function (params) {
                            let ids = $('select#items').val();
                            return {
                                [t_name]: params.term,
                                ids: ids
                            }
                        },
                        processResults: function (res) {
                            return {
                                results: $.map(res, function (item) {
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
        })
    </script>
@endsection
