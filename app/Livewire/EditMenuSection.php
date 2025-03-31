<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\MenuSections;
use App\Models\MenuItems;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

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

    public function removeMenuItem($index){
        unset($this->menuItems[$index]);
        $this->menuItems = array_values($this->menuItems); // reindexing the array 
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
            \Log::info('Editing Section: '.$this->section->name);
    
            $this->section->name = $this->name;
            $this->section->status = $this->status;
    
            \Log::info('Data to save: '. $this->name. ' and '.$this->status);
            
            \Log::info('Checking to see if an image is an instance of the UploadedFile class...');
            
            if ($this->image instanceof UploadedFile) {
                \Log::info('It is, now checking to see if we have an existing image...');
                
                if ($this->section->section_image && Storage::exists('public/' . $this->section->section_image)) {
                    \Log::info('Found old image! Deleting old image...');
                    Storage::delete('public/' . $this->section->section_image);
                    \Log::info('Image deleted from the server!');
                }
    
                // Store new image
                \Log::info('Saving image...');
                $imagePath = $this->image->store('section_image', 'public');
                $this->section->section_image = $imagePath;
                \Log::info('Saved image location at: ' . $imagePath);
            }
    
            // Save the section first
            $this->section->save();
            \Log::info('Data saved for menu section!');
    
            \Log::info('Checking to see if the user has menu items to save...');
            if (isset($this->menuItems)) {
                \Log::info('User does have menu items to save. Iterating over menu items...');
    
                foreach ($this->menuItems as $item) {
                    \Log::info('Saving menu item data...');
                    \Log::info('LOGGING MENU ITEM: ' . json_encode($item));
    
                    // Check if the menu item image exists and is an instance of UploadedFile
                    if (isset($item['image']) && $item['image'] instanceof UploadedFile) {
                        // If an image is provided, store it
                        $imagePath = $item['image']->store('section_images', 'public');
                    } else {
                        // If no image is provided, do not change the existing image
                        $imagePath = isset($item['image_path']) ? $item['image_path'] : null;
                    }
    
                    // Update or create the menu item
                    $menuItem = MenuItems::updateOrCreate(
                        [
                            'menu_section_id'=>$this->section->menu_section_id,
                            'name' => $item['name'],
                            'price' => $item['price'],
                            'image_path' => $imagePath,  // Only update image if provided
                        ]
                    );
                }
    
                \Log::info('Menu item data saved!');
            }
    
            $this->success = 'Menu section updated successfully';
    
        } catch (\Exception $e) {
            \Log::error('Error saving menu section in class: ' . __CLASS__ . ' in method: ' . __FUNCTION__ . ' on line: ' . __LINE__ . ' error message: ' . $e->getMessage());
            $this->error = 'An error occurred while saving changes';
        }
    }
    

    public function render()
    {
        return view('livewire.edit-menu-section');
    }
}
