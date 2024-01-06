<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Details</title>
    <header>
        <a href="packages.html"> <img src="IMAGES/DAYO LOGO.png"  alt="Dayo Logo"></a>
       </header>
</head>
<body>
    <form action="plan_5.php">

        <h2>Upload Screencapture of Payment:</h2>

        <div>
            <label for="paymentScreenshot" class="upload-btn">Upload File</label>
            <input type="file" id="paymentScreenshot" name="paymentScreenshot" accept="image/*">
            <!-- Display the selected file name -->
            <p id="selectedFileName"></p>
        </div>

        <button type="submit" class="reservation">CONTINUE TO PROCESS</button>

    </form>

    <script>
        // Display the selected file name
        document.getElementById('paymentScreenshot').addEventListener('change', function () {
            document.getElementById('selectedFileName').textContent = this.files[0].name;
        });
    </script>
</body>

<style>
    body {
        font-family: Arial, sans-serif;
        background-image: linear-gradient(rgba(74, 113, 165, 0.179),rgba(19, 96, 100, 0.201)),url(IMAGES/WALLPAPER.png);
      height: auto;
        display: flex;
        flex-direction: column;
        align-items: center;
        color: #333;
    }

    header {
        text-align: center;
    }

    header img {
        max-width: 50%;
        height: auto;
        cursor: pointer;
    }

    button {
      background-color: #19ac14;
      color: #fff;
      padding: 20px 20px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      margin-left: 25%;

    }

    button:hover {
        background-color: #18866a;
        text-align: center;
    }

   
    input[type="file"] {
        display: none; 
        
    }

    label.upload-btn {
        background-color: #076a2f;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        margin: 20px 0;
        display: inline-block;
       margin-left: 34%;
    }
    form{
  color: white;
  background-color: #18866acc;
  padding: 40px 20px 40px 20px;
  border-radius: 8px;
}
</style>
</html>
