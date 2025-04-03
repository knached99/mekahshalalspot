<?php

namespace App\Livewire\Forms;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\MenuSections;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Models\MenuItems;
use Illuminate\Support\Str;


class CreateMenuSection extends Component
{
    use WithFileUploads;

    public string $menu_section_id;
    public int $step;
    public $sectionName, $status;
    //section does not automatically appear on menu component
    public string $success = '';
    public string $error = '';

    public function mount(){
        $this->menu_section_id = Str::uuid(10);
        $this->step = 1;
        $this->sectionName = '';
        $this->success = '';
        $this->error = '';
    }

    protected $rules = [
        'sectionName' => 'required|string|max:255',
    ];

    protected $messages = [
        'sectionName.required' => 'Section name is required',
    ];

    public function saveSection(){
        $this->validate();
        

        $section = MenuSections::create([
            'menu_section_id'=>$this->menu_section_id,
            'name'=>$this->sectionName,
            'status'=>1
        ]);

        \Log::info('data saved!');

        return redirect('admin/section/'.$this->menu_section_id.'/view/')->with('success', 'Section created, continue editing here before saving');

    }

    public function render()
    {
        return view('livewire.forms.create-menu-section');
    }
}
