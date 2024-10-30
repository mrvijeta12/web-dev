<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form Popup</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <style>
        /* Basic styling for popup */
        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
            /* border: 2px solid red; */
            z-index: 98;
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
            /* border: 1px solid #121212; */
            /* box-shadow:
                rgba(255, 255, 255, 0.25) 0px 50px 100px -20px,
                rgba(255, 255, 255, 0.3) 0px 30px 60px -30px,
                rgba(255, 255, 255, 0.35) 0px -2px 6px 0px inset; */

            /* box-shadow:
                rgba(255, 255, 255, 0.15) 0px 50px 100px -20px,
                rgba(255, 255, 255, 0.2) 0px 30px 60px -30px,
                rgba(255, 255, 255, 0.25) 0px -2px 6px 0px inset; */

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
                <form action="submit_form.php" method="POST">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required />
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required />
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" required></textarea>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <!-- <script src="script.js"></script> -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Check if popup was previously closed
            const popupClosed = localStorage.getItem("popupClosed");

            if (!popupClosed) {
                // Show the popup after 10 seconds
                setTimeout(() => {
                    document.getElementById("contactPopup").style.display = "flex";
                }, 1000); // 10 seconds
            }

            // Close the popup when the close button is clicked
            document
                .getElementById("closePopup")
                .addEventListener("click", function() {
                    document.getElementById("contactPopup").style.display = "none";

                    // Store popup closed state in local storage
                    localStorage.setItem("popupClosed", "true");
                });
        });
    </script>
</body>

</html>