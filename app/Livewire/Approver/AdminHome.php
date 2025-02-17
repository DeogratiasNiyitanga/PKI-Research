<?php

namespace App\Livewire\Approver;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminHome extends Component
{
    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('login');
    }

    public function getStatistics()
    {
        return [
            'total_individuals' => DB::table('individual_entities')->count(),
            'total_organizations' => DB::table('organization_entities')->count(),
            'individual_requests' => [
                'active' => DB::table('individual_entity_requests')->where('status', 'Valid')->count(),
                'pending' => DB::table('individual_entity_requests')->where('status', 'Expired')->count()
            ],
            'organization_requests' => [
                'active' => DB::table('organization_entity_requests')->where('status', 'Valid')->count(),
                'pending' => DB::table('organization_entity_requests')->where('status', 'Expired')->count()
            ]
        ];
    }

    public function getRecentApplications()
    {
        // Get individual applications
        $individualRequests = DB::table('individual_entity_requests')
            ->join('individual_entities', 'individual_entity_requests.applicant_id', '=', 'individual_entities.id')
            ->select(
                'individual_entity_requests.id',
                'individual_entities.applicant_name as applicant',
                DB::raw("'Individual' as type"),
                'individual_entity_requests.created_at as submission_date',
                'individual_entity_requests.status'
            )
            ->latest('individual_entity_requests.created_at')
            ->take(5)
            ->get();

        // Get organization applications
        $organizationRequests = DB::table('organization_entity_requests')
            ->join('organization_entities', 'organization_entity_requests.organization_id', '=', 'organization_entities.id')
            ->select(
                'organization_entity_requests.id',
                'organization_entities.organization_name as applicant',
                DB::raw("'Organization' as type"),
                'organization_entity_requests.created_at as submission_date',
                'organization_entity_requests.status'
            )
            ->latest('organization_entity_requests.created_at')
            ->take(5)
            ->get();

        // Merge and sort by submission date
        return collect($individualRequests)
            ->concat($organizationRequests)
            ->sortByDesc('submission_date')
            ->take(5)
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'applicant' => $item->applicant,
                    'type' => $item->type,
                    'submission_date' => date('Y-m-d', strtotime($item->submission_date)),
                    'status' => $item->status
                ];
            })
            ->values()
            ->all();
    }

    public function viewApplication($id)
    {
        // Handle viewing the application details
        // You can emit an event, show a modal, or redirect to a details page
    }

    public function render()
    {
        $statistics = $this->getStatistics();
        $recentApplications = $this->getRecentApplications();

        return view('livewire.approver.admin-home', [
            'statistics' => $statistics,
            'recentApplications' => $recentApplications
        ]);
    }
}
