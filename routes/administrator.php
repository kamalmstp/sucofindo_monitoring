<?php

use App\Http\Controllers\Administrator\AssessmentComponentController;
use App\Http\Controllers\Administrator\AssessmentScheduleController;
use App\Http\Controllers\Administrator\BahanBakarController;
use App\Http\Controllers\Administrator\ExportController;
use App\Http\Controllers\Administrator\ThesisRequirementController;
use App\Http\Controllers\Administrator\UserController;
use App\Http\Controllers\HomeController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Administrator\FacultyController;
use App\Http\Controllers\Administrator\ImportController;
use App\Http\Controllers\Administrator\LecturerController;
use App\Http\Controllers\Administrator\PengirimanController;
use App\Http\Controllers\Administrator\WeightController;
use App\Http\Controllers\Administrator\WeightListController;
use App\Http\Controllers\Administrator\BargesController;
use App\Http\Controllers\Administrator\BargesListController;
use App\Http\Controllers\Administrator\ScienceFieldController;
use App\Http\Controllers\Administrator\StudentController;
use App\Http\Controllers\Administrator\StudyProgramController;
use App\Http\Controllers\Administrator\SubmissionThesisRequirementController;
use App\Models\Pengiriman;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Administrator\ReportController;
use App\Http\Controllers\Administrator\BriefingController;

Route::middleware('role:' . User::ADMINISTRATOR)
    ->prefix('administrator')
    ->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('administrator.index');

        //DATA MASTER
        Route::group([
            'prefix' => 'master',
        ], function () {
            Route::resource('faculties', FacultyController::class)->except(['create', 'edit', 'show']);
            Route::resource('study-programs', StudyProgramController::class)->except(['create', 'edit', 'show']);

            Route::get('lecturers/import', [ImportController::class, 'getImportLecturer'])->name('lecturers.import');
            Route::post('lecturers/import', [ImportController::class, 'processImportLecturer'])->name('lecturers.import');
            Route::get('lecturers/export', [ExportController::class, 'lecturer'])->name('lecturers.export');
            Route::resource('lecturers', LecturerController::class);

            Route::resource('pengiriman', PengirimanController::class);
            Route::resource('bahanbakar', BahanBakarController::class);
            Route::resource('weight', WeightController::class);
            Route::resource('barges', BargesController::class);
            Route::resource('briefing', BriefingController::class);

            Route::post('briefing/add_peg', [BriefingController::class, 'store_pegawai'])->name('briefing.store_pegawai');
            Route::delete('briefing/detail/{id}', [BriefingController::class, 'del_pegawai'])->name('briefing.del_pegawai');
            Route::get('briefing/cetak/{id}', [BriefingController::class, 'cetak']);
            
            Route::get('weight/list/{id}', [WeightController::class, 'list'])->name('weight.list');
            Route::post('weight/list/{id}', [WeightController::class, 'list_save'])->name('weight.list');
            Route::put('weight/list/{id}', [WeightController::class, 'list_update'])->name('weight.list');
            Route::delete('weight/list_del/{id}', [WeightController::class, 'list_del'])->name('weight.list_del');
            Route::get('weight-cetak/{id}', [WeightController::class, 'cetak']);

            Route::get('barges/list/{id}', [BargesController::class, 'list'])->name('barges.list');
            // Route::get('barges/list/create/{id}', [BargesController::class, 'list_create'])->name('barges.list_create');
            Route::post('barges/list/{id}', [BargesController::class, 'list_save'])->name('barges.list');
            Route::get('barges/list/{id}/edit', [BargesController::class, 'list_edit'])->name('barges.list_edit');
            Route::put('barges/list/{id}', [BargesController::class, 'list_update'])->name('barges.list');
            Route::delete('barges/list_del/{id}', [BargesController::class, 'list_del'])->name('barges.list_del');
            Route::get('barges-cetak/{id}', [BargesController::class, 'cetak']);

            Route::get('test-cetak', [TestController::class, 'cetak']);

            Route::get('report/weight', [ReportController::class, 'weight'])->name('report.weight');
            Route::get('report/weight/cetak/{id}', [ReportController::class, 'weight_cetak']);
            // Route::get('report/barges', [BargesController::class, 'report'])->name('report.barges');

            Route::get('students/import', [ImportController::class, 'getImportStudent'])->name('students.import');
            Route::post('students/import', [ImportController::class, 'processImportStudent'])->name('students.import');
            Route::resource('students', StudentController::class);

            Route::get('science-fields/import', [ImportController::class, 'getImportScienceField'])->name('science-fields.import');
            Route::post('science-fields/import', [ImportController::class, 'processImportScienceField'])->name('science-fields.import');
            Route::resource('science-fields', ScienceFieldController::class)->except(['create', 'edit', 'show']);
        });

        //DATA SKRIPSI
        Route::get('/thesis-requirements/submission/{id}', [
            SubmissionThesisRequirementController::class, 'show'
        ])->name('thesis-requirement.submission.show');

        Route::post('/thesis-requirements/submit-response/{id}', [
            SubmissionThesisRequirementController::class, 'submitResponse'
        ])->name('thesis-requirement.submit-response');

        Route::resource('thesis-requirements', ThesisRequirementController::class);

        //PENJADWALAN
        Route::prefix('assessment-schedules')
            ->name('assessment-schedules.')
            ->group(function () {
                Route::get('create', [AssessmentScheduleController::class, 'create'])->name('create');
                Route::get('/{type?}', [AssessmentScheduleController::class, 'index'])->name('index');
                Route::post('/', [AssessmentScheduleController::class, 'store'])->name('store');
                Route::get('{schedule}', [AssessmentScheduleController::class, 'show'])->name('show');
                Route::get('{schedule}/edit', [AssessmentScheduleController::class, 'edit'])->name('edit');
                Route::put('{schedule}', [AssessmentScheduleController::class, 'update'])->name('update');
                Route::delete('{schedule}', [AssessmentScheduleController::class, 'destroy'])->name('delete');
            });
//        Route::resource('assessment-schedules', AssessmentScheduleController::class)
//        ->except('index');


        Route::resource('assessment-components', AssessmentComponentController::class);

        Route::resource('users', UserController::class);
    });
