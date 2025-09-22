// Close Alert Function - Fixed for Turkey Travel Alert
function closeAlert() {
    console.log("Close button clicked!"); // Debug log
    const alertBar = document.querySelector(".alert-bar");
    if (alertBar) {
        console.log("Alert bar found, closing..."); // Debug log
        alertBar.style.animation = "slideUp 0.5s ease-in forwards";

        setTimeout(() => {
            alertBar.style.display = "none";
            // Also hide from layout flow
            alertBar.style.visibility = "hidden";
            alertBar.style.opacity = "0";
            console.log("Alert bar closed"); // Debug log
        }, 500);
    } else {
        console.log("Alert bar not found!"); // Debug log
    }
}

// Add slideUp animation
const style = document.createElement("style");
style.textContent = `
    @keyframes slideUp {
        from {
            transform: translateY(0);
            opacity: 1;
        }
        to {
            transform: translateY(-100%);
            opacity: 0;
        }
    }
`;
document.head.appendChild(style);

// Ensure close button functionality works
document.addEventListener('DOMContentLoaded', function() {
    console.log("DOM loaded, setting up close button..."); // Debug log
    const closeBtn = document.querySelector('.close-btn');
    if (closeBtn) {
        console.log("Close button found in DOM"); // Debug log
        closeBtn.addEventListener('click', closeAlert);
    } else {
        console.log("Close button not found in DOM"); // Debug log
    }
});

// Auto-rotate through different Turkey-specific alert messages
const alertTexts = [
    {
        title: "🎉 Special Turkey Travel Deals!",
        desc: "Discover exclusive packages to Istanbul, Cappadocia & more. Limited time offers available!",
    },
    {
        title: "🏛️ Istanbul Heritage Special!",
        desc: "Explore the historic wonders of Istanbul with guided tours and premium accommodations!",
    },
    {
        title: "🎈 Cappadocia Hot Air Balloon!",
        desc: "Experience magical sunrise balloon rides over fairy chimneys. Book now for best rates!",
    },
    {
        title: "🏖️ Mediterranean Coast Getaway!",
        desc: "Relax on pristine Turkish beaches with all-inclusive resort packages available!",
    },
    {
        title: "🍲 Turkish Culinary Adventure!",
        desc: "Taste authentic Turkish cuisine with cooking classes and food tours included!",
    },
];

let currentIndex = 0;
setInterval(() => {
    const alertText = document.querySelector(".alert-text");
    const nextAlert = alertTexts[currentIndex % alertTexts.length];

    alertText.style.opacity = "0.5";
    setTimeout(() => {
        alertText.querySelector("h3").textContent = nextAlert.title;
        alertText.querySelector("p").textContent = nextAlert.desc;
        alertText.style.opacity = "1";
    }, 300);

    currentIndex++;
}, 5000);
