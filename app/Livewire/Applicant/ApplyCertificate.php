<?php

namespace App\Livewire\Applicant;

use Livewire\Component;

class ApplyCertificate extends Component
{
    public $individualSection = true;
    public $organizationSection = null;

    public function loadIndividual()
    {
        $this->reset();
        $this->individualSection = true;
        $this->organizationSection = false;
    }

    public function loadOrganization()
    {
        $this->reset();
        $this->individualSection = false;
        $this->organizationSection = true;
    }
    public function render()
    {
        return view('livewire.applicant.apply-certificate');
    }
}
