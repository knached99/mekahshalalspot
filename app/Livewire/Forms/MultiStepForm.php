<?php 

namespace App\Livewire\Forms;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\MenuSections;
use App\Models\MenuItems;
use Illuminate\Support\Str;

class MultiStepForm extends Component
{
    use WithFileUploads;
    public string $menu_section_id; 
    public int $step; 
    public $sectionName, $addMenuItems, $menuItems = [];
    public $menuImage = [], $menuItem = [], $itemPrice = [];
    public string $success = '';
    public string $error = '';

    public function mount()
    {   
        $this->menu_section_id = Str::uuid(10);
        $this->step = 1;
        $this->sectionName = '';
        $this->addMenuItems = null; 
        $this->menuItems = [];
        $this->menuImage = [];
        $this->menuItem = [];
        $this->itemPrice = [];
        $this->success = '';
        $this->error = '';
    }
    
    // validate every step of the form
    protected $rules = [
        'sectionName' => 'required|string|max:255',
        'addMenuItems'=>'required'
    ];

    protected $rulesMenuItems = [
        'menuImage.*' => 'image|max:1024', // 1MB Max file size
        'menuItem.*' => 'required|string|max:255',
        'itemPrice.*' => 'required|numeric|min:0.01',
    ];

    public function nextStep()
    {
        \Log::info("Current Step: " . $this->step);
        \Log::info("Add Menu Items: " . $this->addMenuItems);
    
        if ($this->step == 1) {
            $this->validate();
            $this->step = 2;
        } elseif ($this->step == 2) {
            if ($this->addMenuItems == 'yes') {
                $this->validateMenuItems();
                $this->step = 3;
            } else {
                $this->saveSection();
            }
        } elseif ($this->step == 3) {
            $this->saveMenuItems();
        }
    }
    


    public function previousStep()
    {
        if ($this->step > 1) {
            $this->step--;
        }
    }

    //Sometimes, Livewire doesn't detect changes correctly. Forcing livewire to update UI 
    
    public function updatedAddMenuItems($value)
    {
        $this->addMenuItems = $value;
        $this->dispatch('refresh');
    }



    // private function saveSection()
    // {
    //     $section = MenuSections::create([
    //         'menu_section_id' => $this->menu_section_id,
    //         'name' => $this->sectionName,
    //     ]);
    //     return redirect('menu')->with('success', 'Section with name: '.$this->sectionName. ' created sucessfully!');
    //  //   $this->success = 'Section created successfully. <a href="' . route('sections.show', ['section' => $section->id]) . '" class="text-blue-500">View Section</a>';
    // }


    private function saveSection()
{
    $section = MenuSections::create([
        'menu_section_id' => $this->menu_section_id,
        'name' => $this->sectionName,
    ]);

    if ($this->addMenuItems == 'no') {
        return redirect('menu')->with('success', 'Section with name: '.$this->sectionName. ' created successfully!');
    }
}


    private function validateMenuItems()
    {
        $this->validate($this->rulesMenuItems);
    }


    public function addMenuItem()
{
    // if(count($this->menuItems) < 10){
    $this->menuItems[] = ['menuImage' => null, 'menuItem' => '', 'itemPrice' => 0];
    $this->dispatch('refresh');
    // }
}


private function saveMenuItems()
{
    // Ensure the section is saved first
    $section = MenuSections::firstOrCreate(
        ['menu_section_id' => $this->menu_section_id], 
        ['name' => $this->sectionName]
    );

    if (!$section) {
        \Log::error("Failed to create or find the menu section.");
        return;
    }

    foreach ($this->menuItem as $index => $item) {
        if (isset($this->menuImage[$index])) {
            // Save images and return the path
            $imagePath = $this->menuImage[$index]->store('menu_images', 'public');
        } else {
            $imagePath = ''; // Default to empty path if no images are uploaded
        }

        MenuItems::create([
            'menu_section_id' => $section->menu_section_id, // Ensure it references the section
            'name' => $item,
            'price' => $this->itemPrice[$index],
            'image_path' => $imagePath,
        ]);
    }

    return redirect('menu')->with('success', 'Menu section and items added successfully!');
}


    public function render()
    {
    
      return view('livewire.forms.multi-step-form');
    }
}
