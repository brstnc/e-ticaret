<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomePageController extends Controller
{
    public function index()
    {
        // Ençok satan ürünleri listeler
        /*$bestselling = DB::select("
            SELECT p.product_name, SUM(bp.amount) amount
            FROM `order` o
            INNER JOIN basket b ON b.id = o.basket_id
            INNER JOIN basket_product bp ON b.id = bp.basket_id
            INNER JOIN product p ON p.id = bp.product_id
            GROUP BY p.product_name
            ORDER BY SUM(bp.amount) DESC
        ");
        */
        return view('admin.homepage');
    }
}
