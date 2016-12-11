<?php
	ini_set('display_errors', 1);
	include_once('manager/TrueWallet.php');
	$wallet = new TrueWallet();

	// username และ Password ที่ใช้ล็อกอินเข้าไปยัง True Wallet
	$username = "";
	$password = "";

	/**
	ฟังก์ชั้นนี้ จะดึงข้อมูลทางการเงินทั้งหมดออกมา ไม่เกิน 50 รายการ
	**/
	$transaction = $wallet->get_transactions($username, $password);
	echo "<pre>";
	print_r($transaction);
	echo "</pre>";

	/**
		ฟังก์ชั้นนี้จะดึง ข้อมูลการโอนอย่างละเอียด ของแต่ละรายการ ที่ได้จาก get_transections()
		ซึ่ง จำเป็นจะต้องใช้ reportID 

		ข้อมูลที่ได้ออกมาจะรวมถึง 'หมายเลขอ้างอิง' และวันที่เวลาในการโอนด้วย 
	**/
	// 
	$report = $wallet->get_report($transaction[0]->reportID);
	echo "<pre>";
	var_dump($report);
	echo "</pre>";



	//หากใช้แล้วชอบใจ ให้ค่ามาม่า ผมได้ที่ paypal :: tkaewkunha@gmail.com นะครับ จะถือเป็นความกรุณาอย่างสุดซึ้ง

?>