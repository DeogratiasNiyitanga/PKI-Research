<div>
    @include('livewire.approver.navbar')
    <div class="container mt-4">
        <h1 class="mb-4">Dashboard</h1>

        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="bg-primary p-3 rounded-circle me-3">
                                <i class="bi bi-person text-white"></i>
                            </div>
                            <div>
                                <h5 class="card-title">Individual Entities</h5>
                                <h3 class="mb-0">{{ $statistics['total_individuals'] }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="bg-success p-3 rounded-circle me-3">
                                <i class="bi bi-building text-white"></i>
                            </div>
                            <div>
                                <h5 class="card-title">Organization Entities</h5>
                                <h3 class="mb-0">{{ $statistics['total_organizations'] }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="bg-info p-3 rounded-circle me-3">
                                <i class="bi bi-file-text text-white"></i>
                            </div>
                            <div>
                                <h5 class="card-title">Individual Requests</h5>
                                <p class="mb-0">Active: {{ $statistics['individual_requests']['active'] }}</p>
                                <p class="mb-0">Expired: {{ $statistics['individual_requests']['pending'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="bg-warning p-3 rounded-circle me-3">
                                <i class="bi bi-file-text text-white"></i>
                            </div>
                            <div>
                                <h5 class="card-title">Organization Requests</h5>
                                <p class="mb-0">Active: {{ $statistics['organization_requests']['active'] }}</p>
                                <p class="mb-0">Expired: {{ $statistics['organization_requests']['pending'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Recent Applications
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Applicant</th>
                                        <th>Certificate Type</th>
                                        <th>Submission Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($recentApplications as $application)
                                    <tr>
                                        <td>{{ $application['id'] }}</td>
                                        <td>{{ $application['applicant'] }}</td>
                                        <td>{{ $application['type'] }}</td>
                                        <td>{{ $application['submission_date'] }}</td>
                                        <td>
                                            <span
                                                class="badge bg-{{ $application['status'] === 'Valid' || $application['status'] === 'Active' ? 'success' : ($application['status'] === 'Pending' ? 'warning' : 'danger') }}">
                                                {{ $application['status'] }}
                                            </span>
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-primary"
                                                wire:click="viewApplication({{ $application['id'] }})">
                                                View
                                            </button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No recent applications found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>