<?php

class Indentlist_Model extends MY_Model {

    protected $_table = 'imis_indent_information_setup';
    public $validate = array(
        array(
            'field' => 'indent_ref_no',
            'label' => 'Indent ref No.',
            'rules' => 'trim|required|xss_clean|unique[imis_indent_information_setup.indent_ref_no,imis_indent_information_setup.id]'),
        array(
            'field' => 'indent_to',
            'label' => 'Indent To',
            'rules' => 'trim|required|xss_clean'),
        array(
            'field' => 'financial_year',
            'label' => 'Financial Year',
            'rules' => 'trim|required|xss_clean'),
        array(
            'field' => 'date_of_indent',
            'label' => 'Date Of Indent',
            'rules' => 'trim|required|xss_clean'),
        array(
            'field' => 'store_name',
            'label' => 'Store Name',
            'rules' => 'trim|required|xss_clean'),
        array(
            'field' => 'requested_by',
            'label' => 'Requested By',
            'rules' => 'trim|required|xss_clean'),
        
    );

    public function __construct()
    {
        parent::__construct();
    }

    public function getIndentInformationByID($id)
    {
        $sql = "SELECT
                indentMaster.id AS id,
                indentMaster.name_of_store AS name_of_store,
                indentMaster.financial_year AS financial_year,
                indentMaster.indent_ref_no AS indent_ref_no,
                indentMaster.project_name AS project_name,
                indentMaster.date_of_indent AS date_of_indent,
                indentMaster.indent_to AS indent_to,
                indentMaster.indent_request_by AS indent_request_by,
                indentMaster.remarks AS remarks,
                indentMaster.`status` AS `status`,
                indentMaster.final_status AS final_status,
                indentMaster.approve_by AS approve_by,
                indentMaster.final_remarks AS final_remarks,
                indentMaster.approve_date AS approve_date,
                employee.employee_name AS indent_to_name
                FROM
                imis_indent_information_setup AS indentMaster
INNER JOIN hrm_employees AS employee ON indentMaster.indent_to = employee.id
             WHERE indentMaster.id = :ITEM_ID";

        $statement = $this->db->conn_id->prepare($sql);
        $statement->bindValue(':ITEM_ID', (int) $id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function isValidate($data)
    {
        $this->validate($data);
    }

}