<?php

class Indentlist_Details_Model extends MY_Model {

    protected $_table = 'imis_indent_information_setup_details';
    public $validate = array(
        array(
            'field' => 'name_of_item',
            'label' => 'Item Name',
            'rules' => 'trim|required|xss_clean|is_duplicate[imis_indent_information_setup_details,id,indent_information_setup.name_of_item.descriptio_of_item]'), 
        array(
            'field' => 'indent_quantity',
            'label' => 'Indent Quantity',
            'rules' => 'trim|required|xss_clean|numeric'),
        array(
            'field' => 'unit_price',
            'label' => 'Unit Price',
            'rules' => 'trim|required|xss_clean|numeric'),
    );

    public function __construct()
    {
        parent::__construct();
    }

    public function getDetailByid($id)
    {
        $sql = "SELECT
                    imis_indent_information_setup_details.id,
                    imis_indent_information_setup_details.indent_information_setup,
                    imis_indent_information_setup_details.descriptio_of_item,
                    imis_indent_information_setup_details.name_of_item,
                    imis_indent_information_setup_details.indent_quantity,
                    imis_indent_information_setup_details.UOM,
                    imis_indent_information_setup_details.unit_price,
                    imis_indent_information_approve_setup_details.approve_quantity,
                    imis_indent_information_approve_setup_details.indent_information_approve_setup_id
                    FROM
                    imis_indent_information_setup_details
                    LEFT JOIN imis_indent_information_approve_setup ON imis_indent_information_setup_details.indent_information_setup = imis_indent_information_approve_setup.indent_information_id
                    LEFT JOIN imis_indent_information_approve_setup_details ON imis_indent_information_approve_setup.id = imis_indent_information_approve_setup_details.indent_information_approve_setup_id
                    WHERE
                    imis_indent_information_setup_details.indent_information_setup = ?";
        $binds = array($id);
        return $this->db->query($sql, $binds)->result_array();
        
    }
    public function getItemDetail($id)
    {
        $sql = "SELECT
                item.item_name AS itemName,
                indentDetails.descriptio_of_item AS description,
                indentDetails.indent_quantity AS quantity,
                indentDetails.unit_price AS unitPrice,
                subGroupTable.id AS subGroupId,
                grouptable.id AS groupId,
                categoryTable.id AS categoryId,
                imis_unit_of_measurement.value AS unit,
                item.id AS itemId,
                imis_unit_of_measurement.name AS unitOfmesurement,
                indentDetails.indent_information_setup AS indent_information_setup,
                indentDetails.id AS id
                FROM
                imis_indent_information_setup_details AS indentDetails
                INNER JOIN imis_inventory_item_setup AS item ON indentDetails.name_of_item = item.id
                INNER JOIN imis_group_setup AS grouptable ON item.group_id = grouptable.id
                INNER JOIN imis_category_setup AS categoryTable ON item.category_id = categoryTable.id
                INNER JOIN imis_sub_group_setup AS subGroupTable ON item.sub_group_id = subGroupTable.id
                INNER JOIN imis_unit_of_measurement ON item.unit_of_measurement = imis_unit_of_measurement.id
                WHERE
               indentDetails.id = ?";
        $binds = array($id);
        return $this->db->query($sql, $binds)->result_array();
        
    }

    public function isValidate($data)
    {
        $this->validate($data);
    }

}