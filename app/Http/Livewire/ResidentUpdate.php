<?php

namespace App\Http\Livewire;

use App\Models\Resident;
use Carbon\Carbon;
use Livewire\Component;

class ResidentUpdate extends Component
{
    public Resident $resident;
    public $genders;
    public $puroks;

    public $firstname;
    public $middlename;
    public $lastname;
    public $suffix;
    public $birth_date;
    public $gender;
    public $purok;

    public $isUpdating = false;

    protected $rules =[
        'firstname' => 'required',
        'lastname' => 'required',
        'birth_date' => 'required|date',
        'gender' => 'required',
        'purok' => 'required'
    ];

    protected $messages = [
        'firstname.required' => 'First name field is required!',
        'lastname.required' => 'Last name field is required!',
        'birth_date.required' => 'Birth Date field is required!',
        'birth_date.date' => 'Birth Date field should be date!',
        'gender.required' => 'Gender field is required!',
        'purok.required' => 'Purok field is required!'
    ];

    public function update()
    {
        $this->validate();
        $age = now()->format('Y') - Carbon::parse($this->birth_date)->format('Y');
        $this->isUpdating = true;
        $this->resident->update([
            'firstname' => $this->firstname,
            'middlename' => $this->middlename,
            'lastname' => $this->lastname,
            'suffix' => $this->suffix,
            'age' => $age,
            'birth_date' => $this->birth_date,
            'gender' => $this->gender,
            'purok' => $this->purok,
        ]);
        $this->isUpdating = false;
        $this->dispatchBrowserEvent('update');
    }

    public function mount()
    {
        $this->firstname = $this->resident->firstname;
        $this->middlename = $this->resident->middlename;
        $this->lastname = $this->resident->lastname;
        $this->suffix = $this->resident->suffix;
        $this->birth_date = $this->resident->birth_date;
        $this->gender = $this->resident->gender;
        $this->purok = $this->resident->purok;
    }

    public function render()
    {
        return view('livewire.resident-update');
    }
}
