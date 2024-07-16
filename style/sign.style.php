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
    /* background: url(../media/index0.jpg);
        background-size: cover; */
        background: rgb(0, 74, 87);
}

#form-div {
    background: transparent;
    border: 5px solid rgb(255, 255, 255);
    padding: 2% 1% 3% 1%;
    border-radius: 20px;
    color: #000000;
    height: 80%;
    width: 30%;
    display: flex;
    flex-direction: column;
    justify-content: top;
    align-items: center;
    overflow-y: auto;
    overflow-x: hidden;
}
::-webkit-scrollbar {
    width: 12px;
}
::-webkit-scrollbar-thumb {
    background: #000000;
    border-radius: 100px; 
}
::-webkit-scrollbar-thumb:hover {
    background: rgb(41, 41, 41);
}
::-webkit-scrollbar-thumb:active {
    background: rgb(0, 0, 0);
}
#form-div-div {
    width: 100%;
    height: 20%;
    display: flex;
    justify-content: left;
    align-items: center;
}

#form-div-div input {
    width: 100%;
    height: 60%;
    background: none;
    color: rgb(255, 255, 255);
    padding-left: 5%;
    border: 2px solid #fff;
    border-radius: 10px;
    transition: 0.2s;
}
#form-div-div label{
    color: #fff;
}
#form-div-div input:hover {
    border: 2px solid #fff;
    scale: 105%;
}

#form-div-div input::placeholder {
    width: 100%;
    height: 50%;
    background: none;
    color:  #fff;

}

#form-div-div i {
    position: absolute;
    right: 18%;
    color:  #fff;
}

#form-div-div button {
    width: 100%;
    height: 100%;
    border-radius: 10px;
    border: none;
    background:  #fff;
    transition: 0.2s;
    cursor: pointer;
    font-size: large;
    font-weight: bold;
    border: 2px solid #fff;
    color: rgb(0, 74, 87);
}

#form-div-div button:hover {
    scale: 105%;
    background: rgb(1, 1, 1);
    color: rgb(255, 255, 255);
    border: 2px solid #000000;
    font-size: large;
}
#form-div-div button:active {
    scale: 107%;
    background: rgb(0, 217, 255);
    color: rgb(255, 255, 255);
    border: 2px solid rgb(0, 217, 255);
    font-size: large;
}
.slt{
    width: 100%;
    height: 50%;
    border: 2px solid rgb(255, 255, 255);
    background: rgb(0, 74, 87);
    border-radius: 10px;
    transition: 0.2s;
    color: rgb(249, 249, 249);
}
.slt:hover{
scale: 105%;
}

#form-div-div p {
    margin: 20% 0 0 0;
    color: #fff;
}

#form-div-div a {
    text-decoration: none;
    color:#000000;
    font-weight: bold;
}
#form-div-div a:hover{
    color:rgb(0, 74, 87);
 background: #ffffff;
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
        width: 90%;
        height: 70%;
        padding: 10% 5% 5% 5%;
    }

    #form-div-div {
        width: 100%;
        height: 20%;
        margin: 1% 0 1% 0;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #form-div-div i {
        position: absolute;
        right: 16%;
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
        height: 50%;
        font-size: 20px;
    }

    #form-div-div p {
        font-size: 17px;
    }
}
</style>