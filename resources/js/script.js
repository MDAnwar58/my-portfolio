// Counter animation for stats
function animateCounter(element, target, duration = 2000) {
    let current = 0;
    const increment = target / (duration / 16);

    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            element.textContent = target;
            clearInterval(timer);
        } else {
            element.textContent = Math.floor(current);
        }
    }, 16);
}

// Initialize counter animations
document.addEventListener("DOMContentLoaded", () => {
    const statNumbers = document.querySelectorAll(".stat-number");

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                const target = parseInt(entry.target.dataset.target);
                animateCounter(entry.target, target);
                observer.unobserve(entry.target);
            }
        });
    });

    statNumbers.forEach((stat) => observer.observe(stat));
});

// Portfolio Modal functionality
const portfolioModal = document.getElementById("portfolioModal");
const openPortfolioBtn = document.getElementById("openPortfolioBtn");
const closePortfolioBtn = document.getElementById("closePortfolioBtn");

// Portfolio More Info functionality
// Select DOM elements
const openMoreInfoBtn = document.querySelectorAll(".more-info-open-modal-btn");
const overlayMoreInfo = document.getElementById("more-info-modal-overlay");
const closeIconBtnMoreInfo = document.getElementById(
    "more-info-close-icon-btn"
);
const cancelBtnMoreInfo = document.getElementById("more-info-cancel-btn");
const confirmBtnMoreInfo = document.getElementById("more-info-confirm-btn");
const moreInfoModal = document.querySelector(".more-info");
let moreInfoModalBody = document.querySelector(".more-info-modal-body");

// Skills Modal functionality
const skillsModal = document.getElementById("skillsModal");
const viewSkillsBtn = document.getElementById("viewSkillsBtn");
const closeSkillsBtn = document.getElementById("closeSkillsBtn");

// Contact Modal functionality
const modal = document.getElementById("contactModal");
const openModalBtn = document.getElementById("openModalBtn");
const closeModalBtn = document.getElementById("closeModalBtn");
const contactForm = document.getElementById("contactForm");

// Open portfolio modal
openPortfolioBtn.addEventListener("click", () => {
    portfolioModal.classList.add("active");
    document.body.style.overflow = "hidden";
});

// Close portfolio modal
closePortfolioBtn.addEventListener("click", () => {
    portfolioModal.classList.remove("active");
    document.body.style.overflow = "";
});

// Close portfolio modal when clicking outside
portfolioModal.addEventListener("click", (e) => {
    if (e.target === portfolioModal) {
        portfolioModal.classList.remove("active");
        document.body.style.overflow = "";
    }
});

// Open more info modal
// Function to open the modal
const openMoreInfoModal = (e) => {
    let id = e.currentTarget.dataset.id;

    if (id) {
        moreInfoModalBody.innerHTML = "";
        let moreInfoContent = document.getElementById(
            `more-info-content-${id}`
        );
        if (moreInfoContent.innerHTML)
            moreInfoModalBody.innerHTML = moreInfoContent.innerHTML;
        else
            moreInfoModalBody.innerHTML = `<div style="text-align: center;">Data not found</div>`;
        overlayMoreInfo.classList.add("active");
        overlayMoreInfo.setAttribute("aria-hidden", "false");
        // Prevent scrolling on the body when modal is open
        document.body.style.overflow = "hidden";
    }
};

// Function to close the modal
const closeMoreInfoModal = () => {
    overlayMoreInfo.classList.remove("active");
    overlayMoreInfo.setAttribute("aria-hidden", "true");
    moreInfoModalBody.innerHTML = `<div style="text-align: center;">Data not found</div>`;
    // Restore scrolling
    document.body.style.overflow = "";
};

// Event Listeners
openMoreInfoBtn.forEach((btn) =>
    btn.addEventListener("click", openMoreInfoModal)
);

closeIconBtnMoreInfo.addEventListener("click", closeMoreInfoModal);
cancelBtnMoreInfo.addEventListener("click", closeMoreInfoModal);

// Handle "Add to Cart" click (Just a visual feedback for this demo)
confirmBtnMoreInfo.addEventListener("click", () => {
    const originalText = confirmBtnMoreInfo.textContent;
    confirmBtnMoreInfo.textContent = "Added!";
    confirmBtnMoreInfo.style.backgroundColor = "#10b981"; // Success green

    setTimeout(() => {
        closeMoreInfoModal();
        // Reset button after modal closes
        setTimeout(() => {
            confirmBtnMoreInfo.textContent = originalText;
            confirmBtnMoreInfo.style.backgroundColor = "";
        }, 300);
    }, 500);
});

// Close when clicking outside the modal content (on the overlayMoreInfo)
overlayMoreInfo.addEventListener("click", (e) => {
    if (e.target === overlayMoreInfo) {
        closeMoreInfoModal();
    }
});

// Close on Escape key press
document.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && overlayMoreInfo.classList.contains("active")) {
        closeMoreInfoModal();
    }
});

// Open skills modal
viewSkillsBtn.addEventListener("click", () => {
    skillsModal.classList.add("active");
    document.body.style.overflow = "hidden";
});

// Close skills modal
closeSkillsBtn.addEventListener("click", () => {
    skillsModal.classList.remove("active");
    document.body.style.overflow = "";
});

// Close skills modal when clicking outside
skillsModal.addEventListener("click", (e) => {
    if (e.target === skillsModal) {
        skillsModal.classList.remove("active");
        document.body.style.overflow = "";
    }
});

// Open contact modal with animation
openModalBtn.addEventListener("click", () => {
    modal.classList.add("active");
    document.body.style.overflow = "hidden"; // Prevent background scrolling
});

// Close modal with animation
closeModalBtn.addEventListener("click", () => {
    modal.classList.remove("active");
    document.body.style.overflow = ""; // Restore scrolling
});

// Close modal when clicking outside
modal.addEventListener("click", (e) => {
    if (e.target === modal) {
        modal.classList.remove("active");
        document.body.style.overflow = "";
    }
});

// Close modals with Escape key
document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") {
        if (modal.classList.contains("active")) {
            modal.classList.remove("active");
            document.body.style.overflow = "";
        }
        if (portfolioModal.classList.contains("active")) {
            portfolioModal.classList.remove("active");
            document.body.style.overflow = "";
        }
        if (skillsModal.classList.contains("active")) {
            skillsModal.classList.remove("active");
            document.body.style.overflow = "";
        }
    }
});

// Add smooth scroll behavior
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute("href"));
        if (target) {
            target.scrollIntoView({
                behavior: "smooth",
                block: "start",
            });
        }
    });
});

// Theme Toggle Functionality
const darkThemeBtn = document.getElementById("darkThemeBtn");
const lightThemeBtn = document.getElementById("lightThemeBtn");
const autoThemeBtn = document.getElementById("autoThemeBtn");
const themeModeOpenBtn = document.getElementById("themeModeOpenBtn");
const html = document.documentElement;

let themeToggleArea = document.querySelector(".theme-toggle");
let themeModeDiv = document.querySelector(".theme-toggle div");
let themeModeOpenBtnIcon = document.querySelector(".theme-mode-open-icon");
let themeModeCloseBtnIcon = document.querySelector(".theme-mode-close-icon");
let modeDiv = false;
// Get saved theme from localStorage or default to 'dark'
let currentTheme = localStorage.getItem("theme") || "dark";

function themeModeOpenAndClose(modeType = false) {
    if (!modeType) {
        themeModeOpenBtnIcon.classList.add("hide");
        themeModeCloseBtnIcon.classList.add("show");
        themeToggleArea.style.gap = "0.5rem";
        themeModeDiv.style.opacity = "1";
        themeModeDiv.style.visibility = "visible";
        themeModeDiv.style.maxHeight = "500px";
        modeDiv = true;
    } else {
        themeModeOpenBtnIcon.classList.remove("hide");
        themeModeCloseBtnIcon.classList.remove("show");
        themeToggleArea.style.gap = "0";
        themeModeDiv.style.opacity = "0";
        themeModeDiv.style.visibility = "hidden";
        themeModeDiv.style.maxHeight = "0";
        modeDiv = false;
    }
}
// Function to apply theme
function applyTheme(theme) {
    // Remove active class from all buttons
    [darkThemeBtn, lightThemeBtn, autoThemeBtn].forEach((btn) => {
        btn.classList.remove("active");
    });

    if (theme === "dark") {
        html.removeAttribute("data-theme");
        darkThemeBtn.classList.add("active");
    } else if (theme === "light") {
        html.setAttribute("data-theme", "light");
        lightThemeBtn.classList.add("active");
    } else {
        // Auto mode - follow system preference
        const prefersDark = window.matchMedia(
            "(prefers-color-scheme: dark)"
        ).matches;
        if (prefersDark) {
            html.removeAttribute("data-theme");
        } else {
            html.setAttribute("data-theme", "light");
        }
        autoThemeBtn.classList.add("active");
    }

    currentTheme = theme;
    localStorage.setItem("theme", theme);
}

// Apply saved theme on page load
applyTheme(currentTheme);

// Theme button event listeners
themeModeOpenBtn.addEventListener("click", () =>
    themeModeOpenAndClose(modeDiv)
);
darkThemeBtn.addEventListener("click", () => applyTheme("dark"));
lightThemeBtn.addEventListener("click", () => applyTheme("light"));
autoThemeBtn.addEventListener("click", () => applyTheme("auto"));

// Listen for system theme changes when in auto mode
window
    .matchMedia("(prefers-color-scheme: dark)")
    .addEventListener("change", (e) => {
        if (currentTheme === "auto") {
            applyTheme("auto");
        }
    });
