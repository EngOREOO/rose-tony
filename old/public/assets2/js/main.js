function getRemainingTime() {
    let startTime = localStorage.getItem("timerStart");

    if (!startTime) {
        startTime = Date.now();
        localStorage.setItem("timerStart", startTime);
    }

    const elapsedTime = Math.floor((Date.now() - startTime) / 1000); // Time elapsed in seconds
    const totalSeconds = 24 * 60 * 60; // 24 hours in seconds
    const remainingSeconds = totalSeconds - elapsedTime;

    if (remainingSeconds <= 0) {
        localStorage.setItem("timerStart", Date.now()); // Reset the timer
        return { hours: 24, minutes: 0, seconds: 0 };
    }

    const hours = Math.floor(remainingSeconds / 3600);
    const minutes = Math.floor((remainingSeconds % 3600) / 60);
    const seconds = remainingSeconds % 60;

    return { hours, minutes, seconds };
}

function updateTimer() {
    const { hours, minutes, seconds } = getRemainingTime();

    document.querySelector("#hour .time").textContent = String(hours).padStart(2, "0");
    document.querySelector("#minute .time").textContent = String(minutes).padStart(2, "0");
    document.querySelector("#second .time").textContent = String(seconds).padStart(2, "0");
}

setInterval(updateTimer, 1000);
updateTimer(); // Call immediately to prevent 1-second delay on load

document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".product").forEach(product => {
        const decreaseBtn = product.querySelector(".decrease");
        const increaseBtn = product.querySelector(".increase");
        const quantitySpan = product.querySelector(".quantity");

        let quantity = 1;

        increaseBtn.addEventListener("click", function () {
            quantity++;
            quantitySpan.textContent = quantity;
        });

        decreaseBtn.addEventListener("click", function () {
            if (quantity > 1) {
                quantity--;
                quantitySpan.textContent = quantity;
            }
        });
    });
});
