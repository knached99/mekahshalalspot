<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuSections;
use App\Models\MenuItems;

class Manager extends Controller
{

    public function dashboard(){
        return view('admin.dashboard');
    }

    public function displayMenuManager(){
        $sections = MenuSections::with('menuItems')->get();       
        //dd($sections);
        return view('admin.menu', compact('sections'));
    }

    public function viewSection($sectionID){
        $section = MenuSections::findOrFail($sectionID);
       
        return view('admin.section.view', ['sectionID'=>$sectionID, 'section'=>$section]);
    }

    public function deleteSection($sectionID){
        
        try{
          
            MenuSections::destroy($sectionID);
            return redirect()->back()->with('success', 'Section deleted successfully!');
        }

        catch(\Exception $e){
            \Log::error('Unable to delete section due to error: ' . $e->getMessage(). '\n Exception caught on line: '.__LINE__. ' in File: '.__FILE__. ' in Method: '.__FUNCTION__. ' in Class: '.__CLASS__);
        }
    }

    public function menuCreate(){
        return view('admin.menu-create');
    }
}
