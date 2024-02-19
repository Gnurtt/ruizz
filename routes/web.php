<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'Customer\DisplayController@index')->name('customer.view.index');
Route::get('product/{slug}', 'Customer\DisplayController@product')->name('customer.view.product'); 
Route::get('category', 'Customer\DisplayController@category')->name('customer.view.category'); 
Route::get('about', 'Customer\DisplayController@about')->name('customer.view.about'); 
Route::get('cart', 'Customer\DisplayController@cart')->name('customer.view.cart'); 
Route::get('checkout', 'Customer\DisplayController@checkout')->name('customer.view.checkout'); 
Route::get('blog', 'Customer\DisplayController@blog')->name('customer.view.blog'); 
Route::get('blog-detail/{slug}', 'Customer\DisplayController@blog_detail')->name('customer.view.blog_detail'); 
Route::get('contact-us', 'Customer\DisplayController@contact')->name('customer.view.contact'); 
Route::get('order-success', 'Customer\DisplayController@order_success')->name('customer.view.success'); 


Route::get('register', 'Customer\DisplayController@register')->name('customer.view.register'); 
Route::get('login', 'Customer\DisplayController@login')->name('customer.view.login'); 

Route::get('forgot', 'Customer\DisplayController@forgot')->name('customer.view.forgot'); 
Route::get('reset', 'Customer\DisplayController@reset')->name('customer.view.reset'); 

Route::middleware(['AuthCustomer:login'])->group(function () {
    Route::get('register', 'Customer\DisplayController@register')->name('customer.view.register'); 
    Route::get('login', 'Customer\DisplayController@login')->name('customer.view.login'); 
});
Route::middleware(['AuthCustomer:logined'])->group(function () {
    Route::post('logout', 'Customer\AuthController@logout')->name('customer.logout');
    Route::get('profile', 'Customer\DisplayController@profile')->name('admin.profile.index');
});

Route::prefix('customer')->group(function () {
    Route::prefix('apip')->group(function () {
        Route::prefix('auth')->group(function () {
            Route::post('register', 'Customer\AuthController@register')->name('customer.auth.register');
            Route::post('login', 'Customer\AuthController@login')->name('customer.auth.login');
            Route::post('forgot', 'Customer\AuthController@forgot')->name('customer.auth.forgot');
            Route::post('reset', 'Customer\AuthController@reset')->name('customer.auth.reset');
            Route::post('code', 'Customer\AuthController@code')->name('customer.auth.code');
            Route::post('change', 'Customer\AuthController@change')->name('customer.auth.change');
            Route::post('update', 'Customer\AuthController@update')->name('customer.auth.update');
            Route::get('get-profile', 'Customer\AuthController@get_profile')->name('customer.auth.profile');
        }); 
        Route::prefix('blog')->group(function () {
            Route::get('get', 'Admin\BlogController@get')->name('customer.category.get');
        }); 

        Route::prefix('comment')->group(function () {
            Route::get('get/{id}', 'Customer\CommentController@get')->name('customer.comment.get');
            Route::post('create', 'Customer\CommentController@create')->name('customer.comment.create');
        });

        Route::prefix('category')->group(function () {
            Route::get('get', 'Customer\CategoryController@get')->name('customer.category.get');
        }); 
        Route::prefix('color')->group(function () {
            Route::get('/get', 'Admin\ColorController@get')->name('admin.color.get');
            Route::post('/store', 'Admin\ColorController@store')->name('admin.color.store');
            Route::get('/get-one/{id}', 'Admin\ColorController@get_one')->name('admin.color.get_one');
            Route::post('/update', 'Admin\ColorController@update')->name('admin.color.update');
            Route::get('/delete/{id}', 'Admin\ColorController@delete')->name('admin.color.delete');
        });
        Route::prefix('brand')->group(function () {
            Route::get('/get', 'Admin\BrandController@get')->name('admin.brand.get');
            Route::post('/store', 'Admin\BrandController@store')->name('admin.brand.store');
            Route::get('/get-one/{id}', 'Admin\BrandController@get_one')->name('admin.brand.get_one');
            Route::post('/update', 'Admin\BrandController@update')->name('admin.brand.update');
            Route::get('/delete/{id}', 'Admin\BrandController@delete')->name('admin.brand.delete');
        });
        Route::prefix('product')->group(function () {
            Route::get('get-all-new', 'Admin\ProductController@get_all_new')->name('admin.product.get_all_new');
            Route::get('get-best-sale', 'Admin\ProductController@get_best_sale')->name('admin.product.get_best_sale');
            Route::get('get-one/{id}', 'Admin\ProductController@get_one')->name('admin.product.get_one');
            Route::post('get-search', 'Admin\ProductController@get_search')->name('customer.product.get.search');
            Route::get('get-related/{id}', 'Admin\ProductController@get_related')->name('customer.product.get.related');
            
        });
        Route::prefix('cart')->group(function () {
            Route::get('get-cart', 'Customer\CartController@get')->name('customer.cart.get');
            Route::post('update', 'Customer\CartController@update')->name('customer.cart.update');
        }); 
        Route::prefix('order')->group(function () {
            Route::post('checkout', 'Customer\OrderController@checkout')->name('customer.order.checkout');
            Route::get('get', 'Customer\OrderController@get')->name('customer.order.get');
        });  
    });
});

Route::middleware(['AuthAdmin:auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/login', 'Admin\DisplayController@login')->name('admin.login');
        Route::post('/login', 'Admin\AuthController@login')->name('admin.login');
    });
});


Route::middleware(['AuthAdmin:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::post('logout', 'Admin\AuthController@logout')->name('admin.logout');
        
        Route::get('/', 'Admin\DisplayController@statistic')->name('admin.statistic.index');

        Route::prefix('color')->group(function () {
            Route::get('/', 'Admin\ColorController@index')->name('admin.color.index');
        });
        Route::prefix('brand')->group(function () {
            Route::get('/', 'Admin\BrandController@index')->name('admin.brand.index');
        });
        Route::prefix('product')->group(function () {
            Route::get('/', 'Admin\ProductController@index')->name('admin.product.index'); 
        });
        Route::prefix('order')->group(function () {
            Route::get('/', 'Admin\OrderController@index')->name('admin.order.index');
        });
        Route::prefix('blog')->group(function () {
            Route::get('/', 'Admin\BlogController@index')->name('admin.blog.index');
        });
        Route::prefix('warehouse')->group(function () {
            Route::get('/', 'Admin\WarehouseController@index')->name('admin.warehouse.index');
        });



        Route::prefix('discount')->group(function () {
            Route::get('/', 'Admin\DiscountController@index')->name('admin.discount.index');
        });
        Route::prefix('customer')->group(function () {
            Route::get('/', 'Admin\CustomerController@index')->name('admin.customer.index');
        });
        Route::prefix('manager')->group(function () {
            Route::get('/', 'Admin\ManagerController@index')->name('admin.manager.index');
        });
    });
    

    Route::prefix('apip')->group(function () {
        Route::prefix('order')->group(function () {
            Route::get('get', 'Admin\OrderController@get')->name('admin.order.get');
            Route::get('get-one', 'Admin\OrderController@get_one')->name('admin.order.get_one');
            Route::post('/update', 'Admin\OrderController@update')->name('admin.order.update');
        });


        Route::prefix('warehouse')->group(function () {
            Route::get('get-item', 'Admin\WarehouseController@get_item')->name('admin.warehouse.item.get');
            Route::get('get-history', 'Admin\WarehouseController@get_history')->name('admin.warehouse.history.get');
            Route::get('get-order-fullfil', 'Admin\WarehouseController@get_order_fullfil')->name('admin.warehouse.item.get');
            Route::get('get-order-export', 'Admin\WarehouseController@get_order_export')->name('admin.warehouse.item.get');
            Route::get('get-order-shipping', 'Admin\WarehouseController@get_order_shipping')->name('admin.warehouse.item.get');

            Route::post('store', 'Admin\WarehouseController@store')->name('admin.warehouse.store');
            Route::get('/get-ware-one/{id}', 'Admin\WarehouseController@get_ware_one')->name('admin.warehouse.get_ware_one');

            Route::get('/get-one/{id}', 'Admin\ProductController@get_one')->name('admin.warehouse.get_one');
            Route::post('/update', 'Admin\ProductController@update')->name('admin.warehouse.update');
        });

        Route::prefix('statistic')->group(function () {
            Route::get('get-total', 'Admin\OrderController@get_total')->name('admin.order.get_total');
            Route::get('get-best-sale', 'Admin\OrderController@get_best_sale')->name('admin.order.get_best_sale');
            Route::get('get-customer', 'Admin\OrderController@get_customer')->name('admin.order.get_customer');
            Route::get('get-month', 'Admin\OrderController@get_month')->name('admin.order.get_month');
        });

    });

});



Route::prefix('apip')->group(function () {
    Route::post('post-image', 'Admin\DisplayController@image')->name('admin.image.post');

    Route::prefix('color')->group(function () {
        Route::get('/get', 'Admin\ColorController@get')->name('admin.color.get');
        Route::post('/store', 'Admin\ColorController@store')->name('admin.color.store');
        Route::get('/get-one/{id}', 'Admin\ColorController@get_one')->name('admin.color.get_one');
        Route::post('/update', 'Admin\ColorController@update')->name('admin.color.update');
        Route::get('/delete/{id}', 'Admin\ColorController@delete')->name('admin.color.delete');
    });
    Route::prefix('brand')->group(function () {
        Route::get('/get', 'Admin\BrandController@get')->name('admin.brand.get');
        Route::post('/store', 'Admin\BrandController@store')->name('admin.brand.store');
        Route::get('/get-one/{id}', 'Admin\BrandController@get_one')->name('admin.brand.get_one');
        Route::post('/update', 'Admin\BrandController@update')->name('admin.brand.update');
        Route::get('/delete/{id}', 'Admin\BrandController@delete')->name('admin.brand.delete');
    });
    Route::prefix('blog')->group(function () {
        Route::get('/get', 'Admin\BlogController@get')->name('admin.brand.get');
        Route::post('/store', 'Admin\BlogController@store')->name('admin.brand.store');
        Route::get('/get-one/{id}', 'Admin\BlogController@get_one')->name('admin.brand.get_one');
        Route::post('/update', 'Admin\BlogController@update')->name('admin.brand.update');
        Route::get('/delete/{id}', 'Admin\BlogController@delete')->name('admin.brand.delete');
    });
    Route::prefix('product')->group(function () {
        Route::get('get-all-new', 'Admin\ProductController@get_all_new')->name('admin.product.get_all_new');
        Route::get('/get', 'Admin\ProductController@customer_get')->name('admin.product.get');
        Route::get('/get-all', 'Admin\ProductController@get')->name('admin.product.get');
        Route::post('/store', 'Admin\ProductController@store')->name('admin.product.store');
        Route::get('/get-one/{id}', 'Admin\ProductController@get_one')->name('admin.product.get_one');
        Route::post('/update', 'Admin\ProductController@update')->name('admin.product.update');
        Route::get('/delete/{id}', 'Admin\ProductController@delete')->name('admin.product.delete');
    });
});