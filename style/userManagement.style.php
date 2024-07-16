<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
    }

    .umpanel {
        border-radius: 15px;
        margin: 10px;
        width: 90%;
        margin-left: auto;
        margin-right: auto;
        background: rgb(0, 74, 87);
        display: flex;

        justify-content: center;
        justify-items: center;
        flex-direction: row;
    }

    .umpanel-div {
        padding: 10px;
        display: flex;
        margin: auto;
        justify-content: center;
        justify-items: center;
        flex-direction: column;
    }

    .umpaneldiv input {
        height: 25px;
        width: 200px;
        border-radius: 5px;
        transition: 0.2s;
    }

    .umpaneldiv input:hover {
        scale: 102%;
    }

    .umpaneldiv input::placeholder {

        padding-left: 5px;
        color: #000000;
    }

    .umpaneldiv button[type="submit"] {
        margin-top: 5px;
        margin-left: auto;
        margin-right: auto;
        width: 200px;
        height: 25px;
        border-radius: 5px;
        transition: 0.2s;
    }

    .umpaneldiv button[type="submit"]:hover {
        cursor: pointer;
        background: rgb(0, 229, 255);
    }

    .user-detail {
        width: 600px;
        margin: 40px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.318);
        margin-left: auto;
        margin-right: auto;
        padding: 5px;
    }

    .udclose {
        display: flex;
        justify-content: right;
    }

    .udclose button {
        margin: 5px;
        width: 50px;
        height: 20px;
        background-color: rgb(255, 31, 31);
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: 0.1s;
    }

    .udclose button:hover {
        scale: 105%;
        color: #000000;
        background-color: rgb(255, 81, 81);
        cursor: pointer;
    }

    .goback button {
        margin-right: -20px;
        width: 60px;
        height: 20px;
        background-color: rgb(255, 31, 31);
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: 0.1s;
    }

    .goback button:hover {
        scale: 105%;
        color: #000000;
        background-color: rgb(255, 81, 81);
        cursor: pointer;
    }

    .h1 {
        text-align: center;
    }

    .ud1 {
        background: rgb(97, 234, 255);
        margin: 5px;
        display: flex;


    }

    .ud2 {
        background: rgb(154, 154, 154);
        margin: 5px;
        display: flex;
    }

    .udf {
        display: flex;
        justify-content: left;
        align-items: center;
        width: 200px;
        height: 40px;
        margin-left: 1rem;
        font-weight: bold;
    }

    .udb {
        display: flex;
        justify-content: left;
        align-items: center;
        width: 400px;
        height: 40px;
        margin-left: 1rem;
    }
</style>


<!-- User all details -->
<style>
    .user-detail-all {
        margin: 20px;
        margin-top: 20px;
        height: 500px;
        box-shadow: 0 0 10px grey;
        overflow: auto;
    }

    .h2 {
        margin: 5px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .udahead {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-left: auto;
        margin-right: auto;
        width: fit-content;
        height: 40px;
        background: rgb(255, 255, 255);
        font-weight: bolder;
        margin-bottom: 5px;
        background: rgb(0, 0, 0);
        border: 5px solid black;
        font-size: large;
    }

    .udarow {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 40px;
        background: rgb(255, 255, 255);


    }

    .ua1 {
        width: 200px;
        height: 30px;
        background: rgb(202, 202, 202);
    }

    .ua2 {
        width: 300px;
        height: 30px;
        background: rgb(97, 234, 255);
        font-size: 98%;
    }

    .ua3 {
        width: 100px;
        height: 30px;
        background: rgb(202, 202, 202);
    }

    .ua4 {
        width: 100px;
        height: 30px;
        background: rgb(97, 234, 255);
    }

    .ua5 {
        width: 130px;
        height: 30px;
        background: rgb(202, 202, 202);
    }

    .ua6 {
        width: 300px;
        height: 30px;
        background: rgb(97, 234, 255);
    }

    .uadef {
        display: flex;
        justify-content: left;
        align-items: center;
        height: 40px;
        padding-left: 15px;
    }

    .uadefa {
        display: flex;
        justify-content: left;
        align-items: center;
        padding-left: 15px;
    }
</style>

<style>
    .yesnodiv {
        width: 100%;
        height: auto;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 100px;
    }

    .yesno {
        padding: 15px;
        border-radius: 10px;
        background: rgb(195, 195, 195);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    .yesnoyesno {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: row;
    }

    .yesnoyesno div {
        margin: 10px;
    }

    .yesnoyesno button {
        width: 60px;
        height: 30px;
        transition: 0.2s;
        border: none;
        border-radius: 10px;
    }

    .yesnoyesno button:hover {
        scale: 125%;
        background: rgb(97, 234, 255);
        cursor: pointer;

    }
</style>