<?php

defined('BASEPATH') OR exit('No direct script access allowed');

//use Netcarver\Textile;
//use Cartalyst\Sentry\Facades\CI;

class SetPermissionsOptions extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
    }

    public function index()
    {
        $data = array(
            array(
                'module' => 'Payroll',
                'description' => 'Payroll Management System',
                'section' => 'Salary Head (Setup)',
                'premission' => serialize(array(
                    'pmm.setup.salaryhead.view' => 'Allow view salary head information (Menu access)',
                    'pmm.setup.salaryhead.add' => 'Add new salary head information',
                    'pmm.setup.salaryhead.edit' => 'Update salary head information',
                    'pmm.setup.salaryhead.del' => 'Delete salary head information',
                )),
                'weight' => '1'
            ),
            array(
                'module' => 'Payroll',
                'description' => 'Payroll Management System',
                'section' => 'House Rent Policy (Setup)',
                'premission' => serialize(array(
                    'pmm.setup.houserent.view' => 'Allow view house rent policy information (Menu access)',
                    'pmm.setup.houserent.add' => 'Add new house rent policy information',
                    'pmm.setup.houserent.edit' => 'Update house rent policy information',
                    'pmm.setup.houserent.del' => 'Delete house rent policy information',
                )),
                'weight' => '2'
            ),
            array(
                'module' => 'Payroll',
                'description' => 'Payroll Management System',
                'section' => 'Mapping Salary Heads with Scale Grade (Setup)',
                'premission' => serialize(array(
                    'pmm.setup.mappingsalaryhead.view' => 'Allow view mapping salary heads with scale grade information (Menu access)',
                    'pmm.setup.mappingsalaryhead.add' => 'Add new mapping salary heads with scale grade information',
                    'pmm.setup.mappingsalaryhead.edit' => 'Update mapping salary heads with scale grade information',
                    'pmm.setup.mappingsalaryhead.del' => 'Delete mapping salary heads with scale grade information',
                )),
                'weight' => '3'
            ),
            array(
                'module' => 'Payroll',
                'description' => 'Payroll Management System',
                'section' => 'House Maintenance Charge Policy (Setup)',
                'premission' => serialize(array(
                    'pmm.setup.housemaintence.view' => 'Allow view house maintenance charge policy information (Menu access)',
                    'pmm.setup.housemaintence.add' => 'Add new house maintenance charge policy information',
                    'pmm.setup.housemaintence.edit' => 'Update house maintenance charge policy information',
                    'pmm.setup.housemaintence.del' => 'Delete house maintenance charge policy information',
                )),
                'weight' => '4'
            ),
            array(
                'module' => 'Payroll',
                'description' => 'Payroll Management System',
                'section' => 'Dearness Allowance Policy (Setup)',
                'premission' => serialize(array(
                    'pmm.setup.dearness.view' => 'Allow view dearness allowance policy information (Menu access)',
                    'pmm.setup.dearness.add' => 'Add new dearness allowance policy information',
                    'pmm.setup.dearness.edit' => 'Update dearness allowance policy information',
                    'pmm.setup.dearness.del' => 'Delete dearness allowance policy information',
                )),
                'weight' => '5'
            ),
            array(
                'module' => 'Payroll',
                'description' => 'Payroll Management System',
                'section' => 'Festival Allowance Policy (Setup)',
                'premission' => serialize(array(
                    'pmm.setup.festival.view' => 'Allow view festival allowance policy information (Menu access)',
                    'pmm.setup.festival.add' => 'Add new festival allowance policy information',
                    'pmm.setup.festival.edit' => 'Update festival allowance policy information',
                    'pmm.setup.festival.del' => 'Delete festival allowance policy information',
                )),
                'weight' => '6'
            ),
            array(
                'module' => 'Payroll',
                'description' => 'Payroll Management System',
                'section' => 'Salary Scale Fixation Information',
                'premission' => serialize(array(
                    'pmm.scalefixation.view' => 'Allow view salary scale fixation information (Menu access)',
                    'pmm.scalefixation.add' => 'Add new salary scale fixation information',
                    'pmm.scalefixation.edit' => 'Update salary scale fixation information',
                    'pmm.scalefixation.del' => 'Delete salary scale fixation information',
                )),
                'weight' => '7'
            ),
            array(
                'module' => 'Payroll',
                'description' => 'Payroll Management System',
                'section' => 'Additional/Current Charge Allowance Information',
                'premission' => serialize(array(
                    'pmm.allowance.view' => 'Allow view additional/current charge allowance information (Menu access)',
                    'pmm.allowance.add' => 'Add new additional/current charge allowance information',
                    'pmm.allowance.edit' => 'Update additional/current charge allowance information',
                    'pmm.allowance.del' => 'Delete additional/current charge allowance information',
                )),
                'weight' => '8'
            ),
            array(
                'module' => 'Payroll',
                'description' => 'Payroll Management System',
                'section' => 'Employee Monthly Earnings/Deduction Information',
                'premission' => serialize(array(
                    'pmm.emp_monthly.view' => 'Allow view employee monthly earnings/deduction information (Menu access)',
                    'pmm.emp_monthly.add' => 'Add new employee monthly earnings/deduction information',
                    'pmm.emp_monthly.edit' => 'Update employee monthly earnings/deduction information',
                    'pmm.emp_monthly.del' => 'Delete employee monthly earnings/deduction information',
                )),
                'weight' => '9'
            ),
            array(
                'module' => 'Payroll',
                'description' => 'Payroll Management System',
                'section' => 'Monthly Earnings/Deduction for Group of Employee',
                'premission' => serialize(array(
                    'pmm.group_monthly.view' => 'Allow view Monthly Earnings/Deduction for Group of Employee information (Menu access)',
                    'pmm.group_monthly.add' => 'Add new Monthly Earnings/Deduction for Group of Employee information',
                    'pmm.group_monthly.edit' => 'Update Monthly Earnings/Deduction for Group of Employee information',
                    'pmm.group_monthly.del' => 'Delete Monthly Earnings/Deduction for Group of Employee information',
                )),
                'weight' => '10'
            ),
            array(
                'module' => 'Payroll',
                'description' => 'Payroll Management System',
                'section' => 'Employee Residence at Organization Quarter Information',
                'premission' => serialize(array(
                    'pmm.residence.view' => 'Allow view Employee Residence at Organization Quarter information (Menu access)',
                    'pmm.residence.add' => 'Add new Employee Residence at Organization Quarter information',
                    'pmm.residence.edit' => 'Update Employee Residence at Organization Quarter information',
                    'pmm.residence.del' => 'Delete Employee Residence at Organization Quarter information',
                )),
                'weight' => '11'
            ),
            array(
                'module' => 'Payroll',
                'description' => 'Payroll Management System',
                'section' => 'Advance Salary/Loan Information',
                'premission' => serialize(array(
                    'pmm.advance.view' => 'Allow view Advance Salary/Loan information (Menu access)',
                    'pmm.advance.add' => 'Add new Advance Salary/Loan information',
                    'pmm.advance.edit' => 'Update Advance Salary/Loan information',
                    'pmm.advance.del' => 'Delete Advance Salary/Loan information',
                )),
                'weight' => '12'
            ),
            array(
                'module' => 'Payroll',
                'description' => 'Payroll Management System',
                'section' => 'Process Salary/Festival Allowance',
                'premission' => serialize(array(
                    'pmm.process.view' => 'Allow view Process Salary/Festival Allowance (Menu access)',
                    'pmm.process.new' => 'Allow New Process Salary/Festival Allowance',
                    'pmm.process.posting' => 'Allow Posting Processed Salary/Festival Allowance',
                    'pmm.process.rollback' => 'Allow Rollback Processed Salary/Festival Allowance',
                )),
                'weight' => '13'
            ),
            array(
                'module' => 'Payroll',
                'description' => 'Payroll Management System',
                'section' => 'Reports',
                'premission' => serialize(array(
                    'pmm.report.salary_sheet' => 'Allow Generate Monthly Salary Sheet',                    
                    'pmm.report.payslip' => 'Allow Generate Employee Wise Pay Slip',
                    'pmm.report.festival' => 'Allow Generate Festival Allowance Bill for Officers and Staffs',
                    'pmm.report.bank_advice' => 'Allow Generate Bank Advice',
                    'pmm.report.bank_statement' => 'Allow Generate Bank Statement of Salary',
                    'pmm.report.CPF_schdule' => 'Allow Generate CPF Schdule',
                    'pmm.report.gross_net' => 'Allow Generate Gross and Net Salary Statement',
                    'pmm.report.pf_loan' => 'Allow Generate PF Loan Statement',
                    'pmm.report.benevolent' => 'Allow Generate Benevolent Fund',
                    'pmm.report.register' => 'Allow Generate Payroll Register for Employee',
                    'pmm.report.basic_salary' => 'Allow Generate List of Officers/Staffs with Basic Salary',
                    'pmm.report.installment' => 'Allow Generate Installment Information of Loan',
                )),
                'weight' => '14'
            ),
        );

        //$this->db->truncate('permissions');
        $this->db->delete('permissions', array('module' => 'Payroll'));
        $this->db->insert_batch('permissions', $data);

        echo 'Permission options inserted';
    }

}