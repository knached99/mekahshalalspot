<?php

namespace App\Livewire\Forms;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use App\Models\AboutSection;
use Exception;

class AboutSectionForm extends Component
{
    public $section;
    public string $aboutSectionID = '';
    public string $sectionTitle = '';
    public string $sectionContent = '';
    public string $success = '';
    public string $error = '';


    public function mount(){
        $this->section = AboutSection::first();

        if ($this->section) {
            $this->sectionContent = $this->section->section_content;
    }
}

    public function createOrUpdateAboutSection(){
        
        $rules = [
            'sectionTitle'=>'required|string',
            'sectionContent'=>'required|string',
        ];

        $messages = [
            'sectionTitle.required'=>'Title is required',
            'sectionContent.required'=>'Content is required',
        ];
        
        $this->validate($rules, $messages);
    
        // check to see if this section has already been created 
        try { 
        $aboutSectionID = $this->section ? $aboutSectionID = $this->section->about_section_id : Str::uuid(5);

        AboutSection::updateOrCreate(
            ['about_section_id' => $aboutSectionID],
            [
            'section_title'=>$this->sectionTitle,
            'section_content' => $this->sectionContent,
            ] 
        );
        

        $this->success = 'Content saved successfully and the changes have been reflected on the homepage';
    }
    catch(Exception $e){
        $this->error = 'Unable to save changes, something went wrong. If this error persists, please contact the developer';
        \Log::critical('Failed to create about section because of the following error: '.$e->getMessage());
    }

    }

    public function render()
    {
        $content = $this->section ? $this->section->section_content : '';
        return view('livewire.forms.about-section-form', ['content'=>$content]);
    }
}
