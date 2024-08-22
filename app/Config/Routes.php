<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Frontend\Index');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override('App\Controllers\Index::index');

// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Index::index');
//$routes->get('about-us', 'Index::about_us');
//$routes->get('contact-us', 'Index::contact_us');
$routes->post('contact_save', 'Index::save_contact_form');
$routes->get('admin/', 'Backend\Login',['filter' => 'loginGuard']);
$routes->get('admin/login', 'Backend\Login',['filter' => 'loginGuard']);
$routes->post('admin/login', 'Backend\Login',['filter' => 'loginGuard']);
$routes->get('admin/dashboard', 'Backend\Dashboard',['filter' => 'authGuard']);

//Categories routes
$routes->get('admin/categories', 'Backend\Categories',['filter' => 'authGuard']);
$routes->get('admin/categories/add', 'Backend\Categories::add',['filter' => 'authGuard']);
$routes->post('admin/categories/create', 'Backend\Categories::create',['filter' => 'authGuard']);
$routes->get('admin/categories/edit/(:num)', 'Backend\Categories::edit/$1',['filter' => 'authGuard']);
$routes->post('admin/categories/update/(:num)', 'Backend\Categories::update/$1',['filter' => 'authGuard']);
$routes->get('admin/categories/delete/(:num)', 'Backend\Categories::delete/$1',['filter' => 'authGuard']);
$routes->get('admin/categories/changestatus/(:num)', 'Backend\Categories::changestatus/$1',['filter' => 'authGuard']);

// Blogs routes
//$routes->get('admin/blogs', 'Backend\Blogs');
$routes->match(['get', 'post'], 'admin/blogs', 'Backend\Blogs',['filter' => 'authGuard']);
$routes->get('admin/blogs/add', 'Backend\Blogs::add',['filter' => 'authGuard']);
$routes->post('admin/blogs/create', 'Backend\Blogs::create',['filter' => 'authGuard']);
$routes->get('admin/blogs/edit/(:num)', 'Backend\Blogs::edit/$1',['filter' => 'authGuard']);
$routes->post('admin/blogs/update/(:num)', 'Backend\Blogs::update/$1',['filter' => 'authGuard']);
$routes->get('admin/blogs/delete/(:num)', 'Backend\Blogs::delete/$1',['filter' => 'authGuard']);


//pages routes
$routes->match(['get', 'post'], 'admin/pages', 'Backend\Pages',['filter' => 'authGuard']);
$routes->get('admin/pages/add', 'Backend\Pages::add',['filter' => 'authGuard']);
$routes->post('admin/pages/create', 'Backend\Pages::create',['filter' => 'authGuard']);
$routes->match(['get', 'post'], 'admin/pages/sections', 'Backend\Pages::sections',['filter' => 'authGuard']);
$routes->get('admin/pages/changestatus/(:num)', 'Backend\Pages::changestatus/$1',['filter' => 'authGuard']);
$routes->get('admin/pages/delete/(:num)', 'Backend\Pages::delete/$1',['filter' => 'authGuard']);
$routes->get('admin/pages/edit/(:num)', 'Backend\Pages::edit/$1',['filter' => 'authGuard']);
$routes->post('admin/pages/update', 'Backend\Pages::update',['filter' => 'authGuard']);
$routes->match(['get', 'post'],'admin/pages/updateslug', 'Backend\Pages::updateslug',['filter' => 'authGuard']);
$routes->post('admin/pages/section', 'Backend\Pages::section',['filter' => 'authGuard']);
$routes->get('admin/pages/get_page', 'Backend\Pages::get_page',['filter' => 'authGuard']);


$routes->get('admin/dashboard/change_password', 'Backend\Login::change_password',['filter' => 'authGuard']);
$routes->post('admin/update_password', 'Backend\Login::update_password',['filter' => 'authGuard']);

$routes->match(['get', 'post'], 'admin/resource_materials', 'Backend\Resource_materials',['filter' => 'authGuard']);
$routes->match(['get', 'post'], 'admin/custom_links', 'Backend\Custom_links',['filter' => 'authGuard']);

// media library routes

$routes->match(['get', 'post'], 'admin/media_library', 'Backend\Media_library',['filter' => 'authGuard']);
$routes->match(['get', 'post'],'admin/media_library/do_upload', 'Backend\Media_library::do_upload',['filter' => 'authGuard']);

$routes->match(['get', 'post'], 'admin/media_library/select', 'Backend\Media_library::select',['filter' => 'authGuard']);
$routes->get('admin/media_library/delete/(:num)', 'Backend\Media_library::delete/$1',['filter' => 'authGuard']);
$routes->get('admin/media_library/changestatus/(:num)', 'Backend\Media_library::changestatus/$1',['filter' => 'authGuard']);



//Profile management routes
$routes->match(['get', 'post'], 'admin/profile_management', 'Backend\Profile_management',['filter' => 'authGuard']);
$routes->get('admin/profile_management/add', 'Backend\Profile_management::add',['filter' => 'authGuard']);
$routes->post('admin/profile_management/create', 'Backend\Profile_management::create',['filter' => 'authGuard']);
$routes->get('admin/profile_management/edit/(:num)', 'Backend\Profile_management::edit/$1',['filter' => 'authGuard']);
$routes->post('admin/profile_management/update/(:num)', 'Backend\Profile_management::update/$1',['filter' => 'authGuard']);
$routes->get('admin/profile_management/delete/(:num)', 'Backend\Profile_management::delete/$1',['filter' => 'authGuard']);
$routes->get('admin/profile_management/changestatus/(:num)', 'Backend\Profile_management::changestatus/$1',['filter' => 'authGuard']);

//Service management routes
$routes->match(['get', 'post'], 'admin/service_management', 'Backend\Service_management',['filter' => 'authGuard']);
$routes->get('admin/service_management/add', 'Backend\Service_management::add',['filter' => 'authGuard']);
$routes->post('admin/service_management/create', 'Backend\Service_management::create',['filter' => 'authGuard']);
$routes->get('admin/service_management/edit/(:num)', 'Backend\Service_management::edit/$1',['filter' => 'authGuard']);
$routes->post('admin/service_management/update/(:num)', 'Backend\Service_management::update/$1',['filter' => 'authGuard']);
$routes->get('admin/service_management/delete/(:num)', 'Backend\Service_management::delete/$1',['filter' => 'authGuard']);
$routes->get('admin/service_management/changestatus/(:num)', 'Backend\Service_management::changestatus/$1',['filter' => 'authGuard']);

//Resource management routes
$routes->match(['get', 'post'], 'admin/resource_management', 'Backend\Resource_management',['filter' => 'authGuard']);
$routes->get('admin/resource_management/add', 'Backend\Resource_management::add',['filter' => 'authGuard']);
$routes->post('admin/resource_management/create', 'Backend\Resource_management::create',['filter' => 'authGuard']);
$routes->get('admin/resource_management/edit/(:num)', 'Backend\Resource_management::edit/$1',['filter' => 'authGuard']);
$routes->post('admin/resource_management/update/(:num)', 'Backend\Resource_management::update/$1',['filter' => 'authGuard']);
$routes->get('admin/resource_management/delete/(:num)', 'Backend\Resource_management::delete/$1',['filter' => 'authGuard']);
$routes->get('admin/resource_management/changestatus/(:num)', 'Backend\Resource_management::changestatus/$1',['filter' => 'authGuard']);

//Video management routes
$routes->match(['get', 'post'], 'admin/video_management', 'Backend\Video_management',['filter' => 'authGuard']);
$routes->get('admin/video_management/add', 'Backend\Video_management::add',['filter' => 'authGuard']);
$routes->post('admin/video_management/create', 'Backend\Video_management::create',['filter' => 'authGuard']);
$routes->get('admin/video_management/edit/(:num)', 'Backend\Video_management::edit/$1',['filter' => 'authGuard']);
$routes->post('admin/video_management/update/(:num)', 'Backend\Video_management::update/$1',['filter' => 'authGuard']);
$routes->get('admin/video_management/delete/(:num)', 'Backend\Video_management::delete/$1',['filter' => 'authGuard']);
$routes->get('admin/video_management/changestatus/(:num)', 'Backend\Video_management::changestatus/$1',['filter' => 'authGuard']);

//Faq management routes
$routes->match(['get', 'post'], 'admin/faq_management', 'Backend\Faq_management',['filter' => 'authGuard']);
$routes->get('admin/faq_management/add', 'Backend\Faq_management::add',['filter' => 'authGuard']);
$routes->post('admin/faq_management/create', 'Backend\Faq_management::create',['filter' => 'authGuard']);
$routes->get('admin/faq_management/edit/(:num)', 'Backend\Faq_management::edit/$1',['filter' => 'authGuard']);
$routes->post('admin/faq_management/update/(:num)', 'Backend\Faq_management::update/$1',['filter' => 'authGuard']);
$routes->get('admin/faq_management/delete/(:num)', 'Backend\Faq_management::delete/$1',['filter' => 'authGuard']);
$routes->get('admin/faq_management/changestatus/(:num)', 'Backend\Faq_management::changestatus/$1',['filter' => 'authGuard']);

//Job management routes
$routes->match(['get', 'post'], 'admin/job_management', 'Backend\Job_management',['filter' => 'authGuard']);
$routes->get('admin/job_management/add', 'Backend\Job_management::add',['filter' => 'authGuard']);
$routes->post('admin/job_management/create', 'Backend\Job_management::create',['filter' => 'authGuard']);
$routes->get('admin/job_management/edit/(:num)', 'Backend\Job_management::edit/$1',['filter' => 'authGuard']);
$routes->post('admin/job_management/update/(:num)', 'Backend\Job_management::update/$1',['filter' => 'authGuard']);
$routes->get('admin/job_management/delete/(:num)', 'Backend\Job_management::delete/$1',['filter' => 'authGuard']);
$routes->get('admin/job_management/changestatus/(:num)', 'Backend\Job_management::changestatus/$1',['filter' => 'authGuard']);

//Partner management routes
$routes->match(['get', 'post'], 'admin/partner_management', 'Backend\Partner_management',['filter' => 'authGuard']);
$routes->get('admin/partner_management/add', 'Backend\Partner_management::add',['filter' => 'authGuard']);
$routes->post('admin/partner_management/create', 'Backend\Partner_management::create',['filter' => 'authGuard']);
$routes->get('admin/partner_management/edit/(:num)', 'Backend\Partner_management::edit/$1',['filter' => 'authGuard']);
$routes->post('admin/partner_management/update/(:num)', 'Backend\Partner_management::update/$1',['filter' => 'authGuard']);
$routes->get('admin/partner_management/delete/(:num)', 'Backend\Partner_management::delete/$1',['filter' => 'authGuard']);
$routes->get('admin/partner_management/changestatus/(:num)', 'Backend\Partner_management::changestatus/$1',['filter' => 'authGuard']);

//Banner management routes
$routes->match(['get', 'post'], 'admin/banner_management', 'Backend\Banner_management',['filter' => 'authGuard']);
$routes->get('admin/banner_management/add', 'Backend\Banner_management::add',['filter' => 'authGuard']);
$routes->post('admin/banner_management/create', 'Backend\Banner_management::create',['filter' => 'authGuard']);
$routes->get('admin/banner_management/edit/(:num)', 'Backend\Banner_management::edit/$1',['filter' => 'authGuard']);
$routes->post('admin/banner_management/update/(:num)', 'Backend\Banner_management::update/$1',['filter' => 'authGuard']);
$routes->get('admin/banner_management/delete/(:num)', 'Backend\Banner_management::delete/$1',['filter' => 'authGuard']);
$routes->get('admin/banner_management/changestatus/(:num)', 'Backend\Banner_management::changestatus/$1',['filter' => 'authGuard']);
$routes->get('admin/banner_management/banner_items/(:any)', 'Backend\Banner_management::banner_items/$1',['filter' => 'authGuard']);

//Gallery management routes
$routes->match(['get', 'post'], 'admin/gallery_management', 'Backend\Gallery_management',['filter' => 'authGuard']);
$routes->get('admin/gallery_management/add', 'Backend\Gallery_management::add',['filter' => 'authGuard']);
$routes->post('admin/gallery_management/do_upload', 'Backend\Gallery_management::do_upload',['filter' => 'authGuard']);
$routes->post('admin/gallery_management/create', 'Backend\Gallery_management::create',['filter' => 'authGuard']);
$routes->get('admin/gallery_management/edit/(:num)', 'Backend\Gallery_management::edit/$1',['filter' => 'authGuard']);
$routes->post('admin/gallery_management/update/(:num)', 'Backend\Gallery_management::update/$1',['filter' => 'authGuard']);
$routes->get('admin/gallery_management/delete/(:num)', 'Backend\Gallery_management::delete/$1',['filter' => 'authGuard']);
$routes->get('admin/gallery_management/changestatus/(:num)', 'Backend\Gallery_management::changestatus/$1',['filter' => 'authGuard']);
$routes->get('admin/gallery_management/gallery_items/(:any)', 'Backend\Gallery_management::gallery_items/$1',['filter' => 'authGuard']);

//Custom Form management routes
$routes->match(['get', 'post'], 'admin/custom_forms', 'Backend\Custom_forms',['filter' => 'authGuard']);
$routes->get('admin/custom_form/add', 'Backend\Custom_forms::add',['filter' => 'authGuard']);
$routes->post('admin/custom_form/create', 'Backend\Custom_forms::create',['filter' => 'authGuard']);
$routes->get('admin/custom_form/edit/(:num)', 'Backend\Custom_forms::edit/$1',['filter' => 'authGuard']);
$routes->post('admin/custom_form/update/(:num)', 'Backend\Custom_forms::update/$1',['filter' => 'authGuard']);
$routes->get('admin/custom_form/delete/(:num)', 'Backend\Custom_forms::delete/$1',['filter' => 'authGuard']);
$routes->get('admin/custom_form/changestatus/(:num)', 'Backend\Custom_forms::changestatus/$1',['filter' => 'authGuard']);
$routes->get('admin/custom_form/banner_items/(:any)', 'Backend\Custom_forms::banner_items/$1',['filter' => 'authGuard']);



//-------------------------

$routes->get('admin/advantages', 'Backend\Advantages',['filter' => 'authGuard']);

$routes->get('admin/cms', 'Backend\Cms',['filter' => 'authGuard']);
$routes->get('admin/cms/widgets', 'Backend\Cms::widgets',['filter' => 'authGuard']);
$routes->get('admin/cms/settings', 'Backend\Cms::settings',['filter' => 'authGuard']);
$routes->post('admin/cms/add_widget', 'Backend\Cms::add_widget',['filter' => 'authGuard']);
$routes->post('admin/cms/remove_widget', 'Backend\Cms::remove_widget',['filter' => 'authGuard']);
$routes->post('admin/cms/add_widget_content', 'Backend\Cms::add_widget_content',['filter' => 'authGuard']);
$routes->get('admin/cms', 'Backend\Cms',['filter' => 'authGuard']);
$routes->get('admin/menus', 'Backend\Menus',['filter' => 'authGuard']);
$routes->get('admin/menus/get_page', 'Backend\Menus::get_page',['filter' => 'authGuard']);
$routes->get('admin/menus/get_profile', 'Backend\Menus::get_profile',['filter' => 'authGuard']);
$routes->get('admin/menus/get_service', 'Backend\Menus::get_service',['filter' => 'authGuard']);
$routes->post('admin/menus/create', 'Backend\Menus::create',['filter' => 'authGuard']);
$routes->post('admin/menus/update', 'Backend\Menus::update',['filter' => 'authGuard']);
$routes->get('admin/menus/delete/(:num)', 'Backend\Menus::delete/$1',['filter' => 'authGuard']);
$routes->post('admin/menus/addmenuitem', 'Backend\Menus::addmenuitem',['filter' => 'authGuard']);

$routes->post('admin/menus/updatemenuitem', 'Backend\Menus::updatemenuitem',['filter' => 'authGuard']);

$routes->get('admin/menus/delmenuitem', 'Backend\Menus::delmenuitem',['filter' => 'authGuard']);




//$routes->get('admin/media_library/select', 'Backend\Media_library::select',['filter' => 'authGuard']);

//profile routes
$routes->get('attorney_profiles', 'frontend\Profile_management');

//blog routes
$routes->get('blogs', 'Frontend\BlogController');
$routes->get('blogs/(:any)', 'Frontend\BlogController::index/$1');
$routes->get('blog/(:any)', 'Frontend\BlogController::show/$1');

$routes->get('press', 'Frontend\ResourceController::index/press');

$routes->get('resources', 'Frontend\ResourceController');
$routes->get('resources/(:any)', 'Frontend\ResourceController::index/$1');

//$routes->get('attorney_details', 'frontend\Profile::attorney_details');

$routes->get('attorney_details/(:num)', 'frontend\Profile::attorney_details/$1');
$routes->get('advisory-board', 'frontend\Advisory_Board');
$routes->get('advisory-board-member/(:num)', 'frontend\Advisory_Board::advisory_board_member/$1');

$routes->match(['get', 'post'],'admin/hotel_management', 'Backend\Hotel_Management',['filter' => 'authGuard']);
$routes->get('admin/hotel_management/add', 'Backend\Hotel_Management::add',['filter' => 'authGuard']);
$routes->post('admin/hotel_management/create', 'Backend\Hotel_Management::create',['filter' => 'authGuard']);
$routes->get('admin/hotel_management/edit/(:num)', 'Backend\Hotel_Management::edit/$1',['filter' => 'authGuard']);
$routes->get('admin/hotel_management/delete/(:num)', 'Backend\Hotel_Management::delete/$1',['filter' => 'authGuard']);
$routes->get('admin/hotel_management/changestatus/(:num)', 'Backend\Hotel_Management::changestatus/$1',['filter' => 'authGuard']);
$routes->post('admin/hotel_management/update/(:num)', 'Backend\Hotel_Management::update/$1',['filter' => 'authGuard']);
$routes->match(['get', 'post'],'admin/hotel_gallery/(:num)', 'Backend\Hotel_Management::hotel_gallery/$1',['filter' => 'authGuard']);
$routes->get('admin/hotel_gallery/delete/(:num)', 'Backend\Hotel_Management::delete_gallery/$1',['filter' => 'authGuard']);
$routes->get('admin/hotel_management/changepopular/(:num)', 'Backend\Hotel_Management::changepopular/$1',['filter' => 'authGuard']);


$routes->match(['get', 'post'],'admin/hotel_destination', 'Backend\Hotel_Destination',['filter' => 'authGuard']);
$routes->get('admin/hotel_destination/add', 'Backend\Hotel_Destination::add',['filter' => 'authGuard']);
$routes->post('admin/hotel_destination/create', 'Backend\Hotel_Destination::create',['filter' => 'authGuard']);
$routes->post('admin/hotel_destination/getstate', 'Backend\Hotel_Destination::get_states',['filter' => 'authGuard']);
$routes->get('admin/hotel_destination/edit/(:num)', 'Backend\Hotel_Destination::edit/$1',['filter' => 'authGuard']);
$routes->post('admin/hotel_destination/update/(:num)', 'Backend\Hotel_Destination::update/$1',['filter' => 'authGuard']);
$routes->get('admin/hotel_destination/changestatus/(:num)', 'Backend\Hotel_Destination::changestatus/$1',['filter' => 'authGuard']);
$routes->get('admin/hotel_destination/change_display_homepage/(:num)', 'Backend\Hotel_Destination::change_display_homepage/$1',['filter' => 'authGuard']);
$routes->get('admin/hotel_destination/delete/(:num)', 'Backend\Hotel_Destination::delete/$1',['filter' => 'authGuard']);
$routes->post('admin/hotel_destination/get_hotelDestination', 'Backend\Hotel_Destination::get_hotelDestination',['filter' => 'authGuard']);
$routes->match(['get', 'post'],'admin/destination_gallery/(:num)', 'Backend\Hotel_Destination::hotel_desti_gallery/$1',['filter' => 'authGuard']);
$routes->get('admin/destination_gallery/delete/(:num)', 'Backend\Hotel_Destination::delete_gallery/$1',['filter' => 'authGuard']);

$routes->match(['get', 'post'],'admin/destination_itinerary', 'Backend\Hotel_Destination_Itinerary',['filter' => 'authGuard']);
$routes->get('admin/destination_itinerary/add', 'Backend\Hotel_Destination_Itinerary::add',['filter' => 'authGuard']);
$routes->post('admin/destination_itinerary/create', 'Backend\Hotel_Destination_Itinerary::create',['filter' => 'authGuard']);
$routes->get('admin/destination_itinerary/edit/(:num)', 'Backend\Hotel_Destination_Itinerary::edit/$1',['filter' => 'authGuard']);
$routes->post('admin/destination_itinerary/update/(:num)', 'Backend\Hotel_Destination_Itinerary::update/$1',['filter' => 'authGuard']);
$routes->get('admin/destination_itinerary/changestatus/(:num)', 'Backend\Hotel_Destination_Itinerary::changestatus/$1',['filter' => 'authGuard']);
$routes->get('admin/destination_itinerary/delete/(:num)', 'Backend\Hotel_Destination_Itinerary::delete/$1',['filter' => 'authGuard']);


//$routes->get('/', 'Index::index');
$routes->match(['get', 'post'],'hotel_details/(:num)', 'Frontend\Index::hotel_details/$1');
$routes->post('hotels_listing', 'Frontend\Index::search_result');
$routes->post('enquiry_form', 'Frontend\Index::save_enquiry_form');
$routes->post('review', 'Frontend\Index::save_review');
$routes->match(['get', 'post'],'get_destination', 'Frontend\Index::get_destination');
$routes->match(['get', 'post'],'tour_details/(:num)', 'Frontend\Index::tour_details/$1');
$routes->match(['get', 'post'],'booking_details', 'Frontend\Index::booking');
$routes->match(['get', 'post'],'booking_request', 'Frontend\Index::booking_request_save');
$routes->post('price_filter', 'Frontend\Index::price_filter');


$routes->match(['get', 'post'],'admin/hotel_room', 'Backend\Hotel_room',['filter' => 'authGuard']);
$routes->get('admin/hotel_room/add', 'Backend\Hotel_room::add',['filter' => 'authGuard']);
$routes->post('admin/hotel_room/create', 'Backend\Hotel_room::create',['filter' => 'authGuard']);

$routes->get('admin/hotel_room/edit/(:num)', 'Backend\Hotel_room::edit/$1',['filter' => 'authGuard']);
$routes->post('admin/hotel_room/update/(:num)', 'Backend\Hotel_room::update/$1',['filter' => 'authGuard']);
$routes->get('admin/hotel_room/delete/(:num)', 'Backend\Hotel_room::delete/$1',['filter' => 'authGuard']);

$routes->get('admin/hotel_room/changestatus/(:num)', 'Backend\Hotel_room::changestatus/$1',['filter' => 'authGuard']);

$routes->match(['get', 'post'],'admin/hotel_faqs', 'Backend\Hotel_faqs',['filter' => 'authGuard']);
$routes->get('admin/hotel_faqs/add', 'Backend\Hotel_faqs::add',['filter' => 'authGuard']);
$routes->post('admin/hotel_faqs/create', 'Backend\Hotel_faqs::create',['filter' => 'authGuard']);
$routes->get('admin/hotel_faqs/edit/(:num)', 'Backend\Hotel_faqs::edit/$1',['filter' => 'authGuard']);
$routes->post('admin/hotel_faqs/update/(:num)', 'Backend\Hotel_faqs::update/$1',['filter' => 'authGuard']);
$routes->get('admin/hotel_faqs/delete/(:num)', 'Backend\Hotel_faqs::delete/$1',['filter' => 'authGuard']);
$routes->get('admin/hotel_faqs/changestatus/(:num)', 'Backend\Hotel_faqs::changestatus/$1',['filter' => 'authGuard']);

$routes->match(['get', 'post'],'admin/hotel_banner', 'Backend\Hotel_Banner',['filter' => 'authGuard']);
$routes->get('admin/hotel_banner/add', 'Backend\Hotel_Banner::add',['filter' => 'authGuard']);
$routes->post('admin/hotel_banner/create', 'Backend\Hotel_Banner::create',['filter' => 'authGuard']);
$routes->get('admin/hotel_banner/edit/(:num)', 'Backend\Hotel_Banner::edit/$1',['filter' => 'authGuard']);
$routes->get('admin/hotel_banner/changestatus/(:num)', 'Backend\Hotel_Banner::changestatus/$1',['filter' => 'authGuard']);
$routes->get('admin/hotel_banner/delete/(:num)', 'Backend\Hotel_Banner::delete/$1',['filter' => 'authGuard']);
$routes->post('admin/hotel_banner/update/(:num)', 'Backend\Hotel_Banner::update/$1',['filter' => 'authGuard']);

$routes->match(['get', 'post'],'admin/banner_gallery/(:num)', 'Backend\Hotel_Banner::hotel_banner_gallery/$1',['filter' => 'authGuard']);
$routes->get('admin/hotel_banner/delete_gallery/(:num)', 'Backend\Hotel_Banner::delete_banner_gallery/$1',['filter' => 'authGuard']);

$routes->post('signup', 'Frontend\SignupController::register');
$routes->post('login', 'Frontend\SignupController::login');

$routes->match(['get', 'post'],'admin/usersignup', 'Backend\User_signup',['filter' => 'authGuard']);
$routes->get('attorney_details/(:any)', 'frontend\Profile_management::attorney_details/$1');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
