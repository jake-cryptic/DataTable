<?php

include('Record.php');

class DataTable {
	
	private $data;
	private $types;
	
	public function __construct() {
		$this->data = (object) array(
			'custom'=>array(),
			'records'=>array()
		);

		$this->types = array('location', 'connectivity');

		if (file_exists('data.json')) {
			
		}
	}
	
	public function connect_app() {
		
	}

	/**
	 * @throws Exception
	 */
	public function declare_custom($name) {
		if (in_array($name, $this->data->custom)) {
			throw new Exception('Custom data type already exists: ' . $name);
		}

		$this->data->custom[] = $name;
	}

	public function request($type) {
		if (!in_array($type, $this->data->custom) && !in_array($type, $this->types)) {
			throw new Exception("Data type now found, you may need to declare it like: \$dc->declare_custom('{$type}')");
		}
		$data['records'][] = new Record($type);
		return end($data['records']);
	}
	
	public function get_data() {
		return $this->data;
	}
	
}