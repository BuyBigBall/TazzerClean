<?php
    $data = [];
    $default_language_select = default_language();
    if ($this->session->userdata('user_select_language') == '') {
        $data['user_selected'] = $default_language_select['language_value'];
    } else {
        $data['user_selected'] = $this->session->userdata('user_select_language');
    }
    $data['default_language_select'] = $default_language_select;
    $data['active_language'] = active_language();
    $lg = custom_language($data['user_selected']);
    $data['default_language'] = $lg['default_lang'];
    $data['user_language'] = $lg['user_lang'];

    $data['settings'] = settingValue();
    
    $this->load->vars($data);
    
    $this->load->view($theme . '/common/header');
    $this->load->view($theme . '/'.$module . '/' . $page);
    $this->load->view($theme . '/common/footer');