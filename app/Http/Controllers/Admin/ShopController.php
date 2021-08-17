<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        
        $shop = new Navi;
        $form = $request->all();
        
        
        // 画像(image_shop)が送信されてきたら保存して$navi->image_shopに渡す
        
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $shop->image_shop = basename($path);
        } else {
            $shop->image_shop = null;
        }
        
        
        // 画像(image_menu)が送信されてきたら保存して$navi->image_naviに渡す
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $shop->image_menu = basename($path);
        } else {
            $shop->image_menu = null;
        }
        
        // フォームから送信されてきた[_token]を削除する
        unset($form['_token']);
        
         // フォームから送信されてきた[image]を削除する
        unset($form['image']);
        
        
        // データベースに保存する
        $shop->fill($form);
        $shop->save();
        
        return redirect('admin/shop/create');
    }
    
    // 編集
    public function edit()
    {
        return view('admin.shop.edit');
    }
    
    // 更新
    public function update()
    {
        return redirect('admin/shop/edit');
    }
}
