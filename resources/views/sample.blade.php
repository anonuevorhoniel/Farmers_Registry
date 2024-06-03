<button id="myButton">Click Me</button>
<div id="loading-indicator" style="display: none;">
    Loading...
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#myButton').click(function() {
            // Show loading indicator
            $('#loading-indicator').show();
            // Hide button
            $(this).hide();

            // Simulate some action (you would replace this with your actual action)
            setTimeout(function() {
                // Hide loading indicator
                $('#loading-indicator').hide();
                // Show button
                $('#myButton').show();
            }, 2000); // Simulate a 2 second action
        });
    });
</script>

<style>
  #loading-indicator {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: rgba(255, 255, 255, 0.7); /* semi-transparent white background */
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); /* optional: add a box shadow for better visual */
}

</style>
