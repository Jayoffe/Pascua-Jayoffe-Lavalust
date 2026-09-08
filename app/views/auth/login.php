<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in | LavaLust</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root { --red: #dc2626; --red-dark: #b91c1c; --ink: #0a0a0a; --line: #27272a; --muted: #a1a1aa; }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { min-height: 100vh; background: var(--ink); color: #fff; font-family: 'Inter', sans-serif; line-height: 1.6; }
        .shell { min-height: 100vh; display: grid; grid-template-rows: 64px 1fr; }
        nav { border-bottom: 1px solid #1f1f1f; padding: 0 2rem; }
        .nav-inner { max-width: 1100px; height: 64px; margin: auto; display: flex; align-items: center; justify-content: space-between; }
        .logo { color: #fff; font-size: 1.1rem; font-weight: 600; }
        .logo span { color: var(--red); }
        .back { color: var(--muted); font-size: .9rem; text-decoration: none; }
        .back:hover { color: #fff; }
        main { display: grid; place-items: center; padding: 3rem 1.5rem; }
        .login-wrap { width: min(100%, 420px); animation: rise .5s ease both; }
        .eyebrow { color: var(--red); font-size: .78rem; font-weight: 600; letter-spacing: 1.5px; text-transform: uppercase; }
        h1 { margin: .7rem 0 .5rem; font-size: 2.4rem; letter-spacing: -1px; line-height: 1.2; }
        .intro { color: var(--muted); margin-bottom: 2rem; }
        form { padding: 1.5rem; border: 1px solid var(--line); background: #111113; border-radius: 12px; }
        label { display: block; color: #d4d4d8; font-size: .85rem; margin-bottom: .45rem; }
        input { width: 100%; padding: .85rem .9rem; margin-bottom: 1.1rem; border: 1px solid #3f3f46; border-radius: 8px; background: #0a0a0a; color: #fff; font: inherit; outline: none; }
        input:focus { border-color: var(--red); box-shadow: 0 0 0 3px rgba(220, 38, 38, .15); }
        button { width: 100%; padding: .9rem 1rem; border: 0; border-radius: 8px; background: var(--red); color: #fff; font: inherit; font-weight: 600; cursor: pointer; }
        button:hover { background: var(--red-dark); }
        .error { margin-bottom: 1rem; padding: .75rem .9rem; border: 1px solid #7f1d1d; border-radius: 8px; color: #fecaca; background: #2a1010; font-size: .9rem; }
        @keyframes rise { from { opacity: 0; transform: translateY(12px); } to { opacity: 1; transform: translateY(0); } }
        @media (max-width: 640px) { nav { padding: 0 1.25rem; } h1 { font-size: 2rem; } }
    </style>
</head>
<body>
    <div class="shell">
        <nav><div class="nav-inner"><div class="logo">Lava<span>Lust</span></div><a class="back" href="<?= site_url('/login'); ?>">Secure access</a></div></nav>
        <main>
            <section class="login-wrap">
                <div class="eyebrow">Hallo</div>
                <h1>Welcome back.</h1>
                <p class="intro">Sign in to manage your product workspace.</p>
                <?php if (!empty($error)): ?>
                    <div class="error" role="alert"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div>
                <?php endif; ?>
                <form action="<?= site_url('/login'); ?>" method="post">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" autocomplete="username" required>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" autocomplete="current-password" required>
                    <button type="submit">Sign in</button>
                </form>
            </section>
        </main>
    </div>
</body>
</html>