<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .color{
  /* background */
  background-color:#FFF3C7 ;
  /* nav  */
  background-color: #FEC7B4;
  /* nav  */
  background-color: #FC819E;
  /* text color  */
  color: #F7418F; 

}
        *{
            box-sizing: border-box;
            padding: 0;
            margin: 0;
            font-family: Arial, Helvetica, sans-serif ;
        }
        .adminNav{
            width: 15%;
            background-color: #FC819E;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .adminNav li{
            list-style: none;
            width: 100%;
            padding: 15px;
            font-size: 1.5rem;
        }
        .adminNav li:hover{
            background-color: #FEC7B4;
            color: #F7418F; 
        }
        .adminNav ul{
            width: 100%;
        }
        .adminNav h1{
            width: 100%;
            text-align: center;
            font-size: 3rem;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="adminNav">
        <ul>
            <h1>LOAN</h1>
            <li>
                Dashboard
            </li>
            <li>
                Loan Request
            </li>
            <li>
                Billing
            </li>
            <li>
                User Details
            </li>
            <li>
                Users List
            </li>
        </ul>
        <li>Logout</li>
    </div>
</body>
</html>