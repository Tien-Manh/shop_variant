<?php
namespace App\Helpers;
class Helpers{
    public static function switchLanguage($lang){
        switch ($lang){
            case 'en':
                $r = [
                    'fullname.required' => "Full Name is required !",
                    'name.required' => "Name is required !",
                    'fullname.min' => "Full name must be at least 3 characters !",
                    'fullname.max' => "Full name cannot be larger than 20 characters !",
                    'username.required' => "Username is required !",
                    'username.min' => "Username must be at least 3 characters !",
                    'username.max' => "Username cannot be larger than 30 characters !",
                    'username.unique' => "Username has already been taken !",
                    'email.required' => "Email is required !",
                    'email.email' => "Email must be a valid email address !",
                    'email.unique' => "Email has already been taken !",
                    'password.required' => "Password is required !",
                    'password.min' => "Password must be at least 5 characters !",
                    'password.max' => "Password cannot be larger than 40 characters !",
                    'role.required' => "Role is required !",
                    'code.required' => "Code is required !",
                    'price.required' => "Price is required !",
                    'items.required' => "Items is required !",

                    'title.required' => 'Title  is required !',
                    'title.max' => 'Title is too long !',
                    'title.unique' => 'Title already exists !',
                    'slug.max' => 'Slug is too long !',
                    'slug.unique' => 'Title already exists !',
                    'slug.required' => 'Slug is required !',
                    'status.required' => 'Status is required !',
                    'type.required' => 'Type is required !',

                    'invoice.*.quantity.required' => 'Quantity is required !',
                    'invoice.*.quantity.numeric' => 'Quantity is number !',
                    'invoice.*.quantity.min' => 'Quantity must be greater !',
                    'invoice.*.cost.required' => 'Cost is required !',
                    'invoice.*.price.required' => 'Price is required !',
                    'cate_id.required' => 'Categorie is required !',

                    'customer.required' => 'Customer is required !',
                    'invoice.*.product.required' => 'Product is required !',
                    'invoice.*.product_detail_id.gt' => 'Product is required !',

                    'forgot_email.required' => 'You have not entered your email !',
                    'forgot_email.email' => 'Email is wrong format !',
                    'new_password.required' => 'New password is required !',
                    'new_password.min' => 'Password is too short !',
                    'new_password.max' => 'Password is too long !',
                    'comfirm_password.required' => 'Confirmed password is required !',
                    'comfirm_password.same' => 'Must match the new password !',

                    'resign_name.required' => "Full Name is required !",
                    'resign_name.min' => "Full name must be at least 5 characters !",
                    'resign_name.max' => "Full name cannot be larger than 20 characters !",
                    'resign_username.required' => "Username is required !",
                    'resign_username.min' => "Username must be at least 5 characters !",
                    'resign_username.max' => "Username cannot be larger than 30 characters !",
                    'resign_username.unique' => "Username has already been taken !",
                    'resign_email.required' => "Email is required !",
                    'resign_email.email' => "Email must be a valid email address !",
                    'resign_email.unique' => "Email has already been taken !",
                    'resign_password.required' => "Password is required !",
                    'resign_password.min' => "Password must be at least 6 characters !",
                    'resign_password.max' => "Password cannot be larger than 40 characters !",
                    'confirm_password.required' => 'Confirmed password is required !',
                    'confirm_password.same' => 'Must match the new password !',
                    ];
                return [];
                break;
            case 'vi':
                return [
                    'fullname.required' => "Tên là bắt buộc !",
                    'name.required' => "Tên là bắt buộc !",
                    'fullname.min' => "Tên phải có ít nhất 3 ký tự !",
                    'fullname.max' => "Tên không được lớn hơn 20 ký tự !",
                    'username.required' => "Tên đăng nhập là bắt buộc !",
                    'username.min' => "Tên đăng nhập phải có ít nhất 3 ký tự !",
                    'username.max' => "Tên đăng nhập không được lớn hơn 30 ký tự !",
                    'username.unique' => "Tên đăng nhập đã được đăng kí !",
                    'name.unique' => "Tên đã được đăng kí !",
                    'email.required' => "Email là bắt buộc !",
                    'email.email' => "Email phải là một địa chỉ email hợp lệ !",
                    'email.unique' => "Email đã được đăng kí !",
                    'password.required' => "Mật khẩu là bắt buộc !",
                    'password.min' => "Mật khẩu phải có ít nhất 5 ký tự !",
                    'password.max' => "Mật khẩu không được lớn hơn 40 ký tự !",
                    'role.required' => "Role là bắt buộc !",
                    'code.required' => "Mã là bắt buộc !",
                    'price.required' => "Giá là bắt buộc !",
                    'items.required' => "Sản phẩm hoặc danh mục là bắt buộc !",

                    'title.required' => 'Tiêu đề là bắt buộc !',
                    'title.max' => 'Tiêu đề quá dài !',
                    'title.unique' => 'Tiêu đề đã tồn tại !',
                    'slug.max' => 'Đường dẫn quá dài !',
                    'slug.unique' => 'Đường dẫ đã tồn tại !',
                    'slug.required' => 'Đường dẫn là bắt buộc !',
                    'status.required' => 'Trạng thái là bắt buộc !',
                    'type.required' => 'Danh mục là bắt buộc !',

                    'invoice.*.quantity.required' => 'Số lượng là bắt buộc !',
                    'invoice.*.quantity.numeric' => 'Số lượng là số !',
                    'invoice.*.quantity.min' => 'Số lượng phải lớn hơn 0 !',
                    'invoice.*.cost.required' => 'Giá là bắt buộc !',
                    'invoice.*.price.required' => 'Giá bán là bắt buộc !',
                    'cate_id.required' => 'Danh mục là bắt buộc !',

                    'customer.required' => 'Khách hàng là bắt buộc !',
                    'invoice.*.product.required' => 'Sản phẩm là bắt buộc !',
                    'invoice.*.product_detail_id.gt' => 'Sản phẩm là bắt buộc !',

                    'name_attribute.required' => 'Tên thuộc tính là bắt buộc !',
                    'name_attribute.max' => "Tên thuộc tính không được lớn hơn 30 ký tự !",
                    'name_attribute.unique' => "Tên thuộc tính đã được đăng kí !",
                    'attribute1.required' => 'Tên thuộc tính là bắt buộc !',
                    'value_attribute.required' => 'Giá trị là bắt buộc !',
                    'value_attribute.max' => "Giá trị không được lớn hơn 30 ký tự !",
                    'value_attribute.unique' => "Giá trị đã được đăng kí !",

                    'forgot_email.required' => 'Email là bắt buộc !',
                    'forgot_email.email' => 'Email phải là một địa chỉ email hợp lệ !',
                    'new_password.required' => 'Mật khẩu mới là bắt buộc !',
                    'new_password.min' => 'Mật khẩu quá ngắn !',
                    'new_password.max' => 'Mật khẩu quá dài !',
                    'comfirm_password.required' => 'Xác nhận mật khẩu là bắt buộc !',
                    'comfirm_password.same' => 'Phải trùng với mật khẩu mới !',

                    'resign_name.required' => "Tên là bắt buộc !",
                    'resign_name.min' => "Tên phải có ít nhất 5 ký tự !",
                    'resign_name.max' => "Tên không được lớn hơn 20 ký tự !",
                    'resign_username.required' => "Tên đăng nhập là bắt buộc !",
                    'resign_username.min' => "Tên đăng nhập phải có ít nhất 5 ký tự !",
                    'resign_username.max' => "Tên đăng nhập không được lớn hơn 30 ký tự !",
                    'resign_username.unique' => "Tên đăng nhập đã được đăng kí !",
                    'resign_email.required' => "Email là bắt buộc !",
                    'resign_email.email' => "Email phải là một địa chỉ email hợp lệ !",
                    'resign_email.unique' => "Email đã được đăng kí !",
                    'resign_password.required' => "Mật khẩu là bắt buộc !",
                    'resign_password.min' => "Mật khẩu phải có ít nhất 6 ký tự !",
                    'resign_password.max' => "Mật khẩu không được lớn hơn 40 ký tự !",
                    'confirm_password.required' => 'Xác nhận mật khẩu là bắt buộc !',
                    'confirm_password.same' => 'Phải trùng với mật khẩu mới !',
                ];
        }
    }


    public static function showCate ($data, $parent = 0, $select = 0){
        foreach ($data as $val){
            $id = $val->id;
            $name = $val->title;
            if ($val->parent_id == $parent){
                if($select != -1 && $id == $select){
                    echo "<option value='$id' selected='selected'>$name</option>";
                }
                else{
                    echo "<option value='$id'>". $name."</option>";
                }
                Helpers::showCate($data, $id, $select);
            }
        }
    }

    public static function to_slug($str) {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        return $str;
    }
}
