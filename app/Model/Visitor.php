<?php
class Visitor extends AppModel{
	public $name='Visitor';
	public $belongsTo = array('Patient');
	
}
?>