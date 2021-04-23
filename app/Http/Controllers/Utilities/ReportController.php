<?php

namespace App\Http\Controllers\Utilities;

use App\Http\Controllers\Controller;
use App\Services\Report\Pdf\UserActionReportService;
use PDF;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function downloadUserActions(UserActionReportService $userActionReportService)
    {
        $pdf = $userActionReportService->handle();

        return $pdf->download('user actions.pdf');
    }
}
