<?php

class UserController extends \BaseController {
    protected $modelname = 'User';
    
    
        
    public function store()
	{
            $array = Input::json()->all();
            $array['password'] = Hash::make($array['password']);
            $modelname = $this->modelname;
            return $modelname::create($array);
	}
        
        public function update($id)
	{
            $modelname = $this->modelname;
            $resource = $modelname::find($id);
            if($resource)
            {
                $array = Input::json()->all();
                if(array_key_exists('password', $array))
                {
                    if(!$array['password'])
                    {
                        unset($array['password']);
                    }else
                    {
                        $array['password'] = Hash::make($array['password']);
                    }
                }
                
                
                $resource->update($array);
                return $resource;
            }
	}
}