// Set the countdown date (24 hours from now)
const countdownDate = new Date();
countdownDate.setDate(countdownDate.getDate() + 1);

// Update the countdown every second
const timerInterval = setInterval(function() {
    // Get the current date and time
    const now = new Date().getTime();
    
    // Find the difference between now and the countdown date
    const distance = countdownDate - now;
    
    // Calculate hours, minutes, and seconds
    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Display the result
    if (document.getElementById("hour")) {
        document.querySelector("#hour .time").innerHTML = hours.toString().padStart(2, '0');
        document.querySelector("#minute .time").innerHTML = minutes.toString().padStart(2, '0');
        document.querySelector("#second .time").innerHTML = seconds.toString().padStart(2, '0');
    }
    
    // If the countdown is finished, clear the interval
    if (distance < 0) {
        clearInterval(timerInterval);
        if (document.getElementById("timer")) {
            document.getElementById("timer").innerHTML = "انتهى العرض";
        }
    }
}, 1000);
