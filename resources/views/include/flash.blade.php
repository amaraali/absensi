@if (session()->has('message_success'))
    <!-- Success Alert -->
    <div class="alert alert-success alert-dismissible alert-border-left alert-borderless fade show" role="alert">
        {{-- <i class="ri-check-double-line label-icon"></i><strong>Nice!</strong> --}}
        {{ session('message_success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session()->has('message_danger'))
    <!-- Danger Alert -->
    <div class="alert alert-danger alert-dismissible alert-border-left alert-borderless fade show" role="alert">
        {{-- <i class="ri-error-warning-line label-icon"></i><strong>Ups!</strong> --}}
        {{ session('message_danger') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session()->has('message_info'))
    <!-- Info Alert -->
    <div class="alert alert-info alert-dismissible alert-border-left alert-borderless fade show" role="alert">
        {{-- <i class="ri-error-warning-line label-icon"></i><strong>Ups!</strong> --}}
        {{ session('message_info') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
