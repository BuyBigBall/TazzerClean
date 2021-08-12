<?php

if(!function_exists('settings')){
  
  function settings($val){
    $ci =& get_instance();
    $settings = $ci->db->query("select * from system_settings WHERE status = 1")->result_array();
    $result=array();

    if(!empty($settings)){
      foreach($settings as $datas){
        if($datas['key']=='currency_option'){
         $result['currency'] = $datas['value'];
        }
      }
    }

    if(!empty($result[$val]))
	  {
	     $results= $result[$val];
	  }
	  else
	  {
	     $results= 'INR';
	  }

    return $results;
  }
}

/**
 * @Leo SettingValue func upgrade
 * @param $key, if $key is empty, then returns all setting values with their keys
 * @return $value or $setting value array 
*/
if (!function_exists('settingValue')) {
  
  function settingValue($key = null){
    $ci =& get_instance();
    if(!empty($key)){
       $settings = $ci->db->where('key=',$key)->get('system_settings')->row_array();
       if(!empty($settings)){
          return $settings['value'];
       }else{
          return "";
       }
    }
    else {
      $allSettings = $ci->db->select('*')->from('system_settings')->get()->result_array();
      $result = array();
      foreach($allSettings as $setting) {
        $result[$setting['key']] = $setting["value"];
      }
      return $result;
    }
  }
}

if (!function_exists("host_seller_site")) {
  // code...
  function host_seller_site() {
    return settingValue("host_seller_site")=="on"?true:false;
  }
}
  
if (!function_exists('currencyConverter')) {
  
  function currencyConverter($from, $to) {

    $url = 'https://free.currconv.com/api/v7/convert?q=' . $from . '_' . $to . ',' . $to . '_' . $from . '&compact=ultra&apiKey=de2f3dcf8b88d2d760d4';

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


    $headers = array();
    $headers[] = 'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.89 Safari/537.36';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);
    print_r($result);
  }
}

function removeTag($data){
  
    foreach ($data as $key => $value) {
      if(!is_array($value)){
        $_POST[$key]=strip_tags($value);
      }
    }
   return $_POST;
}
/** 
 * @author Leo: add ip_info() func in common helper
 * @return location(address, city, country, continent, etc.) respected to ip
*/
if(!function_exists('ip_info')) {
  
  function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
    $output = NULL;
    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
      $ip = $_SERVER["REMOTE_ADDR"];
      if ($deep_detect) {
        if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
          $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
          $ip = $_SERVER['HTTP_CLIENT_IP'];
      }
    }
    $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
    $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
    $continents = array(
      "AF" => "Africa",
      "AN" => "Antarctica",
      "AS" => "Asia",
      "EU" => "Europe",
      "OC" => "Australia (Oceania)",
      "NA" => "North America",
      "SA" => "South America"
    );
    if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
      $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
      if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
        switch ($purpose) {
          case "location":
            $output = array(
              "city"           => @$ipdat->geoplugin_city,
              "state"          => @$ipdat->geoplugin_regionName,
              "country"        => @$ipdat->geoplugin_countryName,
              "country_code"   => @$ipdat->geoplugin_countryCode,
              "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
              "continent_code" => @$ipdat->geoplugin_continentCode
            );
            break;
          case "address":
            $address = array($ipdat->geoplugin_countryName);
            if (@strlen($ipdat->geoplugin_regionName) >= 1)
              $address[] = $ipdat->geoplugin_regionName;
            if (@strlen($ipdat->geoplugin_city) >= 1)
              $address[] = $ipdat->geoplugin_city;
            $output = implode(", ", array_reverse($address));
            break;
          case "city":
            $output = @$ipdat->geoplugin_city;
            break;
          case "state":
            $output = @$ipdat->geoplugin_regionName;
            break;
          case "region":
            $output = @$ipdat->geoplugin_regionName;
            break;
          case "country":
            $output = @$ipdat->geoplugin_countryName;
            break;
          case "countrycode":
            $output = @$ipdat->geoplugin_countryCode;
            break;
        }
      }
    }
    return $output;
  }

}
/** 
 * @author Leo 
 * @description get real client ip address
 * @return ip address
*/
if (!function_exists('get_client_ip_address')) {
  // code...
  function get_client_ip_address() {
    //whether ip is from the share internet  
    if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
      $ip = $_SERVER['HTTP_CLIENT_IP'];  
    }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
    }  
    //whether ip is from the remote address  
    else{  
      $ip = $_SERVER['REMOTE_ADDR'];  
    }  
    return $ip; 
  }
}
/**
 * @author Leo: 
 * @return stripe keys => pub_key, secret_key, rest_key, mode
*/
if(!function_exists('stripeKeys')) {

  function stripeKeys() {
    $id = settingValue('stripe_option');
    $ci =& get_instance();
    $data = $ci->db->where('id=',$id)->get('payment_gateways')->row_array();
    if (is_array($data)) {
      return [
        "pub_key" => $data['api_key'],
        "secret_key" => $data['secret_key'],
        "rest_key" => $data['rest_key'],
        "mode" => $data['gateway_type']
      ];
    }
    return [];
  }

}

/**
 * @author Leo: 
 * @return String (stripe Mode: 'test' or 'live')
*/
if(!function_exists('stripeMode')) {

  function stripeMode() {
    $id = settingValue('stripe_option');
    $ci =& get_instance();
    $data = $ci->db->where('id=',$id)->get('payment_gateways')->row_array();
    if (is_array($data) && isset($data['gateway_type'])) {
      return $data["gateway_type"];
    }
    else 
      return "test";
  }

}

/**
 * @author Leo: get popular services
 * @param limit number 
 * @return array
*/
if(!function_exists('getPopularServices')) {

  function getPopularServices($limit = 3) {
    $ci =& get_instance();
    $ci->db->from('services');
    $ci->db->order_by('total_views', 'DESC');
    $ci->db->limit($limit);
    return $ci->db->get()->result_array();
  }

}

/**
 * @author Leo: get popular service categories
 * @param limit number 
 * @return array
*/
if(!function_exists('getPopularCategories')) {

  function getPopularCategories($limit = 3) {
    $ci =& get_instance();
    $ci->load->model("Categories_model");
    return $ci->Categories_model->getPopularCategories($limit);
  }

}

/**
 * @author Leo: count service
 * @param where condition
 * @return number
*/
if(!function_exists('countServices')) {

  function countServices($params = null) {
    $ci =& get_instance();
    $ci->db->from('services');
    return $ci->db->count_all_results();
  }

}

/**
 * @author Leo: get categories
 * @param bool (only category_name?)
 * @return array - category list
*/
if(!function_exists('getCategoryList')) {

  function getCategoryList($onlyNames = false) {
    $ci =& get_instance();
    $ci->db->select('*');
    $ci->db->from('categories');
    $ci->db->where('status', 1);
    $ci->db->order_by('category_name', 'asc');
    $result = $ci->db->get()->result_array();
    if (!$onlyNames) {
      return $result;
    }
    else {
      $categoryNames = [];
      foreach ($result as $key => $value) {
        array_push($categoryNames, $value['category_name']);
      }
      return $categoryNames;
    }
  }

}

/**
 * @author Leo: get valid service locations
 * @return array - location list
*/
if(!function_exists('validServiceLocations')) {

  function validServiceLocations() {
    $ci = & get_instance();
    $ci->db->select('service_location');
    $ci->db->from('services');
    $ci->db->group_by('service_location');
    $result = $ci->db->get()->result_array();
    $locations = array();
    foreach ($result as $key => $value) {
      array_push($locations, $value['service_location']);
    }
    return $locations;
  }

}

/**
 * @author Leo: get paypal access token
 * @return string access token
*/
if(!function_exists('paypalKeys')) {

  function paypalKeys($key = null) {
    $id = settingValue('paypal_option');
    $ci =& get_instance();
    $data = $ci->db->where('id=',$id)->get('paypal_payment_gateways')->row_array();
    if (is_array($data)) {
      $data['api_base_url'] = "https://api-m.paypal.com";
      if ($data['gateway_type'] == "sandbox") {
        $data['api_base_url'] = "https://api-m.sandbox.paypal.com";
      }
      if (!is_null($key)) {
        return $data[$key];
      }
      return $data;
    }
    if (!is_null($key)) {
      return null;
    }
    return [];
    // $clientId = "ARRiN8MYWLHAcwIIt228Nv_Pzg0bdgSLF7PpC1-rHKHhgwRuWD6A9SC9oHlaqsLwXCopx4rYPahSeS3n";
    // $secret = "EFYbXZRpL1fNzCU5bd_arfLYeBvKqgH1szw8zK5JYCuyNQ4Nin2No6Goua8oCU11lPDOgxcu_wwlupGj";
    // // $clientId = "AX7ZY6bdtW1dU3HOgZyRsgVKnHB1LmloSh2gR3PDOpKrQBaSklJRWkq-ECKXBvNQEWAR3t-uaONig_md";
    // // $secret = "EBy5N9Xjw6de-Ng8dFY4DXY5CTw6yxEp3N18ObppqmgU6hjByJYcqBjGZjQuCkm3FqjypXXiF_Ugl0_Y";
    // $mode = "sandbox";
    // $data = ["client_id"=>$clientId, "secret"=>$secret, "mode"=>$mode];
    // return $data;
  }

}

/**
 * @author Leo: get paypal access token
 * @return string access token
*/
if(!function_exists('getPaypalAccessToken')) {

  function getPaypalAccessToken() {
    $paypalKeys = paypalKeys();
    $clientId = $paypalKeys["client_id"];
    $secret = $paypalKeys["secret"];

    $curl = curl_init();

    // curl_setopt_array($curl, array(
    //   CURLOPT_URL => "https://api.sandbox.paypal.com/v1/oauth2/token",
    //   CURLOPT_RETURNTRANSFER => true,
    //   CURLOPT_ENCODING => "",
    //   CURLOPT_MAXREDIRS => 10,
    //   CURLOPT_TIMEOUT => 30,
    //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //   CURLOPT_CUSTOMREQUEST => "POST",
    //   CURLOPT_POSTFIELDS => "grant_type=client_credentials",
    //   CURLOPT_USERPWD => $clientId.":".$secret,
    //   CURLOPT_HTTPHEADER => array(
    //     'accept: application/json',
    //     'accept-language: en_US',
    //     'authorization: basic '.$clientId,     // ???
    //     'content-type: application/x-www-form-urlencoded'
    //   ),
    // ));

    curl_setopt($curl, CURLOPT_URL, $paypalKeys['base_api_url']."/v1/oauth2/token");
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    // curl_setopt($curl, CURLOPT_SSLVERSION , 6); //NEW ADDITION
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
    curl_setopt($curl, CURLOPT_USERPWD, $clientId.":".$secret);
    curl_setopt($curl, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
    
    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      // echo "cURL Error #:" . $err;
      return null;
    } else {
      $json = json_decode($response);
      return $json->access_token;
    }
  }

}

/**
 * @author Leo: get paypal client token
 * @return string access token
*/
if(!function_exists('getPaypalClientToken')) {

  function getPaypalClientToken() {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => paypalKeys('base_api_url')."/v1/identity/generate-token",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_HTTPHEADER => array(
        'accept: application/json',
        'accept-language: en_US',
        'authorization: bearer '.getPaypalAccessToken()
      ),
    ));
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
      return null;
    } else {
      $json = json_decode($response);
      return $json;
    }
  }
  
}

/**
 * @author Leo: Create Paypal Product 
 * @return array: paypal product 
*/
if(!function_exists('paypalProduct')) {

  function paypalProduct($params) {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => paypalKeys('base_api_url').'/v1/catalogs/products',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>'{
        "name": "'.$params['name'].'",
        "description": "'.$params['description'].'",
        "type": "'.$params['type'].'",
        "category": "'.$params['category'].'",
        "image_url": "'.$params['image_url'].'",
        "home_url": "'.$params['home_url'].'"
      }',
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'PayPal-Request-Id: PRODUCT-'.$params['request_id'],
        'Authorization: Bearer '.getPaypalAccessToken()
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return json_decode($response);
  }
}

/**
 * @author Leo: Paypal Plan 
 * @return array: paypal plan 
*/
if(!function_exists('paypalPlan')) {

  function paypalPlan($params) {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => paypalKeys('base_api_url').'/v1/billing/plans',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>'{
          "product_id": "'.$params['product_id'].'",
          "name": "'.$params['name'].' Plan",
          "description": "'.$params['description'].' plan",
          "billing_cycles": [
            {
              "frequency": {
                "interval_unit": "MONTH",
                "interval_count": 1
              },
              "tenure_type": "REGULAR",
              "sequence": 1,
              "total_cycles": '.$params['total_cycles'].',
              "pricing_scheme": {
                "fixed_price": {
                  "value": "'.$params['price_value'].'",
                  "currency_code": "'.$params['currency_code'].'"
                }
              }
            }
          ],
          "payment_preferences": {
            "auto_bill_outstanding": true,
            "payment_failure_threshold": 1
          }
        }',
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'PayPal-Request-Id: PLAN-'.$params['request_id'],
        'Authorization: Bearer '.getPaypalAccessToken()
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return json_decode($response);
  }
}

/**
 * @author Leo: Partner Referrals 
 * @return array 
*/
if(!function_exists('paypalPartnerReferrals')) {

  function paypalPartnerReferrals($params) {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => paypalKeys('base_api_url').'/v2/customer/partner-referrals',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>'{
        "tracking_id": "customer-'.$params['tracking_id'].'",
        "operations": [
          {
            "operation": "API_INTEGRATION",
            "api_integration_preference": {
              "rest_api_integration": {
                "integration_method": "PAYPAL",
                "integration_type": "THIRD_PARTY",
                "third_party_details": {
                  "features": [
                    "PAYMENT",
                    "REFUND"
                 ]
                }
              }
            }
          }
        ],
        "products": [
          "EXPRESS_CHECKOUT"
        ],
        "legal_consents": [
          {
            "type": "SHARE_DATA_CONSENT",
            "granted": true
          }
        ]
      }',
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Authorization: Bearer '.getPaypalAccessToken()
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return json_decode($response);
  }
}

/**
 * @author Leo: Resize Image 
 * @return array 
*/
if (!function_exists('image_resize')) {
  
  function image_resize($width = 0, $height = 0, $image_url, $filename) {

    $source_path = realpath($image_url);
    list($source_width, $source_height, $source_type) = getimagesize($source_path);
    switch ($source_type) {
        case IMAGETYPE_GIF:
            $source_gdim = imagecreatefromgif($source_path);
            break;
        case IMAGETYPE_JPEG:
            $source_gdim = imagecreatefromjpeg($source_path);
            break;
        case IMAGETYPE_PNG:
            $source_gdim = imagecreatefrompng($source_path);
            break;
    }
  
    $source_aspect_ratio = $source_width / $source_height;
    $desired_aspect_ratio = $width / $height;
  
    if ($source_aspect_ratio > $desired_aspect_ratio) {
        /*
         * Triggered when source image is wider
         */
        $temp_height = $height;
        $temp_width = (int) ($height * $source_aspect_ratio);
    } else {
        /*
         * Triggered otherwise (i.e. source image is similar or taller)
         */
        $temp_width = $width;
        $temp_height = (int) ($width / $source_aspect_ratio);
    }
  
    /*
     * Resize the image into a temporary GD image
     */
  
    $temp_gdim = imagecreatetruecolor($temp_width, $temp_height);
    imagecopyresampled(
            $temp_gdim, $source_gdim, 0, 0, 0, 0, $temp_width, $temp_height, $source_width, $source_height
    );
  
    /*
     * Copy cropped region from temporary image into the desired GD image
     */
  
    $x0 = ($temp_width - $width) / 2;
    $y0 = ($temp_height - $height) / 2;
    $desired_gdim = imagecreatetruecolor($width, $height);
    imagecopy(
            $desired_gdim, $temp_gdim, 0, 0, $x0, $y0, $width, $height
    );
  
    /*
     * Render the image
     * Alternatively, you can save the image in file-system or database
     */
    $filename_without_extension = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
  
    $image_url = "uploads/category_images/" . $filename_without_extension . "_" . $width . "_" . $height . "." . $extension;
  
    imagepng($desired_gdim, $image_url);
  
    return $image_url;
  
    /*
     * Add clean-up code here
    */
  }
}

/**
 * @author Leo: Resize Image 
 * @return array 
*/
if (!function_exists('replace_specials')) {
  
  function replace_specials($str) {
    return str_replace($GLOBALS['specials']['src'], $GLOBALS['specials']['des'], $str);
  }
}