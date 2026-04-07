<?php

namespace App\Livewire\Applicant;

use App\Models\IndividualEntity;
use App\Models\OrganizationEntity;
use Exception;
use Livewire\Component;

class Home extends Component
{
    public $individualSection = true;
    public $organizationSection = false;

    // Search Properties
    public $searchId;
    public $searchTin;

    // Individual Form Properties
    public $applicantName;
    public $nationalId;
    public $address;
    public $mobileNumber;
    public $mobileNumberConfirmation;
    public $email;
    public $emailConfirmation;

    // Organization Form Properties
    public $organizationName;
    public $tin;
    public $shortName;
    public $mdCeoName;
    public $organizationAddress;

    protected function rules()
    {
        if ($this->individualSection) {
            return [
                'applicantName' => 'required|min:3',
                'nationalId' => 'required',
                'address' => 'required',
                'mobileNumber' => 'required|numeric',
                'mobileNumberConfirmation' => 'required|same:mobileNumber',
                'email' => 'required|email',
                'emailConfirmation' => 'required|same:email'
            ];
        }

        return [
            'organizationName' => 'required|min:3',
            'tin' => 'required',
            'shortName' => 'nullable',
            'mdCeoName' => 'required',
            'organizationAddress' => 'required',
        ];
    }

    public function searchIndividual()
    {
        $this->validate(['searchId' => 'required']);

        $entity = IndividualEntity::where('national_id', $this->searchId)->first();

        if ($entity) {
            $this->applicantName = $entity->applicant_name;
            $this->nationalId = $entity->national_id;
            $this->address = $entity->address;
            $this->mobileNumber = $entity->mobile_number;
            $this->mobileNumberConfirmation = $entity->mobile_number;
            $this->email = $entity->email;
            $this->emailConfirmation = $entity->email;

            flash()->info('Information loaded successfully.');
        } else {
            flash()->error('No record found with this ID.');
        }
    }

    public function searchOrganization()
    {
        $this->validate(['searchTin' => 'required']);

        $entity = OrganizationEntity::findByTin($this->searchTin);

        if ($entity) {
            $this->organizationName = $entity->organization_name;
            $this->tin = $entity->tin;
            $this->shortName = $entity->short_name;
            $this->mdCeoName = $entity->md_ceo_name;
            $this->organizationAddress = $entity->organization_address;

            flash()->info('Organization information loaded successfully.');
        } else {
            flash()->error('No organization found with this TIN.');
        }
    }

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

    public function submitForm()
    {
        $this->validate();

        try {
            if ($this->individualSection) {
                $individual = IndividualEntity::updateOrCreate(
                    ['national_id' => $this->nationalId],
                    [
                        'applicant_name' => $this->applicantName,
                        'address' => $this->address,
                        'mobile_number' => $this->mobileNumber,
                        'email' => $this->email
                    ]
                );

                if ($individual->wasRecentlyCreated) {
                    flash()->success('Registration done successfully.');
                } else {
                    flash()->warning('Your information was already registered and is kept safely. Any updates to the information associated with this NID have been recorded well.');
                }
                $this->reset();
            } else {
                $organization = OrganizationEntity::updateOrCreate(
                    ['tin' => $this->tin],
                    [
                        'organization_name' => $this->organizationName,
                        'short_name' => $this->shortName,
                        'md_ceo_name' => $this->mdCeoName,
                        'organization_address' => $this->organizationAddress,
                    ]
                );

                if ($organization->wasRecentlyCreated) {
                    flash()->success('Organization registration done successfully.');
                } else {
                    flash()->warning('Your organization information was already registered and is kept safely. Any updates to the information associated with this TIN have been recorded well.');
                }
                $this->reset();
            }


        } catch (Exception $e) {
            flash()->error('Error occurred: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.applicant.home');
    }
}
