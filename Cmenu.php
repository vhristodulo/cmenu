<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cmenu {
	
	private $table_name;
	private $pk_column_name;
	private $fk_column_name;
	private $title_column_name;
	
	public function __construct()
	{
		$this->CI = &get_instance();
		
		$this->CI->load->database();
		$this->CI->config->load('cmenu');
		
		$this->table_name = $this->CI->config->item('table_name');
		$this->pk_column_name = $this->CI->config->item('pk_column_name');
		$this->fk_column_name = $this->CI->config->item('fk_column_name');
		$this->title_column_name = $this->CI->config->item('title_column_name');
	}

	public function getCmenu()
	{
		$result = $this->CI->db->query("SELECT * FROM $this->table_name")->result_array();
		
		foreach($result as $row) $items[$row[$this->fk_column_name]][] = $row;
		
		return $this->cMenu($items);
	}
	
	function cMenu($items, $parent = NULL, $data = "")
	{		
		$i = ($parent == NULL) ? '' : $parent;

		if(empty($items[$i])) return $data;

		$data .= "<ul>";

		foreach ($items[$i] as $child) {
			$data .= "<li><a href='category/".$child[$this->pk_column_name]."'>".$child[$this->title_column_name]."</a>";
			
			$data = $this->cMenu($items, $child[$this->pk_column_name], $data);
			
			$data .= "</li>";
		}

		$data .= "</ul>";
		
		return $data;
	}
}

/* End of file Cmenu.php */
/* Location: ./application/libraries/Cmenu.php */
