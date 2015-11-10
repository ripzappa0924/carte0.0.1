<?php

class PatientsController  extends AppController{
public $uses = array('Patient','Visitor','Carte','Dx');
public $components = array('Search.Prg');
public $presetVars = array();



public function beforeFilter()  
{  
	 $this->presetVars = $this->Patient->presetVars; 
  // ページャ設定  
  $pager_numbers = array(  
    'before' => ' - ',  
    'after'=>' - ',  
    'modulus'=> 10,  
    'separator'=> ' ',  
    'class'=>'pagenumbers'  
  );  
  $this->set('pager_numbers', $pager_numbers);  
}  

public function index(){
	$this->Patient->unbindModel(array('hasMany' =>array
    	('Endscope','Bloodtest','Medication','Carte')));

	$this->Prg->commonProcess();
	$conditions = $this->Patient->parseCriteria($this->passedArgs);
	
	$this->paginate = array(
	'conditions'=>$conditions,  
    'limit' => 3  
  	);  

	
	$this->set('patients',$this->paginate('Patient'));	
}







public function view($id=null){
    	if(!$id){
    		throw new NotFoundException(__('そのような患者さんはいません'));
    	}
    	
    	$this->Patient->unbindModel(array('hasMany' =>array
    	('Endscope','Bloodtest','Medication','Carte')));
    	$this->Dx->unbindModel(array('belongsTo' =>array('Patient')));
    	$patient=$this->Patient->find('first',
	    	array(
	    		'conditions'=>array('id'=>$id),
	    		'recursive'=>2)
	    	);
    	if(!$patient){
    		throw new NotFoundException(__('そのような患者さんはいません'));
    	}
    	
        $this->set('patient',$patient);
}  

public function add(){
	if ($this->request->is('post')){
		if($this->Patient->save($this->request->data)){
			$this->Session->setFlash('患者さんを登録しました');
			$this->redirect(array('action'=>'index'));
		}else{
			$this->Session->setFlash('登録できませんでした');
			$this->redirect(array('action'=>'index'));
		}
	}
}

public function edit($id=null){
    $this->Patient->id=$id;
    if($this->request->is('get')){
    	$this->request->data=$this->Patient->read();
    	
    }else{
    	if($this->Patient->save($this->request->data)){
    		$this->Session->setFlash('患者さん情報を変更しました');
			$this->redirect(array('action'=>'index'));
    	}else{
    		$this->Session->setFlash('保存に失敗しました');
			$this->redirect(array('action'=>'index'));
    	}
    }	
    	
}

public function consult($id=null){
	$this->Patient->id=$id;
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
    	
}



}
