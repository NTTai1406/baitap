<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class productController extends Controller
{
    public function viewProducts()
    {
        $products = DB::table('tbProducts')->get();
        return view('viewProducts', ['products' => $products]);
    }

    public function searchProduct(Request $request)
    {
        $from = $request->input('from');
        $to = $request->input('to');
        $products = DB::table('tbProducts')
            ->whereBetween('price', [$from, $to])
            ->get();

        if ($products->isEmpty()) {
            return back()->with('error', 'product not found');
        }
        return view('viewProducts', ['products' => $products]);
    }

    public function adminProducts()
    {
        $products = DB::table('tbProducts')->get();
        return view('adminProducts', ['products' => $products]);
    }

    public function edit($code)
    {
        $product = DB::table('tbProducts')->where('code', $code)->first();
        return view('editProducts', ['product' => $product]);
    }

    public function update(Request $request, $code)
    {
        $request->validate([
            'price' => 'required|numeric|between:10000,200000'
        ]);

        DB::table('tbProducts')
            ->where('code', $code)
            ->update(['price' => $request->price]);

        return redirect('/adminProducts');
    }

    public function delete($code)
    {
        DB::table('tbProducts')->where('code', $code)->delete();
        return redirect('/adminProducts');
    }

    public function add()
    {
        return view('addProducts');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|between:10000,200000'
        ]);

        DB::table('tbProducts')->insert([
            'name' => $request->name,
            'price' => $request->price,
            'descriptions' => $request->descriptions
        ]);

        return redirect('/adminProducts');
    }
}
