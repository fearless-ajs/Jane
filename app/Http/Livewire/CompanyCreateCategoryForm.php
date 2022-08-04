<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Traits\FileManager;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class CompanyCreateCategoryForm extends Component
{
    use WithFileUploads, FileManager;

    public $name;
    public $image;

    public $company;


    public function mount($company){
        $this->company = $company;
    }


    public function updated($field){
        $this->validateOnly($field, [
            'name'      =>  'required|string|max:255',
            'image'     =>  'required|max:2300'
        ]);
    }

    public function addCategory(){
        $this->validate([
            'name'      =>  'required|string|max:255',
            'image'     =>  'required|max:2300'
        ]);


        //Save the image
        $this->image = $this->saveImage($this->image, 'images');

        // Check if category exist in company's record
        if (Category::where('company_id', $this->company->id)->where('name', $this->name)->first()){
            return $this->emit('alert', ['type' => 'error', 'message' => 'Category exist']);
        }

        Category::create([
            'company_id'    => $this->company->id,
            'name'          => $this->name,
            'image'         => $this->image
        ]);

        $this->resetExcept('company');
        $this->emit('refreshCompanyCategoryList');
        $this->emit('close-current-modal');
        return $this->emit('alert', ['type' => 'success', 'message' => 'Category created']);
    }


    public function render()
    {
        return view('livewire.company.components.company-create-category-form');
    }
}
