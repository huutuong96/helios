<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardContronller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoriController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MembercardController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CommentController;


// front End
Route::get('/',[HomeController::class, "index"])->name("index");
// Route::view('/{{path}}', 'FrontEnd.pages.home');
Route::get('shop',[HomeController::class, "shop"])->name("shop");

                                // blog
Route::get('blog-list',[HomeController::class, "blog"])->name("blog");
Route::get('blog-detail',[HomeController::class, "blog_detail"])->name("blog_detail");

                                // contact
 Route::get('contact',[HomeController::class, "contact"])->name("contact");
 Route::post('contact',[ContactController::class, "create"])->name("contact");

                                // search
Route::get('search',[HomeController::class, "search"])->name("search");
                                //comment

Route::get('comment',[CommentController::class, "index"])->name("comment");                                
Route::post('create-product-comment',[CommentController::class, "create_product_comment"])->name("create_product_comment");
Route::post('create-post-comment',[CommentController::class, "create_post_comment"])->name("create_post_comment");


                                // checkout
Route::get('checkout',[HomeController::class, "checkout"])->name("checkout");
Route::post('checkout',[HomeController::class, "save_order"])->name("checkout");
//delete order
Route::get('delete_order',[OrderController::class, "destroy"])->name("destroy_order");

                                // cart

Route::get('add-to-cart',[HomeController::class, "add_to_cart"])->name("add_to_cart");

Route::get('destroy-product-in-cart',[HomeController::class, "destroy_product_in_cart"])->name("destroy_product_in_cart");

Route::get('product-detail',[HomeController::class, "product_detail"])->name("product_detail");
Route::get('cart',[HomeController::class, "cart"])->name("cart");

Route::post('update-cart',[HomeController::class, "update_cart"])->name("update_cart");

Route::get('cart',[HomeController::class, "cart"])->name("cart");

                                //wishlist
Route::get('wishlist',[HomeController::class, "wishlist"])->name("wishlist");  

Route::get('add-to-wishlist',[HomeController::class, "add_to_wishlist"])->name("add_to_wishlist");  

Route::get('destroy-product-in-wishlist',[HomeController::class, "destroy_product_in_wishlist"])->name("destroy_product_in_wishlist");

                                //account

Route::get('account',[HomeController::class, "account"])->name("account");         

Route::get('account-detail',[HomeController::class, "account_detail"])->name("account_detail");

Route::post('edit-user',[UserController::class, "edit_user"])->name("edit_user");

Route::get('account-orders',[HomeController::class, "account_orders"])->name("account_orders"); 

Route::get('view-orders',[HomeController::class, "view_orders"])->name("view_orders"); 


                                //login logout
Route::get('register',[HomeController::class, "register"])->name("register");

Route::post('register',[UserController::class, "creat_user_guest"])->name("register");

Route::get('login',[HomeController::class, "login"])->name("login");
Route::post('login',[UserController::class, "login"])->name("login");

Route::get('logout',[HomeController::class, "logout"])->name("logout");

Route::post('logon',[UserController::class, "Logon"])->name("logon");

Route::get('input_email',[UserController::class, "inputEmail"])->name("input_email");

Route::post('new_password',[UserController::class, "newPassword"])->name("new_password");
Route::get('new_password',[UserController::class, "newPassword"]);

Route::post('update_new_password',[UserController::class, "handleNewPassword"])->name("update_new_password");







// Back End
Route::prefix('admin')->middleware("admin")->group(function () {
    Route::get('/',[DashboardContronller::class, "index"])->name("dashboard");


    //                        product
    Route::get("product-list", [productController::class, "index"])->name("product_list");

    Route::get("change-stutus-product", [productController::class, "change_stutus"])->name("change_stutus_product");

    Route::get("creat-product", [productController::class, "creat"])->name("creat_product");

    Route::post("creat-product", [productController::class, "creat_product"])->name("creat_product");

    Route::get("edit-product", [productController::class, "edit"])->name("edit_product");

    Route::post("edit-product", [productController::class, "edit_product"])->name("edit_product");

    Route::get("destroy-product", [productController::class, "destroy"])->name("destroy_product");


    //                      categori
    Route::get("categori-list", [CategoriController::class, "index"])->name("categori_list");

    Route::get("change-stutus-categori", [CategoriController::class, "change_stutus"])->name("change_stutus_categori");

    Route::get("creat-categori", [CategoriController::class, "creat"])->name("creat_categori");

    Route::post("creat-categori", [CategoriController::class, "creat_categori"])->name("creat_categori");

    Route::get("edit-categori", [CategoriController::class, "edit"])->name("edit_categori");

    Route::post("edit-categori", [CategoriController::class, "edit_categori"])->name("edit_categori");

    Route::get("destroy-categori", [CategoriController::class, "destroy"])->name("destroy_categori");


    //                      brand
    Route::get("brand-list", [BrandController::class, "index"])->name("brand_list");

    Route::get("change-stutus-brand", [BrandController::class, "change_stutus"])->name("change_stutus_brand");

    Route::get("creat-brand", [BrandController::class, "creat"])->name("creat_brand");

    Route::post("creat-brand", [BrandController::class, "creat_brand"])->name("creat_brand");

    Route::get("edit-brand", [BrandController::class, "edit"])->name("edit_brand");

    Route::post("edit-brand", [BrandController::class, "edit_brand"])->name("edit_brand");

    Route::get("destroy-brand", [BrandController::class, "destroy"])->name("destroy_brand");


    //                      topic
    Route::get("topic-list", [TopicController::class, "index"])->name("topic_list");

    Route::get("change-stutus-topic", [TopicController::class, "change_stutus"])->name("change_stutus_topic");

    Route::get("creat-topic", [TopicController::class, "creat"])->name("creat_topic");

    Route::post("creat-topic", [TopicController::class, "creat_topic"])->name("creat_topic");

    Route::get("edit-topic", [TopicController::class, "edit"])->name("edit_topic");

    Route::post("edit-topic", [TopicController::class, "edit_topic"])->name("edit_topic");

    Route::get("destroy-topic", [TopicController::class, "destroy"])->name("destroy_topic");


    //                      post
    Route::get("post-list", [postController::class, "index"])->name("post_list");

    Route::get("change-stutus-post", [postController::class, "change_stutus"])->name("change_stutus_post");

    Route::get("creat-post", [postController::class, "creat"])->name("creat_post");

    Route::post("creat-post", [postController::class, "creat_post"])->name("creat_post");

    Route::get("edit-post", [postController::class, "edit"])->name("edit_post");

    Route::post("edit-post", [postController::class, "edit_post"])->name("edit_post");

    Route::get("destroy-post", [postController::class, "destroy"])->name("destroy_post");


    //                      membercard
    Route::get("membercard-list", [membercardController::class, "index"])->name("membercard_list");

    Route::get("change-stutus-membercard", [membercardController::class, "change_stutus"])->name("change_stutus_membercard");

    Route::get("creat-membercard", [membercardController::class, "creat"])->name("creat_membercard");

    Route::post("creat-membercard", [membercardController::class, "creat_membercard"])->name("creat_membercard");

    Route::get("edit-membercard", [membercardController::class, "edit"])->name("edit_membercard");

    Route::post("edit-membercard", [membercardController::class, "edit_membercard"])->name("edit_membercard");

    Route::get("destroy-membercard", [membercardController::class, "destroy"])->name("destroy_membercard");


    //                      user
    Route::get("user-list", [userController::class, "index"])->name("user_list");

    Route::get("change-stutus-user", [userController::class, "change_stutus"])->name("change_stutus_user");

    Route::get("creat-user", [userController::class, "creat"])->name("creat_user");

    Route::post("creat-user", [userController::class, "creat_user"])->name("creat_user");

    Route::get("destroy-user", [userController::class, "destroy"])->name("destroy_user");

    //                      size
    Route::get("size-list", [sizeController::class, "index"])->name("size_list");

    Route::get("change-stutus-size", [sizeController::class, "change_stutus"])->name("change_stutus_size");

    Route::get("creat-size", [sizeController::class, "creat"])->name("creat_size");

    Route::post("creat-size", [sizeController::class, "creat_size"])->name("creat_size");

    Route::get("edit-size", [sizeController::class, "edit"])->name("edit_size");

    Route::post("edit-size", [sizeController::class, "edit_size"])->name("edit_size");

    Route::get("destroy-size", [sizeController::class, "destroy"])->name("destroy_size");


    //                      banner
    Route::get("banner-list", [bannerController::class, "index"])->name("banner_list");

    Route::get("change-stutus-banner", [bannerController::class, "change_stutus"])->name("change_stutus_banner");

    Route::get("creat-banner", [bannerController::class, "creat"])->name("creat_banner");

    Route::post("creat-banner", [bannerController::class, "creat_banner"])->name("creat_banner");

    Route::get("edit-banner", [bannerController::class, "edit"])->name("edit_banner");

    Route::post("edit-banner", [bannerController::class, "edit_banner"])->name("edit_banner");

    Route::get("destroy-banner", [bannerController::class, "destroy"])->name("destroy_banner");


    //                     Config
    Route::get("show-config", [ConfigController::class, "index"])->name("show_config");
    Route::post("edit-config", [ConfigController::class, "edit"])->name("edit_config");

    //                     Contact
    Route::get("show-contact", [ContactController::class, "index"])->name("show_contact");

    Route::get("change-isDeleted", [contactController::class, "change_isDeleted"])->name("change_isDeleted");

    Route::get("destroy-contact", [contactController::class, "destroy"])->name("destroy_contact");


    //                     order
    Route::get("list-order", [orderController::class, "index"])->name("list_order");

    Route::get("change-stutus-order", [orderController::class, "change_stutus"])->name("change_stutus_order");


     //                      menu
     Route::get("show-menu", [menuController::class, "index"])->name("show_menu");
 
     Route::post("creat-menu", [menuController::class, "creat_menu"])->name("creat_menu");
 
     Route::get("destroy-menu", [menuController::class, "destroy"])->name("destroy_menu");
    

});