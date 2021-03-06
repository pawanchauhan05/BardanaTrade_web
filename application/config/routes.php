<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['index'] = 'welcome';
$route['about'] = 'welcome';
$route['benefits'] = 'welcome';
$route['contact'] = 'welcome';
$route['faq'] = 'welcome';
$route['login'] = 'welcome';
$route['vision-mission'] = 'welcome';
$route['quality'] = 'welcome';
$route['profile'] = 'welcome';
$route['profile/:num'] = 'welcome';
$route['check-profile'] = 'welcome';
$route['update-product/:any'] = 'welcome';
$route['product-sell-form'] = 'welcome';
$route['product-buy-form'] = 'welcome';
$route['product-details/:any'] = 'welcome';
$route['products'] = 'welcome';
$route['products/:num'] = 'welcome';
$route['products/Bags'] = 'welcome';
$route['products/Bags/:num'] = 'welcome';
$route['products/Machines'] = 'welcome';
$route['products/Machines/:num'] = 'welcome';
$route['products/TwineAndYarn'] = 'welcome';
$route['products/TwineAndYarn/:num'] = 'welcome';
$route['products/Others'] = 'welcome';
$route['products/Others/:num'] = 'welcome';
$route['feedback'] = 'welcome';
$route['filter'] = 'home/HomeController/filterProductsBySubCategory';


// action
$route['user-login'] = 'preLogin/PreLoginController/loginUser';
$route['user-signUp'] = 'preLogin/PreLoginController/registerUser';
$route['user-logout'] = 'home/HomeController/logoutUser';
$route['user-profile-complete'] = 'home/HomeController/userProfileComplete';
$route['update-user-profile-name'] = 'home/HomeController/updateUserProfileName';
$route['update-user-profile-mobile'] = 'home/HomeController/updateUserProfileMobile';
$route['update-user-profile-organisation'] = 'home/HomeController/updateUserProfileOrganisation';
$route['update-user-profile-designation'] = 'home/HomeController/updateUserProfileDesignation';
$route['update-user-profile-address'] = 'home/HomeController/updateUserProfileAddress';
$route['update-user-profile-city'] = 'home/HomeController/updateUserProfileCity';
$route['update-user-profile-state'] = 'home/HomeController/updateUserProfileState';
$route['update-user-profile-country'] = 'home/HomeController/updateUserProfileCountry';
$route['update-user-profile-pincode'] = 'home/HomeController/updateUserProfilePincode';
$route['post-product'] = 'home/HomeController/postProduct';
$route['contactUs'] = 'home/HomeController/contactUs';
$route['sendFeedback'] = 'home/HomeController/sendFeedback';
$route['login-with-facebook'] = 'preLogin/PreLoginController/loginWithFacebook';
$route['product-update'] = 'home/HomeController/updateProduct';
$route['change-password'] = 'home/HomeController/changePassword';
$route['contact-to-user'] = 'home/HomeController/contactToUser';

$route['send-email'] = 'home/HomeController/sendEmail';
$route['load-products'] = 'home/HomeController/loadProducts';
$route['load-more-products'] = 'home/HomeController/loadMoreProducts';
$route['register-location'] = 'home/HomeController/registerUserLocation';

//Admin
$route['admin/deleteUser/:any'] = 'admin/Admin/deleteUser';
$route['admin/login'] = 'admin/AdminController/isAdminExist';
$route['admin/logout'] = 'admin/AdminController/logout';
$route['admin'] = 'admin/AdminController';
$route['admin/slider'] = 'admin/AdminController';
$route['admin/users'] = 'admin/AdminController';
$route['admin/user-info/:any'] = 'admin/AdminController';
$route['admin/sell-products'] = 'admin/AdminController';
$route['admin/sell-products/:num'] = 'admin/AdminController';
$route['admin/buy-products'] = 'admin/AdminController';
$route['admin/buy-products/:num'] = 'admin/AdminController';
$route['admin/product-details/:any'] = 'admin/AdminController';
$route['admin/product-details'] = 'admin/AdminController';
$route['admin/sell-products-request'] = 'admin/AdminController';
$route['admin/sell-products-request/:num'] = 'admin/AdminController';
$route['admin/buy-products-request'] = 'admin/AdminController';
$route['admin/buy-products-request/:num'] = 'admin/AdminController';
$route['admin/product-request-details/:any'] = 'admin/AdminController';
$route['admin/latest-bags'] = 'admin/AdminController';
$route['admin/latest-product-details/:any'] = 'admin/AdminController';
$route['admin/latest-product-details'] = 'admin/AdminController';
$route['admin/latest-bags/:any'] = 'admin/AdminController';
$route['admin/latest-twines'] = 'admin/AdminController';
$route['admin/latest-twines/:any'] = 'admin/AdminController';
$route['admin/latest-machines'] = 'admin/AdminController';
$route['admin/latest-machines/:any'] = 'admin/AdminController';
$route['admin/remove-product-from-latest'] = 'admin/AdminController/removeProductFromLatest';
$route['admin/add-product-to-latest'] = 'admin/AdminController/addProductToLatest';
$route['admin/approve-product'] = 'admin/AdminController/approveProduct';
$route['admin/delete-product'] = 'admin/AdminController/deleteProduct';
$route['admin/add-slider'] = 'admin/AdminController/addSlider';
$route['admin/update-slider-sequence'] = 'admin/AdminController/updateSliderSequence';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
