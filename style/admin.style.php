<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Trirong">
<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: "Trirong", serif;
    }

    body {
        background: rgb(87, 0, 75);
        background: -moz-linear-gradient(232deg, rgba(87, 0, 75, 1) 0%, rgba(0, 14, 69, 1) 42%, rgba(37, 112, 98, 1) 76%, rgba(0, 0, 0, 1) 91%);
        background: -webkit-linear-gradient(232deg, rgba(87, 0, 75, 1) 0%, rgba(0, 14, 69, 1) 42%, rgba(37, 112, 98, 1) 76%, rgba(0, 0, 0, 1) 91%);
        background: linear-gradient(232deg, rgba(87, 0, 75, 1) 0%, rgba(0, 14, 69, 1) 42%, rgba(37, 112, 98, 1) 76%, rgba(0, 0, 0, 1) 91%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#57004b", endColorstr="#000000", GradientType=1);
        display: flex;
        flex-direction: row-reverse;
        justify-content: center;
        align-items: center;

    }

    .upper {
        height: 100%;
        margin: 3% 3% 3% 3%;
        width: 70%;

        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    .upper-1 {
        height: 30%;
        width: 90%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 30px;
        color: #ffffff;

    }

    #auto {
        font-family: "Trirong", serif;
        font-weight: bolder;
    }

    .upper-2 {
        height: 40%;
        width: 90%;

        display: flex;
        justify-content: center;
        align-items: center;
    }

    .upper-2 div {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 80%;
        height: 100%;
    }

    .en {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: row;
        border: 1px solid aqua;
        transition: 0.2s;
        box-shadow: 0 0 2px aqua;
    }

    .en:hover {
        scale: 105%;
        box-shadow: 0 0 2px rgb(247, 0, 255);
        border: 1px solid rgb(247, 0, 255);
    }

    .en button {
        width: 80px;
        height: 60px;
        border: none;
        font-weight: bolder;
        color: rgb(244, 244, 244);
        border: 10px solid black;
        background: #000000;
        font-size: 15px;
        transition: 0.2s;
        cursor: pointer;
    }

    .en button:hover {
        color: aqua;
    }

    .en button:active {
        color: rgb(255, 0, 183);
    }

    .en input {
        width: 300px;
        height: 60px;
        border: none;
        background: #000000;
        color: aqua;
        padding-left: 10px;
        font-size: 20px;
    }

    .en input::placeholder {
        font-size: 15px;
        color: #ffffff95;
    }

    .intro {
        background: rgba(0, 0, 0, 0.416);
        border: 1px solid black;
        backdrop-filter: blur(50px);
        height: 100%;
        margin: 3% 3% 3% 3%;
        width: 30%;
        padding: 5%;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        border-radius: 10px;
        box-shadow: 0 0 40px rgb(0, 0, 0);
    }

    .form-div {
        width: 100%;
        height: 10%;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        margin: 8%;
        background: #000000;
        transition: scale 0.3s;
        box-shadow: 0 0 1px rgba(64, 255, 0, 0.515);
    }

    .form-div i {
        display: flex;
        flex-direction: row;
        justify-content: right;
        align-items: center;
        margin: 0 1% 0 0;
        font-size: 200%;
        height: 100%;
        width: 35%;
        background: #000000;

        background: -webkit-linear-gradient(800deg, #000000, #000000, #ffffff, #9f9f9f, #fb00ff, #010101);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .image {}

    .image img {
        width: 100%;
    }

    .admin-btn {
        cursor: pointer;
        width: 100%;
        height: 100%;
        border: none;
        background: #000000;
        padding: 5px;

        color: rgb(255, 255, 255);
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .form-div:hover {

        scale: 125%;
        transition: 0s;
        box-shadow: 0 0 1px rgba(255, 0, 204, 0.515);
    }

    .form-div:active {

        scale: 108%;
    }
</style>

<style>
    @media only screen and (max-width: 768px) {
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .intro {
            margin-top: 20%;
            width: 80%;
            height: 80%;
            border: 1px solid rgba(212, 0, 255, 0.603);
            box-shadow: 0 0 10px rgba(212, 0, 255, 0.603);
        }

        .form-div {
            height: 10%;
            width: 80%;
        }

        .image img {
            width: 100%;
        }
    }
</style>