<?php

use App\Http\Controllers\Account\AccountController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Role;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\admin\CuponController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ShippingController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\frontendcontroller\FrontendController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();



Route::get('/',[FrontendController::class,'index'])->name('index');

 Route::group(['middleware' => 'auth'], function () {

    
    Route::get('/shop',[FrontendController::class,'shop'])->name('shop');

    Route::get('/shop2/{categoryslug?}/{subcategoryslug?}',[FrontendController::class,'categoryfilter'])->name('categoryfilter');

    // Route::get('/lowprice',[FrontendController::class,'lowprice'])->name('lowprice');


    Route::get('/singleproduct/{slug}',[FrontendController::class,'singleproduct'])->name('singleproduct');


    Route::get('/relatedproduct',[FrontendController::class,'relatedproduct'])->name('relatedproduct');


    // CARD CONTROLLER
    Route::get('/card',[CardController::class,'card'])->name('card');
    Route::post('/add-to-card',[CardController::class,'addtocard'])->name('addtocard');
    Route::post('/card-update',[CardController::class,'cardupdate'])->name('cardupdate');
    Route::post('/card-delete',[CardController::class,'carddelet'])->name('carddelet');


    

       // CARD CONTROLLER END


       Route::get('/payment1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
       Route::get('/payment2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

       Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
       Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax'])->name('pay-via-ajax');

       Route::post('/success', [SslCommerzPaymentController::class, 'success']);
       Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
       Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

       Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
       //SSLCOMMERZ END


       Route::get('/chackout',[CardController::class,'chackout'])->name('chackout');
       Route::post('/procesto-chack-out',[CardController::class,'process'])->name('process');

    


   
});





// ADMIN ROLE
// Route::get('/deshbord', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::group(['middleware' => ['role:admin']], function () { 

    Route::prefix('/admin')->controller(HomeController::class)->group(function(){
        Route::get('/deshbord', 'index')->name('ome');
        Route::get('/deshbord/categorypage', 'addcategorypage')->name('admin.categorypage');
        


    });

    Route::prefix('/admin')->controller(AdminController::class)->name('admin.')->group(function(){
       
        Route::get('/deshbord/categorypage', 'addcategorypage')->name('categorypage');
        Route::post('/deshbord/store','store')->name('store');
        Route::get('/allcategory','allcategory')->name('allcategory');
        Route::get('/status','status')->name('status');

        Route::get('/updatepage/{id}','updatepage')->name('updatepage');

        Route::put('/update/{id}','update')->name('update');
        Route::delete('/delete/{id}','delete')->name('delete');



    });


    Route::prefix('/admin')->controller(SubCategoryController::class)->name('admin.')->group(function(){
       

        // SUBCATEGORY ROUTE

        Route::get('allsubcategory','allsubcategory')->name('allsubcategory');

        Route::get('/addsubcategory','addsubcategory')->name('addsubcategory');
        Route::post('/subcategory/store','subcategorystore')->name('subcategorystore');



    });






    // BRAND
    Route::prefix('/admin')->controller(BrandController::class)->name('admin.')->group(function(){
       

        //  BRAND ROUTE

        Route::get('/brand','brand')->name('brand');
        Route::get('/createebrand','createbrand')->name('createbrand');

            // CATEGORY AJAX
            Route::get('subcategoryselect','subcategoryselect')->name('subcategoryselect');
            

            // STORE BRAND
            Route::post('subcategoristore','brandstore')->name('subcategoristore');


    });



    // PRODUCT ADD

    Route::prefix('/admin')->controller(ProductController::class)->name('admin.')->group(function(){
       

        //  PRODUCT ROUTE

        Route::get('/allpeoduct','allproduct')->name('allproduct');
        Route::get('/create/peoduct','createproduct')->name('createproduct');
        // STOTE PRODUCR
        Route::post('/store/peoduct','storeproduct')->name('storeproduct');

        
        // AJAX FOR CATEGORY

        Route::get('productsubcategory','productsubcategory')->name('subcategoryproduct');


    });


// CUPPON ADD ROUTE

    Route::prefix('/admin')->controller(CuponController::class)->name('admin.')->group(function(){
       

        //  PRODUCT ROUTE
        
        Route::get('/show-all-cuponn','index')->name('cupon.showas');
        Route::get('/add-cuponn','addcupon')->name('add.cupon');
        Route::post('/cupon-create','store')->name('store.cupon');
       
        


        // STOTE PRODUCR
        // Route::post('/store/peoduct','storeproduct')->name('storeproduct');

        
        // // AJAX FOR CATEGORY

        // Route::get('productsubcategory','productsubcategory')->name('subcategoryproduct');


    });

    Route::prefix('/admin')->controller(ShippingController::class)->name('admin.')->group(function(){
       

        //  Shipping ROUTE
        
        Route::get('/show-all-shipping','allShipping')->name('show-all-shipping');
        Route::get('/create-shipping','createShipping')->name('create-shipping');
        Route::post('/add-shipping','AddShiping')->name('add-shipping');
        Route::get('/shipping-charge','shippingCharge')->name('shipping-charge');
        
         // CUPPON APPLAY ROUTE


         Route::get('/cupon-appaly','CupponApplay')->name('cupon-appaly');

      


    });



        // USER ACCOUNT
        


        Route::group(['middleware' => 'auth'], function () { 

            Route::prefix('/user')->controller(AccountController::class)->name('user.')->group(function(){

            Route::get('/order','order')->name('account');
            Route::get('/profile','profile')->name('profile');
            Route::get('/wishlist','wishlist')->name('wishlist');
            Route::get('/changepassword','changepassword')->name('changepassword');





            });


        });

 



  

});


 //  USER ROUTE
 










