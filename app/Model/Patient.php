<?php
class Patient extends AppModel{
	public $actsAs=array('Search.Searchable');
	public $name='Patient';
	
	public $filterArgs=array(
		array('name'=>'id','type'=>'value','field'=>'Patient.id'),
		array('name'=>'name','type'=>'like','field'=>'Patient.name')
	);
	
	public $presetVars=array(
		array('field'=>'id','type'=>'value'),
		array('field'=>'name','type'=>'value')
	);
	
	
	public $hasMany = array('Dx','Medication','Bloodtest','Endscope','Visitor',
		'Carte'=>array(
			'order'=>array('Carte.created DESC')
		)
		);
	
}
?>