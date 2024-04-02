<?php

use App\Http\Controllers\caseFlowController;
use App\Http\Controllers\GuaranteeController;
use App\Http\Controllers\listAssumsitionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CostController;
use App\Http\Controllers\RiskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ScopeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ClosingController;
use App\Http\Controllers\QualityController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\PlanningController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TermPlanController;
use App\Http\Controllers\ExecutingController;
use App\Http\Controllers\ResourcesController;
use App\Http\Controllers\InitiatingController;
use App\Http\Controllers\teamMoraleController;
use App\Http\Controllers\BebanBarangController;
use App\Http\Controllers\BebanSubkonController;
use App\Http\Controllers\ProcurementController;
use App\Http\Controllers\StakeholderController;
use App\Http\Controllers\PresentationController;
use App\Http\Controllers\CommunicationController;
use App\Http\Controllers\CostExecutingController;
use App\Http\Controllers\reviewMeetingController;
use App\Http\Controllers\BebanBahanCostController;
use App\Http\Controllers\ProjectCharterController;
use App\Http\Controllers\TagihanExecutingController;
use App\Http\Controllers\ControlMonitoringController;
use App\Http\Controllers\ProjectDefinitionController;
use App\Http\Controllers\projectAnouncementController;
use App\Http\Controllers\BebanBahanExecutingController;
use App\Http\Controllers\BebanSubkonExecutingController;
use App\Http\Controllers\CommunicationExecutingController;
use App\Http\Controllers\CostContractValue;
use App\Http\Controllers\CostContractValueController;
use App\Http\Controllers\ExecutingQualityController;
use App\Http\Controllers\ExecutingScheduleController;
use App\Http\Controllers\ExecutingScopeController;
use App\Http\Controllers\ExecutingStakeholderController;
use App\Http\Controllers\PlanningProjectDefinitionController;
use App\Http\Controllers\PresentationExecutingController;
use App\Http\Controllers\ProcurementExecutingController;
use App\Http\Controllers\projectAnouncementExecutingController;
use App\Http\Controllers\ProjectIncomeStatementController;
use App\Http\Controllers\ReportsExecutingController;
use App\Http\Controllers\ResourcesExecutingController;
use App\Http\Controllers\reviewMeetingExecutingController;
use App\Http\Controllers\RiskExecutingController;
use App\Http\Controllers\teamMoraleExecutingController;
use App\Http\Controllers\TermOfPaymentExecuting;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// routes Login
Route::get('/', [LoginController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/PostLogin', [LoginController::class, 'login']);

// setting -> USER MANAGEMENT
Route::get('/user', [UserController::class, 'index']);
Route::get('/user/add', [UserController::class, 'create']);
Route::post('/user/save', [UserController::class, 'store']);
Route::get('/user/{id}/delete', [UserController::class, 'destroy']);
Route::get('/user/{id}/edit', [UserController::class, 'show']);
Route::post('/user/{id}/update', [UserController::class, 'update']);


// MANU ALL FASE 
Route::group(['middleware' => ['auth']], function () {

    // INITIATING
    Route::get('/initiating', [InitiatingController::class, 'index']);

    // INITIATING => PROJECT DEFINITION
    Route::get('/projectDefinition', [ProjectDefinitionController::class, 'index']);
    Route::get('/projectDefinition/add', [ProjectDefinitionController::class, 'create']);
    Route::post('/projectDefinition/save', [ProjectDefinitionController::class, 'store']);
    Route::post('/projectDefinition/{id}/update', [ProjectDefinitionController::class, 'update']);
    Route::get('/projectDefinition/{id}/delete', [ProjectDefinitionController::class, 'destroy']);
    Route::get('/projectDefinition/{id}/edit', [ProjectDefinitionController::class, 'show']);

    // INITIATING => PROJECT CHARTER
    Route::get('/projectCharter', [ProjectCharterController::class, 'index']);


    // PLANNING    
    Route::get('/planning', [PlanningController::class, 'index']);
    Route::get('/findPlanning', [PlanningController::class, 'filterPlanning']);

    // PLANNING => COST
    Route::get('/cost', [CostController::class, 'index']);

    // PLANNING => COST => BEBAN BAHAN COST
    Route::get('/bebanBahanCostExecuting', [BebanBahanCostController::class, 'index',]);
    Route::get('/bebanBahanCostExecuting/create', [BebanBahanCostController::class, 'create']);
    Route::post('/bebanBahanCostExecuting/store', [BebanBahanCostController::class, 'store']);
    Route::get('/bebanBahanCostExecuting/{id}/delete', [BebanBahanCostController::class, 'destroy']);
    Route::post('/bebanBahanCostExecuting/{id}/update', [BebanBahanCostController::class, 'update']);
    Route::get('/bebanBahanCostExecuting/{id}/edit', [BebanBahanCostController::class, 'show']);

    // PLANNING => COST => PROJECT INCOME
    Route::get('/projectIncomeStatement', [ProjectIncomeStatementController::class, 'index',]);
    Route::get('/projectIncomeStatement/create', [ProjectIncomeStatementController::class, 'create']);
    Route::post('/projectIncomeStatement/store', [ProjectIncomeStatementController::class, 'store']);
    Route::get('/projectIncomeStatement/{id}/delete', [ProjectIncomeStatementController::class, 'destroy']);
    Route::post('/projectIncomeStatement/{id}/update', [ProjectIncomeStatementController::class, 'update']);
    Route::get('/projectIncomeStatement/{id}/edit', [ProjectIncomeStatementController::class, 'show']);

    //PLANNING => RISK
    Route::get('/risk', [RiskController::class, 'index']);
    Route::get('/risk/add', [RiskController::class, 'create']);
    Route::post('/risk/save', [RiskController::class, 'store']);
    Route::get('/risk/{id}/delete', [RiskController::class, 'destroy']);
    Route::get('/risk/{id}/edit', [RiskController::class, 'show']);
    Route::post('/risk/{id}/update', [RiskController::class, 'update']);

    //PLANNING => RISK
    Route::get('/scope', [ScopeController::class, 'index']);
    Route::get('/scope/add', [ScopeController::class, 'create']);
    Route::post('/scope/save', [ScopeController::class, 'store']);
    Route::get('/scope/{id}/delete', [ScopeController::class, 'destroy']);
    Route::get('/scope/{id}/edit', [ScopeController::class, 'show']);
    Route::post('/scope/{id}/update', [ScopeController::class, 'update']);

    //Caseflow
    Route::get('/caseflow', [caseFlowController::class, 'index']);
    Route::get('/caseflow/create', [caseFlowController::class, 'create']);
    Route::post('/caseflow/store', [caseFlowController::class, 'store']);
    Route::get('/caseflow/{id}/delete', [caseFlowController::class, 'destroy']);
    Route::get('/caseflow/{id}/edit', [caseFlowController::class, 'show']);
    Route::post('/caseflow/{id}/update', [caseFlowController::class, 'update']);
    //list Assumsition
    Route::get('/listAssumsition', [listAssumsitionController::class, 'index']);
    Route::get('/listAssumsition/create', [listAssumsitionController::class, 'create']);
    Route::post('/listAssumsition/store', [listAssumsitionController::class, 'store']);
    Route::get('/listAssumsition/{id}/delete', [listAssumsitionController::class, 'destroy']);
    Route::get('/listAssumsition/{id}/edit', [listAssumsitionController::class, 'show']);
    Route::post('/listAssumsition/{id}/update', [listAssumsitionController::class, 'update']);

    //PLANNING => RESOURCES
    Route::get('/resources', [ResourcesController::class, 'index']);
    Route::get('/resources/add', [ResourcesController::class, 'create']);
    Route::post('/resources/save', [ResourcesController::class, 'store']);
    Route::get('/resources/{id}/delete', [ResourcesController::class, 'destroy']);
    Route::get('/resources/{id}/edit', [ResourcesController::class, 'show']);
    Route::post('/resources/{id}/update', [ResourcesController::class, 'update']);

    //PLANNING => STAKEHOLDER
    Route::get('/stakeholder', [StakeholderController::class, 'index']);
    Route::get('/stakeholder/add', [StakeholderController::class, 'create']);
    Route::post('/stakeholder/save', [StakeholderController::class, 'store']);
    Route::get('/stakeholder/{id}/delete', [StakeholderController::class, 'destroy']);
    Route::get('/stakeholder/{id}/edit', [StakeholderController::class, 'show']);
    Route::post('/stakeholder/{id}/update', [StakeholderController::class, 'update']);

    //PLANNING => QUALITY
    Route::get('/quality', [QualityController::class, 'index']);
    Route::get('/quality/add', [QualityController::class, 'create']);
    Route::post('/quality/save', [QualityController::class, 'store']);
    Route::get('/quality/{id}/delete', [QualityController::class, 'destroy']);
    Route::get('/quality/{id}/edit', [QualityController::class, 'show']);
    Route::post('/quality/{id}/update', [QualityController::class, 'update']);

    //PLANNING => PROCUREMENT
    Route::get('/procurement', [ProcurementController::class, 'index']);

    Route::get('/costContractValue/add', [CostContractValueController::class, 'create']);
    Route::post('/costContractValue/save', [CostContractValueController::class, 'store']);
    Route::get('/costContractValue/{id}/delete', [CostContractValueController::class, 'destroy']);
    Route::get('/costContractValue/{id}/edit', [CostContractValueController::class, 'show']);
    Route::post('/costContractValue/{id}/update', [CostContractValueController::class, 'update']);

    // PLANNING => PROCUREMENT => BEBAN BAHAN
    Route::get('/bebanbarang', [BebanBarangController::class, 'index']);
    Route::get('/bebanbarang/add', [BebanBarangController::class, 'create']);
    Route::post('/bebanbarang/save', [BebanBarangController::class, 'store']);
    Route::get('/bebanbarang/{id}/delete', [BebanBarangController::class, 'destroy']);
    Route::get('/bebanbarang/{id}/edit', [BebanBarangController::class, 'show']);
    Route::post('/bebanbarang/{id}/update', [BebanBarangController::class, 'update']);

    //PLANNING => PROCUREMENT => BEBAN SUBKON
    Route::get('/bebansubkon', [BebanSubkonController::class, 'index']);
    Route::get('/bebansubkon/add', [BebanSubkonController::class, 'create']);
    Route::post('/bebansubkon/save', [BebanSubkonController::class, 'store']);
    Route::get('/bebansubkon/{id}/delete', [BebanSubkonController::class, 'destroy']);
    Route::get('/bebansubkon/{id}/edit', [BebanSubkonController::class, 'show']);
    Route::post('/bebansubkon/{id}/update', [BebanSubkonController::class, 'update']);

    //PLANNING => PROCUREMENT => TERM OF PLAN
    Route::get('/termplan', [TermPlanController::class, 'index']);
    Route::get('/termplan/add', [TermPlanController::class, 'create']);
    Route::post('/termplan/save', [TermPlanController::class, 'store']);
    Route::get('/termplan/{id}/delete', [TermPlanController::class, 'destroy']);
    Route::get('/termplan/{id}/edit', [TermPlanController::class, 'show']);
    Route::post('/termplan/{id}/update', [TermPlanController::class, 'update']);

    //PLANNING => PROCUREMENT => QUARANTEE . BOND
    Route::get('/guarantee', [GuaranteeController::class, 'index']);
    Route::get('/guarantee/add', [GuaranteeController::class, 'create']);
    Route::post('/guarantee/save', [GuaranteeController::class, 'store']);
    Route::get('/guarantee/{id}/delete', [GuaranteeController::class, 'destroy']);
    Route::get('/guarantee/{id}/edit', [GuaranteeController::class, 'show']);
    Route::post('/guarantee/{id}/update', [GuaranteeController::class, 'update']);

    //PLANNING => COMMUNICATION
    Route::get('/communication', [CommunicationController::class, 'index',]);

    //PLANNING => COMMUNICATION => REPORTS
    Route::get('/reports', [ReportsController::class, 'index',]);
    Route::get('/reports/add', [ReportsController::class, 'create']);
    Route::post('/reports/save', [ReportsController::class, 'store']);
    Route::get('/reports/{id}/delete', [ReportsController::class, 'destroy']);
    Route::post('/reports/{id}/update', [ReportsController::class, 'update']);
    Route::get('/reports/{id}/edit', [ReportsController::class, 'show']);

    //PLANNING => COMMUNICATION => PRESENTATION
    Route::get('/presentation', [PresentationController::class, 'index',]);
    Route::get('/presentations/add', [PresentationController::class, 'create']);
    Route::post('/presentations/save', [PresentationController::class, 'store']);
    Route::get('/presentations/{id}/delete', [PresentationController::class, 'destroy']);
    Route::post('/presentations/{id}/update', [PresentationController::class, 'update']);
    Route::get('/presentations/{id}/edit', [PresentationController::class, 'show']);

    //PLANNING => COMMUNICATION => .PROJECT ANNOUNCEMENT
    Route::get('/projectAnouncement', [projectAnouncementController::class, 'index',]);
    Route::get('/projectAnouncement/add', [projectAnouncementController::class, 'create']);
    Route::post('/projectAnouncement/save', [projectAnouncementController::class, 'store']);
    Route::get('/projectAnouncement/{id}/delete', [projectAnouncementController::class, 'destroy']);
    Route::post('/projectAnouncement/{id}/update', [projectAnouncementController::class, 'update']);
    Route::get('/projectAnouncement/{id}/edit', [projectAnouncementController::class, 'show']);

    //PLANNING => COMMUNICATION => REVIEW MEETING
    Route::get('/reviewMeeting', [reviewMeetingController::class, 'index',]);
    Route::get('/reviewMeeting/add', [reviewMeetingController::class, 'create']);
    Route::post('/reviewMeeting/save', [reviewMeetingController::class, 'store']);
    Route::get('/reviewMeeting/{id}/delete', [reviewMeetingController::class, 'destroy']);
    Route::post('/reviewMeeting/{id}/update', [reviewMeetingController::class, 'update']);
    Route::get('/reviewMeeting/{id}/edit', [reviewMeetingController::class, 'show']);

    //PLANNING => COMMUNICATION => TEMA MORALE 
    Route::get('/teamMorale', [teamMoraleController::class, 'index',]);
    Route::get('/teamMorale/add', [teamMoraleController::class, 'create']);
    Route::post('/teamMorale/save', [teamMoraleController::class, 'store']);
    Route::get('/teamMorale/{id}/delete', [teamMoraleController::class, 'destroy']);
    Route::post('/teamMorale/{id}/update', [teamMoraleController::class, 'update']);
    Route::get('/teamMorale/{id}/edit', [teamMoraleController::class, 'show']);

    //PLANNING => SCHEDULE   
    Route::get('/schedule', [ScheduleController::class, 'index',]);
    Route::get('/schedule/add', [ScheduleController::class, 'create']);
    Route::post('/schedule/save', [ScheduleController::class, 'store']);
    Route::get('/schedule/{id}/delete', [ScheduleController::class, 'destroy']);
    Route::post('/schedule/{id}/update', [ScheduleController::class, 'update']);
    Route::get('/schedule/{id}/edit', [ScheduleController::class, 'show']);

    Route::get('/finalPlanning', [PlanningProjectDefinitionController::class, 'index']);
    Route::get('/finalPlanning/add', [PlanningProjectDefinitionController::class, 'create']);
    Route::post('/finalPlanning/save', [PlanningProjectDefinitionController::class, 'store']);
    Route::get('/finalPlanning/{id}/delete', [PlanningProjectDefinitionController::class, 'destroy']);
    Route::post('/finalPlanning/{id}/update', [PlanningProjectDefinitionController::class, 'update']);
    Route::get('/finalPlanning/{id}/edit', [PlanningProjectDefinitionController::class, 'show']);

    // EXECUTING
    Route::get('/executing', [ExecutingController::class, 'index']);
    Route::get('/findExecuting', [ExecutingController::class, 'filterExecuting']);

    // EXECUTING => SCOPE
    Route::get('/scopeExecuting', [ExecutingScopeController::class, 'index']);
    Route::get('/scopeExecuting/add', [ExecutingScopeController::class, 'create']);
    Route::post('/scopeExecuting/save', [ExecutingScopeController::class, 'store']);
    Route::get('/scopeExecuting/{id}/delete', [ExecutingScopeController::class, 'destroy']);
    Route::get('/scopeExecuting/{id}/edit', [ExecutingScopeController::class, 'show']);
    Route::post('/scopeExecuting/{id}/update', [ExecutingScopeController::class, 'update']);

    // EXECUTING => SCHEDULE
    Route::get('/scheduleExecuting', [ExecutingScheduleController::class, 'index']);
    Route::get('/scheduleExecuting/add', [ExecutingScheduleController::class, 'create']);
    Route::post('/scheduleExecuting/save', [ExecutingScheduleController::class, 'store']);
    Route::get('/scheduleExecuting/{id}/delete', [ExecutingScheduleController::class, 'destroy']);
    Route::get('/scheduleExecuting/{id}/edit', [ExecutingScheduleController::class, 'show']);
    Route::post('/scheduleExecuting/{id}/update', [ExecutingScheduleController::class, 'update']);

    //EXECUTING => COST
    Route::get('/costExecuting', [CostExecutingController::class, 'index']);
    Route::get('/costExecuting/add', [CostExecutingController::class, 'create']);
    Route::post('/costExecuting/save', [CostExecutingController::class, 'store']);
    Route::get('/costExecuting/{id}/delete', [CostExecutingController::class, 'destroy']);
    Route::get('/costExecuting/{id}/edit', [CostExecutingController::class, 'show']);
    Route::post('/costExecuting/{id}/update', [CostExecutingController::class, 'update']);

    // EXECUTING => QUALITY
    Route::get('/qualityExecuting', [ExecutingQualityController::class, 'index']);
    Route::get('/qualityExecuting/add', [ExecutingQualityController::class, 'create']);
    Route::post('/qualityExecuting/save', [ExecutingQualityController::class, 'store']);
    Route::get('/qualityExecuting/{id}/delete', [ExecutingQualityController::class, 'destroy']);
    Route::get('/qualityExecuting/{id}/edit', [ExecutingQualityController::class, 'show']);
    Route::post('/qualityExecuting/{id}/update', [ExecutingQualityController::class, 'update']);

    Route::get('/resourcesExecuting', [ResourcesExecutingController::class, 'index']);
    Route::get('/resourcesExecuting/add', [ResourcesExecutingController::class, 'create']);
    Route::post('/resourcesExecuting/save', [ResourcesExecutingController::class, 'store']);
    Route::get('/resourcesExecuting/{id}/delete', [ResourcesExecutingController::class, 'destroy']);
    Route::get('/resourcesExecuting/{id}/edit', [ResourcesExecutingController::class, 'show']);
    Route::post('/resourcesExecuting/{id}/update', [ResourcesExecutingController::class, 'update']);

    Route::get('/presentationExecuting', [PresentationExecutingController::class, 'index',]);
    Route::get('/presentationsExecuting/add', [PresentationExecutingController::class, 'create']);
    Route::post('/presentationsExecuting/save', [PresentationExecutingController::class, 'store']);
    Route::get('/presentationsExecuting/{id}/delete', [PresentationExecutingController::class, 'destroy']);
    Route::post('/presentationsExecuting/{id}/update', [PresentationExecutingController::class, 'update']);
    Route::get('/presentationsExecuting/{id}/edit', [PresentationExecutingController::class, 'show']);

    Route::get('/reportsExecuting', [ReportsExecutingController::class, 'index',]);
    Route::get('/reportsExecuting/add', [ReportsExecutingController::class, 'create']);
    Route::post('/reportsExecuting/save', [ReportsExecutingController::class, 'store']);
    Route::get('/reportsExecuting/{id}/delete', [ReportsExecutingController::class, 'destroy']);
    Route::post('/reportsExecuting/{id}/update', [ReportsExecutingController::class, 'update']);
    Route::get('/reportsExecuting/{id}/edit', [ReportsExecutingController::class, 'show']);

    Route::get('/reviewMeetingExecuting', [reviewMeetingExecutingController::class, 'index',]);
    Route::get('/reviewMeetingExecuting/add', [reviewMeetingExecutingController::class, 'create']);
    Route::post('/reviewMeetingExecuting/save', [reviewMeetingExecutingController::class, 'store']);
    Route::get('/reviewMeetingExecuting/{id}/delete', [reviewMeetingExecutingController::class, 'destroy']);
    Route::post('/reviewMeetingExecuting/{id}/update', [reviewMeetingExecutingController::class, 'update']);
    Route::get('/reviewMeetingExecuting/{id}/edit', [reviewMeetingExecutingController::class, 'show']);

    Route::get('/teamMoraleExecuting', [teamMoraleExecutingController::class, 'index',]);
    Route::get('/teamMoraleExecuting/add', [teamMoraleExecutingController::class, 'create']);
    Route::post('/teamMoraleExecuting/save', [teamMoraleExecutingController::class, 'store']);
    Route::get('/teamMoraleExecuting/{id}/delete', [teamMoraleExecutingController::class, 'destroy']);
    Route::post('/teamMoraleExecuting/{id}/update', [teamMoraleExecutingController::class, 'update']);
    Route::get('/teamMoraleExecuting/{id}/edit', [teamMoraleExecutingController::class, 'show']);

    Route::get('/communicationExecuting', [CommunicationExecutingController::class, 'index',]);

    Route::get('/projectAnouncementExecuting', [projectAnouncementExecutingController::class, 'index',]);
    Route::get('/projectAnouncementExecuting/add', [projectAnouncementExecutingController::class, 'create']);
    Route::post('/projectAnouncementExecuting/save', [projectAnouncementExecutingController::class, 'store']);
    Route::get('/projectAnouncementExecuting/{id}/delete', [projectAnouncementExecutingController::class, 'destroy']);
    Route::post('/projectAnouncementExecuting/{id}/update', [projectAnouncementExecutingController::class, 'update']);
    Route::get('/projectAnouncementExecuting/{id}/edit', [projectAnouncementExecutingController::class, 'show']);

    Route::get('/riskExecuting', [RiskExecutingController::class, 'index']);
    Route::get('/riskExecuting/add', [RiskExecutingController::class, 'create']);
    Route::post('/riskExecuting/save', [RiskExecutingController::class, 'store']);
    Route::get('/riskExecuting/{id}/delete', [RiskExecutingController::class, 'destroy']);
    Route::get('/riskExecuting/{id}/edit', [RiskExecutingController::class, 'show']);
    Route::post('/riskExecuting/{id}/update', [RiskExecutingController::class, 'update']);

    // EXECUTING => STAKEHOLDER
    Route::get('/stakeholderExecuting', [ExecutingStakeholderController::class, 'index']);
    Route::get('/stakeholderExecuting/add', [ExecutingStakeholderController::class, 'create']);
    Route::post('/stakeholderExecuting/save', [ExecutingStakeholderController::class, 'store']);
    Route::get('/stakeholderExecuting/{id}/delete', [ExecutingStakeholderController::class, 'destroy']);
    Route::get('/stakeholderExecuting/{id}/edit', [ExecutingStakeholderController::class, 'show']);
    Route::post('/stakeholderExecuting/{id}/update', [ExecutingStakeholderController::class, 'update']);

    //EXECUTING => PROCUREMENT
    Route::get('/procurementExecuting', [ProcurementExecutingController::class, 'index']);
    Route::get('/procurementExecuting/add', [ProcurementExecutingController::class, 'create']);
    Route::post('/procurementExecuting/save', [ProcurementExecutingController::class, 'store']);
    Route::get('/procurementExecuting/{id}/delete', [ProcurementExecutingController::class, 'destroy']);
    Route::get('/procurementExecuting/{id}/edit', [ProcurementExecutingController::class, 'show']);
    Route::post('/procurementExecuting/{id}/update', [ProcurementExecutingController::class, 'update']);

    // EXECUTING => PROCUREMENT => BEBAN BARANG
    Route::get('/bebanbahanExecuting', [BebanBahanExecutingController::class, 'index']);
    Route::get('/bebanbahanExecuting/add', [BebanBahanExecutingController::class, 'create']);
    Route::post('/bebanbahanExecuting/save', [BebanBahanExecutingController::class, 'store']);
    Route::get('/bebanbahanExecuting/{id}/delete', [BebanBahanExecutingController::class, 'destroy']);
    Route::get('/bebanbahanExecuting/{id}/edit', [BebanBahanExecutingController::class, 'show']);
    Route::post('/bebanbahanExecuting/{id}/update', [BebanBahanExecutingController::class, 'update']);

    //beban subkon
    Route::get('/bebansubkonExecuting', [BebanSubkonExecutingController::class, 'index']);
    Route::get('/bebansubkonExecuting/add', [BebanSubkonExecutingController::class, 'create']);
    Route::post('/bebansubkonExecuting/save', [BebanSubkonExecutingController::class, 'store']);
    Route::get('/bebansubkonExecuting/{id}/delete', [BebanSubkonExecutingController::class, 'destroy']);
    Route::get('/bebansubkonExecuting/{id}/edit', [BebanSubkonExecutingController::class, 'show']);
    Route::post('/bebansubkonExecuting/{id}/update', [BebanSubkonExecutingController::class, 'update']);

    // tagihan
    Route::get('/tagihanExecuting', [TagihanExecutingController::class, 'index']);
    Route::get('/tagihanExecuting/add', [TagihanExecutingController::class, 'create']);
    Route::post('/tagihanExecuting/save', [TagihanExecutingController::class, 'store']);
    Route::get('/tagihanExecuting/{id}/delete', [TagihanExecutingController::class, 'destroy']);
    Route::get('/tagihanExecuting/{id}/edit', [TagihanExecutingController::class, 'show']);
    Route::post('/tagihanExecuting/{id}/update', [TagihanExecutingController::class, 'update']);

    //project Income Statement Executing
    Route::get('/projectIncomeStatement', [ProjectIncomeStatementController::class, 'index']);
    Route::get('/projectIncomeStatement/add', [ProjectIncomeStatementController::class, 'create']);
    Route::post('/projectIncomeStatement/save', [ProjectIncomeStatementController::class, 'store']);
    Route::get('/projectIncomeStatement/{id}/delete', [ProjectIncomeStatementController::class, 'destroy']);
    Route::get('/projectIncomeStatement/{id}/edit', [ProjectIncomeStatementController::class, 'show']);
    Route::post('/projectIncomeStatement/{id}/update', [ProjectIncomeStatementController::class, 'update']);

    //term of payment Executing
    Route::get('/termOfPayment', [TermOfPaymentExecuting::class, 'index']);
    Route::get('/termOfPayment/add', [TermOfPaymentExecuting::class, 'create']);
    Route::post('/termOfPayment/save', [TermOfPaymentExecuting::class, 'store']);
    Route::get('/termOfPayment/{id}/delete', [TermOfPaymentExecuting::class, 'destroy']);
    Route::get('/termOfPayment/{id}/edit', [TermOfPaymentExecuting::class, 'show']);
    Route::post('/termOfPayment/{id}/update', [TermOfPaymentExecuting::class, 'update']);

    //control and monitoring
    Route::get('/controlAndMonitoring', [ControlMonitoringController::class, 'index']);
    Route::get('/domesticVendorPayments/add', function () {
        return view('control.costMonitoring.domesticVendorPayments');
    });
    Route::get('/overseasVendorPayment/add', function () {
        return view('control.costMonitoring.overseasVendorPayments');
    });
    Route::get('/cash/add', function () {
        return view('control.costMonitoring.cash');
    });



    Route::get('/closing', [ClosingController::class, 'index']);

    Route::get('/dashboard', function () {
        return view('home.dashboard');
    });

    Route::get('/report', [ReportController::class, 'index']);
    Route::get('/report-pdf', [ReportController::class, 'getDataFromURL'])->name('print.pdf');
    Route::get('/report-pdfall', [ReportController::class, 'printPDF'])->name('printall.pdf');
    Route::get('/report', [ReportController::class, 'filter']);

    Route::get('/human', function () {
        return view('human');
    });

    Route::get('/supply', function () {
        return view('supply');
    });

    Route::get('/finance', function () {
        return view('finance');
    });

    Route::get('/bussines', function () {
        return view('bussines');
    });




    Route::get('/logout', [LoginController::class, 'logout']);
});
