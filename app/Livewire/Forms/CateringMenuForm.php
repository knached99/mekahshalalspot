<?php

namespace App\Livewire\Forms;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use App\Models\CateringMenu;
use Exception;

class CateringMenuForm extends Component
{
    use WithFileUploads;

    public $catering;
    public $catering_menu_id;
    public $catering_menu_image;
    public string $success = '';
    public string $error = '';


    public function mount(){

        $this->catering = CateringMenu::first();
        
    }

    // public function createOrUpdateCateringMenu(){
    //     \Log::info('Executing method: '.__FUNCTION__. ' in class: '.__CLASS__);

    //     $rules = ['catering_menu_image'=>'required|image|mimes:jpg,jpeg,png'];
    //     $msgs = ['catering_menu_image.required'=>'Image is required', 'catering_menu_image.image'=>'File is not a valid image', 'catering_menu_image.mimes'=>'Image must be a valid jpg, jpeg, or png file'];

    //     \Log::info('Validating user input...');

    //     $this->validate($rules, $msgs);

    //     try {
    //         \Log::info('User input is validated!');
            
    //         $imagePath = null;
    //         $cateringMenuID = $this->catering ? $this->catering->catering_menu_id : Str::uuid();

    //         if($this->catering_menu_image instanceof UploadedFile){
    //             \Log::info('image is instance of UploadedFile');

    //             if($this->catering && $this->catering->catering_menu_image){
                    
    //                 $existingPath = $this->catering->catering_menu_image;

    //                 if(Storage::disk('public')->exists($existingPath)){

    //                     \Log::info('Existing image found at: '.$existingPath);

    //                     Storage::disk('public')->delete($existingPath);
                        
    //                     \Log::info('deleted existing image');
    //                 }

    //                 $imagePath = $this->catering_menu_image->store('catering_menu', 'public');

    //                 \Log::info('New image stored at: '.$imagePath);
    //             }

    //             $data = [
    //                 'catering_menu_id'=>$cateringMenuID,
    //                 'catering_menu_image'=>$imagePath,
    //             ];

    //             CateringMenu::updateOrCreate($data);

    //             \Log::info('data saved to the DB');
    //             $this->success = 'image saved successfully!';
                
    //         }
    //     }

    //     catch(Exception $e){
    //         \Log::info('unable to upload new catering menu image, something went wrong: '.$e->getMessage());
    //         $this->error = 'Unable to upload the image, something went wrong';
    //     }
    // }

    public function createOrUpdateCateringMenu(){

        \Log::info('executing function: '.__FUNCTION__. ' in class: '.__CLASS__. ' at: '.now());

        $rules = ['catering_menu_image'=>'required|image|mimes:jpg,jpeg,png'];
        $msgs = ['catering_menu_image.required'=>'Image is required', 'catering_menu_image.image'=>'File is not a valid image', 'catering_menu_image.mimes'=>'Image must be a valid jpg, jpeg, or png file'];

        \Log::info('Validating user input...');

        $this->validate($rules, $msgs);

        try {
            \Log::info('User input is validated!');

            $cateringMenuID = $this->catering ? $this->catering->catering_menu_id : Str::uuid();

            $imagePath = null;

            if($this->catering_menu_image instanceof UploadedFile){

                if($this->catering && $this->catering->catering_menu_image){

                    $existingPath = $this->catering->catering_menu_image;

                    if(Storage::disk('public')->exists($existingPath)){

                        Storage::disk('public')->delete($existingPath);
                    }
                }

                $imagePath = $this->catering_menu_image->store('catering_menu_image', 'public');
            }

            $data = [
                'catering_menu_id'=>$cateringMenuID,
                'catering_menu_image'=>$imagePath,
            ];

            CateringMenu::updateOrCreate(['catering_menu_id' => $cateringMenuID], $data);

            $this->success = 'Catering menu image updated!';
        }

        catch(Exception $e){
            \Log::error('Unable to execute function: '.__FUNCTION__. ' due to the following exception: '.$e->getMessage());
            $this->error = 'Unable to save new catering menu image, an unexpected error was encountered';
        }

    }

    public function render()
    {
        return view('livewire.forms.catering-menu-form');
    }
}
