<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: Arial, Helvetica, sans-serif;
}

body{
    background: rgb(0, 74, 87);
}

.kuppi-div {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100%;
}

.kuppi {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width: 40%;
    height: 60%;
    border: 5px solid rgb(253, 253, 253);
    border-radius: 20px;
    color: #fff;
}

.dd {
    margin: 2%;
    font-size: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
}

.dd input {
    font-size: 20px;
    border: 2px solid rgb(255, 255, 255);
    background: rgb(0, 74, 87);
    color: #fff;
    padding-left: 5px;
}
.dd input::placeholder{
    color: #fff;
    padding-left: 10px;
}
.dd textarea {
    font-size: 15px;
    border: 2px solid rgb(255, 255, 255);
    background: rgb(0, 74, 87);
    color: #fff;
}
.dd textarea::placeholder{
    padding-left: 10px;
    color: #fff;
}

#list-sub {
    font-size: 30px;
    border: 3px solid rgb(255, 255, 255);
    background: rgb(0, 74, 87);
    cursor: pointer;
}

#kuppicoz {
    width: 60%;
    font-size: 15px;
    border: 5px solid rgb(255, 255, 255);
    cursor: pointer;
}

.dd button {
    width: 50%;
    height: 50px;
    background: rgb(255, 255, 255);
    color: rgb(0, 74, 87);
    border: none;
    transition: 0.2s;
    font-size: large;
    font-weight: bold;
    border-radius: 10px;
    cursor: pointer;
}

.dd button:hover {
    scale: 105%;
    background: #000000;
    color: rgb(255, 255, 255);
    border: 1px solid rgb(0, 74, 87);
    border-radius: 10px;
}
</style>
<style>
@media only screen and (max-width: 768px) {
    .kuppi-div {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;

    }

    .kuppi {
        width: 80%;
        height: 50%;
        border: 5px solid #fff;
    }

    .dd {
        font-size: 25px;
    }
}
</style>