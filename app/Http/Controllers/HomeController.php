<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Tag;
use App\Models\Onsen;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this -> middleware('auth');
    }

    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */


    public function index()
    {
        $user = \Auth::user();

        $reviews = Review::where('status', 1)->orderBy('updated_at', 'DESC')->paginate(3);
        // dd($reviews);
        $my_reviews = Review::where('user_id', $user['id'])->where('status', 1)->orderBy('updated_at', 'DESC')->paginate(3);
        return view('home', compact('user', 'reviews', 'my_reviews'));
    }

    public function article()
    {
        $user = \Auth::user();

        // $reviews = Review::where('user_id',$user['id'])->where('status',1)->orderBy ('updated_at','DESC')->get();
        $reviews = Review::where('status', 1)->orderBy('updated_at', 'DESC')->paginate(15);

        // dd($reviews);

        return view('article', compact('user', 'reviews'));
    }

    public function create()
    {
        $user=\Auth::user();
        $alltags = Tag::get();
        $reviews = Review::where('status', 1)->orderBy('updated_at', 'DESC')->get();
        return view('create', compact('user', 'alltags', 'reviews'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $image = $request->file('image');
        // 画像がアップロードされていれば、storageに保存
        if ($request->hasFile('image')) {
            $path = \Storage::put('/public', $image);
            $path = explode('/', $path);
        } else {
            $path = '画像なし';
        }


        $exist_onsen = Onsen::where('name', $data['onsenmei'])->first();
        if (empty($exist_onsen['id'])) {
            $onsen_id = Onsen::insertGetId(['name'=>$data['onsenmei'],'star'=>$data['star']]);
        } else {
            $onsen_id = $exist_onsen['id'];
        }


        // 同じタグがあるか確認
        $exist_tag = Tag::where('name', $data['tag'])->first();
        if (empty($exist_tag['id'])) {
            // 先にタグをインサート
            $tag_id = Tag::insertGetId(['name' => $data['tag'],'user_id' => $data['user_id']]);
        } else {
            $tag_id = $exist_tag['id'];
        }

        // POSTしたデータをDB(Reviewテーブル)に挿入する。
        $review_id = Review::insertGetId([
            'content' => $data['content'],
            'user_id' => $data['user_id'],
            'star' => $data['star'],
            'time' => $data['time'],
            'image' => $path[1],
            'tag_id' => $tag_id,
            'data_id' => $onsen_id,
            'status' => 1
        ]);

        // リダイレクト処理。homeに情報を渡す。
        return redirect()->route('home')->with('success', 'レビューを投稿しました。');
        ;
    }


    public function show($id)
    {
        // 該当するIDのメモをデータベースから取得
        $user = \Auth::user();
        // dd($user);
        $showrev = Review::where('status', 1)->where('id', $id)
        ->first();

        $myshowrev = Review::where('status', 1)->where('id', $id)->where('user_id', $user['id'])
        ->first();
        // dd($myshowrev);
        // dd($showrev,$myshowrev);
        //取得したメモをViewに渡す
        $tag_id = $showrev['tag_id'];
        $tags = Tag::where('id', $tag_id)->first();

        $onsen_id = $showrev['data_id'];
        $onsen = Onsen::where('id', $onsen_id)->first();

        return view('show', compact('user', 'showrev', 'myshowrev', 'tags', 'onsen'));
    }

    public function edit($id)
    {
        // 該当するIDのメモをデータベースから取得
        $user = \Auth::user();
        $showrev = Review::where('status', 1)->where('id', $id)->where('user_id', $user['id'])
        ->first();

        $tag_id = $showrev['tag_id'];
        $tags = Tag::where('id', $tag_id)->first();
        $alltags = Tag::get();

        $onsen_id = $showrev['data_id'];
        $onsen = Onsen::where('id', $onsen_id)->first();

        return view('edit', compact('user', 'showrev', 'tags', 'alltags', 'onsen'));
    }


    public function update(Request $request, $id)
    {
        $inputs = $request->all();

        $exist_tag = Tag::where('name', $inputs['tag'])->first();
        if (empty($exist_tag['id'])) {
            // 先にタグをインサート
            $tag_id = Tag::insertGetId(['name'=>$inputs['tag'],'user_id'=>$inputs['user_id']]);
        } else {
            $tag_id = $exist_tag['id'];
        }

        $image = $request->file('image');
        // dd($image);
        // 画像がアップロードされていれば、storageに保存
        if ($request->hasFile('image')) {
            $path = \Storage::put('/public', $image);
            $path = explode('/', $path);
        } else {
            $path = '画像なし';
        }

        Review::where('id', $id)->update([
        'content'=> $inputs['content'],
        'star' => $inputs['star'],
        'time' => $inputs['time'],
        'image' => $path[1],
        'tag_id' => $tag_id ]);
        return redirect()->route('home')->with('success', 'レビューを更新しました。');
    }

    public function delete(Request $request, $id)
    {
        $inputs = $request->all();
        // dd($inputs);

        // 論理削除なのでstatus=2とすることで削除扱いにできる。
        Review::where('id', $id)->update(['status' => 2]);

        return redirect()->route('home')->with('success', 'レビュー投稿を削除しました。');
    }
}
