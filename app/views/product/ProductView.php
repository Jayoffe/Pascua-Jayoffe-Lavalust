<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Products | LavaLust</title>
<script src="https://unpkg.com/vue@3/dist/vue.global.prod.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com"><link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
:root { --red:#dc2626; --ink:#0a0a0a; --panel:#111113; --line:#27272a; --muted:#a1a1aa; }
* { box-sizing:border-box; margin:0; padding:0; } [v-cloak] { display:none; } body { min-height:100vh; background:var(--ink); color:#fff; font-family:'Inter',sans-serif; line-height:1.6; }
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
<div id="app" v-cloak>
<nav><div class="nav-inner"><div class="logo">Lava<span>Lust</span></div><div class="nav-links"><a class="active" href="<?= site_url('/products'); ?>">Products</a><a v-if="isAdmin" href="<?= site_url('/product/create'); ?>">Add product</a><a class="logout" href="<?= site_url('/logout'); ?>">Logout</a></div></div></nav>
<main>
    <div v-if="notification" class="notification" role="status" id="notification">
        <button type="button" @click="notification = ''" aria-label="Close notification">&times;</button>
        {{ notification }}
    </div>
    <section class="heading"><div><div class="eyebrow">Product workspace</div><h1>Products.</h1><p class="intro">Keep your catalog clear, current, and easy to manage.</p></div><a v-if="isAdmin" class="button" href="<?= site_url('/product/create'); ?>">+ Add product</a></section>
    <div class="table-wrap">
        <table v-if="products.length"><thead><tr><th>ID</th><th>Product</th><th>Description</th><th>Price</th><th>Created</th><th v-if="isAdmin">Actions</th></tr></thead><tbody>
            <tr v-for="product in products" :key="product.id"><td>{{ product.id }}</td><td>{{ product.product_name }}</td><td>{{ product.description }}</td><td class="price">₱{{ product.price }}</td><td>{{ product.created_at }}</td><td v-if="isAdmin"><div class="actions"><a :href="editUrl(product.id)">Edit</a><a class="delete" :href="deleteUrl(product.id)" @click="confirmDelete" >Delete</a></div></td></tr>
        </tbody></table>
        <div v-else class="empty">No products have been added yet.</div>
    </div>
</main>
</div>
<script>
    Vue.createApp({
        data: () => ({
            products: <?= json_encode(array_values($products ?? []), JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>,
            isAdmin: <?= json_encode(($user_role ?? '') === 'admin'); ?>,
            notification: <?= json_encode($notification ?? '', JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>,
            editBase: <?= json_encode(site_url('/product/edit/')); ?>,
            deleteBase: <?= json_encode(site_url('/product/delete/')); ?>
        }),
        mounted() {
            if (this.notification) window.setTimeout(() => { this.notification = ''; }, 4000);
        },
        methods: {
            editUrl(id) { return this.editBase + id; },
            deleteUrl(id) { return this.deleteBase + id; },
            confirmDelete(event) { if (!window.confirm('Delete this product?')) event.preventDefault(); }
        }
    }).mount('#app');
</script>
</body>
</html>