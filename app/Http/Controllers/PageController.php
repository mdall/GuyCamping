<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\PageRequest;
use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller {

    /*
    * Auth required for some actions
    */
    function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return redirect(url('/'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$page = new Page();
        return view('pages.edit', compact('page'))->with(['method' => 'POST']);
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param PageRequest $request
     * @return Response
     */
	public function store(PageRequest $request)
	{
		Page::create($request->all());
        return "OK!";
	}

    /**
     * Display the specified resource.
     *
     * @param Page $page
     * @return Response
     */
	public function show(Page $page)
	{
		return view('pages.show', compact('page'));
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param Page $page
     * @return Response
     */
	public function edit(Page $page)
	{
        return view('pages.edit', compact('page'))->with(['method' => 'PUT']);
	}

    /**
     * Update the specified resource in storage.
     *
     * @param Page $page
     * @param PageRequest $request
     * @return Response
     */
	public function update(Page $page, PageRequest $request)
	{
		$page->update($request->all());
        return "OK!";
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param Page $page
     * @return Response
     */
	public function destroy(Page $page)
	{
		$page->delete();
        return redirect(url('/'));
	}

}
