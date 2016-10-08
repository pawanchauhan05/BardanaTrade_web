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
$route['products/Twine-and-Yarn'] = 'welcome';
$route['products/Twine-and-Yarn/:num'] = 'welcome';
$route['products/Others'] = 'welcome';
$route['products/Others/:num'] = 'welcome';
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
$route['sell-product'] = 'home/HomeController/sellProduct';
$route['buy-product'] = 'home/HomeController/sellProduct';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
