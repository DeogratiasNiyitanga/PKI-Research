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
                    <h5 class="fw-bold mb-0">TYPE OF ENTITY TO REGISTER</h5>
                </div>

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
                            <p class="text-muted mb-3" style="font-size: 0.8em;">Individual Certificate / 12 months</p>
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
                                Government / Private Organizations
                            </h5>
                            <p class="text-muted mb-3" style="font-size: 0.8em;">Government/private Organization
                                Certificate / 12 months</p>
                            <button class="btn btn-primary d-flex align-items-center" wire:click='loadOrganization'>
                                Register
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Main Content -->
        <div class="main-content flex-grow-1 p-3">
            <div class="container-fluid py-3 border">
                <!--Individual section-->
                <!--Individual section-->
                @if ($individualSection)
                    <div class="application-form">
                        <!-- Breadcrumb -->
                        <div class="mb-4">
                            <h5 class="mb-3">Individual registration before applying for Digital Certificate</h5>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a wire:navigate href="{{ route('applicant.home') }}"><i
                                                class="fas fa-home"></i> HOME</a>
                                    </li>
                                    <li class="breadcrumb-item active">Registration</li>
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

                        <!-- Application Form -->
                        <div class="application-section mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="mb-0">
                                    Registration Information
                                    <small class="text-danger ms-2" style="font-size: 0.7em">* mark is a mandatory
                                        field</small>
                                </h5>
                            </div>

                            <div class="border p-4">
                                <form wire:submit.prevent="submitForm">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Applicant Name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" wire:model="applicantName">
                                                @error('applicantName')
                                                    <span class="text-danger"
                                                        style="font-size: 0.8em;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">National ID <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" wire:model="nationalId">
                                                @error('nationalId')
                                                    <span class="text-danger"
                                                        style="font-size: 0.8em;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="form-label">Address <span class="text-danger"
                                                style="font-size: 0.8em;">*</span></label>
                                        <input type="text" class="form-control" wire:model="address">
                                        @error('address')
                                            <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Mobile Number <span
                                                        class="text-danger">*</span></label>
                                                <input type="tel" class="form-control" wire:model="mobileNumber">
                                                @error('mobileNumber')
                                                    <span class="text-danger"
                                                        style="font-size: 0.8em;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Confirm Mobile Number <span
                                                        class="text-danger">*</span></label>
                                                <input type="tel" class="form-control"
                                                    wire:model="mobileNumberConfirmation">
                                                @error('mobileNumberConfirmation')
                                                    <span class="text-danger"
                                                        style="font-size: 0.8em;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">E-mail <span
                                                        class="text-danger">*</span></label>
                                                <input type="email" class="form-control" wire:model="email">
                                                @error('email')
                                                    <span class="text-danger"
                                                        style="font-size: 0.8em;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Confirm Email <span
                                                        class="text-danger">*</span></label>
                                                <input type="email" class="form-control"
                                                    wire:model="emailConfirmation">
                                                @error('emailConfirmation')
                                                    <span class="text-danger"
                                                        style="font-size: 0.8em;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <small class="text-muted">
                                        <i class="fas fa-info-circle me-2"></i>
                                        Please provide your valid email. This email will be used in all services related
                                        to your digital certificate.
                                    </small>

                                    <div class=" text-end mt-4">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif

                <!--Organization section-->
                @if ($organizationSection)
                    <div class="application-form">
                        <!-- Breadcrumb -->
                        <div class="mb-4">
                            <h5 class="mb-3">Organization registration before applying for Digital Certificate</h5>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a wire:navigate
                                            href="{{ route('applicant.home') }}"><i class="fas fa-home"></i> HOME</a>
                                    </li>
                                    <li class="breadcrumb-item active">Registration</li>
                                </ol>
                            </nav>
                        </div>

                        <!-- Information Notice -->
                        <div class="alert alert-light border mb-4">
                            <p class="mb-1">The digital certificate authenticates the organization in online
                                transactions. Remember that:</p>
                            <ul class="mb-0">
                                <li>It represents the organization's digital identity.</li>
                                <li>The certificate's security credentials must be managed securely.</li>
                            </ul>
                        </div>

                        <!-- Certificate Details -->
                        <div class="certificate-details border p-3 mb-4">
                            <div class="row">
                                <div class="col-md-4">
                                    <h5 class="bg-primary text-white p-3" style="min-height: 5.3em;">Government /
                                        Private Organizations</h5>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-building me-2"></i>
                                                <div>
                                                    <small class="text-muted">Target</small>
                                                    <p class="mb-0">Organizations</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="alert alert-info py-2 mb-0" style="border-radius: 0px;">
                                        <small><i class="fas fa-info-circle me-2"></i>Certificate available for
                                            organizational transactions and document signing</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Application Form -->
                        <div class="application-section mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="mb-0">
                                    Registration Information
                                    <small class="text-danger ms-2" style="font-size: 0.7em">* mark is a mandatory
                                        field</small>
                                </h5>
                            </div>

                            <div class="border p-4">
                                <form wire:submit.prevent="submitForm">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Organization Name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control"
                                                    wire:model="organizationName">
                                                @error('organizationName')
                                                    <span class="text-danger"
                                                        style="font-size: 0.8em;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">TIN <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" wire:model="tin">
                                                @error('tin')
                                                    <span class="text-danger"
                                                        style="font-size: 0.8em;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!--*****************-->
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Short Name</label>
                                                <input type="text" class="form-control" wire:model="shortName">
                                                @error('shortName')
                                                    <span class="text-danger"
                                                        style="font-size: 0.8em;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">MD/CEO Name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" wire:model="mdCeoName">
                                                @error('mdCeoName')
                                                    <span class="text-danger"
                                                        style="font-size: 0.8em;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!--*******************-->
                                    <div class="form-group mb-3">
                                        <label class="form-label">Organization Address <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" wire:model="organizationAddress">
                                        @error('organizationAddress')
                                            <span class="text-danger"
                                                style="font-size: 0.8em;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <small class="text-muted">
                                        <i class="fas fa-info-circle me-2"></i>
                                        Please ensure all organizational information provided is accurate and matches
                                        official records.
                                    </small>

                                    <div class="text-end mt-4">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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
            width: 330px;
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
