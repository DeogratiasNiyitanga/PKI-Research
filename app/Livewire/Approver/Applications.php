<?php

namespace App\Livewire\Approver;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class Applications extends Component
{
    use WithPagination;

    public $search = '';
    public $status = '';
    public $type = '';

    protected $queryString = [
        'search' => ['except' => ''],
        'status' => ['except' => ''],
        'type' => ['except' => '']
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function getApplications()
    {
        // Query for individual requests
        $individualQuery = DB::table('individual_entity_requests')
            ->join('individual_entities', 'individual_entity_requests.applicant_id', '=', 'individual_entities.id')
            ->select(
                'individual_entity_requests.id',
                'individual_entities.applicant_name as applicant',
                DB::raw("'Individual' as type"),
                'individual_entity_requests.created_at as submission_date',
                'individual_entity_requests.status'
            );

        if ($this->search) {
            $individualQuery->where('individual_entities.applicant_name', 'like', '%' . $this->search . '%');
        }

        if ($this->status) {
            $individualQuery->where('individual_entity_requests.status', $this->status);
        }

        if ($this->type && $this->type !== 'Individual') {
            $individualQuery->whereRaw('1 = 0'); // Exclude individual results if type is Organization
        }

        // Query for organization requests
        $organizationQuery = DB::table('organization_entity_requests')
            ->join('organization_entities', 'organization_entity_requests.organization_id', '=', 'organization_entities.id')
            ->select(
                'organization_entity_requests.id',
                'organization_entities.organization_name as applicant',
                DB::raw("'Organization' as type"),
                'organization_entity_requests.created_at as submission_date',
                'organization_entity_requests.status'
            );

        if ($this->search) {
            $organizationQuery->where('organization_entities.organization_name', 'like', '%' . $this->search . '%');
        }

        if ($this->status) {
            $organizationQuery->where('organization_entity_requests.status', $this->status);
        }

        if ($this->type && $this->type !== 'Organization') {
            $organizationQuery->whereRaw('1 = 0'); // Exclude organization results if type is Individual
        }

        // Combine and sort results
        $combinedResults = collect($individualQuery->get())
            ->concat($organizationQuery->get())
            ->sortByDesc('submission_date');

        // Manual pagination
        $page = Paginator::resolveCurrentPage() ?: 1;
        $perPage = 10;

        return new LengthAwarePaginator(
            $combinedResults->forPage($page, $perPage),
            $combinedResults->count(),
            $perPage,
            $page,
            ['path' => Paginator::resolveCurrentPath()]
        );
    }

    public function render()
    {
        return view('livewire.approver.applications', [
            'applications' => $this->getApplications()
        ]);
    }
}
