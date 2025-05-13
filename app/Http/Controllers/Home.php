<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuSections;
use App\Models\MenuItems;
use App\Models\CateringMenu;
use App\Models\AboutSection;
use App\Models\DealsSection;
use Illuminate\Support\Facades\DB;

class Home extends Controller
{
    public function homePage(){

        $sections = MenuSections::with(['menuItems'])->where('status', 1)->get();
        $menuItems = MenuItems::with(['menuSection'])->get();
        $content = AboutSection::select('section_title','section_content')->get();  
        $deal = DealsSection::select('deal_title', 'deal_content', 'deal_price', 'deal_image')->first();
     
        return view('landing.home', compact('sections', 'menuItems', 'content', 'deal'));
    }

    public function aboutPage(){
        
        $content = AboutSection::select('section_title','section_content')->get();   
        return view('landing.about', compact('content')); 
    }

    public function restaurantMenu(){
        $sections = MenuSections::with(['menuItems'])->where('status', 1)->get();
        $menuItems = MenuItems::with(['menuSection'])->get();
        return view('landing.restaurant-menu', compact('sections', 'menuItems'));
    }

    public function cateringPage(){

        $catering = CateringMenu::first();
        $cateringMenuImage = $catering ? $catering->catering_menu_image : '';
        return view('landing.catering', compact('cateringMenuImage'));
    }

    public function cart(){
        return view('landing.cart');
    }
}
