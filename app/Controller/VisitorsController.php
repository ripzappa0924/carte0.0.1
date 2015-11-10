<?php

class VisitorsController  extends AppController{



public $uses = array('Visitor','Patient','Carte');
public $helpers = array('Html','Form');
public $components = array('Cookie', 'Session');



public function visit($id=null){
	
		if(!$id){
    		throw new NotFoundException(__('そのような患者さんはいません'));
    	}
    	
    	
    	$patient=$this->Patient->find('first',
	    	array(
	    		'conditions'=>array('id'=>$id),
	    		'recursive'=>2)
	    	);
	    	
    	if(!$patient){
    		throw new NotFoundException(__('そのような患者さんはいません'));
    	}
    	
    	$this->set('patient',$patient);
        
        
        
        $data=array('patient_id'=>$id);
        $this->Visitor->create();  
    	if($this->Visitor->save($data)){
    				
		    $this->Session->setFlash(__('受付が完了しました'));	    	
	    		$this->redirect(array(
	    		'controller'=>'visitors',
	    		'action'=>'index',$id));
	    }else{
    		$this->Session->setFlash('不具合が発生しました');
    	}
}

public function index($id=null){
	$id=$this->request->pass[0];
	
	if(!$id){
    		throw new NotFoundException(__('そのような患者さんはいません'));
    	}
    	
    	//$idの患者データ取得
    	$patient=$this->Patient->find('first',
	    	array(
	    		'conditions'=>array('id'=>$id),
	    		'recursive'=>2)
	    	);
	    //今の受診id（最後に追加した）を取得	
	    $visdata=$this->Visitor->find(
    			'first',
	    			array(
	    			'conditions'=>array('Visitor.patient_id'=>$id),
		    		'fields'=>'MAX(Visitor.id) as latest'
		    		)
	    		);
	    		
	    $this->set('visdata',$visdata);	
	    $this->set('patient',$patient);
	    	
    	if(!$patient){
    		throw new NotFoundException(__('そのような患者さんはいません'));
    	}
}


}

