<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Navi;

class ShopController extends Controller
{
    
    
    
    public function add()
    {
        return view('admin.shop.create');
    }
    
    
    
    // 作る
    public function create(Request $request)
    {
        
        $this->validate($request, Navi::$rules);
        
        $navi = new Navi;
        $form = $request->all();
        
        
        // 画像(image_shop)が送信されてきたら保存して$navi->image_shopに渡す
        
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $navi->image_shop = basename($path);
        } else {
            $navi->image_shop = null;
        }
        
        
        // 画像(image_menu)が送信されてきたら保存して$navi->image_naviに渡す
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $navi->image_menu = basename($path);
        } else {
            $navi->image_menu = null;
        }
        
        // フォームから送信されてきた[_token]を削除する
        unset($form['_token']);
        
         // フォームから送信されてきた[image]を削除する
        unset($form['image']);
        
        
        // データベースに保存する
        $navi->fill($form);
        $navi->save();
        
        return redirect('admin/shop/create');
    }
    
    
    
    
    // 投稿一覧表示画面
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            $posts = Navi::where('name', $cond_title)->get();
        } else {
            $posts = Navi::all();
        }
        return view('admin.shop.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    
    
    // 編集
    public function edit(Request $request)
    {
        // Naviモデルからデータを取得する
        $navi = Navi::find($request->id);
        if (empty($navi)) {
            abort(404);
        }
        
        return view('admin.shop.edit', ['navi_form' => $navi]);
    }
    
    
    
    // 更新
    public function update(Request $request)
    {
        // Validationをかける
        $this->validate($request, Navi::$rules);
        // Naviモデルからデータを取得する
        $navi = Navi::find($request->id);
        // 送信されてきたフォームデータを格納する
        $navi_form = $request->all();
        
        if ($request->remove == 'true') {
            $navi_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $navi_form['image_path'] = basename($path);
        } else {
            $navi_form['image_path'] = $navi->image_path;
        }
        
        unset($navi_form['image']);
        unset($navi_form['remove']);
        unset($navi_form['_token']);
        
        // 該当するデータを上書きして保存する
        $navi->fill($navi_form)->save();
        
        return redirect('admin/shop');
    }
    
}
