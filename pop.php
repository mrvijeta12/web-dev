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
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
            z-index: 98;
        }

        .popup-content {
            background: rgba(0, 0, 0, 0.9);
            padding: 20px;
            border-radius: 8px;
            width: 60%;
            position: relative;
            border: 1px solid #444;
            display: flex;
            justify-content: space-between;
            gap: 30px;
            color: white;
            box-shadow:
                rgba(255, 255, 255, 0.15) 0px 50px 100px -20px,
                rgba(255, 255, 255, 0.1) 0px 30px 60px -30px,
                rgba(255, 255, 255, 0.05) 0px -2px 6px 0px inset;
        }

        .popup-image {
            width: 50%;
            min-height: 100%;
        }

        .popup-form {
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
            .popup-content {
                flex-direction: column;
                margin-top: 55px;
            }

            .popup-image {}
        }
    </style>
</head>

<body>
    <!-- Anchor link to reopen the popup -->
    <!-- <a href="#" id="reopenPopup">Open Contact Popup Again</a> -->

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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Check if the popup was previously closed in this session
            if (!sessionStorage.getItem("popupClosed")) {
                // Delay the popup by 3 seconds
                setTimeout(function() {
                    document.getElementById("contactPopup").style.display = "flex";
                }, 3000);
            }

            // Close the popup and store the closed state in sessionStorage
            document.getElementById("closePopup").addEventListener("click", function() {
                document.getElementById("contactPopup").style.display = "none";
                sessionStorage.setItem("popupClosed", "true");
            });

            // Reopen the popup if the anchor link is clicked (for testing or user choice)
            document.getElementById("reopenPopup").addEventListener("click", function(e) {
                e.preventDefault(); // Prevent the default anchor behavior
                // Clear the closed state and show the popup again
                sessionStorage.removeItem("popupClosed");
                document.getElementById("contactPopup").style.display = "flex";
            });
        });
    </script>

</body>

</html>