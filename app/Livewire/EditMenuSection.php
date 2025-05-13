<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\MenuSections;
use App\Models\MenuItems;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EditMenuSection extends Component
{
    use WithFileUploads;
    
    public $section;
    public $name;
    public $image;
    public $tag;
    public $status;
    public $menuItems = [];
    public $success = '';
    public $error = '';

    public function mount(MenuSections $section){

        $this->section = $section;
        $this->name = $section->name;
        $this->tag = $section->section_tag;
        $this->image = $section->section_image;
        $this->status = $section->status;
        $this->menuItems = $section->menuItems->toArray();
    }


    public function addMenuItem(){
        $this->menuItems[] = ['name' => '', 'price' => '', 'image'=> null];
    }


    public function removeMenuItem($index, $itemID = null){

        \Log::debug('executing function '.__FUNCTION__.'');
        \Log::debug('checking if ItemID '.$itemID. ' exists in the DB...');
        
        if($itemID){
            $item = MenuItems::find($itemID);
            \Log::debug('ItemID found! Checking if item exists...');

            if($item){

                \Log::debug('Item exists! checking if item has an associated image in the DB and on filesystem...');

                if($item->image_path && Storage::disk('public')->exists($item->image_path)){
                    Storage::disk('public')->delete($item->image_path);
                    \Log::debug('image found and deleted!');
                }

                $item->delete();
                \Log::debug('Item deleted from DB!');
            }

            else{
                \Log::debug('no item found in db, deleting from array...');
                // if no item found in DB, remove from array and re-index
                unset($this->menuItems[$index]);
                $this->menuItems = array_values($this->menuItems);
                \Log::debug('item deleted from the array!');
            }
        }
    }

    public function save(){
        $this->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'menuItems.*.name' => 'required|string|max:255',
            'menuItems.*.price' => 'required|numeric|min:0',
            'menuItems.*.image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {

            $this->section->name = $this->name;
            $this->section->status = $this->status;

            if($this->image instanceof UploadedFile){
                if($this->section->section_image && Storage::exists('public/'.$this->section->section_image)){
                    Storage::delete('public/'.$this->section->section_image);

                }

                $imagePath = $this->image->store('section_image', 'public');
                $this->section->section_image = $imagePath;
            }

            $this->section->save();


            if(isset($this->menuItems)){

                foreach($this->menuItems as $item){
                    if(isset($item['image']) && $item['image'] instanceof UploadedFile){
                        $imagePath = $item['image']->store('section_images', 'public');
                    }

                    else {
                        $imagePath = isset($item['image_path']) ? $item['image_path'] : null;
                    }

                    $menuItem = MenuItems::updateOrCreate([
                        'itemID'=> $item['itemID'] ?? Str::uuid(5),
                        'menu_section_id'=> $this->section->menu_section_id,
                        'name'=>$item['name'],
                        'price'=>$item['price'],
                        'image_path'=>$imagePath,
                    ]);

                }
            }
            $this->success = 'Menu section updated successfully';
        }
        
        catch(\Exception $e){
            \Log::error('Error saving menu section in class: ' . __CLASS__ . ' in method: ' . __FUNCTION__ . ' on line: ' . __LINE__ . ' error message: ' . $e->getMessage());

            $this->error = 'An error occurred while saving changes';
        }
    }

    public function render()
    {
        return view('livewire.edit-menu-section');
    }
}
