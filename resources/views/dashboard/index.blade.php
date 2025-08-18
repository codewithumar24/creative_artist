    @extends("dashboard.dashboardLayout")
    
    @section("mainDashboard")
    

    
    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <header class="header">
            <div class="header-left">
                <div class="toggle-sidebar">
                    <i class="bi bi-list"></i>
                </div>
                <h5 class="mb-0">Dashboard</h5>
            </div>
            <div class="header-right">
                <div class="search-box">
                    <i class="bi bi-search"></i>
                    <input type="text" class="form-control form-control-sm" placeholder="Search...">
                </div>
                <div class="dropdown">
                    <div class="user-profile dropdown-toggle" data-bs-toggle="dropdown">
                        <img src="https://randomuser.me/api/portraits/women/45.jpg" alt="User">
                        <div>
                            <p class="user-name mb-0">Admin User</p>
                            <p class="user-role mb-0">Super Admin</p>
                        </div>
                    </div>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i> Profile</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i> Settings</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-question-circle me-2"></i> Help</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('auth.logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <div class="container-fluid py-4">
            <!-- Stats Cards -->
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="stat-card card dashboard-card bg-primary bg-opacity-10">
                        <div class="card-body">
                            <div class="stat-icon text-primary">
                                <i class="bi bi-people"></i>
                            </div>
                            <h3 class="stat-value text-primary">1,248</h3>
                            <p class="stat-label">Total Users</p>
                            <p class="stat-change positive">
                                <i class="bi bi-arrow-up"></i> 12% from last month
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="stat-card card dashboard-card bg-success bg-opacity-10">
                        <div class="card-body">
                            <div class="stat-icon text-success">
                                <i class="bi bi-brush"></i>
                            </div>
                            <h3 class="stat-value text-success">3,845</h3>
                            <p class="stat-label">Artwork Uploads</p>
                            <p class="stat-change positive">
                                <i class="bi bi-arrow-up"></i> 8% from last month
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="stat-card card dashboard-card bg-warning bg-opacity-10">
                        <div class="card-body">
                            <div class="stat-icon text-warning">
                                <i class="bi bi-envelope"></i>
                            </div>
                            <h3 class="stat-value text-warning">324</h3>
                            <p class="stat-label">New Messages</p>
                            <p class="stat-change positive">
                                <i class="bi bi-arrow-up"></i> 5% from last month
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="stat-card card dashboard-card bg-danger bg-opacity-10">
                        <div class="card-body">
                            <div class="stat-icon text-danger">
                                <i class="bi bi-currency-dollar"></i>
                            </div>
                            <h3 class="stat-value text-danger">$8,752</h3>
                            <p class="stat-label">Artist Earnings</p>
                            <p class="stat-change positive">
                                <i class="bi bi-arrow-up"></i> 22% from last month
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Users and Artwork -->
            <div class="row">


<div class="col-lg-6">
    <div class="card dashboard-card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Recent Users</h5>
            <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table data-table">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Joined</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentUsers as $user)
                        <tr>
                          <td>
    <div class="d-flex align-items-center">
        @if($user->avatar)
            <img src="{{ asset('storage/avatars/'.$user->avatar) }}" class="user-avatar me-2">
        @else
            <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&color=7F9CF5&background=EBF4FF" class="user-avatar me-2">
        @endif
        <div>
            <h6 class="mb-0">{{ $user->name }}</h6>
            <small class="text-muted">{{ $user->email }}</small>
        </div>
    </div>
</td>
                            <td>{{ $user->created_at->diffForHumans() }}</td>
                            <td>
                                <span class="badge bg-{{ $user->email_verified_at ? 'success' : 'warning text-dark' }}">
                                    {{ $user->email_verified_at ? 'Active' : 'Pending' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


                {{-- <div class="col-lg-6">
                    <div class="card dashboard-card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Recent Users</h5>
                            <a href="#" class="btn btn-sm btn-outline-primary">View All</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table data-table">
                                    <thead>
                                        <tr>
                                            <th>User</th>
                                            <th>Joined</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="https://randomuser.me/api/portraits/women/32.jpg" class="user-avatar me-2">
                                                    <div>
                                                        <h6 class="mb-0">Sarah Johnson</h6>
                                                        <small class="text-muted">sarah@example.com</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>2 days ago</td>
                                            <td><span class="badge bg-success">Active</span></td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="https://randomuser.me/api/portraits/men/45.jpg" class="user-avatar me-2">
                                                    <div>
                                                        <h6 class="mb-0">Michael Chen</h6>
                                                        <small class="text-muted">michael@example.com</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>1 week ago</td>
                                            <td><span class="badge bg-success">Active</span></td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="https://randomuser.me/api/portraits/women/68.jpg" class="user-avatar me-2">
                                                    <div>
                                                        <h6 class="mb-0">Emma Rodriguez</h6>
                                                        <small class="text-muted">emma@example.com</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>3 weeks ago</td>
                                            <td><span class="badge bg-warning text-dark">Pending</span></td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> --}}


<div class="col-lg-6">
    <div class="card dashboard-card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Recent Artwork</h5>
            <a href="{{ route('artwork.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table data-table">
                    <thead>
                        <tr>
                            <th>ID</th> <!-- Added ID column -->
                            <th>Artwork</th>
                            <th>Artist</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentArtworks as $artwork)
                        <tr>
                            <td>{{ $artwork->id }}</td> <!-- Display artwork ID -->
                            <td>
                                <div class="d-flex align-items-center">
                                    @if($artwork->image)
                                        <img src="{{ asset('storage/'.$artwork->image) }}" class="artwork-thumb me-2" alt="{{ $artwork->title }}">
                                    @else
                                        <img src="https://via.placeholder.com/100x100?text=No+Image" class="artwork-thumb me-2" alt="No Image">
                                    @endif
                                    <div>
                                        <h6 class="mb-0">{{ $artwork->title }}</h6>
                                        <small class="text-muted">{{ $artwork->medium }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <!-- Option 1: If using artist_name field -->
                                {{ $artwork->artist_name }}
                                
                                <!-- Option 2: If using artist relationship -->
                                {{-- $artwork->artist->name ?? 'Unknown' --}}
                                
                                @if($artwork->artist_image)
                                    <img src="{{ asset('storage/'.$artwork->artist_image) }}" class="artist-thumb ms-2" width="30">
                                @endif
                            </td>
                            <td>
                                @php
                                    $status = $artwork->status ?? 'pending'; // Default status
                                @endphp
                                <span class="badge bg-{{ $status === 'approved' ? 'success' : ($status === 'pending' ? 'warning text-dark' : 'secondary') }}">
                                    {{ ucfirst($status) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('artwork.show', $artwork->id) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



                {{-- <div class="col-lg-6">
                    <div class="card dashboard-card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Recent Artwork</h5>
                            <a href="#" class="btn btn-sm btn-outline-primary">View All</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table data-table">
                                    <thead>
                                        <tr>
                                            <th>Artwork</th>
                                            <th>Artist</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="https://images.unsplash.com/flagged/photo-1572392640988-ba48d1a74457?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80" class="artwork-thumb me-2">
                                                    <div>
                                                        <h6 class="mb-0">Colorful Dreams</h6>
                                                        <small class="text-muted">Oil on canvas</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Sarah Johnson</td>
                                            <td><span class="badge bg-success">Approved</span></td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="https://images.unsplash.com/photo-1541961017774-22349e4a1262?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80" class="artwork-thumb me-2">
                                                    <div>
                                                        <h6 class="mb-0">Digital Landscape</h6>
                                                        <small class="text-muted">Digital painting</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Michael Chen</td>
                                            <td><span class="badge bg-success">Approved</span></td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="https://images.unsplash.com/photo-1516035069371-29a1b244cc32?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80" class="artwork-thumb me-2">
                                                    <div>
                                                        <h6 class="mb-0">Urban Light</h6>
                                                        <small class="text-muted">Photography</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Thomas Reed</td>
                                            <td><span class="badge bg-warning text-dark">Pending</span></td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>

            <!-- Recent Activity and Messages -->
            <div class="row mt-4">
                <div class="col-lg-6">
                    <div class="card dashboard-card">
                        <div class="card-header">
                            <h5 class="mb-0">Recent Activity</h5>
                        </div>
                        <div class="card-body">
                            <div class="activity-feed">
                                <div class="activity-item">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="mb-1">Sarah Johnson uploaded new artwork</h6>
                                        <small class="activity-time">10 min ago</small>
                                    </div>
                                    <p class="mb-0 text-muted">"Morning Light" - Oil on canvas</p>
                                </div>
                                <div class="activity-item">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="mb-1">Michael Chen updated profile</h6>
                                        <small class="activity-time">45 min ago</small>
                                    </div>
                                    <p class="mb-0 text-muted">Added new bio and social links</p>
                                </div>
                                <div class="activity-item">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="mb-1">Emma Rodriguez sold artwork</h6>
                                        <small class="activity-time">2 hours ago</small>
                                    </div>
                                    <p class="mb-0 text-muted">"Eternal Balance" for $2,400</p>
                                </div>
                                <div class="activity-item">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="mb-1">Carlos Mendez joined</h6>
                                        <small class="activity-time">5 hours ago</small>
                                    </div>
                                    <p class="mb-0 text-muted">New artist from Mexico City</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card dashboard-card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Recent Messages</h5>
                            <span class="badge bg-primary">5 New</span>
                        </div>
                        <div class="card-body">
                            <div class="list-group list-group-flush">
                                <a href="#" class="list-group-item list-group-item-action border-0">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-1">Commission Inquiry</h6>
                                        <small>2 hours ago</small>
                                    </div>
                                    <p class="mb-1 text-muted">From: james.wilson@example.com</p>
                                    <small class="text-truncate d-block">Hello, I'm interested in commissioning a portrait from Sarah Johnson...</small>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action border-0">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-1">Account Question</h6>
                                        <small>5 hours ago</small>
                                    </div>
                                    <p class="mb-1 text-muted">From: lisa.martin@example.com</p>
                                    <small class="text-truncate d-block">I'm having trouble updating my profile picture. Can you help?</small>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action border-0">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-1">Partnership Opportunity</h6>
                                        <small>1 day ago</small>
                                    </div>
                                    <p class="mb-1 text-muted">From: contact@nygallery.com</p>
                                    <small class="text-truncate d-block">We represent a gallery in NYC and would like to discuss featuring some of your artists...</small>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        @endsection