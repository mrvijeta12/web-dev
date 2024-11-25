<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form Popup</title>
    <style>
        /* Basic styling for popup */
        .popup {
            display: none;
            position: fixed;
            /* Fixed positioning to keep the popup in the viewport */
            top: 50%;
            /* Center vertically */
            left: 50%;
            /* Center horizontally */
            transform: translate(-50%, -50%);
            /* Adjust the popup to be fully centered */
            width: 100%;
            /* Take full width for the background overlay */
            height: 100%;
            /* Take full height for the background overlay */
            background: rgba(0, 0, 0, 0.7);
            /* Semi-transparent background */
            justify-content: center;
            /* Center horizontally (flex property) */
            align-items: center;
            /* Center vertically (flex property) */
            z-index: 98;
            /* Ensure it appears above all other content */
        }


        .popup-content {
            /* background: linear-gradient(181deg, rgb(2, 0, 97) 15%, rgb(97, 149, 219) 158.5%); */
            background: rgba(0, 0, 0, 0.9);

            padding: 20px;
            border-radius: 8px;
            width: 60%;
            position: relative;
            /* top: 50%;

            left: 50%;
            transform: translate(-50%, -50%); */
            border: 1px solid #444;
            display: flex;
            justify-content: space-between;
            gap: 30px;
            color: white;


            box-shadow:
                rgba(255, 255, 255, 0.15) 0px 50px 100px -20px,
                rgba(255, 255, 255, 0.1) 0px 30px 60px -30px,
                rgba(255, 255, 255, 0.05) 0px -2px 6px 0px inset;

            /* border: 2px solid red; */




        }

        .popup-image {
            /* border: 2px solid red; */
            width: 50%;
            min-height: 100%;


        }

        .popup-form {
            /* border: 1px solid blue; */
            width: 50%;
        }

        .popup-form h2 {
            color: #0363ff;
        }


        .popup-content img {
            width: 100%;
            height: 100%;
        }

        .popup-content h2 {
            margin-top: 0;
        }

        .popup-content label {
            display: block;
            margin-top: 10px;
        }

        .popup-content input,
        .popup-content textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .popup-content button {
            margin-top: 15px;
            width: 100%;
            padding: 10px;
            background-color: #0363ff;

            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .close {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 20px;
            cursor: pointer;
        }

        .close:hover {
            color: #0363ff;
            font-size: 24px;
        }

        @media screen and (max-width:768px) {

            /* For screens smaller than 768px */
            .popup-content {
                width: 100%;
                padding: 20px;
                border-radius: 8px;
                max-width: 90%;
                margin: 0 auto;
            }

            .popup-image {
                margin: 0px auto;
            }

            .popup-form {
                width: 100%;
            }

        }

        @media screen and (max-width:550px) {

            /* For screens smaller than 550px */
            .popup-content {
                flex-direction: column;
                /* height: 300px; */
                margin-top: 55px;
            }

            .popup-image {
                /* height: 100px; */
            }

        }
    </style>
</head>

<body>

    <div class="popup" id="contactPopup">
        <div class="popup-content">
            <div class="popup-image">
                <img src="/webdev/images/popup-contact.png" alt="">
            </div>
            <div class="popup-form">
                <span class="close" id="closePopup">&times;</span>
                <h2>Let's talk</h2>
                <form method="POST">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required />
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required />
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" required></textarea>
                    <button type="submit" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Reopen popup link -->
    <!-- <a href="#" class="reopenPopup" data-aos="fade-up" data-aos-duration="1500">Get Free Quote</a> -->

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Select the single popup element by ID
            const popup = document.getElementById("contactPopup");
            const reopenLinks = document.querySelectorAll(".reopenPopup");

            // Check if the popup was previously closed in this session
            if (!sessionStorage.getItem("popupClosed")) {
                // Delay the popup by 5 seconds
                setTimeout(function() {
                    popup.style.display = "flex";
                }, 5000);
            }

            // Close the popup and store the closed state in sessionStorage
            const closeBtn = document.getElementById("closePopup");
            closeBtn.addEventListener("click", function() {
                popup.style.display = "none";
                sessionStorage.setItem("popupClosed", "true");
            });

            // Reopen the popup if any of the reopen links is clicked
            reopenLinks.forEach((link) => {
                link.addEventListener("click", function(e) {
                    e.preventDefault(); // Prevent the default anchor behavior
                    // Clear the closed state and show the popup again
                    sessionStorage.removeItem("popupClosed");
                    popup.style.display = "flex";
                });
            });
        });
    </script>


    <?php include_once('sendMail.php') ?>



</body>

</html>