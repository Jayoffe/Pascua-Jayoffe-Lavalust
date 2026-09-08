<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List - Academic Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --bg-body: #f8fafc;
            --surface: #ffffff;
            --sidebar-bg: #09090b;
            --sidebar-text: #f4f4f5;
            --text-main: #18181b;
            --text-muted: #71717a;
            --border-color: #e4e4e7;
            --accent-red: #dc2626;
            --accent-red-hover: #b91c1c;
            --accent-red-light: #fef2f2;
            --radius: 6px;
            --shadow-subtle: 0 1px 3px 0 rgba(0, 0, 0, 0.05);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }

        body {
            background-color: var(--bg-body);
            color: var(--text-main);
            display: flex;
            min-height: 100vh;
            line-height: 1.5;
        }

        /* SIDEBAR NAVIGATION */
        .sidebar {
            width: 260px;
            background-color: var(--sidebar-bg);
            color: var(--sidebar-text);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
        }

        .sidebar-brand {
            padding: 1.5rem 1.25rem;
            font-size: 1.1rem;
            font-weight: 700;
            letter-spacing: -0.025em;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            border-bottom: 1px solid #27272a;
        }

        .sidebar-brand i {
            color: var(--accent-red);
        }

        .sidebar-nav {
            padding: 1rem 0.75rem;
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
            flex: 1;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1rem;
            color: #a1a1aa;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            border-radius: var(--radius);
            transition: all 0.15s ease;
        }

        .nav-item:hover {
            background-color: #18181b;
            color: #ffffff;
        }

        .nav-item.active {
            background-color: var(--accent-red-light);
            color: var(--accent-red);
            border-left: 3px solid var(--accent-red);
        }

        /* MAIN LAYOUT */
        .main-wrapper {
            flex: 1;
            margin-left: 260px;
            display: flex;
            flex-direction: column;
            min-width: 0;
        }

        .portal-container {
            max-width: 1400px;
            width: 100%;
            margin: 0 auto;
            padding: 2.5rem 2rem;
        }

        /* PAGE HEADER */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 2rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .header-title h1 {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--text-main);
            letter-spacing: -0.025em;
        }

        .header-title p {
            font-size: 0.9rem;
            color: var(--text-muted);
            margin-top: 0.2rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background-color: var(--accent-red);
            color: white;
            border: none;
            padding: 0.6rem 1.1rem;
            font-size: 0.9rem;
            font-weight: 600;
            border-radius: var(--radius);
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.15s ease;
        }

        .btn:hover {
            background-color: var(--accent-red-hover);
        }

        .btn-outline {
            background-color: var(--surface);
            color: var(--text-main);
            border: 1px solid var(--border-color);
        }

        .btn-outline:hover {
            background-color: var(--bg-body);
            border-color: var(--text-muted);
        }

        /* SUMMARY CARDS */
        .summary-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .summary-card {
            background-color: var(--surface);
            border: 1px solid var(--border-color);
            border-radius: var(--radius);
            padding: 1.25rem;
            box-shadow: var(--shadow-subtle);
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .summary-icon {
            width: 40px;
            height: 40px;
            border-radius: var(--radius);
            background-color: var(--accent-red-light);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--accent-red);
            font-size: 1.1rem;
        }

        .summary-content .card-title {
            font-size: 0.75rem;
            font-weight: 700;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .summary-content .card-value {
            font-size: 1.35rem;
            font-weight: 700;
            color: var(--accent-red);
            margin-top: 0.1rem;
        }

        /* SEARCH AND FILTER TOOLBAR */
        .toolbar {
            background-color: var(--surface);
            border: 1px solid var(--border-color);
            border-radius: var(--radius);
            padding: 1rem 1.25rem;
            margin-bottom: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
            box-shadow: var(--shadow-subtle);
        }

        .search-group {
            position: relative;
            flex: 1;
            min-width: 260px;
        }

        .search-group i {
            position: absolute;
            left: 0.9rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            transition: color 0.15s ease;
        }

        .search-group input {
            width: 100%;
            padding: 0.55rem 0.75rem 0.55rem 2.5rem;
            border: 1px solid var(--border-color);
            border-radius: var(--radius);
            font-size: 0.9rem;
            outline: none;
            color: var(--text-main);
            background-color: var(--surface);
            transition: border-color 0.15s ease;
        }

        .search-group input:focus {
            border-color: var(--accent-red);
        }

        .search-group input:focus + i {
            color: var(--accent-red);
        }

        .filter-group {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            flex-wrap: wrap;
        }

        .filter-select {
            padding: 0.55rem 0.85rem;
            border: 1px solid var(--border-color);
            border-radius: var(--radius);
            font-size: 0.9rem;
            background-color: var(--surface);
            color: var(--text-main);
            outline: none;
            cursor: pointer;
            transition: border-color 0.15s ease;
        }

        .filter-select:focus {
            border-color: var(--accent-red);
        }

        /* CONTENT CONTAINER & TABLE */
        .content-card {
            background-color: var(--surface);
            border: 1px solid var(--border-color);
            border-radius: var(--radius);
            box-shadow: var(--shadow-subtle);
            overflow: hidden;
        }

        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        .student-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 0.9rem;
        }

        .student-table th {
            background-color: var(--bg-body);
            color: var(--text-main);
            font-weight: 700;
            padding: 0.85rem 1.25rem;
            border-bottom: 1px solid var(--border-color);
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
        }

        .student-table td {
            padding: 0.85rem 1.25rem;
            border-bottom: 1px solid var(--border-color);
            color: var(--text-main);
            vertical-align: middle;
        }

        .student-table tbody tr {
            transition: background-color 0.1s ease;
        }

        .student-table tbody tr:hover {
            background-color: var(--bg-body);
        }

        .student-table tbody tr:last-child td {
            border-bottom: none;
        }

        /* IDENTITY PROFILE ELEMENTS */
        .student-profile-cell {
            display: flex;
            align-items: center;
            gap: 0.85rem;
        }

        .avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: var(--bg-body);
            color: var(--text-main);
            border: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.8rem;
            flex-shrink: 0;
        }

        .student-info .name {
            font-weight: 700;
            color: var(--text-main);
        }

        .student-info .id-muted {
            font-size: 0.8rem;
            color: var(--text-muted);
        }

        .badge {
            display: inline-flex;
            align-items: center;
            padding: 0.2rem 0.6rem;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .badge-active {
            background-color: var(--accent-red-light);
            color: var(--accent-red);
        }

        .text-muted {
            color: var(--text-muted);
        }

        /* ACTIONS */
        .actions-cell {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-icon {
            background: none;
            border: 1px solid var(--border-color);
            width: 32px;
            height: 32px;
            border-radius: var(--radius);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: var(--text-main);
            cursor: pointer;
            transition: all 0.15s ease;
        }

        .btn-icon:hover {
            background-color: var(--text-main);
            color: #ffffff;
            border-color: var(--text-main);
        }

        .btn-icon.delete:hover {
            background-color: var(--accent-red);
            color: #ffffff;
            border-color: var(--accent-red);
        }

        /* MOBILE CARDS (Hidden on Desktop) */
        .mobile-cards {
            display: none;
            padding: 1rem;
            gap: 1rem;
            flex-direction: column;
        }

        .mobile-card {
            background: var(--surface);
            border: 1px solid var(--border-color);
            border-radius: var(--radius);
            padding: 1rem;
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .mobile-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .mobile-card-body {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.5rem;
            font-size: 0.85rem;
        }

        .mobile-card-footer {
            display: flex;
            justify-content: flex-end;
            gap: 0.5rem;
            border-top: 1px solid var(--border-color);
            padding-top: 0.75rem;
        }

        /* EMPTY STATE */
        .empty-state {
            padding: 4rem 1rem;
            text-align: center;
        }

        .empty-state i {
            font-size: 2.5rem;
            color: var(--text-muted);
            margin-bottom: 1rem;
        }

        .empty-state h3 {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 0.25rem;
        }

        .empty-state p {
            font-size: 0.9rem;
            color: var(--text-muted);
            margin-bottom: 1.5rem;
        }

        /* PAGINATION */
        .pagination-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.85rem 1.25rem;
            border-top: 1px solid var(--border-color);
            background-color: var(--surface);
            font-size: 0.85rem;
            color: var(--text-muted);
        }

        .pagination-controls {
            display: flex;
            gap: 0.35rem;
        }

        .page-btn {
            padding: 0.35rem 0.65rem;
            border: 1px solid var(--border-color);
            background: var(--surface);
            color: var(--text-main);
            border-radius: var(--radius);
            font-size: 0.85rem;
            cursor: pointer;
            text-decoration: none;
        }

        .page-btn.active {
            background-color: var(--accent-red);
            color: white;
            border-color: var(--accent-red);
        }

        .page-btn:hover:not(.active) {
            background-color: var(--bg-body);
        }

        /* RESPONSIVE MEDIA QUERIES */
        @media (max-width: 900px) {
            .sidebar {
                width: 70px;
            }
            .sidebar-brand span, .nav-item span {
                display: none;
            }
            .main-wrapper {
                margin-left: 70px;
            }
            .table-responsive {
                display: none;
            }
            .mobile-cards {
                display: flex;
            }
        }

        @media (max-width: 600px) {
            .sidebar {
                display: none;
            }
            .main-wrapper {
                margin-left: 0;
            }
            .portal-container {
                padding: 1.25rem 1rem;
            }
        }
    </style>
</head>
<body>

    <!-- SIDEBAR NAVIGATION -->
    <aside class="sidebar">
        <div class="sidebar-brand">
            <i class="fa-solid fa-graduation-cap"></i>
            <span>Academia Portal</span>
        </div>
        <nav class="sidebar-nav">
            <a href="#" class="nav-item">
                <i class="fa-solid fa-house"></i>
                <span>Dashboard</span>
            </a>
            <a href="#" class="nav-item active">
                <i class="fa-solid fa-user-graduate"></i>
                <span>Students</span>
            </a>
            <a href="#" class="nav-item">
                <i class="fa-solid fa-user-plus"></i>
                <span>Add Student</span>
            </a>
            <a href="#" class="nav-item">
                <i class="fa-solid fa-book"></i>
                <span>Courses</span>
            </a>
            <a href="#" class="nav-item">
                <i class="fa-solid fa-gear"></i>
                <span>Settings</span>
            </a>
        </nav>
    </aside>

    <!-- MAIN WRAPPER -->
    <div class="main-wrapper">
        <div class="portal-container">

            <!-- PAGE HEADER -->
            <header class="page-header">
                <div class="header-title">
                    <h1>Student List</h1>
                    <p>View and manage registered students.</p>
                </div>
                <button class="btn">
                    <i class="fa-solid fa-plus"></i> Add Student
                </button>
            </header>

            <!-- SUMMARY CARDS -->
            <section class="summary-grid">
                <div class="summary-card">
                    <div class="summary-icon"><i class="fa-solid fa-users"></i></div>
                    <div class="summary-content">
                        <div class="card-title">Total Students</div>
                        <div class="card-value">1,248</div>
                    </div>
                </div>
                <div class="summary-card">
                    <div class="summary-icon"><i class="fa-solid fa-user-check"></i></div>
                    <div class="summary-content">
                        <div class="card-title">Active Students</div>
                        <div class="card-value">1,190</div>
                    </div>
                </div>
                <div class="summary-card">
                    <div class="summary-icon"><i class="fa-solid fa-book-open"></i></div>
                    <div class="summary-content">
                        <div class="card-title">Courses</div>
                        <div class="card-value">14</div>
                    </div>
                </div>
                <div class="summary-card">
                    <div class="summary-icon"><i class="fa-solid fa-layer-group"></i></div>
                    <div class="summary-content">
                        <div class="card-title">Year Levels</div>
                        <div class="card-value">4</div>
                    </div>
                </div>
            </section>

            <!-- SEARCH AND FILTER TOOLBAR -->
            <div class="toolbar">
                <div class="search-group">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Search by name or student ID...">
                </div>
                <div class="filter-group">
                    <select class="filter-select">
                        <option value="">All Courses</option>
                        <option value="BSCS">BS Computer Science</option>
                        <option value="BSIT">BS Information Technology</option>
                    </select>
                    <select class="filter-select">
                        <option value="">All Year Levels</option>
                        <option value="1">1st Year</option>
                        <option value="2">2nd Year</option>
                        <option value="3">3rd Year</option>
                        <option value="4">4th Year</option>
                    </select>
                    <button class="btn btn-outline" title="Clear Filters">
                        <i class="fa-solid fa-rotate-left"></i> Reset
                    </button>
                </div>
            </div>

            <!-- STUDENT TABLE CONTAINER -->
            <div class="content-card">
                
                <?php if (!empty($users)): ?>
                    <!-- Desktop Table View -->
                    <div class="table-responsive">
                        <table class="student-table">
                            <thead>
                                <tr>
                                    <th>Student</th>
                                    <th>Student ID</th>
                                    <th>Course</th>
                                    <th>Year</th>
                                    <th>Section</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user): ?>
                                    <?php 
                                        $initials = strtoupper(substr($user['username'], 0, 2));
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="student-profile-cell">
                                                <div class="avatar"><?= $initials ?: 'ST'; ?></div>
                                                <div class="student-info">
                                                    <div class="name"><?= htmlspecialchars($fullName ?: $user['username']); ?></div>
                                                                                        <div class="name"><?= htmlspecialchars($user['username']); ?></div>
                                                    <div class="id-muted">@<?= htmlspecialchars($user['username']); ?></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="text-muted">#<?= htmlspecialchars($user['id']); ?></span></td>
                                        <td>BS Computer Science</td>
                                        <td>3rd Year</td>
                                        <td>Section A</td>
                                        <td><span class="text-muted"><?= htmlspecialchars($user['role']); ?></span></td>
                                        <td><span class="badge badge-active">Active</span></td>
                                        <td>
                                            <div class="actions-cell">
                                                <button class="btn-icon" title="View Details"><i class="fa-solid fa-eye"></i></button>
                                                <button class="btn-icon" title="Edit Student"><i class="fa-solid fa-pen"></i></button>
                                                <button class="btn-icon delete" title="Delete Student"><i class="fa-solid fa-trash-can"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Mobile Card View -->
                    <div class="mobile-cards">
                        <?php foreach ($users as $user): ?>
                            <?php 
                                $initials = strtoupper(substr($user['username'], 0, 2));
                            ?>
                                                                <div class="name"><?= htmlspecialchars($user['username']); ?></div>
                            <div class="mobile-card">
                                <div class="mobile-card-header">
                                    <div class="student-profile-cell">
                                        <div class="avatar"><?= $initials ?: 'ST'; ?></div>
                                        <div class="student-info">
                                            <div class="name"><?= htmlspecialchars($fullName ?: $user['username']); ?></div>
                                            <div class="id-muted">ID: #<?= htmlspecialchars($user['id']); ?></div>
                                        </div>
                                    </div>
                                    <span class="badge badge-active">Active</span>
                                </div>
                                <div class="mobile-card-body">
                                    <div><span class="text-muted">Course:</span> BSCS</div>
                                    <div><span class="text-muted">Year/Sec:</span> 3rd Yr - A</div>
                                    <div style="grid-column: span 2;"><span class="text-muted">Role:</span> <?= htmlspecialchars($user['role']); ?></div>
                                </div>
                                <div class="mobile-card-footer">
                                    <button class="btn-icon" title="View Details"><i class="fa-solid fa-eye"></i></button>
                                    <button class="btn-icon" title="Edit Student"><i class="fa-solid fa-pen"></i></button>
                                    <button class="btn-icon delete" title="Delete Student"><i class="fa-solid fa-trash-can"></i></button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Pagination -->
                    <div class="pagination-footer">
                        <div>Showing entries for registered students</div>
                        <div class="pagination-controls">
                            <button class="page-btn" disabled><i class="fa-solid fa-chevron-left"></i></button>
                            <button class="page-btn active">1</button>
                            <button class="page-btn">2</button>
                            <button class="page-btn">3</button>
                            <button class="page-btn"><i class="fa-solid fa-chevron-right"></i></button>
                        </div>
                    </div>

                <?php else: ?>
                    <!-- Empty State -->
                    <div class="empty-state">
                        <i class="fa-solid fa-folder-open"></i>
                        <h3>No students found.</h3>
                        <p>There are no registered student entries available in the database currently.</p>
                        <button class="btn">
                            <i class="fa-solid fa-plus"></i> Add Student
                        </button>
                    </div>
                <?php endif; ?>

            </div>

        </div>
    </div>

</body>
</html>