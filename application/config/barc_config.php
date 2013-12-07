<?php
 
/*
 * common configuration for full project
 */
$config['organization_id'] = 1;     // setup installtion time 
$config['num_paging_row'] = 5;

$config['module_gbank'] = 'GENEBANK';
$config['module_tms'] = 'TMIS';


$config['UPLOAD_ROOT_DIR'] = "uploads/";
$config['MAX_ALLOWED_FILE_SIZE'] = 6000; // KB
$config['ALLOWED_FILE_TYPE'] = "gif|jpg|jpeg|pdf|doc|docx|xls|png";

// reports setup variable..
$config['java_bridge_path'] = "http://localhost:8088/JavaBridge/java/Java.inc"; 

$config['PMM_REPORT_ABS_PATH'] = "D:\\Zend\\Apache2\\htdocs\\natp_barc\\public\\reports\\pmm\\";
$config['VMIS_REPORT_ABS_PATH'] = "D:\\Zend\\Apache2\\htdocs\\natp_barc\\public\\reports\\vmis\\";


/*
 * Common Message
 */
$config['msg_delete_confirmation'] = "Are you sure you want to delete the selected record?";
$config['msg_save'] = "Data Saved Successfully";
$config['msg_update'] = "Data Updated Successfully";
$config['msg_delete'] = "Data Deleted Successfully";
$config['msg_invalid_input'] = "Invalid/Duplicate Input Data, Check Again";

$config['msg_not_save'] = "<span class='red'> -Data was not saved</span>";
$config['msg_not_update'] = "<span class='red'> - Data was not updated</span>";
$config['msg_not_delete'] = "<span class='red'> - This data already used. Data was not deleted.</span>";
//$config['fixed_asset_id'] = 4;

