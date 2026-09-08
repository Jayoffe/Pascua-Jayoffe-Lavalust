<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Products | LavaLust</title>
<link rel="preconnect" href="https://fonts.googleapis.com"><link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
:root { --red:#dc2626; --ink:#0a0a0a; --panel:#111113; --line:#27272a; --muted:#a1a1aa; }
* { box-sizing:border-box; margin:0; padding:0; } body { min-height:100vh; background:var(--ink); color:#fff; font-family:'Inter',sans-serif; line-height:1.6; }
nav { border-bottom:1px solid #1f1f1f; padding:0 2rem; position:sticky; top:0; z-index:10; background:rgba(10,10,10,.96); }
.nav-inner { max-width:1100px; height:64px; margin:auto; display:flex; align-items:center; justify-content:space-between; gap:1.5rem; }
.logo { color:#fff; font-weight:600; font-size:1.1rem; } .logo span { color:var(--red); } .nav-links { display:flex; align-items:center; gap:.35rem; }
.nav-links a { color:var(--muted); text-decoration:none; padding:.45rem .75rem; border-radius:7px; font-size:.88rem; } .nav-links a:hover,.nav-links .active { color:#fff; background:#1f1f1f; } .nav-links .logout { color:#f87171; }
main { max-width:1100px; margin:auto; padding:4.5rem 2rem; } .eyebrow { color:var(--red); font-size:.78rem; font-weight:600; letter-spacing:1.5px; text-transform:uppercase; }
.heading { display:flex; align-items:end; justify-content:space-between; gap:1.5rem; margin-bottom:2.4rem; } h1 { margin-top:.65rem; font-size:2.5rem; letter-spacing:-1px; line-height:1.2; } .intro { color:var(--muted); margin-top:.5rem; }
.button { display:inline-flex; align-items:center; justify-content:center; padding:.75rem 1rem; border-radius:8px; background:var(--red); color:#fff; text-decoration:none; font-size:.9rem; font-weight:600; white-space:nowrap; } .button:hover { background:#b91c1c; }
.notification { margin-bottom:1.5rem; padding:.8rem 1rem; border:1px solid #166534; border-radius:8px; color:#bbf7d0; background:#0b2415; } .notification button { float:right; color:inherit; background:none; border:0; cursor:pointer; font-size:1.1rem; }
.table-wrap { overflow:hidden; border:1px solid var(--line); border-radius:12px; background:var(--panel); } table { width:100%; border-collapse:collapse; } th,td { padding:1rem 1.1rem; text-align:left; border-bottom:1px solid var(--line); } th { color:var(--muted); font-size:.74rem; font-weight:500; letter-spacing:1px; text-transform:uppercase; } td { color:#e4e4e7; font-size:.9rem; } tbody tr:last-child td { border-bottom:0; } tbody tr:hover { background:#18181b; } .price { color:#fca5a5; font-weight:600; } .actions { display:flex; gap:.8rem; } .actions a { color:#fca5a5; font-size:.85rem; text-decoration:none; } .actions a:hover { color:#fff; } .actions .delete { color:var(--muted); }
.empty { padding:3rem 1rem; text-align:center; color:var(--muted); } @media (max-width:700px) { nav { padding:0 1.25rem; } .nav-links a { padding:.35rem; font-size:.78rem; } main { padding:3rem 1.25rem; } .heading { display:block; } .heading .button { margin-top:1.25rem; } .table-wrap { overflow-x:auto; } table { min-width:680px; } }
</style>
</head>
<body>
<nav><div class="nav-inner"><div class="logo">Lava<span>Lust</span></div><div class="nav-links"><a class="active" href="<?= site_url('/products'); ?>">Products</a><?php if ($user_role === 'admin'): ?><a href="<?= site_url('/product/create'); ?>">Add product</a><?php endif; ?><a class="logout" href="<?= site_url('/logout'); ?>">Logout</a></div></div></nav>
<main>
    <?php if (!empty($notification)): ?>
        <div class="notification" role="status" id="notification">
            <button type="button" onclick="document.getElementById('notification').remove();" aria-label="Close notification">&times;</button>
            <?= htmlspecialchars($notification, ENT_QUOTES, 'UTF-8'); ?>
        </div>
    <?php endif; ?>
    <section class="heading"><div><div class="eyebrow">Product workspace</div><h1>Products.</h1><p class="intro">Keep your catalog clear, current, and easy to manage.</p></div><?php if ($user_role === 'admin'): ?><a class="button" href="<?= site_url('/product/create'); ?>">+ Add product</a><?php endif; ?></section>
    <div class="table-wrap">
        <?php if (!empty($products)): ?>
            <table><thead><tr><th>ID</th><th>Product</th><th>Description</th><th>Price</th><th>Created</th><?php if ($user_role === 'admin'): ?><th>Actions</th><?php endif; ?></tr></thead><tbody>
            <?php foreach ($products as $product): ?><tr><td><?= htmlspecialchars($product['id'], ENT_QUOTES, 'UTF-8'); ?></td><td><?= htmlspecialchars($product['product_name'], ENT_QUOTES, 'UTF-8'); ?></td><td><?= htmlspecialchars($product['description'], ENT_QUOTES, 'UTF-8'); ?></td><td class="price">₱<?= htmlspecialchars($product['price'], ENT_QUOTES, 'UTF-8'); ?></td><td><?= htmlspecialchars($product['created_at'], ENT_QUOTES, 'UTF-8'); ?></td><?php if ($user_role === 'admin'): ?><td><div class="actions"><a href="<?= site_url('/product/edit/' . $product['id']); ?>">Edit</a><a class="delete" href="<?= site_url('/product/delete/' . $product['id']); ?>" onclick="return confirm('Delete this product?');">Delete</a></div></td><?php endif; ?></tr><?php endforeach; ?>
            </tbody></table>
        <?php else: ?><div class="empty">No products have been added yet.</div><?php endif; ?>
    </div>
        <?php if (!empty($notification)): ?>
            <script>
                window.setTimeout(function () {
                    var notification = document.getElementById('notification');
                    if (notification) {
                        notification.remove();
                    }
                }, 4000);
            </script>
        <?php endif; ?>
</main>
</body>
</html>