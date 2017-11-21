<?php

class ControllerFeedWebApi extends Controller {
    # Use print_r($json) instead json_encode($json)

    private $debug = false;

    public function categories() {
        $this->init();
        $this->load->model('catalog/category');
        $json = array('success' => true);

        # -- $_GET params ------------------------------

        if (isset($this->request->get['parent'])) {
            $parent = $this->request->get['parent'];
        } else {
            $parent = 0;
        }

        if (isset($this->request->get['level'])) {
            $level = $this->request->get['level'];
        } else {
            $level = 1;
        }

        # -- End $_GET params --------------------------


        $json['categories'] = $this->getCategoriesTree($parent, $level);

        if ($this->debug) {
            echo '<pre>';
            print_r($json);
        } else {
            $this->response->setOutput(json_encode($json));
        }
    }

    public function category() {
        $this->init();
        $this->load->model('catalog/category');
        $this->load->model('tool/image');

        $json = array('success' => true);

        # -- $_GET params ------------------------------

        if (isset($this->request->get['id'])) {
            $category_id = $this->request->get['id'];
        } else {
            $category_id = 0;
        }

        # -- End $_GET params --------------------------

        $category = $this->model_catalog_category->getCategory($category_id);
        $json['category'] = array(
            'id' => $category['category_id'],
            'name' => $category['name'],
            'description' => $category['description'],
            'href' => $this->url->link('product/category', 'category_id=' . $category['category_id'])
        );

        if ($this->debug) {
            echo '<pre>';
            print_r($json);
        } else {
            $this->response->setOutput(json_encode($json));
        }
    }

    public function products() {
        $this->init();
        $this->load->model('catalog/product');
        $this->load->model('tool/image');
        $json = array('success' => true, 'products' => array());


        # -- $_GET params ------------------------------

        if (isset($this->request->get['category'])) {
            $category_id = $this->request->get['category'];
        } else {
            $category_id = 0;
        }

        # -- End $_GET params --------------------------

        $products = $this->model_catalog_product->getProducts(array(
            'filter_category_id' => $category_id
        ));

        foreach ($products as $product) {

            if ($product['image']) {
                $image = $this->model_tool_image->resize($product['image'], $this->config->get('config_image_product_width'), $this->config->get('config_image_product_height'));
            } else {
                $image = false;
            }

            if ((float) $product['special']) {
                $special = $this->currency->format($this->tax->calculate($product['special'], $product['tax_class_id'], $this->config->get('config_tax')));
            } else {
                $special = false;
            }

            $json['products'][] = array(
                'id' => $product['product_id'],
                'name' => $product['name'],
                'description' => $product['description'],
                'pirce' => $this->currency->format($this->tax->calculate($product['price'], $product['tax_class_id'], $this->config->get('config_tax'))),
                'href' => $this->url->link('product/product', 'product_id=' . $product['product_id']),
                'thumb' => $image,
                'special' => $special,
                'rating' => $product['rating']
            );
        }

        if ($this->debug) {
            echo '<pre>';
            print_r($json);
        } else {
            $this->response->setOutput(json_encode($json));
        }
    }

    public function product() {
        $this->init();
        $this->load->model('catalog/product');
        $this->load->model('tool/image');
        $json = array('success' => true);

        # -- $_GET params ------------------------------

        if (isset($this->request->get['id'])) {
            $product_id = $this->request->get['id'];
        } else {
            $product_id = 0;
        }

        # -- End $_GET params --------------------------

        $product = $this->model_catalog_product->getProduct($product_id);

        # product image
        if ($product['image']) {
            $image = $this->model_tool_image->resize($product['image'], $this->config->get('config_image_popup_width'), $this->config->get('config_image_popup_height'));
        } else {
            $image = '';
        }

        #additional images
        $additional_images = $this->model_catalog_product->getProductImages($product['product_id']);
        $images = array();

        foreach ($additional_images as $additional_image) {
            $images[] = $this->model_tool_image->resize($additional_image, $this->config->get('config_image_additional_width'), $this->config->get('config_image_additional_height'));
        }

        #specal
        if ((float) $product['special']) {
            $special = $this->currency->format($this->tax->calculate($product['special'], $product['tax_class_id'], $this->config->get('config_tax')));
        } else {
            $special = false;
        }

        #discounts
        $discounts = array();
        $data_discounts = $this->model_catalog_product->getProductDiscounts($product['product_id']);

        foreach ($data_discounts as $discount) {
            $discounts[] = array(
                'quantity' => $discount['quantity'],
                'price' => $this->currency->format($this->tax->calculate($discount['price'], $product['tax_class_id'], $this->config->get('config_tax')))
            );
        }

        #options
        $options = array();

        foreach ($this->model_catalog_product->getProductOptions($product['product_id']) as $option) {
            if ($option['type'] == 'select' || $option['type'] == 'radio' || $option['type'] == 'checkbox' || $option['type'] == 'image') {
                $option_value_data = array();

                foreach ($option['option_value'] as $option_value) {
                    if (!$option_value['subtract'] || ($option_value['quantity'] > 0)) {
                        if ((($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) && (float) $option_value['price']) {
                            $price = $this->currency->format($this->tax->calculate($option_value['price'], $product['tax_class_id'], $this->config->get('config_tax')));
                        } else {
                            $price = false;
                        }

                        $option_value_data[] = array(
                            'product_option_value_id' => $option_value['product_option_value_id'],
                            'option_value_id' => $option_value['option_value_id'],
                            'name' => $option_value['name'],
                            'image' => $this->model_tool_image->resize($option_value['image'], 50, 50),
                            'price' => $price,
                            'price_prefix' => $option_value['price_prefix']
                        );
                    }
                }

                $options[] = array(
                    'product_option_id' => $option['product_option_id'],
                    'option_id' => $option['option_id'],
                    'name' => $option['name'],
                    'type' => $option['type'],
                    'option_value' => $option_value_data,
                    'required' => $option['required']
                );
            } elseif ($option['type'] == 'text' || $option['type'] == 'textarea' || $option['type'] == 'file' || $option['type'] == 'date' || $option['type'] == 'datetime' || $option['type'] == 'time') {
                $options[] = array(
                    'product_option_id' => $option['product_option_id'],
                    'option_id' => $option['option_id'],
                    'name' => $option['name'],
                    'type' => $option['type'],
                    'option_value' => $option['option_value'],
                    'required' => $option['required']
                );
            }
        }

        #minimum
        if ($product['minimum']) {
            $minimum = $product['minimum'];
        } else {
            $minimum = 1;
        }

        $json['product'] = array(
            'id' => $product['product_id'],
            'seo_h1' => $product['seo_h1'],
            'name' => $product['name'],
            'manufacturer' => $product['manufacturer'],
            'model' => $product['model'],
            'reward' => $product['reward'],
            'points' => $product['points'],
            'image' => $image,
            'images' => $images,
            'price' => $this->currency->format($this->tax->calculate($product['price'], $product['tax_class_id'], $this->config->get('config_tax'))),
            'special' => $special,
            'discounts' => $discounts,
            'options' => $options,
            'minimum' => $minimum,
            'rating' => (int) $product['rating'],
            'description' => html_entity_decode($product['description'], ENT_QUOTES, 'UTF-8'),
            'attribute_groups' => $this->model_catalog_product->getProductAttributes($product['product_id'])
        );


        if ($this->debug) {
            echo '<pre>';
            print_r($json);
        } else {
            $this->response->setOutput(json_encode($json));
        }
    }

    /**
     * Generation of category tree
     * 
     * @param  int    $parent  Prarent category id
     * @param  int    $level   Depth level
     * @return array           Tree
     */
    private function getCategoriesTree($parent = 0, $level = 1) {
        $this->load->model('catalog/category');
        $this->load->model('tool/image');

        $result = array();

        $categories = $this->model_catalog_category->getCategories($parent);

        if ($categories && $level > 0) {
            $level--;

            foreach ($categories as $category) {

                if ($category['image']) {
                    $image = $this->model_tool_image->resize($category['image'], $this->config->get('config_image_category_width'), $this->config->get('config_image_category_height'));
                } else {
                    $image = false;
                }

                $result[] = array(
                    'category_id' => $category['category_id'],
                    'parent_id' => $category['parent_id'],
                    'name' => $category['name'],
                    'image' => $image,
                    'href' => $this->url->link('product/category', 'category_id=' . $category['category_id']),
                    'categories' => $this->getCategoriesTree($category['category_id'], $level)
                );
            }

            return $result;
        }
    }

    /**
     * 
     */
    private function init() {
        $this->response->addHeader('Content-Type: application/json');

        if (!$this->config->get('web_api_status')) {
            $this->error(10, 'API is disabled');
        }

        if ($this->config->get('web_api_key') && (!isset($this->request->get['key']) || $this->request->get['key'] != $this->config->get('web_api_key'))) {
            $this->error(20, 'Invalid secret key');
        }
    }

    /**
     * Error message responser
     *
     * @param string $message  Error message
     */
    private function error($code = 0, $message = '') {

        # setOutput() is not called, set headers manually
        header('Content-Type: application/json');

        $json = array(
            'success' => false,
            'code' => $code,
            'message' => $message
        );

        if ($this->debug) {
            echo '<pre>';
            print_r($json);
        } else {
            echo json_encode($json);
        }

        exit();
    }

    function customer_register() {
        $response = $this->load->controller('account/register/api_validate');

        if ($response['error_sts'] == 1) {
            $json = array('responseCode' => 0, 'responseStatus' => 'ERROR', 'responseMessage' => implode(',', $response['error_msg']));
            $json['response'] = '';
        } else {
            $json = array('responseCode' => 1, 'responseStatus' => 'Success', 'responseMessage' => 'Customer created!');
            $json['response'] = $response;
        }


        if ($this->debug) {
            echo '<pre>';
            print_r($json);
        } else {
            $this->response->setOutput(json_encode($json));
        }
    }

    function customer_login() {
        $response = $this->load->controller('account/login/api_validate');
        if ($response['error_sts'] == 1) {
            $json = array('responseCode' => 0, 'responseStatus' => 'ERROR', 'responseMessage' => $response['error_msg']);
            $json['response'] = '';
        } else {
            $json = array('responseCode' => 1, 'responseStatus' => 'Success', 'responseMessage' => 'Success!');
            unset($response['password']);
            unset($response['customer_group_id']);
            unset($response['store_id']);
            unset($response['language_id']);
            unset($response['salt']);
            unset($response['ip']);
            $json['response'] = $response;


            //seat allowcation
            $postdata = $this->request->post;
            $json['response']['lic_info'] = $this->seat_allowcation($postdata);
        }


        if ($this->debug) {
            echo '<pre>';
            print_r($json);
        } else {
            $this->response->setOutput(json_encode($json));
        }
    }

    /* set allowcation 
     *  Hit the licencing server with the required data
     * 
     *  input user info and the licence as post
     */

    public function seat_allowcation($lic) {
        if (isset($lic['CPUId']) && $lic['CPUId'] != '' && isset($lic['MotherBoardId']) && $lic['MotherBoardId']!='' && isset($lic['DiskId']) && $lic['DiskId']!='') {
            $lic['intraval'] = '60'; //in mins
            $url = 'http://dfg.e4buzz.com/license_server/index.php/api/seat_allowcation';
            $fields = $lic;
            $headers = array('Authorization' => '', 'Content-Type' => 'application/json');
            $ch = curl_init();
            $curlConfig = array(
                CURLOPT_URL => $url,
                CURLOPT_POST => true,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POSTFIELDS => json_encode($fields),
                CURLOPT_HTTPHEADER => $headers,
            );
            curl_setopt_array($ch, $curlConfig);

            $result = curl_exec($ch);
            curl_close($ch);
//            echo '<pre>';
//            print_r($result);
//            die;

            if (!$result) {
                return false;
            }
            return json_decode($result, true);
        }else{
            return false;
        }
    }
    
    /* logout 
     *  Hit the licencing server with the required data
     * 
     *  input user info and the licence as post
     */

    public function logout() {
        //seat allowcation
        $postdata = $this->request->post;
        $json['respoonse'] = $this->seat_release($postdata);
        
        $this->response->setOutput(json_encode($json['respoonse']));
    }

    /* set release
     * 
     * set seat free for already logged in devices
     */

    public function seat_release($data) {
        $url = 'http://dfg.e4buzz.com/license_server/index.php/api/seatrelease';
        $fields = $data;
        $headers = array('Authorization' => '', 'Content-Type' => 'application/json');
        $ch = curl_init();
        $curlConfig = array(
            CURLOPT_URL => $url,
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => json_encode($fields),
            CURLOPT_HTTPHEADER => $headers,
        );
        curl_setopt_array($ch, $curlConfig);

        $result = curl_exec($ch);
        curl_close($ch);
        
//        echo '<pre>';print_r($result);die;

        if (!$res) {
            return json_decode($result, true);
        } else {
            return FALSE;
        }
    }


}
