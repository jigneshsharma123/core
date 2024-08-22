<?=   view('frontend/header');  ?>
<body>
    <div class="thank-you-container">
        <h1 class="thank-you-text">Thank You!</h1>
        <p class="thank-you-message">Your Booking request submit some one contact you soon</p>
        <a href="<?= base_url() ?>" class="home-link">Go Back to Home</a>
    </div>
</body>
<style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 40px;
        }

        .thank-you-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 10px;
            padding: 40px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .thank-you-text {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .thank-you-message {
            font-size: 18px;
            margin-bottom: 40px;
        }

        .home-link {
            text-decoration: none;
            color: #333333;
            font-weight: bold;
            padding: 10px 20px;
            background-color: #cccccc;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .home-link:hover {
            background-color: #999999;
        }
    </style>
<?= view('frontend/footer'); ?>