    <?php
include_once "../cotroller/db_connection.php";

class User
{
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

    public function __construct($userData)
    {
        $this->accountType = $userData['accountType'];
        $this->address = $userData['address'];
        $this->gender = $userData['gender'];
        $this->birthdate = $userData['birthDate'];
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

session_start();

if (isset($_POST['user'])) {
    $userData = $_POST['user'];

    $databaseObj = new Database($servername, $username, $password, $database);
    $databaseObj->connect();

    $sql = "SELECT reg_type, COUNT(reg_id) AS count FROM reg_tbl WHERE reg_type='basic' OR reg_type='premium' GROUP BY reg_type";
    $result = $databaseObj->getConnection()->query($sql);

    if ($result) {
        $basicCount = 0;
        $premiumCount = 0;

        while ($row = $result->fetch_assoc()) {
            if ($row['reg_type'] === 'basic') {
                $basicCount = $row['count'];
            } elseif ($row['reg_type'] === 'premium') {
                $premiumCount = $row['count'];
            }
        }

        if ($premiumCount > 50 && $userData['accountType'] == "premium") {
            $_SESSION['registration_error'] = "Premium is full";
            header("Location: ../index.php");
            exit;
        }
    } else {
        echo "Count query failed";
        exit;
    }
    foreach ($userData as $key => $value) {
        if (empty($value)) {
            $_SESSION['registration_error'] = "All fields are required!";
            header("Location: ../index.php");
            exit;
        }
    }
    $uploadDirectory = "../view/upload/";

    if (!file_exists($uploadDirectory)) {
        mkdir($uploadDirectory, 0777, true);
    }
    
    if (
        isset($_FILES['user']['name']['uploadFile1']) && 
        isset($_FILES['user']['name']['uploadFile2']) && 
        isset($_FILES['user']['name']['uploadFile3']) &&
        $_FILES['user']['size']['uploadFile1'] <= 1048576 && 
        $_FILES['user']['size']['uploadFile2'] <= 1048576 && 
        $_FILES['user']['size']['uploadFile3'] <= 1048576
    ) {
        $uploadFile1 = $uploadDirectory . basename($_FILES['user']['name']['uploadFile1']);
        $uploadFile2 = $uploadDirectory . basename($_FILES['user']['name']['uploadFile2']);
        $uploadFile3 = $uploadDirectory . basename($_FILES['user']['name']['uploadFile3']);
    
        if (
            move_uploaded_file($_FILES['user']['tmp_name']['uploadFile1'], $uploadFile1) &&
            move_uploaded_file($_FILES['user']['tmp_name']['uploadFile2'], $uploadFile2) &&
            move_uploaded_file($_FILES['user']['tmp_name']['uploadFile3'], $uploadFile3)
        ) {
            $_SESSION['registration_success'] = "Files uploaded successfully.";
        } else {
            $_SESSION['registration_error'] = "Error uploading files.";
            header("Location: ../index.php");
            exit;
        }
    } else {
        $_SESSION['registration_error'] = "File size should be 1MB or below.";
        header("Location: ../index.php");
        exit;
    }
    
    $status = "0";
    $sql = "INSERT INTO reg_tbl (reg_type, reg_add, reg_gend, reg_bdate, reg_age, reg_email, reg_contact, reg_bankName, reg_bankAcc, reg_cardName, reg_tinNum, reg_companyName, reg_password, reg_companyAdd, reg_companyCon, reg_position, reg_monthly, reg_proofBil, reg_validId, reg_coe, reg_status)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $databaseObj->getConnection()->prepare($sql);
    $stmt->bind_param("ssssissssssssssssssss", $userData['accountType'], $userData['address'], $userData['gender'], $userData['birthDate'], $userData['age'], $userData['email'], $userData['contact'], $userData['bankName'], $userData['bankAccount'], $userData['cardName'], $userData['tinNumber'], $userData['companyName'], $userData['password'], $userData['companyAddress'], $userData['companyContact'], $userData['position'], $userData['monthlyEarnings'], $uploadFile1, $uploadFile2, $uploadFile3, $status);

    if ($stmt->execute()) {
        $_SESSION['registration_success'] = "User registration successful!";
    } else {
        $_SESSION['registration_error'] = "User registration failed!";
    }

    $stmt->close();
    $databaseObj->close();

    header("Location: ../index.php");
    exit;
}

?>
