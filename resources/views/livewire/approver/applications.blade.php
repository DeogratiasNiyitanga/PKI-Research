<div>
    @include('livewire.approver.navbar')
    <div class="container mt-4">
        <h1 class="mb-4">Applications</h1>

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <input wire:model.live="search" type="text" class="form-control"
                            placeholder="Search applicant...">
                    </div>
                    <div class="col-md-3 mb-2">
                        <select wire:model.live="status" class="form-select">
                            <option value="">All Statuses</option>
                            <option value="Valid">Valid</option>
                            <option value="Active">Active</option>
                            <option value="Pending">Pending</option>
                            <option value="Expired">Expired</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-2">
                        <select wire:model.live="type" class="form-select">
                            <option value="">All Types</option>
                            <option value="Individual">Individual</option>
                            <option value="Organization">Organization</option>
                        </select>
                    </div>
                </div>
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
                            @forelse($applications as $application)
                            <tr>
                                <td>{{ $application->id }}</td>
                                <td>{{ $application->applicant }}</td>
                                <td>{{ $application->type }}</td>
                                <td>{{ date('Y-m-d', strtotime($application->submission_date)) }}</td>
                                <td>
                                    <span
                                        class="badge bg-{{ $application->status === 'Valid' || $application->status === 'Active' ? 'success' : ($application->status === 'Pending' ? 'warning' : 'danger') }}">
                                        {{ $application->status }}
                                    </span>
                                </td>
                                <td>
                                    {{-- <a href="{{ route('application.view', $application->id) }}"
                                        class="btn btn-sm btn-primary">View</a> --}}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">No applications found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $applications->links() }}
                </div>
            </div>
        </div>
    </div>
</div>