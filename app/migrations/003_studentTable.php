<?php

class StudentTable {

    private $_lava;
    protected $dbforge;

    public function __construct()
    {
        $this->_lava = lava_instance();
        $this->_lava->call->dbforge();
    }

    public function up()
    {
        // Write your "UP" migration here
        $this->_lava->dbforge->add_field([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ]
        ]);

        $this->_lava->dbforge->add_key('id', TRUE);
        $this->_lava->dbforge->create_table('StudentTB');
    }

    public function down()
    {
        // Write your "DOWN" migration here
        $this->_lava->dbforge->drop_table('StudentTB');
    }
}