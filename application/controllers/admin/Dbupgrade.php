<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/** 
 * @author Leo
 * @description Migrate and Upgrade Database 
 * @created 
*/

class Dbupgrade extends CI_Controller {

 public $data;

 public function __construct() {

  parent::__construct();
    $this->load->model('service_model','service');
    $this->load->model('common_model','common_model');
    // if(!$this->common_model->checkAdminUserPermission(,false)) {
    //   redirect(base_url()."admin");
    // }
    if(!$this->session->userdata('admin_id'))
    {
      redirect(base_url()."admin");
    }
    $this->data['theme'] = 'admin';
    $this->data['model'] = 'service';
    $this->data['base_url'] = base_url();
    $this->session->keep_flashdata('error_message');
    $this->session->keep_flashdata('success_message');
    $this->load->helper('user_timezone_helper');
    $this->data['user_role']=$this->session->userdata('role');
    $createDbMigrateQuery = "CREATE TABLE IF NOT EXISTS `db_migrate_info` (  
                              `id` INT NOT NULL AUTO_INCREMENT,
                              `migrate_identify` VARCHAR(255) NOT NULL,
                              `created_at` DATETIME NOT NULL,
                              PRIMARY KEY (`id`) 
                            );";
    $this->db->query($createDbMigrateQuery);
  }

  public function index()
  {
    $key = $_GET['key'];
    if (is_null($key)) {
      echo "<h2 style='color: red; align: center;'>key is compulsory for this request!!!</h2>";
      die();
    }
    if (md5($key) !== "c11bcc1914d112d9a0e3e479843c38ed") {
      echo "<h2 style='color: red; align: center;'>Sorry. Your key is not invalid!</h2>";
      die();
    }
    $rootDir = $_SERVER['DOCUMENT_ROOT'];
    $dir = $rootDir . DIRECTORY_SEPARATOR . "database-upgrade";
    if (is_dir($dir)) {
      if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
          // print_r("<h5>filename: $file : filetype: " . filetype($dir . DIRECTORY_SEPARATOR . $file) . "\n\r</h5>");
          $filePath = $dir.DIRECTORY_SEPARATOR.$file;
          if(substr($file, -4) == ".sql") {
            // echo "<h5>$file</h5>";
            $migrate_identify = substr($file, 0, -4);
            echo "<h5>$migrate_identify</h5>";
            if(!$this->isAlreadyMigrated($migrate_identify)) {
              $sql_contents = file_get_contents($filePath);
              if(!$this->runMigrateSql($sql_contents)) {
                echo "<h5>=> <span style='color: red;'>Failed</span></h5>";
              }
              else {
                echo "<h5>=> <span style='color:blue;'>Success</span></h5>";
              }
              $this->addMigrate($migrate_identify);
            }
            else {
              echo "<h5 style=\"color: blue;\">already migrated &nbsp;&nbsp;&nbsp;&nbsp;<a href='".base_url()."admin/dbupgrade/delete_from_migrate?key=$key&identify=$migrate_identify'> reset migrate </a></h5>";
            }
          }
        }
        closedir($dh);
      }
    }
    exit();
  }

  public function delete_from_migrate() {
    $key = $_GET['key'];
    if (is_null($key)) {
      echo "<h2 style='color: red; align: center;'>key is compulsory for this request!!!</h2>";
      die();
    }
    if (md5($key) !== "c11bcc1914d112d9a0e3e479843c38ed") {
      echo "<h2 style='color: red; align: center;'>Sorry. Your key is not invalid!</h2>";
      die();
    }
    $identify = $_GET['identify'];
    $result = $this->db->delete('db_migrate_info', ["migrate_identify"=>$identify]);
    redirect(base_url()."admin/dbupgrade?key=$key");
  }

  private function isAlreadyMigrated($identify) {
    $this->db->select('*')->where("migrate_identify", $identify)->from("db_migrate_info");
    $result = $this->db->get()->row_array();
    if (is_null($result)) {
      return false;
    }
    return true;
  }

  private function addMigrate($identify) {
    if ($this->isAlreadyMigrated($identify)) {
      return false;
    }
    $data['migrate_identify'] = $identify;
    $data['created_at'] = date('Y.m.d. H:i:s');
    $result = $this->db->insert('db_migrate_info', $data);
    return true;
  }

  private function runMigrateSql($sql_contents) {
    $sql_contents = trim($sql_contents);
    $sqls = preg_split("/;\s/", $sql_contents);
    $errors = array();
    foreach ($sqls as $key => $sql) {
      print_r("<h5>run => $sql</h5>");
      if(!$this->db->query($sql)) {
        $error = $this->db->error();
        array_push($errors, $error);
        echo "<h5>error => code: ".$error['code']." message: <span style='color:red;'>".$error['message']."</h5>";
      }
    }
    if (count($errors) > 0) {
      return false;
    }
    return true;
  }

}
