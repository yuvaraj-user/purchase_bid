<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Bidding</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(135deg, #f8fbff, #eaf2f8);
            padding: 40px 20px;
        }
        .bid-container {
/*            max-width: 700px;*/
            margin: auto;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .bid-header {
            background: #0abab5;
            color: white;
            padding: 15px;
            font-weight: bold;
            font-size: 20px;
            border-radius: 12px 12px 0 0;
        }
        .bid-details {
            text-align: left;
            padding: 20px;
        }
        .bid-label {
            font-weight: bold;
            color: #088f8f;
        }
        .highlight {
            font-weight: bold;
            color: #0e6f6c;
        }
        .countdown {
            font-size: 24px;
            font-weight: bold;
            color: #c0392b;
            text-align: center;
        }
        .btn-bid {
            background: #0abab5;
            border: none;
            color: white;
            font-weight: bold;
            padding: 12px;
            border-radius: 12px;
            width: 100%;
            transition: all 0.3s ease-in-out;
        }
        .btn-bid:hover {
            background: #088f8f;
            color: white;
            transform: scale(1.02);
        }

        /* Sliding Popup */
        .bid-popup {
            position: fixed;
            bottom: -250px;
            left: 50%;
            transform: translateX(-50%);
            width: 300px;
            background: white;
            padding: 20px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            text-align: center;
            transition: bottom 0.3s ease-in-out;
        }

        .bottom-nav {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: #fff;
            border-top: 1px solid #ddd;
            padding: 20px 0;
            display: flex;
            justify-content: space-around;
            z-index: 3;
        }
        .bottom-nav a {
            text-decoration: none;
            font-size: 14px;
            color: #666;
            text-align: center;
            flex: 1;
            transition: 0.3s;
        }
        .bottom-nav a.active {
            color: #007bff;
            font-weight: bold;
        }
        .bottom-nav a i {
            display: block;
            font-size: 24px;
            line-height: 1.5;
        }        
    </style>
</head>
<body>

    <div class="container ">
        <div id="bidsContainer"></div>
    </div>

    <!-- Sliding Popup -->
    <div id="bidPopup" class="bid-popup">
        <h4>Enter Your Bid</h4>
        <input type="number" id="bidAmount" class="form-control" placeholder="Enter bid amount">
        <button class="btn btn-success mt-2" id="submitBid">Submit Bid</button>
        <button class="btn btn-danger mt-2" id="closePopup">Cancel</button>
    </div>

    <div class="bottom-nav mt-5">
        <a href="javascript:void(0)" class="live-bid-tab active"><i class="fa-solid fa-ranking-star"></i> Live</a>
        <a href="javascript:void(0)" class="upcomming-bid-tab"><i class="fa-solid fa-layer-group"></i> Upcoming</a>
        <a href="javascript:void(0)" class="order-tab conform">
            <i class="fa-solid fa-file-pen"></i>Order</a>
        <a href="javascript:void(0)" class="history-tab Historyclass"><i class="fa-solid fa-clock-rotate-left"></i> History</a>
    </div>    

    <script>
        // Bidding data
        const bidData = [
            { id: 1, code: "98765", name: "Gold Bars", uom: "Ounces", quantity: 50, location: "Dubai, UAE", hoursLeft: 24 },
            { id: 2, code: "12345", name: "Silver Coins", uom: "Kg", quantity: 100, location: "London, UK", hoursLeft: 12 },
            { id: 3, code: "67890", name: "Copper Sheets", uom: "Ton", quantity: 20, location: "New York, USA", hoursLeft: 8 }
        ];

        function renderBids() {
            const container = document.getElementById("bidsContainer");
            container.innerHTML = "";
            bidData.forEach((bid) => {
                const bidCard = `
                    <div class="bid-container">
                        <div class="bid-header">🏆 Auction - ${bid.name}</div>
                        <div class="bid-details">
                            <div class="row">
                                <div class="col-6">
                                    <p class="bid-label">Material Code:</p>
                                    <p class="highlight">${bid.code}</p>
                                </div>
                                <div class="col-6 text-end">
                                    <p class="bid-label">Material:</p>
                                    <p class="highlight">${bid.name}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <p class="bid-label">UOM:</p>
                                    <p class="highlight">${bid.uom}</p>
                                </div>
                                <div class="col-6 text-end">
                                    <p class="bid-label">Quantity:</p>
                                    <p class="highlight">${bid.quantity}</p>
                                </div>
                            </div>
                            <hr>
                            <p><strong>📍 Location:</strong> <span class="highlight">${bid.location}</span></p>
                            <p><strong>⏳ Time Left:</strong> <span class="countdown-${bid.id}" id="countdown-${bid.id}" class="countdown"></span></p>
                        </div>
                        <button class="btn btn-bid mt-3" onclick="placeBid('${bid.name}', '${bid.code}')">💰 Place Your Bid</button>
                    </div>
                `;
                container.innerHTML += bidCard;
                // startCountdown(`countdown-${bid.id}`, bid.hoursLeft);
            });
        }

        // function startCountdown(id, hours) {
        //     let timeLeft = hours * 3600;
        //     function updateCountdown() {
        //         if (timeLeft <= 0) {
        //             document.getElementById(id).innerHTML = "00:00:00";
        //             clearInterval(timer);
        //             return;
        //         }
        //         let h = Math.floor(timeLeft / 3600);
        //         let m = Math.floor((timeLeft % 3600) / 60);
        //         let s = timeLeft % 60;
        //         document.getElementById(id).innerHTML =
        //             (h < 10 ? "0" + h : h) + ":" +
        //             (m < 10 ? "0" + m : m) + ":" +
        //             (s < 10 ? "0" + s : s);
        //         timeLeft--;
        //     }
        //     updateCountdown();
        //     let timer = setInterval(updateCountdown, 1000);
        // }

        function startCountdown(classname, hours) {
                    // console.log(document.getElementsByClassName(classname));
            let timeLeft = hours * 3600;
            function updateCountdown() {
                let elements = document.getElementsByClassName(classname);
                for (let i = 0; i < elements.length; i++) {
                    if (timeLeft <= 0) {
                        elements[i].innerHTML = "00:00:00";
                        clearInterval(timer);
                        return;
                    }
                    let h = Math.floor(timeLeft / 3600);
                    let m = Math.floor((timeLeft % 3600) / 60);
                    let s = timeLeft % 60;
                    elements[i].innerHTML =
                        (h < 10 ? "0" + h : h) + ":" +
                        (m < 10 ? "0" + m : m) + ":" +
                        (s < 10 ? "0" + s : s);
                    timeLeft--;
                }
            }
            updateCountdown();
            let timer = setInterval(updateCountdown, 1000);
        }        

        function placeBid(material, code) {
            $("#bidPopup").css("bottom", "50%"); // Show popup
            $("#submitBid").off("click").on("click", function () {
                let amount = $("#bidAmount").val();
                if (amount) {
                    alert(`Bid placed: ${amount} for ${material} (Code: ${code})`);
                    $("#bidPopup").css("bottom", "-250px"); // Hide popup after submitting
                } else {
                    alert("Please enter a bid amount.");
                }
            });
        }

        $("#closePopup").on("click", function () {
            $("#bidPopup").css("bottom", "-250px"); // Hide popup when canceled
        });

        // renderBids();


        $(document).ready(function(){
            setInterval(function(){
                get_live_bid_details();
            },1000)

        });


        function get_live_bid_details()
        {
            $.ajax({
                url: 'Common_Ajax.php',
                type: 'POST',
                data: { Action : 'Get_Live_Bidding_Details' },
                dataType: "json",
                cache:false,
                success: function(response) {
                    var bidCard = ''; 

                    if(response.length > 0) {
                        response.forEach((bid) => {
                             bidCard += `
                                <div class="bid-container mb-5">
                                    <div class="bid-header">🏆 Bid Number - ${bid.bidnum} - ${bid.MaterialDescription}</div>
                                    <div class="bid-details">
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="row">
                                                    <p class="bid-label col-6">Material Group:</p>
                                                    <p class="highlight col-6">${bid.Materialgroup}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="row">
                                                    <p class="bid-label col-6">UOM:</p>
                                                    <p class="highlight col-6">${bid.UOM}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="row">
                                                    <p class="bid-label col-6">Quantity:</p>
                                                    <p class="highlight col-6">${bid.Quantity}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <p><strong>📍 Location:</strong> <span class="highlight">${bid.Location}</span></p>
                                        <p><strong>⏳ Time Left:</strong> <span id="countdown-${bid.bidnum}" class="countdown countdown-${bid.bidnum}">${ bid.time_left }</span></p>
                                    </div>
                                    <button class="btn btn-bid mt-3" onclick="placeBid('${bid.name}', '${bid.code}')">💰 Place Your Bid</button>
                                </div>`;
                                
                        });

                    }

                    $('#bidsContainer').html(bidCard);


                    // response.forEach((bid) => {
                    //     startCountdown(`countdown-${bid.bidnum}`, 0.5);
                    // });


                }
            });  
        }

    </script>

</body>
</html>
