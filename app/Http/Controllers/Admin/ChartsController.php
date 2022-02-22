<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;

class ChartsController
{
    public function newUsers()
    {
        $userArray = array_fill(0, 7, 0);
        $now = Carbon::now();
        $users = User::where('created_at', '>=', $now->subDays(7))->get();
        foreach ($users as $user) {
            $diffInDays = $now->diffInDays(Carbon::create($user->created_at)->format('Y-m-d'));
            $userArray[$diffInDays]++;
        }
        return $userArray;

    }

    public function newOrders()
    {
        $userArray = array_fill(0, 7, 0);
        $now = Carbon::now();
        $users = Order::where('created_at', '>=', $now->subDays(7))->get();
        foreach ($users as $user) {
            $diffInDays = $now->diffInDays(Carbon::create($user->created_at)->format('Y-m-d'));
            $userArray[$diffInDays]++;
        }
        return $userArray;

    }

    public function newProducts()
    {
        $userArray = array_fill(0, 7, 0);
        $now = Carbon::now();
        $users = Product::where('created_at', '>=', $now->subDays(7))->get();
        foreach ($users as $user) {
            $diffInDays = $now->diffInDays(Carbon::create($user->created_at)->format('Y-m-d'));
            $userArray[$diffInDays]++;
        }
        return $userArray;

    }

    public function productsPerBrand()
    {
        return Brand::withCount('products')->get();

    }

    public function productsPerCategory()
    {
        return Category::withCount('products')->get();

    }

}
