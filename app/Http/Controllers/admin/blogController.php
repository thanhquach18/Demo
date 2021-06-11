<?php

namespace App\Http\Controllers\admin;

use Storage;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\blogs;

class blogController extends Controller
{
    public function indexblog() {
        if (isset($_GET['page']) && is_numeric($_GET['page'])) {
            $page_current = intval($_GET['page']);
            if ($page_current >= 1) {
                Paginator::currentPageResolver(function () use ($page_current) {return $page_current;});
            }
        }
        $recode = 10;
        $posts = blogs::orderByDesc('id')->paginate($recode);
        return view('admin.blog.index', ['data' => $posts]);
    }

    public function deleteBlog($id) {
        $blog = blogs::find($id);
        if(is_null($blog)) {
            return redirect()->route('blog.index')->with('error', 'Không tìm thấy bài viết');
        }

        if($blog->delete()) return redirect()->route('blog.index')->with('success', 'Xóa thành công');
        return redirect()->route('blog.index')->with('success', 'Xóa thất bại');
    }

    public function insert() {
        return view('admin.blog.create');
    }

    private function validator($request) {
        $rules = [
            'title' => 'required|min:3|max:250',
            'owner' => 'required|min:3|max:250',
            'short_description' => 'required|min:3|max:5000',
            'content' => 'required|min:3|max:10000',
        ];
        $messages = [
            'title.required' => 'Tiêu đề de là trường bắt buộc',
            'title.min' => 'Tiêu đề phải chứa ít nhất 3 ký tự',
            'title.max' => 'Tiêu đề có nhiều nhất 250 ký tự',
            'owner.required' => 'Tác giả là trường bắt buộc',
            'owner.min' => 'Tác giả chứa ít nhất 3 ký tự',
            'owner.max' => 'Tác giả có nhiều nhất 250 ký tự',
            'short_description.required' => 'Mô tả ngắn là trường bắt buộc',
            'short_description.min' => 'Mô tả ngắn chứa ít nhất 3 ký tự',
            'short_description.max' => 'Mô tả ngắn có nhiều nhất 5000 ký tự',
            'content.required' => 'Nội dung là trường bắt buộc',
            'content.min' => 'Nội dung chứa ít nhất 3 ký tự',
            'content.max' => 'Nội dung có nhiều nhất 10000 ký tự',
        ];

        if(!empty($request->all()['thumb'])) {
            $rules['thumb'] = 'image|mimes:jpcomposer installpeg,png,jpg,gif|max:2048';
            $messages['thumb.image'] = 'Bạn cần chọn hình ảnh';
            $messages['thumb.mimes'] = 'Hình ảnh không đúng vơi định dạng';
            $messages['thumb.max'] = 'Hình ảnh quá lớn';
        }

        return Validator::make($request->all(), $rules, $messages);
    }

    public function insertPost(Request $request){
        $validator = $this->validator($request);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $new = new blogs();
        if($request->hasFile('thumb')) {
            $new->thumb = Storage::url(Storage::disk('public')->put('image', $request->file('thumb')));
        }

        $slug = Str::slug($request->all()['title'], '-');
        $dem = 0;
        $exist = false;
        do
        {
            $exist = blogs::where('slug', $slug)->exists();
            if($exist) {
                $dem++;
                $slug .= '-'.$dem;
            }
        }
        while($exist);

        $new->title = $request['title'];
        $new->slug = $slug;
        $new->is_show = !is_null($request->input('is_show'));
        $new->owner = $request['owner'];
        $new->short_description = $request['short_description'];
        $new->content = $request['content'];
        if($new->save()) return redirect()->route('blog.create')->with('success', 'Thêm thành công');

        return redirect()->back()->withInput()->with('error', 'Thêm thất bại');
    }

    public function edit($id) {
        $blog = blogs::find($id);
        if(is_null($blog)) {
            return redirect()->route('blog.index')->with('error', 'Không tìm thấy bài viết');
        }

        return view('admin.blog.create',[
            'thumbnail' => $blog->thumb,
            'title' => $blog->title,
            'owner' => $blog->owner,
            'is_show' => $blog->is_show,
            'short_description' => $blog->short_description,
            'content' => $blog->content
        ]);
    }

    public function editPost($id, Request $request){
        $validator = $this->validator($request);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $blog = blogs::find($id);
        if(is_null($blog)) {
            return redirect()->route('blog.index')->with('error', 'Không tìm thấy bài viết');
        }
        if($request->hasFile('thumb')) {
            $blog->thumb = Storage::url(Storage::disk('public')->put('image', $request->file('thumb')));
        }

        $slug = Str::slug($request->all()['title'], '-');
        $dem = 0;
        $exist = false;
        do
        {
            $exist = blogs::where('slug', $slug)->exists();
            if($exist) {
                $dem++;
                $slug .= '-'.$dem;
            }
        }
        while($exist);

        $blog->title = $request['title'];
        $blog->slug = $slug;
        $blog->is_show = !is_null($request->input('is_show'));
        $blog->owner = $request['owner'];
        $blog->short_description = $request['short_description'];
        $blog->content = $request['content'];
        if($blog->save()) return redirect()->route('blog.index')->with('success', 'Thêm thành công');

        return redirect()->back()->withInput()->with('error', 'Thêm thất bại');
    }
}
