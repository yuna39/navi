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
    public function create()
    {
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
