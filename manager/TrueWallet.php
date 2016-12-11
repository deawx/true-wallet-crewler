<?php
	require_once 'Curl.php';
	class TrueWallet{
		private $url = "https://wallet.truemoney.com/user/login";
		private $trans_history_link = "https://wallet.truemoney.com/api/transaction_history";
		private $reportLink  = "https://wallet.truemoney.com/api/transaction_history_detail?reportID=";
		private $curl;
		function __construct(){
			$this->curl = new Curl();
		}

		public function get_transactions($email, $password){
			$email = str_replace('@', '%40', $email);
			$data = "email=".$email."&password=".$password;
			$login  = $this->curl->login($this->url, $data);
			$trans = $this->curl->grab_page($this->trans_history_link);

			if (strpos($trans, 'Whoops') !== false) {
    			return 'Can not login<br>';
			}
			$trans_obj  = json_decode($trans);
			$arr_trans = $trans_obj->data->activities;
			return $arr_trans;
		}

		public function get_report($report_id){
			$report = $this->curl->grab_page($this->reportLink.$report_id);
			$json_report = json_decode($report);
			return $json_report;
		}
	}
?>