<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add product | LavaLust</title>
    <script src="https://unpkg.com/vue@3/dist/vue.global.prod.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com"><link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root { --red:#dc2626; --ink:#0a0a0a; --panel:#111113; --line:#27272a; --muted:#a1a1aa; }
        * { box-sizing:border-box; margin:0; padding:0; } [v-cloak] { display:none; } body { min-height:100vh; background:var(--ink); color:#fff; font-family:'Inter',sans-serif; line-height:1.6; }
        nav { border-bottom:1px solid #1f1f1f; padding:0 2rem; } .nav-inner { max-width:1100px; height:64px; margin:auto; display:flex; justify-content:space-between; align-items:center; } .logo { font-weight:600; } .logo span { color:var(--red); } nav a { color:var(--muted); text-decoration:none; font-size:.9rem; } nav a:hover { color:#fff; }
        main { max-width:680px; margin:auto; padding:4.5rem 2rem; } .eyebrow { color:var(--red); font-size:.78rem; font-weight:600; letter-spacing:1.5px; text-transform:uppercase; } h1 { margin:.65rem 0 .5rem; font-size:2.5rem; letter-spacing:-1px; } .intro { color:var(--muted); margin-bottom:2rem; }
        form { padding:1.5rem; border:1px solid var(--line); border-radius:12px; background:var(--panel); } label { display:block; color:#d4d4d8; font-size:.85rem; margin-bottom:.4rem; } input,textarea { width:100%; padding:.8rem .9rem; margin-bottom:1.15rem; border:1px solid #3f3f46; border-radius:8px; background:var(--ink); color:#fff; font:inherit; outline:none; } textarea { min-height:120px; resize:vertical; } input:focus,textarea:focus { border-color:var(--red); box-shadow:0 0 0 3px rgba(220,38,38,.15); } .button { width:100%; padding:.85rem; border:0; border-radius:8px; background:var(--red); color:#fff; font:inherit; font-weight:600; cursor:pointer; } .button:hover { background:#b91c1c; }
        .errors { margin-bottom:1.25rem; padding:.8rem 1rem; border:1px solid #7f1d1d; border-radius:8px; color:#fecaca; background:#2a1010; } .errors li { margin-left:1rem; } .back { display:inline-block; margin-top:1.25rem; color:var(--muted); font-size:.9rem; text-decoration:none; } .back:hover { color:#fff; } @media (max-width:640px) { nav { padding:0 1.25rem; } main { padding:3rem 1.25rem; } h1 { font-size:2rem; } }
    </style>
</head>
<body>
    <nav><div class="nav-inner"><div class="logo">Lava<span>Lust</span></div><a href="<?= site_url('/products'); ?>">Back to products</a></div></nav>
    <main id="app" v-cloak><div class="eyebrow">Product workspace</div><h1>Add product.</h1><p class="intro">Create a new item for your catalog.</p>
    <ul v-if="errors.length" class="errors"><li v-for="error in errors" :key="error">{{ error }}</li></ul>
    <form action="<?= site_url('/product/create'); ?>" method="post">
        <label for="product_name">Product name</label>
        <input type="text" id="product_name" name="product_name" v-model="form.product_name" required>
        <label for="description">Description</label>
        <textarea id="description" name="description" v-model="form.description" required></textarea>
        <label for="price">Price</label>
        <input type="number" id="price" name="price" step="0.01" min="0" v-model="form.price" required>
        <label for="quantity">Quantity</label>
        <input type="number" id="quantity" name="quantity" min="0" v-model="form.quantity" required>
        <button class="button" type="submit">Create product</button>
    </form>
    <a class="back" href="<?= site_url('/products'); ?>">← Back to products</a></main>
    <script>
        Vue.createApp({
            data: () => ({
                errors: <?= json_encode(array_values($errors ?? []), JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>,
                form: <?= json_encode([
                    'product_name' => $_POST['product_name'] ?? '',
                    'description' => $_POST['description'] ?? '',
                    'price' => $_POST['price'] ?? '',
                    'quantity' => $_POST['quantity'] ?? ''
                ], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>
            })
        }).mount('#app');
    </script>
</body>
</html>
