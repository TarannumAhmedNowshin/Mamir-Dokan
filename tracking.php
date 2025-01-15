<!DOCTYPE html>
<html>
<head>
  <title>Delivery Tracking</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f8f8;
    }
    .container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      background-color: #ffffff;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    h1 {
      text-align: center;
    }
    label {
      font-weight: bold;
    }
    input[type="text"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
    }
    button {
      display: block;
      width: 100%;
      padding: 10px;
      background-color: #007bff;
      color: #ffffff;
      border: none;
      cursor: pointer;
    }
    #tracking-result {
      margin-top: 20px;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Delivery Tracking</h1>
    <form>
      <label for="tracking-number">Tracking Number:</label>
      <input type="text" id="tracking-number" placeholder="Enter your tracking number" required>
      <button type="button" onclick="trackDelivery()">Track</button>
    </form>
    <div id="tracking-result"></div>
  </div>

  <script>
    // Function to handle form submission
    function trackDelivery() {
      const trackingNumber = document.getElementById('tracking-number').value;
      // Fetch tracking data from the server or API
      // Replace this with your actual tracking data retrieval logic
      const trackingData = fetchTrackingData(trackingNumber);
      // Update the tracking result element with the retrieved data
      const trackingResult = document.getElementById('tracking-result');
      trackingResult.textContent = `Tracking Number: ${trackingNumber}\nStatus: ${trackingData.status}\nLocation: ${trackingData.location}\nEstimated Delivery: ${trackingData.estimatedDelivery}`;
    }

    // Function to fetch tracking data
    function fetchTrackingData(trackingNumber) {
      // Replace this with your actual API call or data retrieval logic
      // Example data
      return {
        status: 'In Transit',
        location: 'City, Country',
        estimatedDelivery: 'April 22, 2023'
      };
    }
  </script>
</body>
</html>
