<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.2.4 or newer
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the Academic Free License version 3.0
 *
 * This source file is subject to the Academic Free License (AFL 3.0) that is
 * bundled with this package in the files license_afl.txt / license_afl.rst.
 * It is also available through the world wide web at this URL:
 * http://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to obtain it
 * through the world wide web, please send an email to
 * licensing@ellislab.com so we can send you a copy immediately.
 *
 * @package		CodeIgniter
 * @author		EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2013, EllisLab, Inc. (http://ellislab.com/)
 * @license		http://opensource.org/licenses/AFL-3.0 Academic Free License (AFL 3.0)
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

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
|	http://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'User/Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['Rmis/setup/divisions/edit/(:num)'] = 'Rmis/setup/divisions/index/$1';
$route['Rmis/setup/regionalStations/edit/(:num)'] = 'Rmis/setup/regionalStations/index/$1';
$route['Rmis/setup/implementationSites/edit/(:num)'] = 'Rmis/setup/implementationSites/index/$1';
$route['Rmis/setup/programAreas/edit/(:num)'] = 'Rmis/setup/programAreas/index/$1';
$route['Rmis/setup/programCommittees/edit/(:num)'] = 'Rmis/setup/programCommittees/index/$1';
$route['Rmis/setup/gradings/edit/(:num)'] = 'Rmis/setup/gradings/index/$1';

//program form
$route['Rmis/program/informations/(:num)'] = 'Rmis/program/informations/index/$1';
$route['Rmis/program/otherInformations/(:num)'] = 'Rmis/program/otherInformations/index/$1';
$route['Rmis/program/fundSources/(:num)'] = 'Rmis/program/fundSources/index/$1';
$route['Rmis/program/researchTeams/(:num)'] = 'Rmis/program/researchTeams/index/$1';
$route['Rmis/program/steeringCommittees/(:num)'] = 'Rmis/program/steeringCommittees/index/$1';
$route['Rmis/program/implementationCommittees/(:num)'] = 'Rmis/program/implementationCommittees/index/$1';
$route['Rmis/program/activityLists/(:num)'] = 'Rmis/program/activityLists/index/$1';
$route['Rmis/program/monitorEvaluations/(:num)'] = 'Rmis/program/monitorEvaluations/index/$1';
$route['Rmis/program/relatedDocuments/(:num)'] = 'Rmis/program/relatedDocuments/index/$1';

//project form
$route['Rmis/project/informations'] = 'Rmis/project/informations/index/0';
$route['Rmis/project/informations/(:num)'] = 'Rmis/project/informations/index/$1';
$route['Rmis/project/informations/(:num)/(:num)'] = 'Rmis/project/informations/index/$1/$2';
$route['Rmis/project/otherInformations/(:num)/(:num)'] = 'Rmis/project/otherInformations/index/$1/$2';
$route['Rmis/project/fundSources/(:num)/(:num)'] = 'Rmis/project/fundSources/index/$1/$2';
$route['Rmis/project/researchTeams/(:num)/(:num)'] = 'Rmis/project/researchTeams/index/$1/$2';
$route['Rmis/project/monitorCommittee/(:num)/(:num)'] = 'Rmis/project/monitorCommittee/index/$1/$2';
$route['Rmis/project/steeringCommittees/(:num)/(:num)'] = 'Rmis/project/steeringCommittees/index/$1/$2';
$route['Rmis/project/implementationCommittees/(:num)/(:num)'] = 'Rmis/project/implementationCommittees/index/$1/$2';
$route['Rmis/project/activityLists/(:num)/(:num)'] = 'Rmis/project/activityLists/index/$1/$2';
$route['Rmis/project/monitorEvaluations/(:num)/(:num)'] = 'Rmis/project/monitorEvaluations/index/$1/$2';
$route['Rmis/project/relatedDocuments/(:num)/(:num)'] = 'Rmis/project/relatedDocuments/index/$1/$2';

//experiment form
$route['Rmis/experiment/informations'] = 'Rmis/experiment/informations/index/Independent/0/0';
$route['Rmis/experiment/informations/(:any)/(:num)/(:num)'] = 'Rmis/experiment/informations/index/$1/$2/$3';
$route['Rmis/experiment/otherInformations/(:any)/(:num)/(:num)'] = 'Rmis/experiment/otherInformations/index/$1/$2/$3';
$route['Rmis/experiment/researchTeams/(:any)/(:num)/(:num)'] = 'Rmis/experiment/researchTeams/index/$1/$2/$3';
$route['Rmis/experiment/activityLists/(:any)/(:num)/(:num)'] = 'Rmis/experiment/activityLists/index/$1/$2/$3';

//program or project form
$route['Rmis/closing/information/(:any)/(:num)'] = 'Rmis/closing/information/index/$1/$2';
$route['Rmis/closing/information/(:any)/(:num)/(:num)'] = 'Rmis/closing/information/index/$1/$2/$3';

//logical framework form
$route['Rmis/framework/logical/(:any)/(:num)'] = 'Rmis/framework/logical/index/$1/$2';
$route['Rmis/framework/logical/(:any)/(:num)/(:num)'] = 'Rmis/framework/logical/index/$1/$2/$3';

//release technology
$route['Rmis/release/technology/(:any)/(:num)'] = 'Rmis/release/technology/index/$1/$2';
$route['Rmis/release/technology/(:any)/(:num)/(:num)'] = 'Rmis/release/technology/index/$1/$2/$3';

/* End of file routes.php */
/* Location: ./application/config/routes.php */

// custome route

// user module
$route['User/logout'] = "User/Login/logout";
