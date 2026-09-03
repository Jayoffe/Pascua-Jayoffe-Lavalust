<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Directory — LavaLust</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: #0a0a0a;
            color: #ffffff;
            line-height: 1.6;
            min-height: 100vh;
        }

        /* Navigation */
        nav {
            background: #0a0a0a;
            border-bottom: 1px solid #1f1f1f;
            padding: 0 2rem;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .nav-container {
            max-width: 1100px;
            margin: 0 auto;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            font-weight: 600;
            font-size: 1.1rem;
            color: #ffffff;
            letter-spacing: -0.3px;
        }

        .logo span {
            color: #dc2626;
        }

        .nav-links a {
            text-decoration: none;
            color: #a1a1aa;
            font-size: 0.9rem;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .nav-links a:hover {
            color: #ffffff;
            background: #1f1f1f;
        }

        .nav-links a.active {
            color: #dc2626;
            background: #1f1f1f;
        }

        /* Main Content */
        main {
            max-width: 1100px;
            margin: 0 auto;
            padding: 4rem 2rem;
        }

        /* Header Section */
        .page-header {
            margin-bottom: 2rem;
        }

        .category-tag {
            font-size: 0.85rem;
            font-weight: 500;
            color: #dc2626;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 0.75rem;
        }

        h1 {
            font-size: 2rem;
            font-weight: 600;
            color: #ffffff;
            letter-spacing: -1px;
            line-height: 1.2;
            margin-bottom: 0.5rem;
        }

        .subtitle {
            font-size: 1rem;
            color: #a1a1aa;
            font-weight: 400;
        }

        /* Dark Styled Table */
        .table-container {
            width: 100%;
            overflow-x: auto;
            background: #121212;
            border: 1px solid #1f1f1f;
            border-radius: 12px;
            margin-top: 1.5rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 0.95rem;
        }

        th {
            background-color: #171717;
            color: #a1a1aa;
            font-weight: 500;
            padding: 1rem 1.25rem;
            border-bottom: 1px solid #1f1f1f;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
        }

        td {
            padding: 1rem 1.25rem;
            border-bottom: 1px solid #1f1f1f;
            color: #e4e4e7;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover td {
            background-color: #1a1a1a;
        }

        /* Action Buttons */
        .action-area {
            margin-top: 2.5rem;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: #1f1f1f;
            color: #ffffff;
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 500;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            border: 1px solid #27272a;
            cursor: pointer;
            transition: all 0.25s ease;
        }

        .btn-back:hover {
            background: #27272a;
            color: #ffffff;
            border-color: #3f3f46;
            transform: translateY(-2px);
        }

        .btn-back svg {
            width: 18px;
            height: 18px;
        }

        /* Footer */
        .footer-note {
            margin-top: 4rem;
            padding-top: 2rem;
            border-top: 1px solid #1f1f1f;
            color: #52525b;
            font-size: 0.85rem;
        }

        /* Responsive */
        @media (max-width: 640px) {
            h1 {
                font-size: 1.6rem;
            }
            main {
                padding: 2.5rem 1.25rem;
            }
            th, td {
                padding: 0.75rem 1rem;
            }
        }
    </style>
</head>
<body>

    <nav>
        <div class="nav-container">
            <div class="logo">Lava<span>Lust</span></div>
            <div class="nav-links">
                <a href="<?=site_url('');?>">Home</a>
                <a href="<?=site_url('profile');?>">Profile</a>
                <a href="<?=site_url('show-users');?>" class="active">Users</a>
            </div>
        </div>
    </nav>

    <main>
        <section class="page-header">
            <div class="category-tag">Database Records</div>
            <h1>User Management Directory</h1>
            <p class="subtitle">Overview of dynamically fetched records from Aiven MySQL database.</p>
        </section>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Username</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($users)): ?>
                        <?php foreach($users as $user): ?>
                            <tr>
                                <td><?= htmlspecialchars($user['id']); ?></td>
                                <td><?= htmlspecialchars($user['firstname']); ?></td>
                                <td><?= htmlspecialchars($user['lastname']); ?></td>
                                <td><?= htmlspecialchars($user['email']); ?></td>
                                <td><?= htmlspecialchars($user['username']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" style="text-align: center; color: #71717a;">No users found in database.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <section class="action-area">
            <a href="<?=site_url('');?>" class="btn-back">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
                Back to Home
            </a>
        </section>

        <div class="footer-note">
            LavaLust Student Portal
        </div>
    </main>

</body>
</html>