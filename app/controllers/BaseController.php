<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}
        
        	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{   
            $modelname = $this->modelname;
            return $modelname::all();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{           
            $modelname = $this->modelname;
            return $modelname::create(Input::json()->all());
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
            $modelname = $this->modelname;
            $resource = $modelname::find($id);
            if($resource)
            {
                return $resource->toJson();
            }
            
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
            $modelname = $this->modelname;
            $resource = $modelname::find($id);
            if($resource)
            {
                $resource->update(Input::json()->all());
                return $resource;
            }
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
            $modelname = $this->modelname;
            $resource = $modelname::find($id);
            if($resource)
            {
               $resource->delete();
            }
	}
        
        public function findByAttribute($attributeName, $value)
        {
            $modelname = $this->modelname;
            return $modelname::where($attributeName, $value)->get();
        }
        
}