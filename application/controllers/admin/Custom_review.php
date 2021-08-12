<?php
class custom_review extends CI_Controller
{
    public $data;
    public function __construct()
    {
        parent::__construct();
        error_reporting(0);
        $this->data['theme']  = 'admin';
        $this->data['model'] = 'custom_review';
        $this->load->model('admin_model');
        $this->load->model('service_model','service');
        $this->load->model('common_model','common_model');
        $this->data['base_url'] = base_url();
        $this->data['admin_id'] = $this->session->userdata('id');
        $this->user_role        = !empty($this->session->userdata('user_role')) ? $this->session->userdata('user_role') : 0;
        $this->load->helper('ckeditor');
        // Array with the settings for this instance of CKEditor (you can have more than one)
        $this->data['ckeditor_editor1'] = array(
            //id of the textarea being replaced by CKEditor
            'id' => 'ck_editor_textarea_id',
            // CKEditor path from the folder on the root folder of CodeIgniter
            'path' => 'assets/js/ckeditor',
            // optional settings
            'config' => array(
                'toolbar' => "Full",
                'filebrowserBrowseUrl' => base_url() . 'assets/js/ckfinder/ckfinder.html',
                'filebrowserImageBrowseUrl' => base_url() . 'assets/js/ckfinder/ckfinder.html?Type=Images',
                'filebrowserFlashBrowseUrl' => base_url() . 'assets/js/ckfinder/ckfinder.html?Type=Flash',
                'filebrowserUploadUrl' => base_url() . 'assets/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                'filebrowserImageUploadUrl' => base_url() . 'assets/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                'filebrowserFlashUploadUrl' => base_url() . 'assets/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
            )
        );
    }

    public function review_submit()
    {
        $service_id = $this->uri->segment(2);
        $revierwer_name=$this->input->post('revierwer_name');
        $rating=$this->input->post('rating');
        $review=$this->input->post('review');
        $date = $this->input->post('date_time');

        $data = array(
            'service_id'=>$service_id,
            'rating'=>$rating,
            'review'=>$review,
            'reviewer_name'=>$revierwer_name,
            'created'=>$date
        );

        $this->db->insert('rating_review',$data);

        redirect('admin/custom_review');
    }

    public function review_submit_delete()
    {
        $id = $this->uri->segment(2); 
        $this->db->where('id', $id);
        $this->db->delete('rating_review');
        redirect('admin/custom_review');
    }

    public function review_submit_edit($id)
    {
        // $id = $this->uri->segment(2);
        $this->db->select('*');
        $this->db->from('rating_review');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->row_array();

        if ($this->input->post('savesubmit')) 
        {  
            extract($_POST);
            $this->db->where('id',$id);
            $data = [
                'reviewer_name'=>$this->input->post('revierwer_name'),
                'review'=>$this->input->post('review'),
                'rating'=>$this->input->post('rating'),
                'created'=>$this->input->post('date_time')
            ];
            if($this->db->update('rating_review',$data)) {
                redirect('admin/admin-give-review/'.$result['service_id']);
            }
            else {
                redirect('review_submit_edit/'.$id);
            }
        }
        $this->data['review'] = $result;
        $this->data['page'] = 'admin_edit_review';
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'].'/template');
    }

    public function admin_give_review()
    {
        //echo $this->uri->segment(3);
        $this->data['page'] = 'admin_give_review';
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'].'/template');
    }

    public function index($offset = 0)
    {

        $this->common_model->checkAdminUserPermission(4);
        extract($_POST);
 
        $this->data['page'] = 'index';

        if ($this->input->post('form_submit')) 
        {  
           $service_title = $this->input->post('service_title');
           $category = $this->input->post('category');
           $subcategory = $this->input->post('subcategory');
           $from = $this->input->post('from');
           $to = $this->input->post('to');
           $this->data['list'] =$this->service->service_filter($service_title,$category,$subcategory,$from,$to);
        }
        else
        {
          $this->data['list'] = $this->service->service_list();
        }
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'].'/template');


        //$this->common_model->checkAdminUserPermission(15);
        /* if($this->input->post('form_submit'))
        {
            $data['value'] = $this->input->post('template_content');       
            $this->db->where('key','faq');
            if($this->db->update('faq',$data))
            {
                $message=' <div class="alert alert-success text-center fade in" id="flash_succ_message">Edited successfully.</div>';    
            }
            $this->session->set_flashdata('message',$message);
            redirect(base_url().'admin/faq');
        }

        $this->data['page']        = 'index';
        $this->data['lists']       = $this->admin_model->get_all_footer_menu();
        $this->data['footercount'] = $this->admin_model->footercount();
        $this->data['edit_data'] = $this->admin_model->getSingleData('faq',array('key' =>'faq'));

        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');*/
    }

    public function create()
    {
        if ($this->input->post('form_submit')) {
            if ($this->data['admin_id'] > 1) {
                $this->session->set_flashdata('message', '<p class="alert alert-danger">Permission Denied</p>');
                redirect(base_url() . 'admin/footer_menu');
            } else {
                str_replace("world", "Peter", "Hello world!");
                $value               = $this->input->post('menu_name');
                $table_data['title'] = str_replace(' ', '_', $value);
                if ($this->db->insert('footer_menu', $table_data)) {
                    $message = ' <div class="alert alert-success text-center fade in" id="flash_succ_message">footer widget added successfully. </div>';
                    $this->session->set_flashdata('message', $message);
                    redirect(base_url('admin/' . $this->data['model']));
                }
            }
        }
        $this->data['page'] = 'create';
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    public function edit($cls_id)
    {
        $current_date = date('Y-m-d H:i:s');
        if ($this->data['admin_id'] > 1) {
            $this->session->set_flashdata('message', '<p class="alert alert-danger">Permission Denied</p>');
            redirect(base_url() . 'admin/footer_menu');
        } 
        else {
            if (!empty($cls_id)) {
                if ($this->input->post('form_submit')) {
                    $value               = $this->input->post('menu_name');
                    $table_data['title'] = str_replace(' ', '_', $value);
                    $this->db->update('footer_menu', $table_data, "id = " . $cls_id);
                    $message = ' <div class="alert alert-success text-center fade in" id="flash_succ_message">footer widget edited successfully. </div>';
                    $this->session->set_flashdata('message', $message);
                    redirect(base_url('admin/' . $this->data['model']));
                }
                $this->data['datalist'] = $this->admin_model->edit_footer_menu($cls_id);
                $this->data['page']     = 'edit';
                $this->load->vars($this->data);
                $this->load->view($this->data['theme'] . '/template');
            } else {
                redirect(base_url('admin/' . $this->data['model']));
            }
        }
    }

    public function delete_footer_menu()
    {
        if ($this->data['admin_id'] > 1) {
            $this->session->set_flashdata('message', '<p class="alert alert-danger">Permission Denied</p>');
            redirect(base_url() . 'admin/footer_menu');
        } else {
            $id = $this->input->post('tbl_id');
            if (!empty($id)) {
                $this->db->delete('footer_menu', array(
                    'id' => $id
                ));
                $message = ' <div class="alert alert-success text-center fade in" id="flash_succ_message">footer widget delete successfully. </div>';
                echo 1;
            }
            $this->session->set_flashdata('message', $message);
        }
    }

    public function notification($pag_id)
    {
        $page_id = $pag_id;
        $this->db->set('notify_status', '1', FALSE);
        $this->db->where('page_id', $pag_id);
        $this->db->update('page');
        redirect(base_url("admin/page/edit/" . $page_id));
    }
}
