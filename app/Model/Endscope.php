<?php
class Endscope extends AppModel{
	public $name='Endscope';
	public $hasMany='Endscobservation';
	public $belongsTo='Patient';
}
?>