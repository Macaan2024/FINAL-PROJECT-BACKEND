    <?php
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\UserController;
    use App\Http\Controllers\LoginController;
    use App\Http\Controllers\SubjectController;
    use App\Http\Controllers\EnrollmentController;
    use App\Http\Controllers\GradeController;
    use App\Http\Controllers\FeedbacksController;
    use App\Http\Controllers\RolesController;
    use App\Http\Controllers\PeriodController;

    Route::post('/register', [LoginController::class, 'register']);
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/logout', [LoginController::class, 'show']);

    //Teacher Crud
    Route::post('/add-role', [RolesController::class, 'store']);
    Route::get('/index-role', [RolesController::class, 'index']);
    Route::get('/show-role/{id}', [RolesController::class, 'show']);
    Route::put('/update-role/{id}', [RolesController::class, 'update']);
    Route::delete('/delete-role/{id}', [RolesController::class, 'destroy']);

    //User Crud
    Route::post('/add-user', [UserController::class, 'store']);
    Route::get('/index-user', [UserController::class, 'index']);
    Route::get('/profile-user/{id}', [UserController::class, 'profile']);
    Route::put('/update-user/{id}', [UserController::class, 'update']);
    Route::delete('/delete-user/{id}', [UserController::class, 'destroy']);
    Route::get('/show-user/{id}', [UserController::class, 'show']);

    // CRUD SUBJECT
    Route::post('/add-subject', [SubjectController::class, 'store']);
    Route::get('/index-subject', [SubjectController::class, 'index']);
    Route::get('/fetch-subject', [SubjectController::class, 'fetchSubjects']);
    Route::get('/show-subject/{id}', [SubjectController::class, 'show']);
    Route::put('/update-subject/{id}', [SubjectController::class, 'update']);
    Route::delete('delete-/subject/{id}', [SubjectController::class, 'destroy']);  

    //Enrollment
    Route::post('/add-enrollment', [EnrollmentController::class, 'store']);
    Route::get('/index-enrollment/{id}', [EnrollmentController::class, 'index']);
    Route::get('/show-enrollment/{id}', [EnrollmentController::class, 'show']);
    Route::put('/update-enrollment/{id}', [EnrollmentController::class, 'update']);
    Route::delete('/delete-enrollment/{id}', [EnrollmentController::class, 'destroy']);

    //Period 
    Route::get('/index-period', [PeriodController::class, 'index']);
    Route::post('/add-period', [PeriodController::class, 'store']);
    Route::get('/show-period/{id}', [PeriodController ::class, 'show']);
    Route::put('/update-period/{id}', [PeriodController::class, 'update']);
    Route::delete('/delete-period/{id}', [PeriodController::class, 'destory']);

    // CRUD GRADES
    Route::post('/add-grade', [GradeController::class, 'store']);
    Route::get('/show-grade/{id}', [GradeController ::class, 'show']);
    Route::put('/update-grade/{id}', [GradeController::class, 'update']);
    Route::delete('/delete-grade/{id}', [GradeController::class, 'destory']);
    
    Route::get('/getGPA/{id}', [GradeController::class, 'getGPA']);
    Route::get('/grade/{id}/{period_id}', [GradeController::class, 'fetchGrade']);
    
    // CRUD FEEDBACKS
    Route::post('/add-feedbacks', [FeedbacksController::class, 'store']);
    Route::get('/index-feedbacks', [FeedbacksController::class, 'index']);
    Route::get('/show-feedbacks/{id}', [FeedbacksController::class, 'show']);
    Route::put('/update-feedbacks/{id}', [FeedbacksController::class, 'update']);
    Route::get('/delete-feedbacks/{id}', [FeedbacksController::class, 'destory']);

    

