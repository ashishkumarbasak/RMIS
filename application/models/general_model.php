<?php

class General_Model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllCommonConfigData($tableName)
    {
        return $this->db->select('id, value, name')
                        ->from($tableName)
                        ->where('is_active', 1)
                        ->order_by('weight desc, name asc')
                        ->get()->result_array();
    }

    public function getOrganizationInfo($org_id)
    {
        $sql = "SELECT
                    hrm_organizations.organization_name,
                    hrm_organizations.short_name,
                    hrm_organizations.address,
                    hrm_attachments.id,
                    hrm_organizations.phone,
                    hrm_organizations.fax,
                    hrm_organizations.email,
                    hrm_organizations.web,
                    hrm_attachments.file_name,
                    hrm_attachments.file_path
                FROM
                    hrm_organizations
                    LEFT JOIN hrm_attachments ON hrm_attachments.id = hrm_organizations.attachment_id
                WHERE
                    hrm_organizations.id = :ID";
        
        $statement = $this->db->conn_id->prepare($sql);
        $statement->bindValue(':ID', (int) $org_id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function getPoliceStation($district_id)
    {
        $this->db->select('value, name, district_id');
        $this->db->where('district_id', $district_id);
        $this->db->order_by('weight desc,name asc');
        $rs = $this->db->get('police_station')->result_array();
        return $rs;
    }

    public function getBankBranch($bank_id)
    {
        $this->db->select('value, name, bank_id');
        $this->db->where('bank_id', $bank_id);
        $this->db->order_by('weight desc,name asc');
        $rs = $this->db->get('bank_branch')->result_array();
        return $rs;
    }

    public function getDocuments($id)
    {
        $sql = "SELECT 
                    hrm_attachments.id,
                    hrm_attachments.file_name,
                    hrm_attachments.`file_path`,
                    hrm_attachments.file_type,
                    hrm_attachments.file_size
                FROM 
                    hrm_attachments 
               WHERE hrm_attachments.id = :ID ";

        $statement = $this->db->conn_id->prepare($sql);

        $statement->bindValue(':ID', (int) $id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function getJasperData($jrxml, $param_data, $module_path)
    {
        $report_path = $_SERVER['DOCUMENT_ROOT'] . $module_path;
        $map = new Java("java.util.HashMap");

        if ($param_data) {
            foreach ($param_data as $pKey => $pVal) {
                $map->put($pKey, $pVal);
            }
        }

        $compileManager = new JavaClass("net.sf.jasperreports.engine.JasperCompileManager");
        $report = $compileManager->compileReport($report_path . $jrxml);

        $class = new JavaClass("java.lang.Class");
        $class->forName("com.mysql.jdbc.Driver");
        $driverManager = new JavaClass("java.sql.DriverManager");

        $conn = $driverManager->getConnection("jdbc:mysql://{$this->db->hostname}:3306/{$this->db->database}?zeroDateTimeBehavior=convertToNull", "{$this->db->username}", "{$this->db->password}");

        $fillManager = new JavaClass("net.sf.jasperreports.engine.JasperFillManager");
        $jasperPrint = $fillManager->fillReport($report, $map, $conn);

        return $jasperPrint;
    }

    public function getReports($format, $jasperPrint, $viewType, $module_path)
    {
        $report_path = $_SERVER['DOCUMENT_ROOT'] . $module_path;
        $reportFileName = "reports";
        switch ($format) {
            case 'html':
                $memoryStream = new java("java.io.ByteArrayOutputStream");
                $exporter = new java("net.sf.jasperreports.engine.export.JRHtmlExporter");
                $exporter->setParameter(java("net.sf.jasperreports.engine.JRExporterParameter")->JASPER_PRINT, $jasperPrint);
                $exporter->setParameter(java("net.sf.jasperreports.engine.JRExporterParameter")->OUTPUT_STREAM, $memoryStream);
                $exporter->exportReport();
                echo java_values($memoryStream->toByteArray());
                break;
            case 'pdf':
                try {
                    $outputPath = $report_path . $reportFileName . ".pdf";
                    $readUrl = site_url("{$module_path}{$reportFileName}.pdf");

                    $sJasperExportManager = new JavaClass("net.sf.jasperreports.engine.JasperExportManager");
                    $sJasperExportManager->exportReportToPdfFile($jasperPrint, $outputPath);
                    
                    if ($viewType == 'preview') {
                        echo '<object data="' . $readUrl . '" TYPE="application/x-pdf" title="pdf" width=780 height=530>
                                    <a href="' . $readUrl . '">shree</a> 
                                </object>';
                    }
                    else {
                        if (file_exists($outputPath)) {
                            header('Content-disposition: attachment; filename="' . $reportFileName . '.pdf"');
                            header('Content-Type: application/pdf');
                            @readfile($outputPath) or die("problem occurs.");
                            unlink($outputPath);
                        }
                    }
                }
                catch (JavaException $ex) {
                    echo $ex;
                }

                break;
            
           case 'xls':
                $outputPath = $report_path . $reportFileName . ".xls";
                $readUrl = site_url("{$module_path}{$reportFileName}.xls");
                //$exporter = new java("net.sf.jasperreports.engine.JRExporter");
                try {
                    $exporter = new java("net.sf.jasperreports.engine.export.JRXlsExporter");
                    $exporter->setParameter(java("net.sf.jasperreports.engine.export.JRXlsExporterParameter")->IS_ONE_PAGE_PER_SHEET, java("java.lang.Boolean")->TRUE);
                    $exporter->setParameter(java("net.sf.jasperreports.engine.export.JRXlsExporterParameter")->IS_WHITE_PAGE_BACKGROUND, java("java.lang.Boolean")->FALSE);
                    $exporter->setParameter(java("net.sf.jasperreports.engine.export.JRXlsExporterParameter")->IS_REMOVE_EMPTY_SPACE_BETWEEN_ROWS, java("java.lang.Boolean")->TRUE);
                    $exporter->setParameter(java("net.sf.jasperreports.engine.JRExporterParameter")->JASPER_PRINT, $jasperPrint);
                    $exporter->setParameter(java("net.sf.jasperreports.engine.JRExporterParameter")->OUTPUT_FILE_NAME, $outputPath);
                } catch (JavaException $ex) {
                    echo $ex;
                }

                header("Content-type: application/vnd.ms-excel");
                header('Content-disposition: attachment; filename="' . $reportFileName . '.xls"');
                //unlink($outputPath);
                break;     
                
        }
    }

}