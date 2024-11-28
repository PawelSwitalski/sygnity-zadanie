<?php

namespace App\Http\Controllers\Finance;

use App\Models\Gold;
use App\Services\NbpService;
use Illuminate\View\View;

class GoldController
{
    protected $nbpService;

    public function __construct(NbpService $nbpService)
    {
        $this->nbpService = $nbpService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $goldData = Gold::fromApiData($this->nbpService->getGoldLastTenDays());

        return view('finance.gold', ['goldData' => $goldData]);
    }
}
