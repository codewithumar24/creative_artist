@extends('dashboard.dashboardLayout')

@section('mainDashboard')
<div class="main-content">
    <div class="header">
        <div class="header-left">
            <h5 class="mb-0"><i class="bi bi-person me-2"></i> My Profile</h5>
        </div>
        
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>

    <div class="container-fluid py-4">
        <div class="card dashboard-card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 text-center">
                        @if($user->avatar)
                            <img src="{{ asset('storage/avatars/'.$user->avatar) }}" class="img-thumbnail rounded-circle mb-3" width="150" alt="Avatar">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&color=7F9CF5&background=EBF4FF" class="img-thumbnail rounded-circle mb-3" width="150" alt="Avatar">
                        @endif
                        <h4>{{ $user->name }}</h4>
                        <span class="badge bg-primary">
                            {{ ucfirst($user->role) }}
                        </span>
                    </div>
                    <div class="col-md-8">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tr>
                                    <th width="30%">Email</th>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $user->phone ?? 'Not provided' }}</td>
                                </tr>
                                <tr>
                                    <th>Bio</th>
                                    <td>{{ $user->bio ?? 'Not provided' }}</td>
                                </tr>
                                <tr>
                                    <th>Member Since</th>
                                    <td>{{ $user->created_at->format('M d, Y') }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('profile.edit') }}" class="btn btn-primary me-2">
                                <i class="bi bi-pencil me-1"></i> Edit Profile
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection