<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information</title>
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
            max-width: 700px;
            margin: 0 auto;
            padding: 4rem 2rem;
        }

        /* Profile Header */
        .profile-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .avatar {
            width: 80px;
            height: 80px;
            background: #1f1f1f;
            border: 2px solid #dc2626;
            border-radius: 50%;
            margin: 0 auto 1.25rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            color: #dc2626;
        }

        .profile-header h1 {
            font-size: 1.75rem;
            font-weight: 600;
            color: #ffffff;
            letter-spacing: -0.5px;
            margin-bottom: 0.25rem;
        }

        .profile-header p {
            color: #71717a;
            font-size: 0.95rem;
        }

        /* Info Card */
        .info-card {
            background: #111111;
            border: 1px solid #1f1f1f;
            border-radius: 16px;
            overflow: hidden;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.25rem 1.75rem;
            border-bottom: 1px solid #1f1f1f;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-label {
            font-size: 0.85rem;
            font-weight: 500;
            color: #dc2626;
            text-transform: uppercase;
            letter-spacing: 0.8px;
        }

        .info-value {
            font-size: 0.95rem;
            font-weight: 400;
            color: #e4e4e7;
            text-align: right;
            max-width: 60%;
            word-break: break-word;
        }

        /* Footer */
        .footer-note {
            margin-top: 4rem;
            text-align: center;
            color: #52525b;
            font-size: 0.85rem;
        }

        /* Back Link */
        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            margin-top: 2.5rem;
            color: #a1a1aa;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: color 0.2s ease;
        }

        .back-link:hover {
            color: #ffffff;
        }

        .back-link svg {
            width: 16px;
            height: 16px;
        }

        /* Responsive */
        @media (max-width: 640px) {
            main {
                padding: 3rem 1.25rem;
            }

            .info-row {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.25rem;
            }

            .info-value {
                text-align: left;
                max-width: 100%;
                font-size: 1rem;
            }

            .profile-header h1 {
                font-size: 1.5rem;
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
                <a href="<?=site_url('profile');?>" class="active">Profile</a>
            </div>
        </div>
    </nav>

    <main>
        <div class="profile-header">
            <div class="avatar">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" width="36" height="36">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                </svg>
            </div>
            <h1><?= $name; ?></h1>
            <p><?= $student_id; ?> &mdash; <?= $course; ?></p>
        </div>

        <div class="info-card">
            <div class="info-row">
                <span class="info-label">Student ID</span>
                <span class="info-value"><?= $student_id; ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">Name</span>
                <span class="info-value"><?= $name; ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">Course</span>
                <span class="info-value"><?= $course; ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">Year Level</span>
                <span class="info-value"><?= $year; ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">Section</span>
                <span class="info-value"><?= $section; ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">Email</span>
                <span class="info-value"><?= $email; ?></span>
            </div>
        </div>

        <a href="<?=site_url('');?>" class="back-link">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
            </svg>
            Back to Home
        </a>

        <div class="footer-note">
            LavaLust Student Portal
        </div>
    </main>

</body>
</html>