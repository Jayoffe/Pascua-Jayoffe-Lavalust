<?php

class Add_email_to_users_table
{
    private $_lava;

    public function __construct()
    {
        $this->_lava = lava_instance();
        $this->_lava->call->dbforge();
    }

    public function up()
    {
        $column = $this->_lava->db->raw("SHOW COLUMNS FROM users LIKE 'email'")->fetch(PDO::FETCH_ASSOC);

        if ($column) {
            return;
        }

        $this->_lava->dbforge->add_column('users', [
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => TRUE,
                'after'      => 'username',
            ],
        ]);

        $this->_lava->db->raw(
            "UPDATE users SET email = CONCAT('user-', id, '@example.invalid') WHERE email IS NULL"
        );

        $this->_lava->dbforge->modify_column('users', [
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => FALSE,
            ],
        ]);

        $this->_lava->db->raw(
            'ALTER TABLE users ADD UNIQUE INDEX email_unique (email)'
        );
    }

    public function down()
    {
        $this->_lava->db->raw('ALTER TABLE users DROP INDEX email_unique');
        $this->_lava->dbforge->drop_column('users', 'email');
    }
}
