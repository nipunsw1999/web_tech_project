<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
    }

    body {
        display: flex;
        justify-content: center;
        align-items: center;
        background: rgb(0, 74, 87);
        /* background: url(../media/index0.jpg);
        background-size: cover; */
    }

    img.imgg {
        filter: hue-rotate(190deg);
    }

    #form-div {
        background: transparent;
        border: 5px solid rgb(255, 255, 255);
        padding: 2% 1% 1% 1%;
        border-radius: 20px;
        color: #000000;
        height: 70%;
        width: 30%;
        display: flex;
        flex-direction: column;
        justify-content: top;
        align-items: center;
        backdrop-filter: blur(5px);
    }

    #form-div-div {
        width: 250px;
        height: 20%;
        margin: 5% 0 5% 0;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #form-div-div input {
        width: 100%;
        height: 100%;
        background: none;
        color: rgb(255, 255, 255);
        padding-left: 5%;
        border: 5px solid rgb(255, 255, 255);
        border-radius: 10px;
        transition: 0.2s;
    }

    #form-div-div input:hover {
        scale: 105%;
    }

    #form-div-div input::placeholder {
        width: 100%;
        height: 100%;
        background: none;
        color: rgb(255, 255, 255);
        transition: 0.5s;

    }
    #form-div-div input:hover::placeholder {
        padding-left: 10px;
color: #fff;

    }
    #form-div-div i {
        position: absolute;
        right: 25%;
        color: rgb(255, 255, 255);
    }

    #form-div-div button {
        width: 100%;
        height: 100%;
        border-radius: 10px;
        border: none;
        background: rgb(255, 255, 255);
        transition: 0.2s;
        cursor: pointer;
        font-size: large;
        font-weight: bold;
        border: 5px solid rgb(255, 255, 255);
        color: rgb(0, 74, 87);
    }

    #form-div-div button:hover {
        border: 5px solid rgb(0, 0, 0);
        scale: 105%;
        font-size: 40px;
        background:  rgb(0, 0, 0);
        color: rgb(255, 255, 255);
        font-size: large;
    }
    #form-div-div button:active {
        border: 5px solid rgb(0, 217, 255);
        scale: 105%;
        font-size: 40px;
        background:  rgb(0, 217, 255);
        color: rgb(255, 255, 255);
        font-size: large;
    }


    #form-div-div p {
        margin: 20% 0 0 0;
        color: rgb(255, 255, 255);
    }

    #form-div-div a {
        text-decoration: none;
        color: rgb(255, 255, 255);
        font-weight: bold;
    }

    #form-div-div a:hover {
        background: rgb(255, 255, 255);
        color: rgb(0, 74, 87);
    }

    #form-img {
        height: 20%;
        width: 80%;
        margin: 0 0 5% 0;
    }

    #form-img img {
        object-fit: contain;
        width: 100%;
        height: 100%;
        scale: 140%;
    }
</style>

<!-- Responsive -->
<style>
    @media only screen and (max-width: 768px) {
        #form-div {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: top;
            width: 95%;
            height: 80%;
            padding: 10% 5% 5% 5%;
        }

        #form-div-div {
            width: 100%;
            height: 30%;
            margin: 5% 0 5% 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #form-div-div i {
            position: absolute;
            right: 25%;
            font-size: 20px;
        }

        #form-img {
            height: 30%;
            width: 70%;
            margin: 0 0 10% 0;
        }

        #form-div-div input {
            font-size: 100%;
        }

        #form-div-div button {

            font-size: 20px;
        }

        #form-div-div p {
            font-size: 20px;
        }
    }
</style>