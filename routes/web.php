    <?php

    use App\Http\Controllers\Admin\LoginController;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Admin\HomeController;
    use App\Http\Controllers\Admin\CategoryController;
    use App\Http\Controllers\Admin\ProductController;
    use App\Http\Controllers\FrontendController;

    Route::prefix('admin')->group(function () {
        Route::get('home', [HomeController::class, 'getHome']);
    });
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

    Route::get('/', [FrontendController::class, 'getHome'])->name('home');
    Route::get('search', [FrontendController::class, 'getSearch']);
    Route::get('/loginUser', [FrontendController::class, 'Login'])->name('login');
    Route::post('/loginUser', [FrontendController::class, 'postLogin']);
    Route::get('/signUp', [FrontendController::class, 'signUp'])->name('signUp');
    Route::post('/signUp', [FrontendController::class, 'postsignUp']);
    Route::get('/Logout', [FrontendController::class, 'Logout'])->name('logout');
    Route::get('/verifyAccount/{email}', [FrontendController::class, 'verify'])->name('verify');
    Route::get('/detail/{id}/{slug}.html', [FrontendController::class, 'getDetail']);
    Route::post('/detail/{id}/{slug}.html', [FrontendController::class, 'postComment']);
    Route::get('/category/{id}/{slug}.html', [FrontendController::class, 'getCategory']);

    Route::group(['namespace' => 'Admin'], function () {
        Route::prefix('login')->middleware('CheckLogedIn')->group(function () {
            Route::get('/', [LoginController::class, 'getLogin'])->name('login.get');
            Route::post('/', [LoginController::class, 'postLogin'])->name('login.post');
        });
        Route::get('logout', [HomeController::class, 'getLogout']);
        Route::prefix('admin')->middleware('CheckLogedOut')->group(function () {
            Route::get('home', [HomeController::class, 'getHome']);

            Route::prefix('category')->group(function () {
                Route::get('/', [CategoryController::class, 'getCate']);
                Route::post('/', [CategoryController::class, 'postCate']);

                Route::get('edit/{id}', [CategoryController::class, 'getEditCate'])->name('admin.category.edit');
                Route::post('edit/{id}', [CategoryController::class, 'postEditCate'])->name('admin.category.edit');
                Route::get('delete/{id}', [CategoryController::class, 'getDeleteCate'])->name('admin.category.delete');
            });

            Route::prefix('product')->group(function () {
                Route::get('/', [ProductController::class, 'getProduct']);
                Route::get('add', [ProductController::class, 'getAddProduct']);
                Route::post('add', [ProductController::class, 'postAddProduct']);

                Route::get('edit/{id}', [ProductController::class, 'getEditProduct'])->name('admin.product.edit');
                Route::post('edit/{id}', [ProductController::class, 'postEditProduct'])->name('admin.product.edit');
                Route::get('delete/{id}', [ProductController::class, 'getDeleteProduct'])->name('admin.product.delete');
            });
        });
    });
