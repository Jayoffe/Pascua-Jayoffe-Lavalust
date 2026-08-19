<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal — Home</title>
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
            padding: 6rem 2rem;
        }

        /* Hero Section */
        .hero {
            margin-bottom: 3rem;
        }

        .greeting {
            font-size: 0.85rem;
            font-weight: 500;
            color: #dc2626;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 0.75rem;
        }

        h1 {
            font-size: 2.5rem;
            font-weight: 600;
            color: #ffffff;
            letter-spacing: -1px;
            line-height: 1.2;
            margin-bottom: 1rem;
        }

        .subtitle {
            font-size: 1.15rem;
            color: #a1a1aa;
            font-weight: 400;
            max-width: 500px;
        }

        /* Single Button */
        .action-area {
            margin-top: 3rem;
        }

        .btn-profile {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            background: #dc2626;
            color: #ffffff;
            text-decoration: none;
            font-size: 1rem;
            font-weight: 500;
            padding: 1rem 2rem;
            border-radius: 12px;
            border: none;
            cursor: pointer;
            transition: all 0.25s ease;
        }

        .btn-profile:hover {
            background: #b91c1c;
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(220, 38, 38, 0.25);
        }

        .btn-profile svg {
            width: 20px;
            height: 20px;
        }

        /* Footer */
        .footer-note {
            margin-top: 6rem;
            padding-top: 2rem;
            border-top: 1px solid #1f1f1f;
            color: #52525b;
            font-size: 0.85rem;
        }

        /* Responsive */
        @media (max-width: 640px) {
            h1 {
                font-size: 1.8rem;
            }
            main {
                padding: 4rem 1.5rem;
            }
        }
    </style>
</head>
<body>

    <nav>
        <div class="nav-container">
            <div class="logo">Lava<span>Lust</span></div>
            <div class="nav-links">
                <a href="<?=site_url('student');?>" class="active">Home</a>
                <a href="<?=site_url('student/profile');?>">Profile</a>
            </div>
        </div>
    </nav>

    <main>
        <section class="hero">
            <div class="greeting">Student Portal</div>
            <h1>Welcome back.</h1>
            <p class="subtitle">Access your student profile and manage your academic information.</p>
        </section>

        <section class="action-area">
            <a href="<?=site_url('student/profile');?>" class="btn-profile">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                </svg>
                Student Profile
            </a>
        </section>

        <div class="footer-note">
            LavaLust Student Portal
        </div>
    </main>

</body>
</html>