<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, Helvetica, sans-serif;
}
</style>
<style>

</style>
<style>
.upper {
    margin-left: auto;
    margin-right: auto;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    width: 80%;
    height: 10%;
    margin-top: 10px;
}

.nav {
    width: 25%;
    height: 70px;
    box-shadow: 0 0 3px black;
    border-radius: 0px;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    border-radius: 50px;
    background: rgb(0, 74, 87);
    overflow: hidden;
}

.nav div {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-right: 10px;
    overflow: hidden;
}

.nav div a {
    text-decoration: none;
    color: #fff;
    font-size: 15px;
    height: 70px;
    width: 80px;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: 0.2s;
    font-weight: bold;

}

.nav div a:hover {
    text-decoration: none;
    color: #fff;
    font-size: 18px;
    background: black;
    height: 70px;

}

.theme {
    margin-top: 40px;
    height: 100%;
    overflow: hidden;
}

.theme img {
    height: 100%;
}

.hdimg {
    height: 100%;
}

.hdimg img {
    width: 50px;
    height: 50px;

    border-radius: 50%;
}
</style>
<style>
.share {
    display: flex;
    flex-direction: column;
    height: 100%;
    justify-content: center;
    align-items: center;
    margin-top: 30px;

}

.share-up {
    display: flex;
    flex-direction: row;
    background: rgb(255, 255, 255);
    height: 80px;
    width: 95%;
    align-items: center;

}

.share-up-left {
    margin: 0 0 0 10px;
    height: 60%;
    width: 40%;
    margin-right: 10%;
    display: flex;
    align-items: center;
    box-shadow: 0 0 5px black;
    padding-left: 10px;
    padding-right: 10px;
    justify-content: center;

}

.share-up-left select {
    height: 36px;
    width: 80px;
    padding-left: 5px;
    border: 2px solid rgb(0, 74, 87);
    border-radius: 5px;
    font-weight: bold;
    background: rgb(0, 74, 87);
    color: #fff;
    padding-left: 20px;
    transition: 0.4s;
    cursor: pointer;
}

.share-up-left select:hover {
    color: #000000;
    background: rgb(255, 255, 255);
}

.share-up-left button {
    font-size: 30px;
}

.src {
    margin-left: 10px;
    width: 60%;
}

.find {
    height: 80%;
    transition: 0.4s;
    width: 80%;
    border: 2px solid rgb(0, 74, 87);
    border-radius: 5px;
    background: rgb(0, 74, 87);
    color: #000000;
}

.find::placeholder {
    color: #ffffff;
}

.find:hover {
    width: 95%;
    padding-left: 10px;
    border-radius: 15px;
    border: 2px solid rgb(0, 74, 87);
    background: #fff;
}

.share-up-left button {
    height: 80%;
    width: 80px;
    font-size: 20px;
    background: rgb(0, 74, 87);
    border-radius: 5px;
    color: #fff;
    cursor: pointer;
}

.share-up-left button:hover {
    background: #fff;
    width: 80px;
    font-size: 20px;
    padding: 0;
    border-radius: 5px;
    color: #000000;
}

.share-up-right-fm {

    width: 40%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0 0 0 10%;
}

.rht {
    width: 70%;
    display: flex;
    flex-direction: row;
    height: 100%;
    justify-content: center;
    align-items: end;
    margin-left: 30%;
}

.share-up-right-fm-div-get {
    height: 60%;
    width: 30%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    transition: 0.2s;
}

.share-up-right-fm-div-give {
    height: 60%;
    width: 30%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: baseline;
    transition: 0.2s;
}

.share-up-right-fm-div-get button,
.share-up-right-fm-div-give button {
    border: 3px solid rgb(0, 74, 87);
    height: 100%;
    width: 100%;
    border: none;
    cursor: pointer;
    transition: 0.2s;
    background: #fff;
    border: 3px solid rgb(0, 74, 87);
    height: 100%;
    width: 100%;
}

.share-up-right-fm-div-give button:hover,
.share-up-right-fm-div-get button:hover {
    border: 3px solid rgb(0, 74, 87);
    background: #fff;
    color: black;
    font-weight: bold;
}
</style>
<style>
.share-down {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    width: 95%;
    height: 100%;
    padding-top: 25;
    background: rgb(0, 74, 87);
    padding: 0 10px 0 10px;
    justify-content: space-evenly;
    /* border: 2px solid rgb(0, 74, 87); */
    overflow: scroll;
    overflow-x: hidden;
}

.meme {
    display: flex;
    flex-direction: column;
    width: 20%;
    height: 55%;
    margin: 10px;
    overflow: hidden;
    background: rgb(0, 74, 87);
    border-radius: 10px;
    border: 5px solid rgb(255, 255, 255);
}

.meme-left {
    width: 100%;
    margin: 8px;
    display: flex;
    justify-content: center;
    align-items: center;
    background: rgb(0, 74, 87);
}

.meme-left div {
    border: 2px solid rgb(255, 255, 255);
    height: 100px;
    width: 100px;
    border-radius: 50%;
    overflow: hidden;
}

.meme-left div img {
    height: 100%;
    width: 100%;
    object-fit: cover;
}

.meme-right {
    height: 100%;
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding-left: 20px;
}

/* .theme {
    width: 20%;
    overflow: hidden;
}

.theme img {
    overflow: hidden;
    max-width: 50%;
} */

.meme-right div {
    font-weight: bold;
    height: 50%;
    width: 100%;
    color: #fff;
    overflow: hidden;
    display: flex;
    align-items: center;
    background: rgb(0, 74, 87);
    margin: 2px;
}

.meme-right a {
    text-decoration: none;
    padding: 5px 30px 5px 30px;
    color: #fff;
    background: rgb(255, 255, 255);
    border: 1px solid rgb(255, 255, 255);
    cursor: pointer;
    margin: 0 auto 0 auto;
    border-radius: 10px;
    transition: 0.2s;
    cursor: pointer;
}

.meme-right a:hover {
    background: white;
    color: black;
}

.btn {
    width: 50px;
    height: 35px;
    background: rgb(0, 74, 87);
    transition: 0.2s;
    border: none;
    color: #fff;
    border: 2px solid rgb(0, 74, 87);
    border-radius: 4px;
    cursor: pointer;
    font-size: 15px;
}

.btn:hover {
    width: 100px;
    background: #ffffff;
    color: #000000;

}
</style>

<style>
@media only screen and (max-width: 768px) {

    .share {
        display: flex;
        flex-direction: column;
        height: 100%;
        width: 100%;
        margin-top: 100px;
        margin-bottom: 10px;
    }

    .share div {
        margin: 0;
        padding: 0;
    }


    .share-up {
        display: flex;
        flex-direction: column;
        width: 90%;
        height: 200px;
        justify-content: end;
        align-items: center;
    }

    .share-up-left {
        padding-top: 5px;
        padding-bottom: 5px;
        height: 70px;
        width: 100%;
        margin: 0;
    }

    .share-up-left input {
        margin-left: 5px;
        width: 190px;
    }

    .share-up-left input:hover {
        width: 190px;
    }

    .share-up-left select {
        height: 50px;
    }

    .share-up-left button {
        height: 50px;
        width: 50px;
    }

    .share-up-left button:hover {
        width: 50px;
    }


    .share-up-right-fm {
        width: 100%;
        height: 50px;
        display: flex;
    }

    .rht {
        width: 100%;
    }

    .share-up-right-fm-div-give {
        height: 30px;
        width: 30%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: baseline;
        transition: 0.2s;
    }

    .share-up-right-fm-div-get {
        height: 30px;
        width: 30%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: baseline;
        transition: 0.2s;
    }

    .share-down {
        display: flex;
        flex-direction: row;
        width: 100%;
        /* border: 2px solid rgb(0, 74, 87); */
        overflow: scroll;
        overflow-x: hidden;
    }

    .share-down div {
        margin-top: 30px;
    }

    .meme {
        width: 70%;
        height: 400px;
        font-size: larger;
        border: 3px solid rgb(255, 255, 255);
        border-radius: 20px;
        overflow: hidden;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: end;
    }

    .meme-left {
        height: 20%;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background: rgb(0, 74, 87);
    }

    .meme-left div {
        border: 2px solid rgb(255, 255, 255);
        height: 100px;
        width: 100px;
        border-radius: 50%;
        overflow: hidden;
    }

    .meme-left div img {
        object-fit: cover;
    }

    .meme-right {
        height: 70%;
        padding: 0;
        margin: 0;

    }

    .meme-right div {
        height: 30%;
        width: 95%;
        color: rgb(255, 255, 255);
        overflow: hidden;
        display: flex;
        align-items: center;
        margin-left: 10px;

        font-size: 20px;
        margin: 0;
    }

    .btn {
        height: 250px;
        width: 80px;
        font-size: 10px;
        background: #fff;
        color: rgb(0, 74, 87);
    }

    .btn button {
        height: 300px;
        width: 80px;

    }

    .upper {
        width: 100%;
        display: flex;
        justify-content: space-around;
        margin-bottom: -20%;
    }

    .nav {
        width: 250px;

    }
}
</style>