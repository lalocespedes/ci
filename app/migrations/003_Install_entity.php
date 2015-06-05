<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Install_entity extends CI_Migration {

	public function up() {

		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'entity_name' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
			),
			'entity_rfc' => array(
				'type' => 'VARCHAR',
				'constraint' => '13',
			)
		));

		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->add_field("created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP");
		$this->dbforge->add_field("updated_at TIMESTAMP NULL");
		$this->dbforge->create_table('sdm_entity');
	}

	public function down() {
		
		$this->dbforge->drop_table('sdm_entity');
	}

}

/* End of file 002_Install_xml.php */
/* Location: .//Users/arthaleon/Development/web/ci/app/migrations/002_Install_xml.php */