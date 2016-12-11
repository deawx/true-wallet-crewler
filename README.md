# true-wallet-crewler

# เกี่ยวกับ

โค๊ดดึงข้อมูลข้อทางการเงินของบัญชี True Wallet สามารถดึงข้อมูลทางการเงินย้อนหลังของบัญชีทรูวอลเลตได้ รวมไปถึงรายละเอียดเช่น วันที่ เวลา ที่โอน เบอร์โทร ชื่อผู้ทำรายการ รวมไปถึงหมายเลขอ้างอิง (Transaction ID)ซึ่งเป็นหมายเลขประจำรายการนั้นๆและเป็นเลขที่ไม่ซ้ำกับรายการอื่น
ซึ่งเมื่อได้หมายเลขโทรศัพ และ หมายเลขอ้างอิงนี้แล้ว สามารถ นำไปประยุคสร้าง ระบบส่งของให้กับลูกค้าอัตโนมัติผ่านทางอีเมลได้

เช่น ขาย ระหัสเกม ราคา 1500 บาท 
เมื่อลูกค้าโอนเงินเข้ามาในบัญชีคุณ 1500 บาทแล้ว ให้ลูกค้ากดยืนยันการโอน
และให้ลูกค้า กรอกหมายเลขอ้างอิงการโอน และเบอร์โทรศัพท์ที่โอน เพื่อยืนยันการโอนเงิน
จากนั้นคุณก็เขียนโค๊ดให้ส่งระหัส ที่เป็นสินค้าของคุณให้กับลูกค้าได้โดยอัตโนมัติ

# การทำงาน

การทำงานของโค๊ดชุดนี้ จะส่ง Request Login ไปยัง TrueWallet และดึงข้อออกมา โดยใช้ Curl  โดยโค๊ดนี้ไม่มีการเก็บข้อมูลของท่านแต่อย่างใด(ไม่เชื่อก็ลองไล่โค๊ดดูได้ครับแหะๆ)

# วิธีใช้
ที่ index.php จะมีตัวอย่างการใช้งานพร้อมคำอธิบายอยู่ แต่ผมจะอธิบายให้อีกรอบ
แก้ไขตัวแปร username , password ให้ตรงามข้อมูลจริงของท่าน

function get_transections() 
จะดึงข้อมูลการโอน รับ เงินคร่าวทั้งหมดของท่านออกมา มากสุดที่ 50 รายการ

function get_retport() 
ฟังก์ชั้นนี้จะดึง ข้อมูลการโอนอย่างละเอียด ของแต่ละรายการ ที่ได้จาก get_transections()
ซึ่ง จำเป็นจะส่งเป็น reportID ให้กับฟังก์ชั้นนี้ ซึ่งผมที่ได้จาก ฟังก์ชั่นนี้จะละเอียดไปจนถึง วันเวลา ที่โอน ชื่อผู้โอน ข้อความจากผู้โอน รวมไปถึงหมายเลขอ้างอิงด้วย


# ตัวอย่างข้อมูล

ตัวอย่างข้อมูลที่ได้จาก get_transactions()

    [0] => stdClass Object
        (
            [reportID] => 29013674
            [logoURL] => https://s3-ap-southeast-1.amazonaws.com/mobile-resource.tewm/wallet-app/common/icon-transaction/m/images/logo_activity_type/transfer_debtor.png
            [text1Th] => โอนเงิน
            [text1En] => Transfer
            [text2Th] => 11/11/16
            [text2En] => 11/11/16
            [text3Th] => โอนเงินให้
            [text3En] => debtor
            [text4Th] => -4,500.00
            [text4En] => -4,500.00
            [text5Th] => 093-427-1147
            [text5En] => 093-427-1147
        )

    [1] => stdClass Object
        (
            [reportID] => 1006447327
            [logoURL] => https://s3-ap-southeast-1.amazonaws.com/mobile-resource.tewm/wallet-app/common/icon-transaction/m/images/logo_activity_type/add_money.png
            [text1Th] => เติมเงิน Wallet
            [text1En] => Add Money
            [text2Th] => 11/11/16
            [text2En] => 11/11/16
            [text3Th] => 7-ELEVEN
            [text3En] => 7-ELEVEN
            [text4Th] => +1,000.00
            [text4En] => +1,000.00
            [text5Th] => 
            [text5En] => 
        )

    [2] => stdClass Object
        (
            [reportID] => 1006447326
            [logoURL] => https://s3-ap-southeast-1.amazonaws.com/mobile-resource.tewm/wallet-app/common/icon-transaction/m/images/logo_activity_type/add_money.png
            [text1Th] => เติมเงิน Wallet
            [text1En] => Add Money
            [text2Th] => 11/11/16
            [text2En] => 11/11/16
            [text3Th] => 7-ELEVEN
            [text3En] => 7-ELEVEN
            [text4Th] => +2,000.00
            [text4En] => +2,000.00
            [text5Th] => 
            [text5En] => 
        )

    [3] => stdClass Object
        (
            [reportID] => 1006447304
            [logoURL] => https://s3-ap-southeast-1.amazonaws.com/mobile-resource.tewm/wallet-app/common/icon-transaction/m/images/logo_activity_type/add_money.png
            [text1Th] => เติมเงิน Wallet
            [text1En] => Add Money
            [text2Th] => 11/11/16
            [text2En] => 11/11/16
            [text3Th] => 7-ELEVEN
            [text3En] => 7-ELEVEN
            [text4Th] => +2,000.00
            [text4En] => +2,000.00
            [text5Th] => 
            [text5En] => 
        )
     [4]
      .
      .
      .


ตัวอย่างข้อมูลที่ได้จาก get_report()

object(stdClass)#3 (8) {
  ["code"]=>
  string(5) "20000"
  ["namespace"]=>
  string(11) "TMN-PRODUCT"
  ["titleTh"]=>
  string(0) ""
  ["titleEn"]=>
  string(0) ""
  ["messageTh"]=>
  string(178) "คุณสามารถเช็ครายการย้อนหลัง
ได้ที่เมนูประวัติการทำรายการ
[APR-20000]"
  ["messageEn"]=>
  string(178) "คุณสามารถเช็ครายการย้อนหลัง
ได้ที่เมนูประวัติการทำรายการ
[APR-20000]"
  ["originalMessage"]=>
  string(0) ""
  ["data"]=>
  object(stdClass)#54 (11) {
    ["amount"]=>
    int(-4500)
    ["ref1"]=>
    string(10) "0934271147"
    ["section4"]=>
    object(stdClass)#57 (2) {
      ["column1"]=>
      object(stdClass)#56 (1) {
        ["cell1"]=>
        object(stdClass)#55 (3) {
          ["titleTh"]=>
          string(31) "วันที่-เวลา"
          ["titleEn"]=>
          string(16) "Transaction date"
          ["value"]=>
          string(14) "11/11/16 22:06"
        }
      }
      ["column2"]=>
      object(stdClass)#59 (1) {
        ["cell1"]=>
        object(stdClass)#58 (3) {
          ["titleTh"]=>
          string(39) "เลขที่อ้างอิง"
          ["titleEn"]=>
          string(14) "Transaction ID"
          ["value"]=>
          string(10) "1706xxxxxxx"
        }
      }
    }
    ["serviceCode"]=>
    string(6) "debtor"
    ["section3"]=>
    object(stdClass)#63 (2) {
      ["column1"]=>
      object(stdClass)#61 (2) {
        ["cell2"]=>
        object(stdClass)#60 (3) {
          ["titleTh"]=>
          string(30) "ยอดเงินรวม"
          ["titleEn"]=>
          string(12) "total amount"
          ["value"]=>
          string(8) "4,500.00"
        }
        ["cell1"]=>
        object(stdClass)#62 (3) {
          ["titleTh"]=>
          string(45) "จำนวนเงินที่โอน"
          ["titleEn"]=>
          string(6) "amount"
          ["value"]=>
          string(8) "4,500.00"
        }
      }
      ["column2"]=>
      object(stdClass)#65 (1) {
        ["cell1"]=>
        object(stdClass)#64 (3) {
          ["titleTh"]=>
          string(36) "ค่าธรรมเนียม"
          ["titleEn"]=>
          string(9) "total fee"
          ["value"]=>
          string(4) "0.00"
        }
      }
    }
    ["personalMessage"]=>
    object(stdClass)#66 (1) {
      ["value"]=>
      string(0) ""
    }
    ["section2"]=>
    object(stdClass)#70 (2) {
      ["column1"]=>
      object(stdClass)#68 (2) {
        ["cell2"]=>
        object(stdClass)#67 (3) {
          ["titleTh"]=>
          string(30) "ชื่อผู้รับ"
          ["titleEn"]=>
          string(13) "account owner"
          ["value"]=>
          string(13) "name*** las***"
        }
        ["cell1"]=>
        object(stdClass)#69 (3) {
          ["titleTh"]=>
          string(39) "หมายเลขผู้รับ"
          ["titleEn"]=>
          string(14) "account number"
          ["value"]=>
          string(12) "093-427-xxxx"
        }
      }
      ["column2"]=>
      object(stdClass)#71 (1) {
        ["operator"]=>
        string(3) "tmn"
      }
    }
    ["section1"]=>
    object(stdClass)#72 (2) {
      ["titleTh"]=>
      string(30) "โอนเงินให้"
      ["titleEn"]=>
      string(6) "debtor"
    }
    ["isFavorited"]=>
    string(2) "no"
    ["isFavoritable"]=>
    string(2) "no"
    ["serviceType"]=>
    string(8) "transfer"
  }
 }

# ทิ้งทาย
โค๊ดนี้ฟรีครับ
ถ้าใช้แล้วถูกใจ แล้วกรุณาอยากสนับสนุนก็สามารถทำได้ที่ paypal : tkaewkunha@gmail.com จะถือเป็นความกรุณาอย่างสูงครับ
