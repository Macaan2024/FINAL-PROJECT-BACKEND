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
    Route::post('/role', [RolesController::class, 'store']);
    Route::get('/role', [RolesController::class, 'index']);
    Route::get('/role/{id}', [RolesController::class, 'show']);
    Route::put('/update-role/{id}', [RolesController::class, 'update']);
    Route::delete('/role/{id}', [RolesController::class, 'destroy']);


    //User Crud
    Route::post('/user', [UserController::class, 'store']);
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/user/{id}', [UserController::class, 'show']);
    Route::put('/user/{id}', [UserController::class, 'update']);
    Route::delete('/user/{id}', [UserController::class, 'destroy']);


    // CRUD SUBJECT
    Route::post('/subject', [SubjectController::class, 'store']);
    Route::get('/subject', [SubjectController::class, 'index']);
    Route::get('/subject/{id}', [SubjectController::class, 'show']);
    Route::put('/subject/{id}', [SubjectController::class, 'update']);
    Route::delete('/subject/{id}', [SubjectController::class, 'destroy']);  

    //Enrollment
    Route::post('/add-enrollment', [EnrollmentController::class, 'store']);
    Route::get('/index-enrollment/{id}', [EnrollmentController::class, 'index']);
    Route::get('/show-enrollment/{id}', [EnrollmentController::class, 'show']);
    Route::put('/enrollment/{id}', [EnrollmentController::class, 'update']);
    Route::delete('/enrollment/{id}', [EnrollmentController::class, 'destroy']);

    //Period 
    Route::get('/period', [PeriodController::class, 'index']);
    Route::post('/period', [PeriodController::class, 'store']);
    Route::get('/period/{id}', [PeriodController ::class, 'show']);
    Route::put('/period/{id}', [PeriodController::class, 'update']);
    Route::get('/period/{id}', [PeriodController::class, 'destory']);

    // CRUD GRADES
    Route::get('/grade', [GradeController::class, 'index']);
    Route::post('/grade', [GradeController::class, 'store']);
    Route::get('/grade/{id}', [GradeController ::class, 'show']);
    Route::put('/grade/{id}', [GradeController::class, 'update']);
    Route::get('/grade/{id}', [GradeController::class, 'destory']);
    
    Route::get('/getGPA/{id}', [GradeController::class, 'getGPA']);
    Route::get('/grade/{id}/{period_id}', [GradeController::class, 'fetchGrade']);
    
    // Route::get('/grade/{id}/{userId}/1', [GradeController::class, 'prelim']);
    // Route::get('/grade/{id}/{userId}/2', [GradeController::class, 'midterm']);
    // Route::get('/grade/{id}/{userId}/3', [GradeController::class, 'semifinal']);
    // Route::get('/grade/{id}/{userId}/4', [GradeController::class, 'final']);




    // CRUD FEEDBACKS
    Route::post('/feedbacks', [FeedbacksController::class, 'store']);
    Route::get('/feedbacks', [FeedbacksController::class, 'index']);
    Route::get('/feedbacks/{id}', [FeedbacksController::class, 'show']);
    Route::put('/feedbacks/{id}', [FeedbacksController::class, 'update']);
    Route::get('/feedbacks/{id}', [FeedbacksController::class, 'destory']);

    

