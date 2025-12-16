document.addEventListener("DOMContentLoaded", () => {
    // Preloader
    const preloader = document.getElementById("preloader");
    window.addEventListener("load", () => {
        setTimeout(() => {
            preloader.style.opacity = "0";
            preloader.style.visibility = "hidden";
        }, 500);
    });

    // Mobile Menu Logic
    const mobileMenuBtn = document.getElementById("mobile-menu-btn");
    const closeMenuBtn = document.getElementById("close-menu-btn");
    const mobileMenu = document.getElementById("mobile-menu");
    const body = document.body;

    function toggleMenu() {
        const isHidden = mobileMenu.classList.contains("translate-x-full");

        if (isHidden) {
            mobileMenu.classList.remove("translate-x-full");
            body.style.overflow = "hidden";
        } else {
            mobileMenu.classList.add("translate-x-full");
            body.style.overflow = "";
        }
    }

    mobileMenuBtn.addEventListener("click", toggleMenu);
    closeMenuBtn.addEventListener("click", toggleMenu);

    // Submenu Toggles
    const submenuToggles = document.querySelectorAll(".submenu-toggle");
    submenuToggles.forEach((toggle) => {
        toggle.addEventListener("click", () => {
            const submenu = toggle.nextElementSibling;
            const icon = toggle.querySelector(".fa-chevron-down");

            if (submenu.style.maxHeight) {
                submenu.style.maxHeight = null;
                icon.style.transform = "rotate(0deg)";
            } else {
                submenu.style.maxHeight = submenu.scrollHeight + "px";
                icon.style.transform = "rotate(180deg)";
            }
        });
    });

    // Scroll Top Button
    const scrollTopBtn = document.getElementById("scroll-top");

    window.addEventListener("scroll", () => {
        if (window.scrollY > 300) {
            scrollTopBtn.classList.remove("translate-y-20", "opacity-0");
        } else {
            scrollTopBtn.classList.add("translate-y-20", "opacity-0");
        }
    });

    scrollTopBtn.addEventListener("click", (e) => {
        e.preventDefault();
        window.scrollTo({
            top: 0,
            behavior: "smooth",
        });
    });

    // Close menu on link click
    const mobileLinks = mobileMenu.querySelectorAll("a:not(.submenu-toggle)");
    mobileLinks.forEach((link) => {
        link.addEventListener("click", () => {
            // Only close if it's not a toggle
            if (
                !link.nextElementSibling ||
                !link.nextElementSibling.classList.contains("sub-menu")
            ) {
                mobileMenu.classList.add("translate-x-full");
                body.style.overflow = "";
            }
        });
    });
});
