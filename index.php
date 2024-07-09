<?php
session_start();

include("config.php");

if (isset($_GET["chat_id"]) and isset($_GET["username"])) {
    $chat_id = htmlspecialchars($_GET["chat_id"]);
    $username = htmlspecialchars($_GET["username"]);
    if (users($chat_id) == 1) {
        $_SESSION["chat_id"] = $chat_id;
        $info = info($_SESSION["chat_id"]);
    } else {
        header('Location: index.php?chat_id=' . $chat_id);
    }
} else {
    echo "<script>alert('Welcome')</script>";
    header('Location: https://t.me/' . $data->Account->chanell_link);
}
?>
<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./assets/css/coin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton+SC&family=Ga+Maamli&display=swap" rel="stylesheet">
    <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap"
    rel="stylesheet"
    <link href='https://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>



    <style>
        .score-display {
            font-size: 50px;

        }
        
        .font-sm {

            font-size : 10px;
        }

        .font-lg {

            font-size : 50px;
        }

        span 
        {
            font-family : "Poppins"
        }

        @font-face{
            
            font-family:'digital-clock-font';
            src: url('fonts/digitalnum.ttf');
        }

        .digital-num 
        {
            font-family:'digital-clock-font'

        }

        
    </style>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            fontFamily: {
              'Poppins' : ["Poppins"]
            }
          }
        }
      }
    </script>

</head>

<body>

    <div class="min-h-screen bg-black flex justify-center items-center p-4">
        <div class="bg-zinc-800 rounded-2xl shadow-lg p-4 w-full max-w-md text-white">
            <div class="flex justify-between items-center mb-4">
                <div class="flex items-center">
                    <img src="./photos/logo.png" width="40px" height="40px" alt="User Avatar" class="rounded-full mr-2">
                    <span class="font-Poppins font-bold" ><?php if ($username == "") {
                                echo $chat_id;
                            } else {
                                echo $username;
                            } ?> (SCP)</span>
                </div>
                <button class="bg-600 p-2 rounded-full">
                    <img src="./photos/binance.webp" alt="Settings" width="30px" height="30px">
                </button>
            </div>
            <div class="flex border-2  justify-around bg-zinc-700  p-3 rounded-lg mb-4">
                <div class="text-center">
                    <span class="block font-sm text-yellow-300">Earn per tap</span>
                    <span class="block mt-1 text-lg text-yellow-500 font-bold">+10</span>
                </div>
                <div class="text-center flax-1">
                    <span class="block font-sm  text-yellow-300">Coins to level up</span>
                    <span class="block mt-1 text-lg text-yellow-500 font-bold ">50 M</span>
                </div>
                <div class="text-center">
                    <span class="block   font-sm  text-yellow-300">Profit per hour</span>
                    <span class="block mt-1 text-lg text-yellow-500 font-bold ">+1 k</span>
                </div>
            </div>
            <div class="text-center mb-4 ">
                <div class="text-4xl mb-2  ">
                    <!-- <img src="./photos/coin.png" width="40px" height="40px" alt="Coin" class="inline-block mr-2" id="coin-image"> -->
                    <span id="score" class=" text-yellow-300  digital-num  font-lg"><?php echo $info["balanse"]; ?></span>
                </div>
            </div>
            <div class="flex justify-center mb-4" id="coin">
                <img src="./photos/bomb.png" width="80%" height="80%" alt="Character" class="rounded-full clickable" onclick="startVibration()">
            </div>
            <div class="flex justify-between items-center mb-4">
                <div class="flex items-center">
                    <img src="./photos/charge.png" id="charge" alt="Energy" class="mr-2">
                    <div class="flex justify-between items-center">
                        <span id="inventory"><?php echo $info["charge"]; ?></span>
                        <span> / 5000</span>
                    </div>
                </div>

            </div>
            <div class="bg-zinc-600 rounded-full h-2 w-full mx-2">
                <div class="bg-yellow-500 h-2 rounded-full" style="width: 10%;" id="inventory-fill"></div>
            </div><br>

            <div class="flex justify-between items-center bg-slate-300	 p-2 rounded-lg">
                <button class="flex-1 flex flex-col items-center ">
                    <img src="./photos/exchangeLogo.png" alt="Exchange" class="mb-1" width="60px" height="60px">
                    <!-- <span>Exchange</span> -->
                </button>
                <button class="flex-1 flex flex-col items-center ">
                    <a href="boost.php">
                        <img src="./photos/miningLogo.png" alt="Mine" class="mb-1" width="30px" height="30px">
                        <span class="text-black font-bold ">Mine</span>
                    </a>
                </button>
                <button class="flex-1 flex flex-col items-center ">
                    <img src="photos/friendLogo.png" alt="Friends" class="mb-1" width="30px" height="30px">
                    <span class="text-black font-bold "> Friends </span>
                </button>
                <button class="flex-1 flex flex-col items-center ">
                    <img src="photos/earnLogo.png" alt="Earn" class="mb-1" width="30px" height="30px">
                    <span class="text-black font-bold "> Earn </span>
                </button>
                <button class="flex-1 flex  flex-col items-center ">
                    <img src="photos/airdropLogo.png" alt="Airdrop" class="mb-1" width="30px" height="30px">
                    <span class="text-black font-bold "> Airdrop </span>
                </button>
            </div>
        </div>
    </div>
    <div id="sticker" style="display: none; position: absolute;">
        <img src="./photos/kolang.png" alt="Sticker" style="width: 250px; height: 100px;">
    </div>
    <script>
        function startVibration() {
            // Check if the device supports vibration
            if ("vibrate" in navigator) {
                // Vibrate for 200ms
                window.navigator.vibrate(20);
            } else {
                console.log("Vibration not supported on this device");
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const image = document.querySelector('.clickable');
            const scoreElement = document.getElementById('score');
            const inventoryElement = document.getElementById('inventory');
            const inventoryFill = document.getElementById('inventory-fill');
            var currentSearch = window.location.search;
            var index = currentSearch.indexOf("&");
            var number = currentSearch.substring(1, index);

            let inventory = parseInt(inventoryElement.textContent, 10);
            const maxInventory = 5000;

            function updateInventory() {
                inventoryElement.textContent = `${inventory}`;
                inventoryFill.style.width = `${(inventory / maxInventory) * 100}%`;

                var formData = new FormData();
                formData.append('username', number.replace("chat_id=", ""));
                formData.append('charge', inventory);

                fetch('update.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (!data.success) {
                            console.error('Error:', data.message);
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }

            function recharge() {
                if (inventory < maxInventory) {
                    inventory += 1;
                    if (inventory > maxInventory) {
                        inventory = maxInventory;
                    }
                    updateInventory();
                }
            }

            setInterval(recharge, 2000);

            image.addEventListener('click', function(event) {
                if (inventory > 0) {
                    inventory -= 1;
                    updateInventory();

                    image.classList.add('shake');
                    setTimeout(() => {
                        image.classList.remove('shake');
                    }, 500);

                    const scoreDisplay = document.createElement('div');
                    scoreDisplay.textContent = "+1";
                    scoreDisplay.classList.add('score-display');
                    const rect = image.getBoundingClientRect();

                    scoreDisplay.style.top = `${event.clientY - rect.top}px`;
                    scoreDisplay.style.left = `${event.clientX - rect.left}px`;
                    image.parentElement.style.position = 'relative';
                    image.parentElement.appendChild(scoreDisplay);

                    setTimeout(() => {
                        scoreDisplay.remove();
                    }, 2000);

                    var formData = new FormData();
                    formData.append('number', 1);
                    formData.append('username', number.replace("chat_id=", ""));

                    fetch('update.php', {
                            method: 'POST',
                            body: formData
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                scoreElement.textContent = data.balanse;
                                inventoryElement.textContent = `${data.charge}`;
                            } else {
                                console.error('Error:', data.message);
                            }
                        })
                        .catch(error => console.error('Error:', error));
                }
            });

            updateInventory();
        });
    </script>
</body>

</html>
