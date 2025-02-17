<?php

namespace App\Livewire\Approver;

use App\Models\CertificateExpiration;
use Livewire\Component;
use Livewire\WithPagination;

class ManageExpriration extends Component
{
    use WithPagination;

    public $certificate_duration;
    public $status;
    public $editId;
    public $isEditing = false;

    // Form validation rules
    protected $rules = [
        'certificate_duration' => 'required|string',
        'status' => 'required'
    ];

    public function render()
    {
        $expirations = CertificateExpiration::orderBy('created_at', 'desc')->paginate(10);
        return view('livewire.approver.manage-expriration', [
            'expirations' => $expirations
        ]);
    }

    public function create()
    {
        $this->validate();
        CertificateExpiration::create([
            'certificate_duration' => $this->certificate_duration,
            'status' => $this->status
        ]);

        $this->resetForm();
        flash()->success('Certificate expiration created successfully.');
    }

    public function edit($id)
    {
        $expiration = CertificateExpiration::findOrFail($id);
        $this->certificate_duration = $expiration->certificate_duration;
        $this->status = $expiration->status;
        $this->editId = $id;
        $this->isEditing = true;
    }

    public function update()
    {
        $this->validate();

        $expiration = CertificateExpiration::findOrFail($this->editId);
        $expiration->update([
            'certificate_duration' => $this->certificate_duration,
            'status' => $this->status
        ]);

        $this->resetForm();
        flash()->success('Certificate expiration updated successfully.');
    }

    public function delete($id)
    {
        CertificateExpiration::findOrFail($id)->delete();
        flash()->success('Certificate expiration deleted successfully.');
    }

    public function resetForm()
    {
        $this->certificate_duration = '';
        $this->status = 'active';
        $this->editId = null;
        $this->isEditing = false;
    }
}
