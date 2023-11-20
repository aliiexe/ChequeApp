<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Text Update</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
    <style>
        #container {
            position: relative;
            text-align: center;
        }

        #liveText {
            position: absolute;
            bottom: 10px;
            left: 90px;
            transform: translateY(-390%);
            width: 100%;
            padding: 10px;
            color: black;
        }

        #outputImage {
            width: 500px;
            height: auto;
        }

        .maindiv {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form {
            margin-top: 20px;
        }

        .printButton {
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="maindiv">
    <div class="form">
        <form>
            <label for="userInput">A l'ordre de :</label>
            <input type="text" id="userInput" oninput="updateText()">
        </form>
    </div>

    <button class="printButton" onclick="printImage()">Print</button>

    <div id="container">
        <p id="liveText">test text</p>
        <img id="outputImage" src="./images/BankOfAfricaLetter.png" alt="Image">
    </div>

</div>

<script>
    function updateText() {
        var userInput = document.getElementById('userInput').value;
        document.getElementById('liveText').innerText = userInput;
    }

    function printImage() {
        var container = document.getElementById('container');

        html2canvas(container).then(function (canvas) {
            var imageData = canvas.toDataURL('image/png');

            var printWindow = window.open('', '_blank');
            printWindow.document.write('<html><head><title>Print</title></head><body>');
            printWindow.document.write('<img id="printImage" src="' + imageData + '" style="width:100%;">');
            printWindow.document.write('</body></html>');
            printWindow.document.close();

            printWindow.onload = function () {
                printWindow.print();
                printWindow.close();
            };
        });
    }
</script>

</body>
</html>
