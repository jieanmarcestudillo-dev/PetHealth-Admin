<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;

Route::get('/', [adminController::class,'login'])->name('login');

// LOGIN FUNCTION
    Route::post('loginFunction', [adminController::class,'loginFunction']);
// LOGIN FUNCTION

// LOGOUT FUNCTION
    Route::post('logoutFunction', [adminController::class,'logoutFunction']);
// LOGOUT FUNCTION

// ROUTING
    Route::middleware(['auth:adminModel'])->group(function () {
        Route::get('adminDashboardRoutes', [AdminController::class,'adminDashboardRoutes'])->name('adminDashboardRoutes');
        Route::get('adminClientRoutes', [AdminController::class,'adminClientRoutes'])->name('adminClientRoutes');
        Route::get('adminReportRoutes', [AdminController::class,'adminReportRoutes'])->name('adminReportRoutes');
        Route::get('adminPendingRoutes', [AdminController::class,'adminPendingRoutes'])->name('adminPendingRoutes');
        Route::get('adminManageAccount', [AdminController::class,'adminManageAccount'])->name('adminManageAccount');
        Route::get('getAllReports', [AdminController::class,'getAllReports']);
        Route::get('vaccinationReports', [AdminController::class,'vaccinationReports']);
        Route::get('dewormingReports', [AdminController::class,'dewormingReports']);
        Route::get('heartWormReports', [AdminController::class,'heartWormReports']);
        Route::get('groomingReports', [AdminController::class,'groomingReports']);
        Route::get('otherReports', [AdminController::class,'otherReports']);
        Route::get('adminRequestRoutes', [AdminController::class,'adminRequestRoutes'])->name('adminRequestRoutes');
        Route::get('adminCancelAppointment', [AdminController::class,'adminCancelAppointment']);
        Route::get('adminAcceptAppointment', [AdminController::class,'adminAcceptAppointment']);
        Route::get('adminCompleteAppointment', [AdminController::class,'adminCompleteAppointment']);
        Route::get('adminOwnersPet', [AdminController::class,'adminOwnersPet']);
    });
// ROUTING

// FUNCTION
    // GET
        Route::get('getAllReportsFunction', [AdminController::class,'getAllReports']);
        Route::get('getAllVaccinationReportsFunction', [AdminController::class,'getAllVaccinationReportsFunction']);
        Route::get('getAllDewormingReportsFunction', [AdminController::class,'getAllDewormingReportsFunction']);
        Route::get('getAllHeartWormReportsFunction', [AdminController::class,'getAllHeartWormReportsFunction']);
        Route::get('getAllGroomingReportsFunction', [AdminController::class,'getAllGroomingReportsFunction']);
        Route::get('getAllOtherReportsFunction', [AdminController::class,'getAllOtherReportsFunction']);
        Route::get('getAllClientFunction', [AdminController::class,'getAllClientFunction']);
        Route::get('getAllPetFunction', [AdminController::class,'getAllPetFunction']);
        Route::get('allPendingAppointmentFunction', [AdminController::class,'allPendingAppointmentFunction']);
        Route::get('allCancelAppointmentFunction', [AdminController::class,'allCancelAppointmentFunction']);
        Route::get('allAcceptAppointmentFunction', [AdminController::class,'allAcceptAppointmentFunction']);
        Route::get('allCompleteAppointmentFunction', [AdminController::class,'allCompleteAppointmentFunction']);
        Route::get('totalCompletedAppointment', [AdminController::class,'totalCompletedAppointment']);
        Route::get('totalClientRegistered', [AdminController::class,'totalClientRegistered']);
        Route::get('totalPendingAppointment', [AdminController::class,'totalPendingAppointment']);
        Route::get('totalAcceptAppointment', [AdminController::class,'totalAcceptAppointment']);
        Route::get('visualization', [AdminController::class,'visualization']);
        Route::get('mostCommonType', [AdminController::class,'mostCommonType']);
        Route::get('mostCommonTypeBreed', [AdminController::class,'mostCommonTypeBreed']);
        Route::get('printDailyReports', [AdminController::class,'printDailyReports']);
        Route::get('printWeeklyReports', [AdminController::class,'printWeeklyReports']);
        Route::get('printMonthlyReports', [AdminController::class,'printMonthlyReports']);
        Route::get('printYearlyReports', [AdminController::class,'printYearlyReports']);
        Route::get('printAppointment/{id}', [AdminController::class,'printAppointment']);
        Route::get('printClientInfo/{id}', [AdminController::class,'printClientInfo']);
        Route::get('viewClient', [AdminController::class,'viewClient']);
        Route::get('viewPet', [AdminController::class,'viewPet']);
        Route::get('petMedicalHistory', [AdminController::class,'petMedicalHistory']);
        Route::get('ownerPet', [AdminController::class,'ownerPet']);
    // GET

    // POST
        Route::post('acceptAppointment', [AdminController::class,'acceptAppointment']);
        Route::post('cancelAppointment', [AdminController::class,'cancelAppointment']);
        Route::post('printMonthlyReports', [AdminController::class,'printMonthlyReports']);
        Route::post('printYearlyReports', [AdminController::class,'printYearlyReports']);
        Route::post('submitCompletionAppFunction', [AdminController::class,'submitCompletionAppFunction']);
        Route::post('submitNewAppointment', [AdminController::class,'submitNewAppointment']);
    // POST
// FUNCTION
