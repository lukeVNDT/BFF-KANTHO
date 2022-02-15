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
//role management
Route::get('/listroleofuser', 'rolemanagementcontroller@index');
Route::post('/insertuser', 'rolemanagementcontroller@insert');
Route::get('/getdatauser/{id}', 'rolemanagementcontroller@getdatauser');
Route::post('/updateuser/{id}', 'rolemanagementcontroller@update');
Route::get('/deleteuser', 'rolemanagementcontroller@delete');
Route::get('/listrole', 'rolescontroller@getallrole');
Route::get('/addrolepage', 'rolescontroller@rolepage');
Route::post('/addrole', 'rolescontroller@add');
Route::get('/editrolepage/{id}', 'rolescontroller@editpage');
Route::post('/editrole/{id}', 'rolescontroller@edit');
Route::get('/deleterole', 'rolescontroller@deleterole');

View::composer('welcome', function($view){
    $cate = App\category::where('parent_id', 0)->get();
    $view->with('cate', $cate);
});
//index
Route::get('/initialproductbycate/{category_id}','productcategory@initialdata');
Route::get('/danhmucsp/fetch_data/{category_id}','productcategory@filterpaginateproductbycate');
Route::get('/','homecontroller@index');
Route::get('/danhmucsp/{category_id}','productcategory@productbycate');
Route::get('/trangchu', 'homecontroller@index');
Route::get('/chitietsp/{product_id}', 'productcontroller@detailproduct');
Route::post('/fetchcmt','productcontroller@fetch');
Route::post('/postcmt','productcontroller@post');
Route::post('/loadmorecmt','productcontroller@loadmore');
Route::get('/memberprofile/{cusid}','membercontroller@index');
Route::get('/articleindex','article@indexarticle');
Route::post('/recommendajax','homecontroller@recommendajax');
Route::post('/getallinfocus', 'membercontroller@getallinfocus');


//cond
Route::post('/insertcond','admincontroller@insertcond');
Route::get('/getallcond','admincontroller@getallcond');

//memberprofile
Route::post('/updatememberprofile','membercontroller@update');
Route::get('/followorder','membercontroller@fl');
Route::get('/vieworderuser/{id}','membercontroller@viewdetail');
Route::get('/logoutcustomer','membercontroller@logout');

//favorite
Route::get('/initialfavorite','favoritecontroller@initialdata');
Route::get('/listfavorite','favoritecontroller@listfavorite');
Route::post('/addfavorite','favoritecontroller@addfavorite');
Route::get('/deletefavorite/{id}','favoritecontroller@deletefavorite');
Route::get('/listfavorite/fetch_data','favoritecontroller@paginate');


//rating
Route::post('/sendrating','ratingcontroller@sendrating');
Route::post('loadmorert','ratingcontroller@loadmorert');
Route::get('/listrating','ratingcontroller@index');
Route::post('/replyrating','ratingcontroller@reply');
Route::post('/updatecmt','ratingcontroller@update');
route::get('/notify','admincontroller@getnotify');
Route::get('/dadoc','admincontroller@dadoc');
Route::get('/initialrating','ratingcontroller@initialdata');
Route::get('/filterrating','ratingcontroller@filter');
Route::get('/listrating/fetch_data','ratingcontroller@filterpaginaterating');
Route::get('/waitingcmt','ratingcontroller@waitingcmt');
Route::post('/approve','ratingcontroller@approve');
Route::get('/reject/{rating_id}','ratingcontroller@reject');
Route::get('/countwaiting','ratingcontroller@count');

//adminroute

Route::get('/favoriteproductdata','admincontroller@initialdatafavorite');
Route::get('/favoriteproduct/fetch_data','admincontroller@paginatefavoriteproduct');
Route::get('/sellproductdata','admincontroller@initialdatasellproduct');
Route::get('/sellproduct/fetch_data','admincontroller@paginatesellproduct');
Route::get('/dangnhap', 'logincontroller@viewlogin');
Route::get('/dashboard', 'admincontroller@maincontent');
Route::post('/admin_dashboard','admincontroller@login');
Route::get('/logout','admincontroller@logout');
Route::post('/thongke','admincontroller@tk');
Route::post('/banuser','admincontroller@ban');
Route::post('/unbanuser','admincontroller@unban');
Route::get('/deletecus/{id}','admincontroller@delcus');

//category
Route::get('/list-category/fetch_data','productcategory@paginate');
Route::get('/initialcategory','productcategory@initialcategory');
Route::get('/list-category','productcategory@listcategory')->middleware('can:category-list');
Route::get('/geteditcategory/{id}','productcategory@geteditcategory');
Route::get('/disable-status/{category_id}','productcategory@disablestatus');
Route::get('/enable-status/{category_id}','productcategory@enablestatus');
Route::get('/add-category','productcategory@addcategory');
Route::get('/edit-category/{category_id}','productcategory@editcategory');
Route::post('/save-category','productcategory@savecategory');
Route::post('/update-category/{category_id}','productcategory@updatecategory');
Route::post('/insertcat','productcategory@insertcat');
Route::get('/deletecat/{id}','productcategory@deletecat')->name('deletecat');
Route::post('/updatecat/{id}','productcategory@update');
 
 //mail
Route::get('/sendcouponloyal/{coupon_time}/{coupon_condition}/{coupon_method}/{coupon_code}','mailcontroller@sendcoupon');
Route::get('/sendcouponnormal/{coupon_time}/{coupon_condition}/{coupon_method}/{coupon_code}','mailcontroller@sendcouponnormal');
Route::get('/mail','mailcontroller@mail');
Route::get('/forgetpassword','mailcontroller@forgetpassword');
Route::post('/getpasswordreset','mailcontroller@resetpassword');
route::get('/update-new-pass','mailcontroller@updatenewpass');
route::post('/updatenewpassword','mailcontroller@resetnewpass');
route::get('/orderconfirm','mailcontroller@get');

//googlelogin
Route::get('/googlelogin','admincontroller@googlelogin');
Route::get('/google/callback','admincontroller@googlecallback');


//brand
Route::get('/list-brand', 'brandcontroller@listbrand');
Route::post('/insertbrand', 'brandcontroller@insertbrand');
Route::get('/disable-brand/{brand_id}', 'brandcontroller@disablebrand');
Route::get('/enable-brand/{brand_id}', 'brandcontroller@enablebrand');
Route::get('/deletebrand/{id}', 'brandcontroller@deletebrand')->name('deletebrand');
Route::post('/updatebrand','brandcontroller@update');

//product
Route::get('/catndbrand','productcontroller@allcatbrand');
Route::get('/list-product', 'productcontroller@listproduct');
Route::post('/insertproduct', 'productcontroller@insertproduct');
Route::post('/save-product/{product_id}', 'productcontroller@saveproduct');
Route::get('/search','productcontroller@searchproduct');
Route::get('/updateproduct/{product_id}','productcontroller@update');
Route::get('/deleteproduct/{product_id}','productcontroller@delete');
Route::get('/disable-pro/{product_id}','productcontroller@disablestatus');
Route::get('/enable-pro/{product_id}','productcontroller@enablestatus');
Route::get('/searchproduct','productcontroller@search');
Route::get('/quickview/{product_id}','productcontroller@quickview');
Route::get('/list-product/fetch_data','productcontroller@paginate');
Route::get('/getProductData', 'productcontroller@getInitialData');

//cart
Route::post('/addtocart','cartcontroller@savecart');
Route::get('/showcart','cartcontroller@showcart');
Route::get('/deletecartitem/{rowId}','cartcontroller@deletecartitem');
Route::post('/updateqty','cartcontroller@updatequantity');
Route::get('/addcart/{product_id}','cartcontroller@addcart');
Route::post('/addcartajax','cartcontroller@addajax');
Route::get('/showcartajax','cartcontroller@showcartajax');
Route::get('/deleteitem/{session_id}','cartcontroller@deleteitem');
Route::post('/updatecartitem','cartcontroller@updateitem');
Route::get('/deleteallitem','cartcontroller@deleteall');
Route::get('/xoaitem/{id}','cartcontroller@xoa');

//coupon
Route::get('/listcoupon','couponcontroller@listcoupon');
Route::post('/checkcoupon','cartcontroller@check');
Route::post('/insertcoupon','couponcontroller@insert');
Route::get('/deletecoupon/{coupon_id}','couponcontroller@delete');
Route::get('/unsetcoupon','couponcontroller@unset');
Route::post('/updatecoupon','couponcontroller@update');

//checkout
Route::get('/logincheckout','checkoutcontroller@logincheck');
Route::post('/dangky','checkoutcontroller@register');
Route::get('/checkout','checkoutcontroller@checkout');
Route::post('/savecheckout','checkoutcontroller@savecheckout');
Route::get('/logoutcheckout','checkoutcontroller@logoutcheckout');
Route::post('/logincustomer','checkoutcontroller@login');
Route::get('/payment','checkoutcontroller@payment');
Route::post('/orderplace','checkoutcontroller@order');
Route::post('/selectdeliverycheckout','checkoutcontroller@select');
Route::post('/caculatefee','checkoutcontroller@caculate');
Route::post('/confirmorder','checkoutcontroller@confirm');

//order
Route::get('/listorder','ordercontroller@listorder');
Route::get('/detailorder/{order_code}','ordercontroller@detail');
Route::post('/updateorderqty','ordercontroller@update');
Route::post('/updateqty','ordercontroller@updateqty');
Route::get('/orderhistory','ordercontroller@history');
Route::get('/customerorder','ordercontroller@viewhistory');
Route::get('/livesearch','ordercontroller@search');
Route::post('/searchorder','ordercontroller@livesearch');
Route::get('/continueorder','ordercontroller@get');
Route::get('/filterstatus','ordercontroller@filter');
Route::get('/orderdata','ordercontroller@getinitaldata');
Route::get('/listorder/fetch_data','ordercontroller@filterpaginate');


//delivery
Route::get('/delivery','deliverycontroller@getdelivery');
Route::post('/selectdelivery','deliverycontroller@select');
Route::post('/insertdeliveryfee','deliverycontroller@insert');
Route::post('/selectfee','deliverycontroller@selectfee');
Route::post('/updatefee','deliverycontroller@update');
Route::get('/delivery/fetch_data','deliverycontroller@paginate');

//vnp
Route::post('/createpayment','checkoutcontroller@createpayment');
Route::get('/vnpaypayment','checkoutcontroller@index');
Route::get('vnpay/return','checkoutcontroller@returnvnpay')->name('vnpay.return');

//export
route::post('/export','admincontroller@export');

//thank
Route::get('/thank','checkoutcontroller@getthank');

//User
Route::get('/listuser','admincontroller@fetchuser');
Route::get('/fetchloyalmember','admincontroller@get');
Route::post('/enableloyal','admincontroller@enableloyal');
Route::post('/disableloyal','admincontroller@disableloyal');
Route::get('/initialdatacustomer','admincontroller@initialdata');
Route::get('/listuser/fetch_data','admincontroller@paginate');


//articlecategory
Route::get('/articlecategory','articlecategory@index');
Route::post('/insertarticlecat','articlecategory@insert');
Route::post('/updatearticlecat','articlecategory@update');
Route::get('/deleteartcat','articlecategory@delete');
Route::get('/articlecategory/fetch_data', 'articlecategory@paginate');

//article
Route::get('/listarticle','article@index');
Route::post('/insertarticle','article@insert');
Route::get('/editarticle/{article_id}','article@edit');
Route::post('/updatearticle/{article_id}','article@save');
Route::post('/loadmorearticle','article@loadmoreart');
Route::get('/articledetail/{article_id}','article@getdetail');
Route::get('/deletearticle','article@delete');


//banner
Route::get('/listbanner','bannercontroller@index');
Route::post('/insertslide','bannercontroller@insert');
Route::get('/editslide/{slide_id}','bannercontroller@edit');
Route::get('/delbanner/{id}','bannercontroller@del');
Route::post('/updateslide','bannercontroller@update');

//profile
Route::get('myprofile','admincontroller@viewprofile');
Route::post('/editprofile','admincontroller@edit');
Route::post('/updateprofile','admincontroller@save');

//album
Route::get('/albumproduct/{product_id}','albumcontroller@index');
Route::post('/fetchalbum','albumcontroller@fetch');
Route::post('/insert/{pro_id}','albumcontroller@insert');
Route::post('/editalbumname','albumcontroller@edit');
Route::delete('/deletealbum/{id}','albumcontroller@delete');
Route::post('/deletepic','albumcontroller@slice');

//filterproductindex
Route::post('/fetchfilterproduct','productcategory@filter');
Route::get('/filterbyselect','productcategory@filter2');
Route::get('/test','productcategory@test');
Route::post('/filterbyrange','productcategory@filterrange');

//contact
Route::get('/contact','contactcontroller@index');
Route::get('/contactinfo','contactcontroller@get');
Route::post('/addcontact','contactcontroller@add');
Route::post('/addcontact/{contact_id}','contactcontroller@save');

