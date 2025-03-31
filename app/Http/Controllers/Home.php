<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuSections;
use App\Models\MenuItems;
class Home extends Controller
{
    public function homePage(){

        $sections = MenuSections::with(['menuItems'])->where('status', 1)->get();
        $menuItems = MenuItems::with(['menuSection'])->get();
        return view('landing.home', compact('sections', 'menuItems'));
    }

    public function restaurantMenu(){
        $sections = MenuSections::with(['menuItems'])->where('status', 1)->get();
        $menuItems = MenuItems::with(['menuSection'])->get();
        return view('landing.restaurant-menu', compact('sections', 'menuItems'));
    }

    public function cateringPage(){

        return view('landing.catering');
    }
}
