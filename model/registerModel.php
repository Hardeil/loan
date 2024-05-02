<?php
include_once "../cotroller/db_connection.php"; 

class User {
    public $accountType;
    public $address;
    public $gender;
    public $age;
    public $email;
    public $contact;
    public $bankName;
    public $bankAccount;
    public $cardName;
    public $tinNumber;
    public $companyName;
    public $password;
    public $companyAddress;
    public $companyContact;
    public $position;
    public $monthlyEarnings;
    public $uploadFile1;
    public $uploadFile2;
    public $uploadFile3;

    public function __construct($userData) {
        $this->accountType = $userData['accountType'];
        $this->address = $userData['address'];
        $this->gender = $userData['gender'];
        $this->age = $userData['age'];
        $this->email = $userData['email'];
        $this->contact = $userData['contact'];
        $this->bankName = $userData['bankName'];
        $this->bankAccount = $userData['bankAccount'];
        $this->cardName = $userData['cardName'];
        $this->tinNumber = $userData['tinNumber'];
        $this->companyName = $userData['companyName'];
        $this->password = $userData['password'];
        $this->companyAddress = $userData['companyAddress'];
        $this->companyContact = $userData['companyContact'];
        $this->position = $userData['position'];
        $this->monthlyEarnings = $userData['monthlyEarnings'];
        $this->uploadFile1 = $userData['uploadFile1'];
        $this->uploadFile2 = $userData['uploadFile2'];
        $this->uploadFile3 = $userData['uploadFile3'];
    }
}

if(isset($_POST['user'])) {
    $userData = $_POST['user']; // Assuming the form data is submitted via POST
    $user = new User($userData);

    // Instantiate Database object
    $databaseObj = new Database($servername, $username, $password, $database);
    $databaseObj->connect();

    // Construct SQL INSERT query
    $sql = "INSERT INTO reg_tbl (reg_type, reg_add, reg_gend, reg_age, reg_email, reg_contact, reg_bankName, reg_bankAcc, reg_cardName, reg_tinNum, reg_companyName, reg_password, reg_companyAdd, reg_ompanyCon, reg_position, reg_monthly, reg_proofBil, reg_validId, reg_coe, reg_status) 
            VALUES ('$user->accountType', '$user->address', '$user->gender', '$user->age', '$user->email', '$user->contact', '$user->bankName', '$user->bankAccount', '$user->cardName', '$user->tinNumber', '$user->companyName', '$user->password', '$user->companyAddress', '$user->companyContact', '$user->position', '$user->monthlyEarnings', '$user->uploadFile1', '$user->uploadFile2', '$user->uploadFile3', '0')";

    $inserted = $databaseObj->insert($sql);

    if ($inserted) {
        echo "User registration successful!";
    } else {
        echo "User registration failed!";
    }

    $databaseObj->close();
} else {
    echo "Form data not submitted!";
}
?>
