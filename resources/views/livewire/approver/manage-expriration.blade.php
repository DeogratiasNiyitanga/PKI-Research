<div>
    @include('livewire.approver.navbar')
    <div class="container mt-4">
        <h1 class="mb-4">Certificate Expiration Management</h1>

        @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="row">
            <div class="col-sm-6">
                <div class="card mb-4">
                    <div class="card-header">
                        {{ $isEditing ? 'Edit Certificate Expiration' : 'Add New Certificate Expiration' }}
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="{{ $isEditing ? 'update' : 'create' }}">
                            <div class="mb-3">
                                <label for="certificate_duration" class="form-label">Certificate Duration</label>
                                <input type="text"
                                    class="form-control @error('certificate_duration') is-invalid @enderror"
                                    id="certificate_duration" wire:model="certificate_duration"
                                    placeholder="e.g., 1 year, 2 years, 6 months">
                                @error('certificate_duration')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select @error('status') is-invalid @enderror" id="status"
                                    wire:model="status">
                                    <option value="">Please select</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                                @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex">
                                <button type="submit" class="btn btn-primary">
                                    {{ $isEditing ? 'Update' : 'Create' }} Certificate Expiration
                                </button>
                                @if($isEditing)
                                <button type="button" class="btn btn-secondary ms-2" wire:click="resetForm">
                                    Cancel
                                </button>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        Certificate Expirations
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Certificate Duration</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($expirations as $expiration)
                                    <tr>
                                        <td>{{ $expiration->id }}</td>
                                        <td>{{ $expiration->certificate_duration }}</td>
                                        <td>
                                            <span
                                                class="badge bg-{{ $expiration->status == 'active' ? 'success' : 'danger' }}">
                                                {{ ucfirst($expiration->status) }}
                                            </span>
                                        </td>
                                        <td>{{ $expiration->created_at->format('Y-m-d H:i') }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-primary"
                                                wire:click="edit({{ $expiration->id }})">
                                                Edit
                                            </button>
                                            <button class="btn btn-sm btn-danger"
                                                wire:click="delete({{ $expiration->id }})"
                                                onclick="return confirm('Are you sure you want to delete this item?')">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No certificate expirations found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-3">
                            {{ $expirations->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>