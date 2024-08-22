<?php
namespace App\Controllers\Backend;
use CodeIgniter\Controller; 
use App\Controllers\BaseController;
use App\Models\Video;
use App\Models\Category;
use App\Models\Custom_form;
use App\Libraries\Common_Functions;
use App\Libraries\ckeditor;
use App\Libraries\ckfinder;

class Custom_forms extends BaseController
{
    function __construct()
    {
        $helpers = ['form','url','directory','file'];
        helper(['form', 'url','directory','file']);
        $session=session();
        $data['current_page'] = 'Pages';
        if ($session->has('admin_logged_in')) {
          $this->mViewData['session_data']=$session->get('admin_logged_in');
        }else{
          return view('backend/login/index');
        }
        $this->curUser = $this->mViewData['session_data']['id'];
        $this->path="application/views/themes/admin";
        $this->mViewData['current_page'] = 'Custom Forms';
        $common_functions = new Common_Functions();
        $this->form_elements_with_options=array('dropdown','radiobutton','checkbox');
    }

    public function index()
    {
        $custom_forms = new Custom_form();
        $custom_forms=$custom_forms->get()->getResultArray(); 
        $this->mViewData['page_title'] = 'Admin Panel - Custom Forms';
        $this->mViewData['custom_forms'] = $custom_forms;
        echo view('backend/custom_forms/index', $this->mViewData );
    }

    public function add()
    {
        $this->mViewData['form_action'] = 'create';
        echo view('backend/custom_forms/form', $this->mViewData );
    }

    public function create()
    {
        $custom_form = new Custom_form();

        $custom_form->name = $this->input->post('name');
        $custom_form->title = $this->input->post('title');
        $custom_form->description = $this->input->post('description');
        $custom_form->css_class = $this->input->post('css_class');
        $custom_form->custom_css = $this->input->post('custom_css');
        $custom_form->thankyou_url = $this->input->post('thankyou_url');
        $custom_form->by_ajax = $this->input->post('by_ajax');
        $custom_form->form_class = $this->input->post('form_class');
        $custom_form->parent_class = $this->input->post('parent_class');
        $custom_form->successfull_message = $this->input->post('successfull_message');
        $custom_form->mail_to = $this->input->post('mail_to');
        $custom_form->mail_subject = $this->input->post('mail_subject');
        $custom_form->mail_content = $this->input->post('mail_content');
        $custom_form->include_form_data_in_mail = $this->input->post('include_form_data_in_mail');
        $custom_form->customer_mail_subject = $this->input->post('customer_mail_subject');
        $custom_form->customer_mail_content = $this->input->post('customer_mail_content');
        $custom_form->include_form_data_in_customer_email = $this->input->post('include_form_data_in_customer_email');
        $custom_form->include_captcha = $this->input->post('include_captcha');

        if ($custom_form->save())
        {
            header('location:'.base_url()."admin/custom_forms/edit/".$custom_form->id);	
        }
        else
        {
            $this->mViewData['custom_form'] = $custom_form;
            $this->mViewData['form_action'] = 'create';
            $this->render('backend/custom_forms/form', 'index');
        }
    }

    public function responses()
    {  
        $id = $this->uri->segment(4);
        $custom_form = new Custom_form();
        $custom_form->where("id",$id)->get();
        $custom_form->form_element->include_join_fields()->order_by("sort_order",'ASC')->get();

        $custom_form_responses = new Custom_form_response();
        $custom_form_responses->where("custom_form_id",$id)->order_by("created_at",'DESC')->get();

        $this->mViewData['custom_form_responses'] = $custom_form_responses;
        $this->mViewData['custom_form'] = $custom_form;
        $this->render('backend/custom_forms/responses', 'default');
    }

    public function edit()
    {
        $id = $this->uri->segment(4);
        $custom_form = new Custom_form();
        $custom_form->where("id",$id)->get();
        $custom_form->form_element->include_join_fields()->order_by("sort_order",'ASC')->get();
        $this->mViewData['custom_form'] = $custom_form;
        $this->mViewData['form_action'] = 'update';
        $this->render('backend/custom_forms/editform', 'index');
    }

    public function update()
    {
        $custom_form = new Custom_form();

        $custom_form->id = $this->input->post('id');    
        $custom_form->name = $this->input->post('name');
        $custom_form->title = $this->input->post('title');
        $custom_form->description = $this->input->post('description');
        $custom_form->css_class = $this->input->post('css_class');
        $custom_form->custom_css = $this->input->post('custom_css');
        $custom_form->form_class = $this->input->post('form_class');
        $custom_form->parent_class = $this->input->post('parent_class');
        $custom_form->by_ajax = $this->input->post('by_ajax');
        $custom_form->successfull_message = $this->input->post('successfull_message');
        $custom_form->mail_to = $this->input->post('mail_to');
        $custom_form->mail_subject = $this->input->post('mail_subject');
        $custom_form->mail_content = $this->input->post('mail_content');
        $custom_form->include_form_data_in_mail = $this->input->post('include_form_data_in_mail');
        $custom_form->customer_mail_subject = $this->input->post('customer_mail_subject');
        $custom_form->customer_mail_content = $this->input->post('customer_mail_content');
        $custom_form->include_form_data_in_customer_email = $this->input->post('include_form_data_in_customer_email');
        $custom_form->include_captcha = $this->input->post('include_captcha');
        $custom_form->thankyou_url = $this->input->post('thankyou_url');

        if ($custom_form->save())
        {
            header('location:'.base_url()."admin/custom_forms/edit/".$custom_form->id);
        }
        else
        {
            foreach($custom_form->errors->all as $e)
            {
                echo " : ".$e;
            }
            exit;
            $this->mViewData['custom_form'] = $custom_form;
            $this->mViewData['form_action'] = 'update';
            $this->render('backend/custom_forms/editform', 'index');
        }
    }

    function addelement() 
    {     
        $custom_form_id = $this->input->post('custom_form_id');
        $element_type = $this->input->post('element_type');
        $this->data['custom_form_id'] = $custom_form_id;
        $this->data['element_type'] = $element_type;
        $this->data['inner_view'] = 'backend/custom_forms/'.$element_type;
        $this->load->view('backend/theme/_layouts/blank', $this->data);
    }

    function updatevalidations()
    {
        $validations = json_encode($this->input->post('validations'));
        $form_element = new Form_element();
        $form_element->id = $this->input->post('form_element_id');
        $form_element->validations = $validations;
        $form_element->save();
        redirect($_SERVER['HTTP_REFERER']);
    }

    function createnewelement()
    {
        $form_element = new Form_element();
        $form_element->custom_form_id = $this->input->post('custom_form_id');
        $form_element->element_type = str_replace("new","",$this->input->post('element_type'));
        $form_element->title = $this->input->post('title');
        $form_element->element_key = $this->common_functions->create_unique_slug($this->input->post('title'),'form_elements');
        $form_element->default_value = $this->input->post('default_value');
        $form_element->placeholder_text = $this->input->post('placeholder_text');
        $form_element->is_required = $this->input->post('is_required');
        $form_element->css_class = $this->input->post('css_class');
        $form_element->custom_css = $this->input->post('custom_css');
        $form_element->parent_css_class = $this->input->post('parent_css_class');
        $form_element->show_title = $this->input->post('show_title');
        if ($form_element->show_title) { $form_element->label_position = $this->input->post('label_position'); }
        $form_element->sort_order = $this->input->post('sort_order');
        if ($form_element->sort_order == '') { $form_element->sort_order = 0; }
        $form_element->no_of_rows = $this->input->post('no_of_rows');
        if ($form_element->no_of_rows == '') { $form_element->no_of_rows = 0; }

        if($form_element->save())
        {
            if((in_array($form_element->element_type,$this->form_elements_with_options)==1))
            {
                if($_POST['options'] and count($_POST['options']) > 0)
                {
                    foreach($_POST['options'] as $key=>$option_value)
                    {
                        $form_element_option = new Form_element_option();
                        $form_element_option->option_value = $option_value;
                        $form_element_option->form_element_id = $form_element->id; 
                        $form_element_option->save();
                    }
                }
            }
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    function managevalidations() 
    {     
        $form_element = new Form_element();

        $element_id = $this->input->post('element_id');
        $form_element->where("id",$element_id)->get();

        $element_type = $form_element->element_type;
        $custom_form_id = $form_element->custom_form_id;

        $this->data['validations'] = unserialize(CUSTOM_FORM_VALIDATIONS);
        $this->data['custom_form_id'] = $custom_form_id;
        $this->data['element_type'] = $element_type;
        $this->data['form_element'] = $form_element;
        $this->data['element_validations'] = json_decode($form_element->validations);
        $this->data['inner_view'] = 'backend/custom_forms/validations';
        $this->load->view('backend/theme/_layouts/blank', $this->data);
    }

    function editelement() 
    {     
        $form_element = new Form_element();
        $element_id = $this->input->post('element_id');
        $form_element->where("id",$element_id)->get();
        $element_type = $form_element->element_type;
        $custom_form_id = $form_element->custom_form_id;
        $this->data['custom_form_id'] = $custom_form_id;
        $this->data['element_type'] = $element_type;
        $this->data['form_element'] = $form_element;
        $this->data['inner_view'] = 'backend/custom_forms/new'.$element_type;
        $this->load->view('backend/theme/_layouts/blank', $this->data);
    }

    function updateelement()
    {
        $form_element_old = new Form_element();
        $element_id = $this->input->post('form_element_id');
        $form_element_old->where("id",$element_id)->get();

        $form_element = new Form_element();

        $form_element->id = $this->input->post('form_element_id');
        $form_element->custom_form_id = $this->input->post('custom_form_id');
        $form_element->element_type = str_replace("new","",$this->input->post('element_type'));
        if ($form_element_old->element_key == "") {
            $form_element->element_key = $this->common_functions->create_unique_slug($this->input->post('title'),'form_elements','element_key');
        }
        $form_element->placeholder_text = $this->input->post('placeholder_text');
        $form_element->title = $this->input->post('title');
        $form_element->default_value = $this->input->post('default_value');
        $form_element->is_required = $this->input->post('is_required');
        $form_element->css_class = $this->input->post('css_class');
        $form_element->custom_css = $this->input->post('custom_css');
        $form_element->parent_css_class = $this->input->post('parent_css_class');
        $form_element->show_title = $this->input->post('show_title');
        if ($form_element->show_title) { $form_element->label_position = $this->input->post('label_position'); }
        $form_element->sort_order = $this->input->post('sort_order');
        if ($form_element->sort_order == '') { $form_element->sort_order = 0; }
        $form_element->no_of_rows = $this->input->post('no_of_rows');
        if ($form_element->no_of_rows == '') { $form_element->no_of_rows = 0; }

        if($form_element->save())
        {
            if((in_array($form_element->element_type,$this->form_elements_with_options)==1))
            {
                print_r($_POST['options']);
                exit;
                $existing_options = array();
                $form_element->form_element_option->include_join_fields()->get();
                foreach($form_element->form_element_option as $form_element_option) {
                }
                if($_POST['options'] and count($_POST['options']) > 0)
                {
                    foreach($_POST['options'] as $key=>$option_value)
                    {
                        $form_element_option = new Form_element_option();
                        $form_element_option->option_value = $option_value;
                        $form_element_option->form_element_id = $form_element->id; 
                        $form_element_option->save();
                    }
                } 
            }
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    function removeelement()
    {
        $form_element = new Form_element();
        $custom_form_id = $this->input->post('custom_form_id');
        $form_element->where("id",$custom_form_id)->get();
        $form_element->delete_all();
        echo "done";
        exit;
    }

    public function delete($id)
    {
        $custom_forms = new Custom_form();
        $custom_forms->where("id",$id);
        $custom_forms->get();

        $custom_form_response = new Custom_form_response();
        $custom_form_response->where("custom_form_id",$id);
        $custom_form_response->get();

        $custom_form_response_value = new Custom_form_response_value();
        $custom_form_response_value->where("custom_form_response_id",$custom_form_response->id);
        $custom_form_response_value->get();

        $form_element = new Form_element();
        $form_element->where("custom_form_id",$id);
        $form_element->get();

        $form_element_option = new Form_element_option();
        $form_element_option->where("form_element_id",$form_element->id);
        $form_element_option->get();

        $custom_form_response_value->delete_all();
        $form_element_option->delete_all();
        $form_element->delete_all();
        $custom_form_response->delete_all();
        $custom_forms->delete_all();

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function changestatus()
    {
        $id = $this->uri->segment(4);
        $this->data['action'] = 'update';
        $banner = $this->events_model->getById($id);
        //print_r($this->data['newsletter']);
        extract ($banner);
        if( $status==1){
            $new_status=0;
        }
        else
        {
            $new_status=1;
        }
        $mdata['status'] = $new_status;
        $res=$this->events_model->update_info($mdata, $id);
        if($res)
        {
            header('location:'.base_url()."admin/events".$this->index());
        }
    }
}