<?php 
    /**
    * Class for cal api for reports
    */
    class intentawarecls
    {
        public $base_url = 'https://app.intentaware.com';
        public $api = '';

        private $headers = array();

        private $publisherkey = '';
        private $assetkey = '';

        private $ReturnJsone = false;
        private $response = '';

        public function __construct($publisherkey,$assetkey)
        {
            $this->publisherkey = $publisherkey;
            $this->assetkey  = $assetkey;
        }

        public function getCsvData()
        {

            $assetkey = $this->assetkey;

            $this->api = "/api/guages/asset-reporter/$assetkey/reports/csv/";

            $publisherkey  = $this->publisherkey;

            $headers = array('PUBLISHER-KEY' => $publisherkey);

            $this->set_headers($headers);

            $return = $this->call_api();

            return $return;
        }


        public function getDatatables()
        {

            $assetkey = $this->assetkey;

            $this->api = "/api/guages/asset-reporter/$assetkey/reports/datatable/";

            $publisherkey  = $this->publisherkey;

            $headers = array('PUBLISHER-KEY' => $publisherkey);

            $this->set_headers($headers);

            $this->ReturnJsone = true;

            $return = $this->call_api();

            return $return;
        }

        public function getHistory()
        {

            $assetkey = $this->assetkey;

            $this->api = "/api/guages/asset-reporter/$assetkey/reports/history/";

            $publisherkey  = $this->publisherkey;

            $headers = array('PUBLISHER-KEY' => $publisherkey);

            $this->set_headers($headers);

            $this->ReturnJsone = true;

            $return = $this->call_api();

            return $return;
        }

        public function getUseragents()
        {

            $assetkey = $this->assetkey;

            $this->api = "/api/guages/asset-reporter/$assetkey/reports/useragents/";

            $publisherkey  = $this->publisherkey;

            $headers = array('PUBLISHER-KEY' => $publisherkey);

            $this->set_headers($headers);

            $this->ReturnJsone = true;

            $return = $this->call_api();

            return $return;
        }

        private function call_api()
        {
            $url = $this->base_url.$this->api;
            
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTPHEADER =>$this->headers,
            ));

            $this->response = curl_exec($curl);

            $error = curl_error($curl);
            if(!empty($error))
            {
                echo curl_errno($curl).' : '.$error; die;
            }
            curl_close($curl);
            if($this->ReturnJsone){
                $this->makeJsonToArray();   
            }    
            $this->flush_data();
            return $this->response;
        }

        private function flush_data()
        {
            $this->headers = array();
        }

        private function set_headers($headers = '')
        {
            $this->headers = array();
            if(!empty($headers))
            {
                foreach($headers as $key => $value)
                {
                    $this->headers[] = $key.': '.$value;
                }
            }
        }


        public function makeJsonToArray()
        {
            if(!empty($this->response))
            {
                $this->response = json_decode($this->response);
            }
        }
    }
?>