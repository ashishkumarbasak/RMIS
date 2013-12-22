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

$route['Rmis/Setup/Divisions/edit/(:num)'] = 'Rmis/Setup/Divisions/index/$1';
$route['Rmis/Setup/RegionalStations/edit/(:num)'] = 'Rmis/Setup/RegionalStations/index/$1';
$route['Rmis/Setup/ImplementationSites/edit/(:num)'] = 'Rmis/Setup/ImplementationSites/index/$1';
$route['Rmis/Setup/ProgramAreas/edit/(:num)'] = 'Rmis/Setup/ProgramAreas/index/$1';
$route['Rmis/Setup/ProgramCommittees/edit/(:num)'] = 'Rmis/Setup/ProgramCommittees/index/$1';
$route['Rmis/Setup/Gradings/edit/(:num)'] = 'Rmis/Setup/Gradings/index/$1';

//program form
$route['Rmis/Program/Informations/(:num)'] = 'Rmis/Program/Informations/index/$1';
$route['Rmis/Program/OtherInformations/(:num)'] = 'Rmis/Program/OtherInformations/index/$1';
$route['Rmis/Program/FundSources/(:num)'] = 'Rmis/Program/FundSources/index/$1';
$route['Rmis/Program/ResearchTeams/(:num)'] = 'Rmis/Program/ResearchTeams/index/$1';
$route['Rmis/Program/SteeringCommittees/(:num)'] = 'Rmis/Program/SteeringCommittees/index/$1';
$route['Rmis/Program/ImplementationCommittees/(:num)'] = 'Rmis/Program/ImplementationCommittees/index/$1';
$route['Rmis/Program/ActivityLists/(:num)'] = 'Rmis/Program/ActivityLists/index/$1';
$route['Rmis/Program/MonitorEvaluations/(:num)'] = 'Rmis/Program/MonitorEvaluations/index/$1';
$route['Rmis/Program/RelatedDocuments/(:num)'] = 'Rmis/Program/RelatedDocuments/index/$1';

//project form
$route['Rmis/Project/Informations'] = 'Rmis/Project/Informations/index/0';
$route['Rmis/Project/Informations/(:num)'] = 'Rmis/Project/Informations/index/$1';
$route['Rmis/Project/Informations/(:num)/(:num)'] = 'Rmis/Project/Informations/index/$1/$2';
$route['Rmis/Project/OtherInformations/(:num)/(:num)'] = 'Rmis/Project/OtherInformations/index/$1/$2';
$route['Rmis/Project/FundSources/(:num)/(:num)'] = 'Rmis/Project/FundSources/index/$1/$2';
$route['Rmis/Project/ResearchTeams/(:num)/(:num)'] = 'Rmis/Project/ResearchTeams/index/$1/$2';
$route['Rmis/Project/MonitorCommittee/(:num)/(:num)'] = 'Rmis/Project/MonitorCommittee/index/$1/$2';
$route['Rmis/Project/SteeringCommittees/(:num)/(:num)'] = 'Rmis/Project/SteeringCommittees/index/$1/$2';
$route['Rmis/Project/ImplementationCommittees/(:num)/(:num)'] = 'Rmis/Project/ImplementationCommittees/index/$1/$2';
$route['Rmis/Project/ActivityLists/(:num)/(:num)'] = 'Rmis/Project/ActivityLists/index/$1/$2';
$route['Rmis/Project/MonitorEvaluations/(:num)/(:num)'] = 'Rmis/Project/MonitorEvaluations/index/$1/$2';
$route['Rmis/Project/RelatedDocuments/(:num)/(:num)'] = 'Rmis/Project/RelatedDocuments/index/$1/$2';

//experiment form
$route['Rmis/Experiment/Informations'] = 'Rmis/Experiment/informations/index/Independent/0/0';
$route['Rmis/Experiment/Informations/(:any)/(:num)/(:num)'] = 'Rmis/Experiment/Informations/index/$1/$2/$3';
$route['Rmis/Experiment/OtherInformations/(:any)/(:num)/(:num)'] = 'Rmis/Experiment/OtherInformations/index/$1/$2/$3';
$route['Rmis/Experiment/ResearchTeams/(:any)/(:num)/(:num)'] = 'Rmis/Experiment/ResearchTeams/index/$1/$2/$3';
$route['Rmis/Experiment/ActivityLists/(:any)/(:num)/(:num)'] = 'Rmis/Experiment/ActivityLists/index/$1/$2/$3';

//program or project form
$route['Rmis/Closing/Information/(:any)/(:num)'] = 'Rmis/Closing/Information/index/$1/$2';
$route['Rmis/Closing/Information/(:any)/(:num)/(:num)'] = 'Rmis/Closing/Information/index/$1/$2/$3';

//logical framework form
$route['Rmis/Framework/Logical/(:any)/(:num)'] = 'Rmis/Framework/Logical/index/$1/$2';
$route['Rmis/Framework/Logical/(:any)/(:num)/(:num)'] = 'Rmis/Framework/Logical/index/$1/$2/$3';

//release technology
$route['Rmis/Released/Technology/(:any)/(:num)'] = 'Rmis/Released/Technology/index/$1/$2';
$route['Rmis/Released/Technology/(:any)/(:num)/(:num)'] = 'Rmis/Released/Technology/index/$1/$2/$3';

/* End of file routes.php */
/* Location: ./application/config/routes.php */

// custome route

// user module
$route['User/logout'] = "User/Login/logout";
