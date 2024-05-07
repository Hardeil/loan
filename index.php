<?php
                                    session_start();
                                ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }

        .wrapper {
            --input-focus: #2d8cf0;
            --font-color: #F7418F;
            --font-color-sub: #F7418F;
            --bg-color: white;
            --bg-color-alt: #FEC7B4;
            --main-color: #F7418F;
            /* display: flex; */
            /* flex-direction: column; */
            /* align-items: center; */
        }

        /* switch card */
        .switch {
            width: 100%;
            transform: translateY(-200px);
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 30px;
            width: 50px;
            height: 20px;
        }

        .card-side::before {
            position: absolute;
            content: 'Log in';
            left: -70px;
            top: 0;
            width: 100px;
            text-decoration: underline;
            color: var(--font-color);
            font-weight: 600;
        }

        .card-side::after {
            position: absolute;
            content: 'Sign up';
            left: 70px;
            top: 0;
            width: 100px;
            text-decoration: none;
            color: var(--font-color);
            font-weight: 600;
        }

        .toggle {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            box-sizing: border-box;
            border-radius: 5px;
            border: 2px solid var(--main-color);
            box-shadow: 4px 4px var(--main-color);
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: var(--bg-colorcolor);
            transition: 0.3s;
        }

        .slider:before {
            box-sizing: border-box;
            position: absolute;
            content: "";
            height: 20px;
            width: 20px;
            border: 2px solid var(--main-color);
            border-radius: 5px;
            left: -2px;
            bottom: 2px;
            background-color: var(--bg-color);
            box-shadow: 0 3px 0 var(--main-color);
            transition: 0.3s;
        }

        .toggle:checked+.slider {
            background-color: var(--input-focus);
        }

        .toggle:checked+.slider:before {
            transform: translateX(30px);
        }

        .toggle:checked~.card-side:before {
            text-decoration: none;
        }

        .toggle:checked~.card-side:after {
            text-decoration: underline;
        }

        /* card */

        .flip-card__inner {
            width: 300px;
            height: 350px;
            position: relative;
            background-color: transparent;
            perspective: 1000px;
            text-align: center;
            transition: transform 0.8s;
            transform-style: preserve-3d;
        }

        .toggle:checked~.flip-card__inner {
            transform: rotateY(180deg);
        }

        .toggle:checked~.flip-card__front {
            box-shadow: none;
        }

        .flip-card__front,
        .flip-card__back {
            width: 400px;
            padding: 20px;
            position: absolute;
            display: flex;
            flex-direction: column;
            justify-content: center;
            /* -webkit-backface-visibility: hidden; */
            backface-visibility: hidden;
            background: #FEC7B4;
            gap: 20px;
            border-radius: 5px;
            border: 2px solid var(--main-color);
            box-shadow: 4px 4px var(--main-color);
        }

        body::-webkit-scrollbar {
            display: none;
        }

        .flip-card__back {
            transform: rotateY(180deg);
        }

        .flip-card__form {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }

        .title {
            margin: 20px 0 20px 0;
            font-size: 25px;
            font-weight: 900;
            text-align: center;
            color: var(--main-color);
        }

        .flip-card__input {
            width: 300px;
            height: 40px;
            border-radius: 5px;
            border: 2px solid var(--main-color);
            background-color: var(--bg-color);
            box-shadow: 4px 4px var(--main-color);
            font-size: 15px;
            font-weight: 600;
            color: var(--font-color);
            padding: 5px 10px;
            outline: none;
        }

        .flip-card__input::placeholder {
            color: var(--font-color-sub);
            opacity: 0.8;
        }

        .flip-card__input:focus {
            border: 2px solid var(--input-focus);
        }

        .flip-card__btn:active,
        .button-confirm:active {
            box-shadow: 0px 0px var(--main-color);
            transform: translate(3px, 3px);
        }

        .flip-card__btn {
            margin: 20px 0 20px 0;
            width: 120px;
            height: 40px;
            border-radius: 5px;
            border: 2px solid var(--main-color);
            background-color: var(--bg-color);
            box-shadow: 4px 4px var(--main-color);
            font-size: 17px;
            font-weight: 600;
            color: var(--font-color);
            cursor: pointer;
        }

        .container {
            width: 100%;
            height: auto;
            display: flex;
            justify-content: center;
        }

        body {
            background-color: #FFF3C7;
        }

        .card-switch {
            margin-top: 250px;
        }
        span,h2{
            color: #F7418F; 
        }
        .error{
            color:red;
        }
        .success{
            color: green;
        }
        label{
            color:var(--font-color);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="wrapper">
            <div class="card-switch">
                <label class="switch">
                    <input type="checkbox" class="toggle" action="">
                    <span class="slider"></span>
                    <span class="card-side"></span>
                    <div class="flip-card__inner">
                        <div class="flip-card__front">
                            <div class="title">Log in</div>
                            <form class="flip-card__form" action="">
                                <input class="flip-card__input" name="email" placeholder="Email" type="email">
                                <input class="flip-card__input" name="password" placeholder="Password" type="password">
                                <button class="flip-card__btn">Let`s go!</button>
                            </form>
                        </div>
                        <div class="flip-card__back">
                            <div class="title">Sign up</div>
                            <form class="flip-card__form" action="model/registerModel.php" method="POST" enctype="multipart/form-data">
                                <select class="flip-card__input" name="user[accountType]" id="">
                                    <option value="" selected>Select Account Type</option>
                                    <option value="basic">Basic</option>
                                    <option value="premium">Premium</option>
                                </select>
                                <input class="flip-card__input" name="user[address]" placeholder="Address" type="text">
                                <select class="flip-card__input" name="user[gender]" id="">
                                    <option value="" selected>Select Gender Type</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                <input class="flip-card__input" name="user[birthDate]" name="birthday" id="birthdate" type="date">
                                <input class="flip-card__input" name="user[age]" placeholder="Age" type="number">
                                <input class="flip-card__input" name="user[email]" placeholder="Email" type="email">
                                <input class="flip-card__input" name="user[contact]" placeholder="Contact Number" type="number">
                            
                                <h2>Bank Details</h2>
                                <input class="flip-card__input" name="user[bankName]" placeholder="Bank Name" type="text">
                                <input class="flip-card__input" name="user[bankAccount]" placeholder="Bank Account Number" type="number">
                                <input class="flip-card__input" name="user[cardName]" placeholder="Card Holder's Name" type="text">
                                <span>Put a message to make sure that card holder's name is correct to avoid transaction interruptions</span>
                                <input class="flip-card__input" name="user[tinNumber]" placeholder="Tin Number" type="text">
                            
                                <h2>Company</h2>
                                <input class="flip-card__input" name="user[companyName]" placeholder="Company Name" type="text">
                                <input class="flip-card__input" name="user[companyAddress]" placeholder="Company Address" type="text">
                                <input class="flip-card__input" name="user[companyContact]" placeholder="Company Phone Number" type="number">
                                <span>Put a message to put a number directed to their HR to confirm employment</span>
                                <input class="flip-card__input" name="user[position]" placeholder="Position" type="text">
                                <input class="flip-card__input" name="user[monthlyEarnings]" placeholder="Monthly Earnings" type="number">
                                <label for="">Proof of Billing</label>
                                <input class="flip-card__input" name="user[uploadFile1]" type="file">
                                <label for="">Valid ID Primary</label>
                                <input class="flip-card__input" name="user[uploadFile2]" type="file">
                                <label for="">COE (Certificate of Employment)</label>
                                <input class="flip-card__input" name="user[uploadFile3]" type="file">
                                <input class="flip-card__input" name="user[password]" placeholder="Password" type="password">
                                <span>
                                    <?php
                                              if (isset($_SESSION['registration_error'])) {
                                                echo "<div class='error'>Error: {$_SESSION['registration_error']}</div>";
                                                unset($_SESSION['registration_error']); 
                                            }
                                            if (isset($_SESSION['registration_success'])) {
                                                echo "<div class='success'>{$_SESSION['registration_success']}</div>";
                                                unset($_SESSION['registration_success']); 
                                            }
                                    ?>
                                </span>
                                <button class="flip-card__btn">Confirm!</button>
                            </form> 
                        </div>
                    </div>
                </label>
            </div>
        </div>
    </div>
                
</body>
<script>
    function getAge(){
        const bdate = document.getElementById('birthDates');
        
    }
</script>
</html>