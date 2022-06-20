<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use Illuminate\Http\Request;
use App\Helpers\Helpers;
use Validator;
class   AttributeController extends Controller
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
            'name_attribute' => 'required|max:30|unique:attributes,name'
        ];
        $messages = Helpers::switchLanguage(session()->get('locale'));
        $check = Validator::make($rq->all(), $rules, $messages);
        if ($check->passes()){
            $attributes = new Attribute();
            $attributes->name = $rq->name_attribute;
            $attributes->type = $rq->type;
            $attributes->save();
            return response()->json([
                "type" => 'insert',
                'success' => true,
                'attribute' => '<option selected value=' .$attributes->id. '>'.$attributes->name.'</option>',
                'message' => __('Add attribute success')
            ]);
        }
        else{
            return response()->json([
                'type' => 'insert',
                'success' => false,
                'messages' => $check->errors(),
                'message' => __('Add attribute error')
            ]);
        }
    }
}
