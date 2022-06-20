<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Http\Request;
use App\Helpers\Helpers;
use Validator;

class AttributeValueController extends Controller
{
    public function add(){
        $breadcrumb = [
            ['link' => '/', 'name' =>__('Home')],
            ['link' => route('index-products'), 'name' => __('Product')],
            ['link' => 'javascript:void()', 'name' =>__('Add Product')]
        ];
        $cates = Cate::where('type', 'cate product')->get();
        $attributes = Attribute::all();
        return view('pages.products.add', compact('cates', 'attributes', 'breadcrumb'));
    }
    public function saveAdd(Request $rq){
        $rules = [
            'value_attribute' => 'required|max:30|unique:attribute_values,value,NUll,id,attribute_id,'.$rq->attribute1,
            'attribute1' => 'required|not_in:0'
        ];
        $messages = Helpers::switchLanguage(session()->get('locale'));
        $check = Validator::make($rq->all(), $rules, $messages);
        if ($check->passes()){
            $attrvalue = new AttributeValue();
            $attrvalue->value = $rq->value_attribute;
            $attrvalue->attribute_id = $rq->attribute1;
            $attrvalue->save();
            return response()->json([
                "type" => 'insert',
                'success' => true,
                'attrvalue' => '<option value=' .$attrvalue->id. '>'.$attrvalue->value.'</option>',
                'message' => __('Add attribute value success')
            ]);
        }
        else{
            return response()->json([
                'type' => 'insert',
                'success' => false,
                'messages' => $check->errors(),
                'message' => __('Add attribute value error')
            ]);
        }
    }
}
