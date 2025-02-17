<?php

namespace App\Livewire\Applicant;

use App\Models\CertificateExpiration;
use App\Models\IndividualEntity;
use App\Models\IndividualEntityRequest;
use App\Models\OrganizationEntity;
use App\Models\OrganizationEntityRequest;
use Carbon\Carbon;
use Livewire\Component;

class ApplyCertificate extends Component
{
    public $individualSection = true;
    public $organizationSection = false;
    public $nid;
    public $tin;
    public $showApplicationForm = false;
    public $showOrganizationForm = false;
    public $individualEntity = null;
    public $organizationEntity = null;
    public $expiration_id;
    public $agreesToTerms = false;

    protected $rules = [
        'nid' => 'required',
        'tin' => 'required_if:organizationSection,true',
        'agreesToTerms' => 'accepted'
    ];
    public function mount()
    {
        // Get the default expiration (12 months)
        $defaultExpiration = CertificateExpiration::where('certificate_duration', 'like', '%12 month%')
            ->where('status', 'active')
            ->first();

        if ($defaultExpiration) {
            $this->expiration_id = $defaultExpiration->id;
        } else {
            // Fallback: get the first active expiration
            $firstActive = CertificateExpiration::where('status', 'active')->first();
            if ($firstActive) {
                $this->expiration_id = $firstActive->id;
            }
        }
    }


    public function loadIndividual()
    {
        $this->reset(['individualSection', 'organizationSection', 'nid', 'showApplicationForm', 'individualEntity', 'agreesToTerms']);
        $this->individualSection = true;
        $this->organizationSection = false;
        $this->mount(); // Reset the expiration ID to default
    }

    // Added 
    public function loadOrganization()
    {
        $this->reset(['individualSection', 'organizationSection', 'nid', 'tin', 'showOrganizationForm', 'individualEntity', 'organizationEntity', 'agreesToTerms']);
        $this->individualSection = false;
        $this->organizationSection = true;
        $this->mount(); // Reset the expiration ID to default
    }


    public function validateOrganization()
    {
        $this->validate([
            'nid' => 'required',
            'tin' => 'required'
        ]);

        // Check if NID exists in individual_entities table
        $individualEntity = IndividualEntity::where('national_id', $this->nid)->first();
        $organizationEntity = OrganizationEntity::where('tin', $this->tin)->first();

        if (!$individualEntity) {
            session()->flash('error', 'No individual record found with this National ID. Please register first.');
            return;
        }

        if (!$organizationEntity) {
            session()->flash('error', 'No organization found with this TIN. Please verify the TIN number.');
            return;
        }

        // Check if they already have a valid certificate for this organization
        $latestRequest = OrganizationEntityRequest::where('organization_id', $organizationEntity->id)
            ->where('status', 'Valid')
            ->orderBy('created_at', 'desc')
            ->first();

        if ($latestRequest) {
            $expiration = CertificateExpiration::find($latestRequest->expiration_id);
            if ($expiration) {
                $isStillValid = $this->isCertificateStillValid($latestRequest->created_at, $expiration->certificate_duration);

                if ($isStillValid) {
                    // Calculate remaining time
                    $expiryDate = $this->calculateExpiryDate($latestRequest->created_at, $expiration->certificate_duration);
                    $remainingDays = Carbon::now()->diffInDays($expiryDate, false);

                    if ($remainingDays > 0) {
                        session()->flash('error', "This organization already has a valid certificate. Please wait until it expires before applying for a new one.");
                        return;
                    }
                } else {
                    // If certificate has expired naturally, update its status
                    $latestRequest->status = 'Expired';
                    $latestRequest->save();
                }
            }
        }

        $this->individualEntity = $individualEntity;
        $this->organizationEntity = $organizationEntity;
        $this->showOrganizationForm = true;
    }


    public function submitOrganizationApplication()
    {
        $this->validate([
            'agreesToTerms' => 'accepted'
        ]);

        if (!$this->expiration_id) {
            session()->flash('error', 'No valid certificate duration available. Please contact support.');
            return;
        }

        try {
            // Find and expire any remaining valid certificates for this organization
            OrganizationEntityRequest::where('organization_id', $this->organizationEntity->id)
                ->where('status', 'Valid')
                ->update(['status' => 'Expired']);

            // Create new request with expiration_id
            OrganizationEntityRequest::create([
                'organization_id' => $this->organizationEntity->id,
                'expiration_id' => $this->expiration_id, // Make sure this field is included
                'status' => 'Valid'
            ]);

            session()->flash('success', 'Your organization certificate application has been submitted successfully!');
            $this->reset(['nid', 'tin', 'showOrganizationForm', 'individualEntity', 'organizationEntity', 'agreesToTerms']);
            $this->mount(); // Reset the expiration ID to default
        } catch (\Exception $e) {
            session()->flash('error', 'Error submitting application. Please try again or contact support.');
        }
    }
    // ended of added contents 


    public function validateNID()
    {
        $this->validate([
            'nid' => 'required'
        ]);

        // Check if NID exists in individual_entities table
        $individualEntity = IndividualEntity::where('national_id', $this->nid)->first();

        if ($individualEntity) {
            // Check if they already have a valid certificate
            $latestRequest = IndividualEntityRequest::where('applicant_id', $individualEntity->id)
                ->where('status', 'Valid')
                ->orderBy('created_at', 'desc')
                ->first();

            if ($latestRequest) {
                $expiration = CertificateExpiration::find($latestRequest->expiration_id);
                if ($expiration) {
                    $isStillValid = $this->isCertificateStillValid($latestRequest->created_at, $expiration->certificate_duration);

                    if ($isStillValid) {
                        // Calculate remaining time
                        $expiryDate = $this->calculateExpiryDate($latestRequest->created_at, $expiration->certificate_duration);
                        $remainingDays = Carbon::now()->diffInDays($expiryDate, false);

                        if ($remainingDays > 0) {
                            session()->flash('error', "You already have a valid certificate. Please wait until it expires before applying for a new one.");
                            return;
                        }
                    } else {
                        // If certificate has expired naturally, update its status
                        $latestRequest->status = 'Expired';
                        $latestRequest->save();
                    }
                }
            }

            $this->individualEntity = $individualEntity;
            $this->showApplicationForm = true;
        } else {
            session()->flash('error', 'No record found with this National ID. Please register first.');
        }
    }

    private function isCertificateStillValid($createdAt, $duration)
    {
        $expiryDate = $this->calculateExpiryDate($createdAt, $duration);
        return Carbon::now()->lt($expiryDate);
    }

    private function calculateExpiryDate($createdAt, $duration)
    {
        $createdAt = Carbon::parse($createdAt);

        // Parse the duration string to get the number and unit
        preg_match('/(\d+)\s*(\w+)/', $duration, $matches);

        if (count($matches) < 3) {
            // Default to 12 months if parsing fails
            return $createdAt->copy()->addMonths(12);
        }

        $number = (int)$matches[1];
        $unit = strtolower(trim($matches[2]));

        // Handle plural forms
        if (substr($unit, -1) === 's') {
            $unit = substr($unit, 0, -1);
        }

        switch ($unit) {
            case 'year':
                return $createdAt->copy()->addYears($number);
            case 'month':
                return $createdAt->copy()->addMonths($number);
            case 'week':
                return $createdAt->copy()->addWeeks($number);
            case 'day':
                return $createdAt->copy()->addDays($number);
            case 'hour':
                return $createdAt->copy()->addHours($number);
            case 'minute':
                return $createdAt->copy()->addMinutes($number);
            default:
                // Default to 12 months
                return $createdAt->copy()->addMonths(12);
        }
    }

    public function submitApplication()
    {
        $this->validate([
            'agreesToTerms' => 'accepted'
        ]);

        if (!$this->expiration_id) {
            session()->flash('error', 'No valid certificate duration available. Please contact support.');
            return;
        }

        // Find and expire any remaining valid certificates for this applicant
        IndividualEntityRequest::where('applicant_id', $this->individualEntity->id)
            ->where('status', 'Valid')
            ->update(['status' => 'Expired']);

        // Create new request
        IndividualEntityRequest::create([
            'applicant_id' => $this->individualEntity->id,
            'expiration_id' => $this->expiration_id,
            'status' => 'Valid',
        ]);

        session()->flash('success', 'Your certificate application has been submitted successfully!');
        $this->reset(['nid', 'showApplicationForm', 'individualEntity', 'agreesToTerms']);
        $this->mount(); // Reset the expiration ID to default
    }

    public function render()
    {
        // Get the current expiration details for display
        $currentExpiration = null;
        if ($this->expiration_id) {
            $currentExpiration = CertificateExpiration::find($this->expiration_id);
        }

        return view('livewire.applicant.apply-certificate', [
            'currentExpiration' => $currentExpiration
        ]);
    }
}
