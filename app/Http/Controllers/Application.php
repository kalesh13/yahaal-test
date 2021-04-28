<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\IApplication;

class Application extends Controller
{
    /**
     * Application repository instance.
     * 
     * @var \App\Repository\IApplication
     */
    protected $appRepo;

    public function __construct(IApplication $appRepo)
    {
        $this->appRepo = $appRepo;
    }

    /**
     * Renders the application landing page.
     * 
     * @return \Illuminate\Contracts\View\View
     */
    public function show()
    {
        return view('app');
    }

    /**
     * Endpoint that returns all the user details.
     * 
     * @return array
     */
    public function users(Request $request)
    {
        return $this->appRepo->users(collect($request->all()));
    }

    /**
     * Endpoint that returns the gender stats of the whole data.
     * 
     * @return array
     */
    public function genderStats()
    {
        return $this->appRepo->genderStats();
    }
}
