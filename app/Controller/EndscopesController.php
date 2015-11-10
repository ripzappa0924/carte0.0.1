<?php
class EndscopesController  extends AppController{
public $uses = array('Patient','Endscope');

public function add($id=null){
	if(!$this->request->is('post')){
	
	
	$conditions1=array('resdate>='=>date("Y-m-d",strtotime("now")));
	$conditions2=array('resdate<='=>date("Y-m-d",strtotime("7 day")));
	

	$this->Patient->unbindModel(array('hasMany' =>array('Dx','Visitor')));
	$this->Endscope->unbindModel(array('hasMany' =>array('Endscobservation')));
	
	
	

	$endscope=$this->Endscope->find('all',array(
		'conditions'=>array('$condition1' and '$condition2'),
		'fields'=>array('Endscope.id','Endscope.reservationdate','Endscope.reservationtime','Patient_id')
		));
	
	$this->set('endscopes',$endscope);
	
	
	}else{
    	
    	$this->Endscope->create();
    		
    	if($this->Endscope->save($this->request->data)){
    		$data=array(
    			'id'=>$this->Endscope->id,
    			'patient_id'=>$id
    		);
    		$this->Endscope->save($data);
    		$this->Session->setFlash(__('予約を保存しました'));
    		
    		$this->redirect(array(
    		'controller'=>'patients',
    		'action'=>'consult',$id));
    	}	    		
    	$this->Session->setFlash(__('なぜか予約できませんでした'));
    }
}
	

public function edit($id=null){
if($this->request->is('get')){
	$this->Endscope->id=$id;
	$this->request->data=$this->Endscope->read();
	
	$conditions1=array('resdate>='=>date("Y-m-d",strtotime("now")));
	$conditions2=array('resdate<='=>date("Y-m-d",strtotime("7 day")));
	

	$this->Patient->unbindModel(array('hasMany' =>array('Dx','Visitor')));
	$this->Endscope->unbindModel(array('hasMany' =>array('Endscobservation')));
	

	$endscope=$this->Endscope->find('all',array(
		'conditions'=>array('$condition1' and '$condition2'),
		'fields'=>array('Endscope.id','Endscope.reservationdate','Endscope.reservationtime','Patient_id')
		));
	
	$this->set('endscopes',$endscope);
	
	
}else{
	$this->Endscope->id=$id;
	if($this->Endscope->save($this->request->data)){
		$p=$this->Endscope->find(
    		'first',
	    		array(
	    		'conditions'=>array('Endscope.id'=>$id),
		    	)
	    	);
	    	
	    $pid=$p['Endscope']['patient_id'];
	    	
	    $this->Session->setFlash(__('予約を変更しました'));
	     $this->redirect(array(
	    	'controller'=>'patients',
	    	'action'=>'consult',$pid));
	    
	 
	}
	$this->Session->setFlash(__('なぜか予約できませんでした'));
}

}
}














