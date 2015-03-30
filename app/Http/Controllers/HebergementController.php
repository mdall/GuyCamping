<?php namespace App\Http\Controllers;

use App\Hebergement;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HebergementController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $hebergements = Hebergement::all();
		return view('hebergement.index', compact('hebergements'));
	}

    public function lister() {
        return Hebergement::all();
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('hebergement.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
        //Ces paramètres peuvent être associés directement au modèle
        $hebergement = Hebergement::create($request->only('name', 'options', 'images', 'description'));

        //Transformation des autres paramètres (plage)
        $plages = $request->get('plage');

        foreach($plages as $key => $plage) {
            //on enlève les lignes complètement vides
            if(empty($plage['debut']) || empty($plage['fin']) ) {
                unset($plages[$key]);
            }
        }

        $hebergement->plage = $plages;

        $hebergement->save();

        return redirect(route('hebergement.index'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return Hebergement::find($id);
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
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
