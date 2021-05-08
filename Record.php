<?php

class Record {

	public $type;			// Type of data
	public $data;			// Data accessed
	public $time;			// Time of access
	public $accessor;		// Who did access?
	public $permissions;	// Who can access?
	public $reason;			// Why was it accessed?
	public $processed;		// How was it processed?
	public $third_party;	// Third party access?

	public function __construct($type) {
		$this->type = $type;
		$this->data = null;
		$this->time = time();
		$this->accessor = null;
		$this->permissions = null;
		$this->reason = 'Unknown';
		$this->processed = null;
		$this->third_party = false;
	}

	public function reason($set) {
		$this->reason = $set;
		return $this;
	}

	public function data($set) {
		$this->data = $set;
		return $this;
	}

	public function who() {
		return $this;
	}
	
}