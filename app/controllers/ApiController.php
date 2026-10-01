<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ApiController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->library('api');
    }

    public function login()
    {
        $this->api->require_method('POST');
        $input    = $this->api->body();
        $username = $input['username'] ?? '';
        $password = $input['password'] ?? '';

        $stmt = $this->db->raw('SELECT * FROM users WHERE username = ?', [$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $tokens = $this->api->issue_tokens([
                'id'   => $user['id'],
                'role' => $user['role'],
            ]);
            $this->api->respond($tokens);
        } else {
            $this->api->respond_error('Invalid credentials', 401);
        }
    }

    public function register()
    {
        $this->api->require_method('POST');
        $input = $this->api->body();

        $username = trim($input['username'] ?? '');
        $email = trim($input['email'] ?? '');
        $password = $input['password'] ?? '';

        if ($username === '' || $email === '' || $password === '') {
            $this->api->respond_error('Username, email, and password are required', 422);
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->api->respond_error('A valid email is required', 422);
        }

        $existing = $this->db->raw(
            'SELECT id FROM users WHERE username = ? OR email = ? LIMIT 1',
            [$username, $email]
        )->fetch(PDO::FETCH_ASSOC);

        if ($existing) {
            $this->api->respond_error('Username or email already exists', 409);
        }

        $this->db->raw(
            'INSERT INTO users (username, email, password, role, created_at) VALUES (?, ?, ?, ?, NOW())',
            [$username, $email, password_hash($password, PASSWORD_BCRYPT), 'user']
        );

        $this->api->respond(['message' => 'User registered'], 201);
    }

    public function logout()
    {
        $this->api->require_method('POST');
        $this->api->require_jwt();
        $input = $this->api->body();
        $this->api->revoke_refresh_token($input['refresh_token'] ?? '');
        $this->api->respond(['message' => 'Logged out']);
    }

    public function list()
    {
        $this->api->require_jwt();
        $this->api->rate_limit();

        $users = $this->db->table('users')
                          ->select('id, username, email, role, created_at')
                          ->get_all();
        $this->api->respond($users);
    }

    public function create()
    {
        $this->api->require_method('POST');
        $this->require_admin();
        $input = $this->api->body();

        $email = trim($input['email'] ?? '');
        if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->api->respond_error('A valid email is required', 422);
        }

        $this->db->raw(
            "INSERT INTO users (username, email, password, role, created_at)
             VALUES (?, ?, ?, ?, NOW())",
            [
                $input['username'],
                $email,
                password_hash($input['password'], PASSWORD_BCRYPT),
                $input['role'] ?? 'user',
            ]
        );

        $this->api->respond(['message' => 'User created'], 201);
    }

    public function update($id)
    {
        $this->api->require_method('PUT');
        $this->require_admin();
        $input = $this->api->body();

        $email = trim($input['email'] ?? '');
        if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->api->respond_error('A valid email is required', 422);
        }

        $this->db->raw(
            "UPDATE users SET username = ?, email = ?, role = ? WHERE id = ?",
            [$input['username'], $email, $input['role'], $id]
        );

        $this->api->respond(['message' => 'User updated']);
    }

    public function delete($id)
    {
        $this->api->require_method('DELETE');
        $this->require_admin();
        $this->db->raw("DELETE FROM users WHERE id = ?", [$id]);
        $this->api->respond(['message' => 'User deleted']);
    }

    public function profile()
    {
        $auth = $this->api->require_jwt();

        $stmt = $this->db->raw(
            "SELECT id, username, email, role, created_at FROM users WHERE id = ?",
            [$auth['sub']]
        );
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->api->respond($user ?: ['message' => 'User not found']);
    }

    public function refresh()
    {
        $this->api->require_method('POST');
        $input = $this->api->body();
        $this->api->refresh_access_token($input['refresh_token'] ?? '');
    }

    public function products()
    {
        $this->api->require_jwt();
        $this->api->rate_limit();
        $this->api->respond($this->db->table('products')->get_all());
    }

    public function product_create()
    {
        $this->api->require_method('POST');
        $this->require_admin();
        $input = $this->api->body();
        $this->db->raw(
            'INSERT INTO products (product_name, description, price, quantity) VALUES (?, ?, ?, ?)',
            [$input['product_name'] ?? '', $input['description'] ?? '', $input['price'] ?? 0, $input['quantity'] ?? 0]
        );
        $this->api->respond(['message' => 'Product created'], 201);
    }

    public function product_update($id)
    {
        $this->api->require_method('PUT');
        $this->require_admin();
        $input = $this->api->body();
        $this->db->raw(
            'UPDATE products SET product_name = ?, description = ?, price = ?, quantity = ? WHERE id = ?',
            [$input['product_name'] ?? '', $input['description'] ?? '', $input['price'] ?? 0, $input['quantity'] ?? 0, $id]
        );
        $this->api->respond(['message' => 'Product updated']);
    }

    public function product_delete($id)
    {
        $this->api->require_method('DELETE');
        $this->require_admin();
        $this->db->raw('DELETE FROM products WHERE id = ?', [$id]);
        $this->api->respond(['message' => 'Product deleted']);
    }

    private function require_admin()
    {
        $auth = $this->api->require_jwt();
        if (($auth['role'] ?? '') !== 'admin') {
            $this->api->respond_error('Administrator access is required', 403);
        }
        return $auth;
    }
}