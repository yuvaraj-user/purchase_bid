<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Bidding - Luxury Gold</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background: linear-gradient(135deg, #1e1e1e, #3c3c3c);
            font-family: 'Inter', sans-serif;
            color: white;
        }

        .bid-card {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background: linear-gradient(145deg, #2d2d2d, #222222);
            border-radius: 12px;
            box-shadow: 4px 4px 10px #111, -4px -4px 10px #444;
            text-align: center;
            position: relative;
        }

        .gold-text {
            color: #d4af37;
        }

        .btn-bid {
            background: linear-gradient(90deg, #d4af37, #b58e2f);
            border: none;
            color: black;
            font-weight: bold;
            padding: 12px;
            border-radius: 10px;
            width: 100%;
            cursor: pointer;
        }

        .countdown {
            font-size: 22px;
            font-weight: bold;
            color: #ffcc00;
        }

        /* Slide Popup Styles */
        .bid-popup {
            position: fixed;
            right: -400px;
            top: 0;
            width: 350px;
            height: 100%;
            background: #222;
            box-shadow: -4px 0 10px rgba(0, 0, 0, 0.5);
            transition: 0.4s ease-in-out;
            padding: 20px;
            color: white;
            z-index: 1000;
        }

        .popup-show {
            right: 0;
        }

        .popup-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 18px;
            font-weight: bold;
        }

        .popup-close {
            cursor: pointer;
            color: #ffcc00;
            font-size: 20px;
        }

        .popup-body input {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #d4af37;
            margin-top: 10px;
            background: black;
            color: white;
        }

        .btn-confirm {
            background: #d4af37;
            border: none;
            padding: 10px;
            width: 100%;
            margin-top: 15px;
            border-radius: 6px;
            font-weight: bold;
            color: black;
            cursor: pointer;
        }

    </style>
</head>
<body>

<div class="container mt-5">
    <h3 class="text-center gold-text">🏆 Exclusive Gold Auction</h3>
    <div id="bidsContainer"></div>
</div>

<!-- Slide Popup -->
<div id="bidPopup" class="bid-popup">
    <div class="popup-header">
        <span id="popupTitle">Enter Your Bid</span>
        <span class="popup-close" onclick="closePopup()">✖</span>
    </div>
    <div class="popup-body">
        <input type="number" id="popupBidAmount" placeholder="Enter your bid amount">
        <button class="btn-confirm" onclick="confirmBid()">Confirm Bid</button>
    </div>
</div>

<script>
    const materials = [
        { id: 1, code: "GLD-7890", name: "Gold Necklace", hoursLeft: 1 },
        { id: 2, code: "GLD-5678", name: "Gold Ring", hoursLeft: 2 },
        { id: 3, code: "GLD-3456", name: "Gold Bracelet", hoursLeft: 3 },
        { id: 4, code: "GLD-1234", name: "Gold Earrings", hoursLeft: 4 }
    ];

    let currentBidItem = null;

    function renderBids() {
        const container = document.getElementById("bidsContainer");
        container.innerHTML = "";
        materials.forEach((material) => {
            const bidCard = `
                <div class="bid-card">
                    <h4 class="gold-text">${material.name}</h4>
                    <p><strong>Item Code:</strong> ${material.code}</p>
                    <p><strong>⏳ Time Left:</strong> <span id="countdown-${material.id}" class="countdown"></span></p>
                    <button class="btn btn-bid mt-3" onclick="openPopup(${material.id}, '${material.name}')">💎 Place Your Bid</button>
                </div>
            `;
            container.innerHTML += bidCard;
            startCountdown(`countdown-${material.id}`, material.hoursLeft * 3600);
        });
    }

    function startCountdown(id, duration) {
        let countdown = document.getElementById(id);
        let endTime = new Date().getTime() + duration * 1000;

        function updateCountdown() {
            let now = new Date().getTime();
            let remaining = endTime - now;

            if (remaining <= 0) {
                countdown.innerHTML = "Auction Ended";
                return;
            }

            let hours = Math.floor((remaining / (1000 * 60 * 60)) % 24);
            let minutes = Math.floor((remaining / (1000 * 60)) % 60);
            let seconds = Math.floor((remaining / 1000) % 60);

            countdown.innerHTML = `${hours}h ${minutes}m ${seconds}s`;
            setTimeout(updateCountdown, 1000);
        }

        updateCountdown();
    }

    function openPopup(id, name) {
        currentBidItem = { id, name };
        document.getElementById("popupTitle").innerText = `Bid for ${name}`;
        document.getElementById("popupBidAmount").value = "";
        document.getElementById("bidPopup").classList.add("popup-show");
    }

    function closePopup() {
        document.getElementById("bidPopup").classList.remove("popup-show");
    }

    function confirmBid() {
        let amount = document.getElementById("popupBidAmount").value;
        if (amount) {
            alert(`Your bid of $${amount} for ${currentBidItem.name} has been placed!`);
            closePopup();
        } else {
            alert("Please enter a valid bid amount.");
        }
    }

    renderBids();
</script>

</body>
</html>
