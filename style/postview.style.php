<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
    }

    body {
        margin-top: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .profile-head {
        background-color: rgb(0, 74, 87);
        display: flex;
        flex-direction: row;
        justify-content: center;
        width: 60%;
        height: 70%;
        align-items: center;

        border-radius: 5px;
    }

    .profile-head-left {
        background: rgb(0, 74, 87);
        width: 40%;
        height: 80%;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
        margin-left: 5%;
        border-right: 5px solid rgb(255, 255, 255);
    }

    .profile-head-left img {
        border: 5px solid rgb(255, 255, 255);
        height: 200px;
        width: 200px;
        border-radius: 50%;
        object-fit: cover;
    }

    .profile-head-right {

        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 60%;
    }

    .profile-head-rows-s {
        height: 20%;
        width: 80%;
        color: rgb(255, 255, 255);
        display: flex;
        flex-direction: row;
        justify-content: left;
        align-items: center;
        margin: 1% 0 1% 0;
        font-weight: bold;
        font-size: large;
        margin: 25px;
        border-bottom: 1px solid rgb(255, 255, 255);
    }

    .dwn {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 40%;
    }

    .ctrl-main {
        margin-top: 100px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 300px;
        width: 10%;
        border-radius: 5px;
        background: rgb(0, 74, 87);
    }

    .ctrl {

        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;

    }


    .ctrl-btn button {
        width: 100px;
        height: 50px;
        background: rgb(0, 74, 87);
        border: 3px solid rgb(255, 255, 255);
        border-radius: 10px;
        color: #fff;
        transition: 0.2s;
        cursor: pointer;
    }

    .ctrl-btn button:hover {

        color: #000000;
        background: rgb(255, 255, 255);
        font-weight: bold;

    }

    .meme {
        display: flex;
        height: 300px;
        width: 40%;
        padding-left: 20px;
        justify-content: left;
        align-items: center;
        background:  rgb(0, 74, 87);
        border-radius: 5px;
        margin-left: 50px;
        margin-top: 100px;
        border-radius: 5px;

    }

    .meme-content {
        display: flex;
        flex-direction: column;
        justify-content: top;
        align-items: center;
        height: 100%;
        padding-bottom: 20px;

    }

    .meme-content div {
        width: 95%;
        height: 5%;
        background: rgb(0, 74, 87);
        margin-top: 10px;
        color: #fff;
        display: flex;
        justify-content: left;
        align-items: top;
        font-size: 20px;
        margin: 10px;

    }

    .dd {
        margin-top: 30px;
    }

    .dd p {
        font-size: 15px;
        color: #ffffff;
    }
</style>
<style>
    @media only screen and (max-width: 768px) {
        .profile-head {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 60%;
            width: 90%;
        }

        .profile-head-left {
            height: 50%;
            width: auto;
            border: none;
        }

        .profile-head-left img {
            width: 200px;
            height: 200px;
        }

        .profile-head-right {
            margin-top: 5%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100%;
        }

        .profile-head-rows-s {
            border: none;
            border-left: 5px solid rgb(255, 255, 255);
            border-bottom: 1px solid rgb(255, 255, 255);
            height: 40px;
            width: 80%;
            color: rgb(255, 255, 255);
            display: flex;
            flex-direction: row;
            justify-content: top;
            padding-left: 10px;
            align-items: center;
            margin: 1% 0 1% 0;
            /* box-shadow: 0 0 1px black; */
        }

        .dwn {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
        }

        .ctrl-main {
            height: 10%;
            width: 80%;
            display: flex;
            flex-direction: row;
            box-shadow: 0 0 2px black;
            border: none;
        }

        .meme {
            width: 80%;
            margin-left: auto;
            margin-right: auto;
            height: 80%;
            margin-bottom: 10px;
            justify-content: left;
            align-items: top;
        }

        .meme-content {
            display: flex;
            justify-content: left;
            align-items: end;
            height: 80%;
        }

        .meme-content div {
            display: flex;
            justify-content: top;
            align-items: left;
            height: 10%;
        }

        .dwnnew {
            width: 100%;
            display: flex;
            align-items: center;
        }

        .ka {
            margin-top: 50%;
            ;
            width: 99%;
            height: 100px;
            padding: 20px;
        }

        .share {
            width: 100%;
        }

        .share-up {
            width: 100%;
            margin-left: 0;
        }

        .rht {
            margin-left: 0;
        }
    }
</style>