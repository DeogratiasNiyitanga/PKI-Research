<!-- home.blade.php -->
<div>
    @section('header')
    @include('livewire.applicant.navbar')
    @endsection

    <div class="wrapper d-flex">
        <!-- Sidebar -->
        <div class="sidebar bg-white p-3" id="sidebar">
            <div class="position-sticky sidebar-content border">
                <div class="p-3 border-bottom">
                    <h5 class="fw-bold mb-0">All Certificates</h5>
                </div>

                <div style="max-height: 70vh; overflow: auto;">
                    <div class="p-4">
                        <div class="d-flex align-items-start gap-3">
                            <!-- Icon container -->
                            <div class="certificate-icon">
                                <img src="{{ asset('assets/img/icons/prod_img60.png') }}" alt="" width="70">
                                <!-- Blue dot -->
                                <div class="blue-dot"></div>
                            </div>

                            <!-- Text and button container -->
                            <div class="flex-grow-1">
                                <h5 class="mb-1">Individual</h5>
                                <p class="text-muted mb-3" style="font-size: 0.8em;">Individual Certificate / 12 months
                                </p>
                                <button class="btn btn-primary d-flex align-items-center" wire:click='loadIndividual'>
                                    Register
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="d-flex align-items-start gap-3">
                            <!-- Icon container -->
                            <div class="certificate-icon">
                                <img src="{{ asset('assets/img/icons/prod_img62.png') }}" alt="" width="70">
                                <!-- Blue dot -->
                                <div class="blue-dot"></div>
                            </div>

                            <!-- Text and button container -->
                            <div class="flex-grow-1">
                                <h5 class="mb-1">
                                    Organizations
                                </h5>
                                <p class="text-muted mb-3" style="font-size: 0.8em;">Government Organization
                                    Certificate / 12 months</p>
                                <button class="btn btn-primary d-flex align-items-center" wire:click='loadOrganization'>
                                    Register
                                </button>
                            </div>
                        </div>
                    </div>

                    <!--Hide other types-->

                    <div style="display: none">
                        <div class="p-4">
                            <div class="d-flex align-items-start gap-3">
                                <!-- Icon container -->
                                <div class="certificate-icon">
                                    <img src="{{ asset('assets/img/icons/prod_img64.png') }}" alt="" width="70">
                                    <!-- Blue dot -->
                                    <div class="blue-dot"></div>
                                </div>

                                <!-- Text and button container -->
                                <div class="flex-grow-1">
                                    <h5 class="mb-1">Cooperative</h5>
                                    <p class="text-muted mb-3" style="font-size: 0.8em;">Cooperative Certificate / 12
                                        months
                                    </p>
                                    <button class="btn btn-primary d-flex align-items-center"
                                        wire:click='loadIndividual'>
                                        Register
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="p-4">
                            <div class="d-flex align-items-start gap-3">
                                <!-- Icon container -->
                                <div class="certificate-icon">
                                    <img src="{{ asset('assets/img/icons/prod_img68.png') }}" alt="" width="70">
                                    <!-- Blue dot -->
                                    <div class="blue-dot"></div>
                                </div>

                                <!-- Text and button container -->
                                <div class="flex-grow-1">
                                    <h5 class="mb-1">
                                        Foreigner Individual Consultant</h5>
                                    <p class="text-muted mb-3" style="font-size: 0.8em;">
                                        Foreign Individual Certificate / 12 months
                                    </p>
                                    <button class="btn btn-primary d-flex align-items-center"
                                        wire:click='loadIndividual'>
                                        Register
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="p-4">
                            <div class="d-flex align-items-start gap-3">
                                <!-- Icon container -->
                                <div class="certificate-icon">
                                    <img src="{{ asset('assets/img/icons/prod_img61.png') }}" alt="" width="70">
                                    <!-- Blue dot -->
                                    <div class="blue-dot"></div>
                                </div>

                                <!-- Text and button container -->
                                <div class="flex-grow-1">
                                    <h5 class="mb-1">
                                        Local Individual Consultant</h5>
                                    <p class="text-muted mb-3" style="font-size: 0.8em;">
                                        ndividual for Consultant Certificate / 12 months
                                    </p>
                                    <button class="btn btn-primary d-flex align-items-center"
                                        wire:click='loadIndividual'>
                                        Register
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="p-4">
                            <div class="d-flex align-items-start gap-3">
                                <!-- Icon container -->
                                <div class="certificate-icon">
                                    <img src="{{ asset('assets/img/icons/prod_img63.png') }}" alt="" width="70">
                                    <!-- Blue dot -->
                                    <div class="blue-dot"></div>
                                </div>

                                <!-- Text and button container -->
                                <div class="flex-grow-1">
                                    <h5 class="mb-1">
                                        Private Company
                                    </h5>
                                    <p class="text-muted mb-3" style="font-size: 0.8em;">
                                        Company Certificate / 12 months
                                    </p>
                                    <button class="btn btn-primary d-flex align-items-center"
                                        wire:click='loadIndividual'>
                                        Register
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="p-4">
                            <div class="d-flex align-items-start gap-3">
                                <!-- Icon container -->
                                <div class="certificate-icon">
                                    <img src="{{ asset('assets/img/icons/prod_img65.png') }}" alt="" width="70">
                                    <!-- Blue dot -->
                                    <div class="blue-dot"></div>
                                </div>

                                <!-- Text and button container -->
                                <div class="flex-grow-1">
                                    <h5 class="mb-1">
                                        NGO
                                    </h5>
                                    <p class="text-muted mb-3" style="font-size: 0.8em;">
                                        NGO Certificate / 12 months
                                    </p>
                                    <button class="btn btn-primary d-flex align-items-center"
                                        wire:click='loadIndividual'>
                                        Register
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="p-4">
                            <div class="d-flex align-items-start gap-3">
                                <!-- Icon container -->
                                <div class="certificate-icon">
                                    <img src="{{ asset('assets/img/icons/prod_img67.png') }}" alt="" width="70">
                                    <!-- Blue dot -->
                                    <div class="blue-dot"></div>
                                </div>

                                <!-- Text and button container -->
                                <div class="flex-grow-1">
                                    <h5 class="mb-1">
                                        Foreign Company
                                    </h5>
                                    <p class="text-muted mb-3" style="font-size: 0.8em;">
                                        Foreigner Organization Certificate / 12 months
                                    </p>
                                    <button class="btn btn-primary d-flex align-items-center"
                                        wire:click='loadIndividual'>
                                        Register
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--End-->

                </div>
            </div>

        </div>

        <!-- Main Content -->
        <div class="main-content flex-grow-1 p-3">
            <div class="container-fluid py-3 border">
                @if ($individualSection)
                <div class="application-form">
                    <!-- Breadcrumb -->
                    <div class="mb-4">
                        <h5 class="mb-3">Apply for Digital Certificate</h5>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a wire:navigate href="{{ route('applicant.home') }}"><i
                                            class="fas fa-home"></i> HOME</a>
                                </li>
                                <li class="breadcrumb-item active">Applicant Information</li>
                            </ol>
                        </nav>
                    </div>

                    <!-- Information Notice -->
                    <div class="alert alert-light border mb-4">
                        <p class="mb-1">The digital certificate authenticates the owner in online transactions.
                            Remember that:</p>
                        <ul class="mb-0">
                            <li>It is not shareable, it is a personal property.</li>
                            <li>The password that protects the digital certificate should be kept secret.</li>
                        </ul>
                    </div>

                    <!-- Flash Messages -->
                    @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <!-- Certificate Details -->
                    <div class="certificate-details border p-3 mb-4">
                        <div class="row">
                            <div class="col-md-4">
                                <h5 class="bg-primary text-white p-3" style="min-height: 5.3em;">Individual</h5>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-user me-2"></i>
                                            <div>
                                                <small class="text-muted">Target</small>
                                                <p class="mb-0">Local Individual</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="alert alert-info py-2 mb-0" style="border-radius: 0px;">
                                    <small><i class="fas fa-info-circle me-2"></i>Certificate available on all
                                        transactions requiring general certificate</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- NID Validation Form -->
                    <div class="application-section mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="mb-0">
                                Applicant Information
                                <small class="text-danger ms-2" style="font-size: 0.7em">* mark is a mandatory
                                    field</small>
                            </h5>
                        </div>

                        <div class="border p-4">
                            @if(!$showApplicationForm)
                            <form wire:submit.prevent="validateNID">
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <label class="form-label">National ID <span class="text-danger"
                                                    style="font-size: 0.8em;">*</span></label>
                                            <input type="text" class="form-control" wire:model="nid">
                                            @error('nid')
                                            <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="text-left" style="margin-top: 2em;">
                                            <button type="submit" class="btn btn-secondary">Validate</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            @else
                            <!-- Application Form (shown after NID validation) -->
                            <form wire:submit.prevent="submitApplication">
                                <div class="mb-4">
                                    <h6 class="mb-3">Personal Information</h6>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Full Name</label>
                                            <p class="form-control-static">{{ $individualEntity->applicant_name }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">National ID</label>
                                            <p class="form-control-static">{{ $individualEntity->national_id }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Email</label>
                                            <p class="form-control-static">{{ $individualEntity->email }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Mobile Number</label>
                                            <p class="form-control-static">{{ $individualEntity->mobile_number }}</p>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label">Address</label>
                                            <p class="form-control-static">{{ $individualEntity->address }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <h6 class="mb-3">Certificate Information</h6>
                                    <div class="alert alert-info">
                                        <p class="mb-0">
                                            <strong>Certificate Duration:</strong>
                                            {{ $currentExpiration ? $currentExpiration->certificate_duration : '12
                                            months' }}
                                        </p>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <h6 class="mb-3">Terms & Conditions <span class="text-danger">*</span></h6>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="terms"
                                            wire:model="agreesToTerms">
                                        <label class="form-check-label" for="terms">
                                            I agree to the terms and conditions for digital certificate issuance
                                        </label>
                                        @error('agreesToTerms')
                                        <div class="text-danger" style="font-size: 0.8em;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary">Submit Application</button>
                                    <button type="button" class="btn btn-outline-secondary ms-2"
                                        wire:click="loadIndividual">Cancel</button>
                                </div>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
                @endif

                @if ($organizationSection)
                <!-- Previous code remains the same until the organization section -->

                @if ($organizationSection)
                <div class="application-form">
                    <!-- Breadcrumb -->
                    <div class="mb-4">
                        <h5 class="mb-3">Apply for Organization Digital Certificate</h5>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a wire:navigate href="{{ route('applicant.home') }}">
                                        <i class="fas fa-home"></i> HOME
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">Organization Information</li>
                            </ol>
                        </nav>
                    </div>

                    <!-- Information Notice -->
                    <div class="alert alert-light border mb-4">
                        <p class="mb-1">The organization digital certificate authenticates the organization in online
                            transactions.
                            Remember that:</p>
                        <ul class="mb-0">
                            <li>It is not shareable, it is organization property.</li>
                            <li>The password that protects the digital certificate should be kept secure.</li>
                            <li>Only authorized personnel should handle the certificate.</li>
                        </ul>
                    </div>

                    <!-- Flash Messages -->
                    @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <!-- Certificate Details -->
                    <div class="certificate-details border p-3 mb-4">
                        <div class="row">
                            <div class="col-md-4">
                                <h5 class="bg-primary text-white p-3" style="min-height: 5.3em;">Organization</h5>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-building me-2"></i>
                                            <div>
                                                <small class="text-muted">Target</small>
                                                <p class="mb-0">Government Organization</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="alert alert-info py-2 mb-0" style="border-radius: 0px;">
                                    <small>
                                        <i class="fas fa-info-circle me-2"></i>
                                        Certificate available for organization-level transactions
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Validation Form -->
                    <div class="application-section mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="mb-0">
                                Organization Information
                                <small class="text-danger ms-2" style="font-size: 0.7em">* mark is a mandatory
                                    field</small>
                            </h5>
                        </div>

                        <div class="border p-4">
                            @if(!$showOrganizationForm)
                            <form wire:submit.prevent="validateOrganization">
                                <div class="row mb-3">
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label class="form-label">National ID <span class="text-danger"
                                                    style="font-size: 0.8em;">*</span></label>
                                            <input type="text" class="form-control" wire:model="nid">
                                            @error('nid')
                                            <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label class="form-label">Company TIN <span class="text-danger"
                                                    style="font-size: 0.8em;">*</span></label>
                                            <input type="text" class="form-control" wire:model="tin">
                                            @error('tin')
                                            <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="text-left" style="margin-top: 2em;">
                                            <button type="submit" class="btn btn-secondary">Validate</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            @else
                            <!-- Organization Application Form (shown after validation) -->
                            <form wire:submit.prevent="submitOrganizationApplication">
                                <div class="mb-4">
                                    <h6 class="mb-3">Individual Information</h6>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Full Name</label>
                                            <p class="form-control-static">{{ $individualEntity->applicant_name }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">National ID</label>
                                            <p class="form-control-static">{{ $individualEntity->national_id }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <h6 class="mb-3">Organization Information</h6>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Organization Name</label>
                                            <p class="form-control-static">{{ $organizationEntity->organization_name }}
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">TIN</label>
                                            <p class="form-control-static">{{ $organizationEntity->tin }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">MD/CEO Name</label>
                                            <p class="form-control-static">{{ $organizationEntity->md_ceo_name }}</p>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label">Organization Address</label>
                                            <p class="form-control-static">{{ $organizationEntity->organization_address
                                                }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <h6 class="mb-3">Certificate Information</h6>
                                    <div class="alert alert-info">
                                        <p class="mb-0">
                                            <strong>Certificate Duration:</strong>
                                            {{ $currentExpiration ? $currentExpiration->certificate_duration : '12
                                            months' }}
                                        </p>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <h6 class="mb-3">Terms & Conditions <span class="text-danger">*</span></h6>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="orgTerms"
                                            wire:model="agreesToTerms">
                                        <label class="form-check-label" for="orgTerms">
                                            I agree to the terms and conditions for organization digital certificate
                                            issuance
                                        </label>
                                        @error('agreesToTerms')
                                        <div class="text-danger" style="font-size: 0.8em;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary">Submit Application</button>
                                    <button type="button" class="btn btn-outline-secondary ms-2"
                                        wire:click="loadOrganization">Cancel</button>
                                </div>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
                @endif
                @endif
            </div>
        </div>
    </div>

    <!-- Add this CSS to your stylesheet -->
    <style>
        .wrapper {
            margin-top: 40px;
        }

        .sidebar {
            margin-left: 100px;
            width: 430px;
            flex-shrink: 0;
            max-height: 30vh;
            min-height: 30vh;
        }

        .sidebar-content {
            top: 40px;
            /* Same as wrapper margin-top */
        }

        .main-content {
            padding-right: 100px;
            /* To match sidebar's left margin */
        }

        /* Make layout responsive */
        @media (max-width: 768px) {
            .sidebar {
                margin-left: 50px;
                width: 200px;
            }

            .main-content {
                padding-right: 50px;
            }
        }

        @media (max-width: 576px) {
            .wrapper {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                margin-left: 0;
            }

            .sidebar-content {
                position: relative;
                top: 0;
            }

            .main-content {
                padding-right: 0;
            }
        }
    </style>
</div>