<?PHP

class SMaccessrules extends SMCli{
	public function rules($accessRules,$view){
		foreach($accessRules as $key=>$value){
						
			if(@in_array(strtolower($view),$value["actions"])==true){
				if(is_array(@$value["ip"])){
					if(in_array(Smce::app()->IP,$value["ip"])==true)
						return true;
					else
						return false;
				}
				
				if($value["users"]=="@" && Smce::app()->getState("smce_login71")==""){
					Smcontroller::redirect($value["redirect"]);
				}
				
				if($value["expression"]===true){
					return true;
				}
				
			}
			
		
		}
	}
	
	
}