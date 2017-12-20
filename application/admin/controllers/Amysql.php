<?php
class Amysql extends Homebase
{
	public function __construct()
	{
		parent::__construct();
	}

	public function beifen()
	{
		// Load the DB utility class
		$this->load->dbutil();

		// Backup your entire database and assign it to a variable
		$backup = $this->dbutil->backup();

		// Load the file helper and write the file to your server
		$this->load->helper('file');
		write_file('/path/to/mybackup.gz', $backup);

		// Load the download helper and send the file to your desktop
		$this->load->helper('download');
		force_download('mybackup.gz', $backup);
	}

	public function modify()
	{
		
		$fields = array(
		    'a_middle_pic' => array(
		        'name' => 'a_index_pic',
		        'type' => 'TEXT',
		    ),
		);
		$this->load->dbforge();
		$this->dbforge->modify_column('article', $fields);
	}
	
}