<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\Cate;
use App\Models\Log;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Pagination\Paginator;

class PostController extends Controller
{
    public function index(Request $rq){
        $numpage = 10;
        $breadcrumb = [
            ['link' => '/', 'name' =>__('Home')],
            ['link' => 'javascript:void()', 'name' => __('Posts')],
        ];
        if ($rq->ajax()){
            $rq->pagenum ? $numpage = $rq->pagenum : $numpage;
            if ($rq->search){
                $posts = Post::where('title', 'like', '%'.$rq->search.'%')
                    ->orwhere('slug', 'like', '%'.$rq->search.'%')->orderBy('id')->paginate($numpage);
            }
            else{
                $posts = Post::orderBy('id', 'desc')->paginate($numpage);
            }
            return view('pages.blogs.ajax-filter')->with('posts', $posts)->render();
        }
        else{
            $posts = Post::orderBy('id', 'desc')->paginate($numpage);
            return view('pages.blogs.index', compact('posts', 'breadcrumb'));
        }
    }
    public function add(){
        $breadcrumb = [
            ['link' => '/', 'name' =>__('Home')],
            ['link' => route('index-posts'), 'name' => __('Posts')],
            ['link' => 'javascript:void()', 'name' =>__('Add Post')]
        ];
        $cates = Cate::where('type', 'cate post')->orwhere('type', 'cate footer')->get();
        return view('pages.blogs.add', compact('cates', 'breadcrumb'));
    }
    public function saveAdd(Request $rq){
        $rules = [
            'title' => 'required|max:100|unique:products,title',
            'slug' => 'required|max:100|unique:products,slug',
            'cate_id' => 'required'
        ];
        $messages = Helpers::switchLanguage(session()->get('locale'));
        $check = Validator::make($rq->all(), $rules, $messages);
        if ($check->passes()){
            $path = isset($rq->file_thumb) ? $rq->file_thumb->store('admin/posts', 'public'): null;
            $post = new Post();
            $post->title = $rq->title;
            $post->slug = $rq->slug;
            $post->content = $rq->contents;
            $post->photo = $path;
            $post->status  = $rq->status;
            $post->added_by = Auth::user()->id;
            $post->save();
            $post->cates()->attach($rq->cate_id);
            Log::pushLog('Add Posts ID: ' . $post->id);
            return response()->json([
                'type' => 'insert',
                'success' => true,
                'message' => __('Add') . ' ' . __('Posts') . ' '. __('success') . ' !'
            ]);
        }
        else{
            return response()->json([
                'type' => 'insert',
                'success' => false,
                'messages' => $check->errors(),
                'message' => __('Add') . ' ' . __('Posts') . ' '. __('error') . ' !'
            ]);
        }
    }

    public function update($id){
        if($id){
            $breadcrumb = [
                ['link' => '/', 'name' =>__('Home')],
                ['link' => route('index-posts'), 'name' => __('Posts')],
                ['link' => 'javascript:void()', 'name' =>__('Update Post')]
            ];
            $cates = Cate::where('type', 'cate post')->orwhere('type', 'cate footer')->get();
            $post =Post::find($id);
            return view('pages.blogs.edit', compact('post', 'cates', 'breadcrumb'));
        }
    }

    public function saveUpdate(Request $rq){
        $rules = [
            'title' => 'required|max:100|unique:products,title',
            'slug' => 'required|max:100|unique:products,slug',
            'cate_id' => 'required'
        ];
        $messages = Helpers::switchLanguage('vi');
        $check = Validator::make($rq->all(), $rules, $messages);
        if ($check->passes()){
            $post = Post::find($rq->id);
            $path = isset($rq->file_thumb) ? $rq->file_thumb->store('admin/posts', 'public'): null;
            $post->title = $rq->title;
            $post->slug = $rq->slug;
            $post->content = $rq->contents;
            $post->status  = $rq->status;
            if ($path != null){
                @unlink(public_path('storage/'. $post->photo));
                $post->photo = $path;
            }
            $post->save();
            $post->cates()->sync($rq->cate_id);
            Log::pushLog('Update Posts ID: ' . $post->id);
            return response()->json([
                'type' => 'update',
                'success' => true,
                'message' => __('Update') . ' ' . __('Posts') . ' '. __('success') . ' !'
            ]);
        }
        else{
            return response()->json([
                'type' => 'update',
                'success' => false,
                'messages' => $check->errors(),
                'message' => __('Update') . ' ' . __('Posts') . ' '. __('error') . ' !'
            ]);
        }
    }

    public function delete(Request $rq, $id){
        if ($id){
            $currentPage = (int)$rq->page;
            $post = Post::find($id);
            @unlink(public_path('storage/' . $post->photo));
            $post->delete();
            Log::pushLog('Delete Posts ID: ' . $id);
            $getTatalPage = Post::orderBy('id')->paginate($rq->pagenum)->lastPage();
            if ($rq->search != '' ){
                $getTatalPage = Post::where('title', 'like', '%'.$rq->search.'%')
                    ->orwhere('slug', 'like', '%'.$rq->search.'%')->orderBy('id')->paginate($rq->pagenum)->lastPage();
                if ($currentPage > $getTatalPage -1){
                    Paginator::currentPageResolver(function () use ($getTatalPage) {
                        return $getTatalPage;
                    });
                }
                $posts = Post::where('title', 'like', '%'.$rq->search.'%')
                    ->orwhere('slug', 'like', '%'.$rq->search.'%')->orderBy('id')->paginate($rq->pagenum);
            }
            else{
                if ($currentPage > $getTatalPage -1){
                    Paginator::currentPageResolver(function () use ($getTatalPage ) {
                        return $getTatalPage;
                    });
                }
                $posts = Post::orderBy('id', 'desc')->paginate($rq->pagenum);
            }
            return response()->json([
                'success' => true,
                'message' => __('Delete Post') . ' ID '. $id .' ' . __('Success'),
                'messages' => view('pages.blogs.ajax-filter')->with('posts', $posts)->render()
            ]);
        }
    }

    public function switchAjax($id){
        $post = Post::find($id);
        if($post->status == 0){
            $post->status = 1;
        }
        else{
            $post->status = 0;
        }
        $post->save();
        Log::pushLog('Update Posts ID: ' . $post->id);
        return response()->json([
            'np_' => $post->status,
            'message' => __('Update') . ' ' . __('Status') . ' '. __('success') . ' !'
        ]);
    }

}
