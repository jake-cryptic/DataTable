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
			throw new Exception("Data type not found, you may need to declare it like: \$dc->declare_custom('{$type}')");
		}
		$this->data->records[] = new Record($type);

		return end($this->data->records);
	}

	public function get_types() {
		return array_merge($this->data->custom, $this->types);
	}

	public function get_data() {
		return $this->data->records;
	}
	
}