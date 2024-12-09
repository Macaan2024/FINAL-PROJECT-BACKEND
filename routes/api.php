    <?php
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\UserController;
    use App\Http\Controllers\LoginController;
    use App\Http\Controllers\SubjectController;
    use App\Http\Controllers\EnrollmentController;
    use App\Http\Controllers\GradeController;
    use App\Http\Controllers\FeedbacksController;

    Route::post('/register', [UserController::class, 'register']);
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/logout', [LoginController::class, 'show']);


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
    Route::post('/enrollment', [EnrollmentController::class, 'store']);
    Route::get('/enrollment', [EnrollmentController::class, 'index']);
    Route::get('/enrollment/{id}', [EnrollmentController::class, 'show']);
    Route::put('/enrollment/{id}', [EnrollmentController::class, 'update']);
    Route::delete('/enrollment/{id}', [EnrollmentController::class, 'destroy']);

    // CRUD GRADES
    Route::get('/grade', [GradeController::class, 'index']);
    Route::post('/grade', [GradeController::class, 'store']);
    Route::get('/grade/{id}', [GradeController ::class, 'show']);
    Route::put('/grade/{id}', [GradeController::class, 'update']);
    Route::get('/grade/{id}', [GradeController::class, 'destory']);

    // CRUD FEEDBACKS
    Route::post('/feedbacks', [FeedbacksController::class, 'store']);
    Route::get('/feedbacks', [FeedbacksController::class, 'index']);
    Route::get('/feedbacks/{id}', [FeedbacksController::class, 'show']);
    Route::put('/feedbacks/{id}', [FeedbacksController::class, 'update']);
    Route::get('/feedbacks/{id}', [FeedbacksController::class, 'destory']);

    

