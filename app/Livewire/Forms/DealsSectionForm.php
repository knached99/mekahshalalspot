<?php

namespace App\Livewire\Forms;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use App\Models\DealsSection;
use Exception;

class DealsSectionForm extends Component
{

    use WithFileUploads;

    public $deal;
    public $dealID;
    public $deal_title;
    public $deal_content;
    public $deal_price;
    public $deal_image;
    public string $success = '';
    public string $error = '';

    public function mount(){

        $this->deal = DealsSection::first();
    }

    public function createOrUpdateDeal()
    {
        \Log::info('Executing function ' . __FUNCTION__ . '() in class: ' . __CLASS__);
    
        $rules = [
            'deal_title' => 'required|string',
            'deal_content' => 'required|max:300',
            'deal_price' => 'required|numeric',
            'deal_image' => 'required|image|mimes:jpg,jpeg,png',
        ];
    
        $msgs = [
            'deal_title.required' => 'Title is required',
            'deal_content.required' => 'Description is required',
            'deal_content.max' => '300 characters limit',
            'deal_price.required' => 'Price is required',
            'deal_price.numeric' => 'Price must be numeric',
            'deal_image.required' => 'Image is required',
            'deal_image.image' => 'File selected is not a valid image',
            'deal_image.mimes' => 'File must be a jpg, jpeg, or png',
        ];
    
        \Log::info('Validating user input...');
        $this->validate($rules, $msgs);
    
        try {
            $dealSectionID = $this->deal ? $this->deal->deal_id : Str::uuid();
    
            \Log::info('Deal Section ID: ' . $dealSectionID);
            \Log::info('User input validated!');
    
            $imagePath = null;
    
            if ($this->deal_image instanceof \Illuminate\Http\UploadedFile) {
                \Log::info('Image is instance of UploadedFile object');
    
                if ($this->deal && $this->deal->deal_image) {
                    $existingPath = $this->deal->deal_image;
    
                    if (Storage::disk('public')->exists($existingPath)) {
                        \Log::info('Existing image found at: ' . $existingPath);
                        Storage::disk('public')->delete($existingPath);
                        \Log::info('Deleted existing image');
                    }
                }
    
                $imagePath = $this->deal_image->store('deal_images', 'public');
                \Log::info('New image stored at: ' . $imagePath);
            }
    
            $data = [
                'deal_id' => $dealSectionID,
                'deal_title' => $this->deal_title,
                'deal_content' => $this->deal_content,
                'deal_price' => $this->deal_price,
                'deal_image' => $imagePath,
            ];
    
            DealsSection::updateOrCreate(['deal_id' => $dealSectionID], $data);
    
            \Log::info('Data saved to DB!');
            $this->success = 'Deal created!';
        } catch (Exception $e) {
            \Log::error('Unable to execute ' . __FUNCTION__ . ' in class ' . __CLASS__ . ': ' . $e->getMessage());
            $this->error = 'An unexpected error occurred. If this continues, please contact the developer.';
        }
    }
    


    public function render()
    {
        return view('livewire.forms.deals-section-form');
    }
}
