<?php
class Medication extends AppModel{
	
	public $name='Medication';
	public $belongsTo=array('Patient');
	public $hasMany=array('Meddetail');
	
	public $actsAs=array('Search.Searchable');
	public $filterArgs=array(
		'name'=>'productName','type'=>'like','field'=>'Drug.productName');
	public $presetVars=array(
		'field'=>'productName','type'=>'value');
		
	
	
}
?>