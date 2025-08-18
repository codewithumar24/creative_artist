@extends('dashboard.dashboardLayout')

@section('mainDashboard')
<div class="main-content">
    <div class="header">
        <div class="header-left">
            <h5 class="mb-0"><i class="bi bi-person me-2"></i> User Details</h5>
        </div>
        <div class="header-right">
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary btn-sm">
                <i class="bi bi-arrow-left me-1"></i> Back
            </a>
        </div>
    </div>

    <div class="container-fluid py-4">
        <div class="card dashboard-card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 text-center">
                        @if($user->avatar)
                            <img src="{{ asset('storage/avatars/'.$user->avatar) }}" class="img-thumbnail mb-3" width="100" hight="100" alt="Avatar">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&color=7F9CF5&background=EBF4FF" class="img-thumbnail rounded-circle mb-3" width="150" alt="Avatar">
                        @endif
                        <h4>{{ $user->name }}</h4>
                        <span class="badge bg-{{ $user->role === 'admin' ? 'success' : 'primary' }}">
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
                                    <th>Registered</th>
                                    <td>{{ $user->created_at->format('M d, Y H:i') }}</td>
                                </tr>
                                <tr>
                                    <th>Last Updated</th>
                                    <td>{{ $user->updated_at->format('M d, Y H:i') }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary me-2">
                                <i class="bi bi-pencil me-1"></i> Edit User
                            </a>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">
                                    <i class="bi bi-trash me-1"></i> Delete User
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection