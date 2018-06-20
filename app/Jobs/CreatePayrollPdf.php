<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use App\Payroll;

class CreatePayrollPdf implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $payroll;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Payroll $payroll)
    {
        //
        $this->payroll = $payroll;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::info("generating PDF for payroll: " . $this->payroll->title . ", id: " . $this->payroll->id);
        ini_set("memory_limit", "2048M");
        ini_set("max_execution_time", 0);
        
        $payroll = $this->payroll;
        $payslips = \DB::table('paycheck_components')
        ->join('paycheck_summaries', function($join){
            $join->on('paycheck_summaries.payroll_id', 'paycheck_components.payroll_id');
            $join->on('paycheck_summaries.employee_id', 'paycheck_components.employee_id');
        })
        ->select(
        ['paycheck_components.component_title', 
        'paycheck_components.component_permanent_title', 
        'paycheck_components.employee_id', 
        'paycheck_components.cycle',
        'paycheck_components.component_type',
        'paycheck_components.amount',
        'paycheck_components.employee_surname', 'paycheck_components.employee_othernames', 'paycheck_summaries.employee_prefix',
        'paycheck_summaries.pension_employer_contribution_amount',
        'paycheck_summaries.pension_voluntary_contribution_amount',
        'paycheck_summaries.pension_amount', 
        'paycheck_summaries.pensionable', 'paycheck_summaries.consolidated_salary', 
        'paycheck_summaries.consolidated_allowance', 'paycheck_summaries.basic_salary', 
        'paycheck_summaries.gross_total', 'paycheck_summaries.total_deductions', 'paycheck_summaries.total_earnings',
        'paycheck_summaries.net_pay',
        'paycheck_summaries.payroll_id as ps_payroll_id',
        'paycheck_components.payroll_id',
        'paycheck_summaries.employee_number'])
        ->where('paycheck_components.payroll_id', $payroll->id)
        ->get()->groupBy('employee_id');
        
        Log::info("rendering view");
        
        $payslip = \View::make('payrolls.payslipV2', ['payslips' => $payslips,
            'view_type' => isset($_GET['view_type']) ? $_GET['view_type'] : false, 'payroll' => $payroll, 'errors' => []])->render();
        Log::info("view generated");
        $dompdf = \PDF::loadHTML($payslip);
        /*$dompdf->load_html($payslip); $dompdf->render(); */$pdfdata = $dompdf->output();
        file_put_contents (base_path()."/test.pdf", $pdfdata);
    }
}
