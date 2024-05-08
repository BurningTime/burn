document.addEventListener('DOMContentLoaded', function() {
    const sideLinks = document.querySelectorAll('.sidebar .side-menu li a:not(.logout)');
    const contentSections = document.querySelectorAll('.content-section');

    // Hide all content sections initially and position them to the left
    contentSections.forEach(section => {
        section.style.display = 'none';
        section.style.transform = 'translateX(-100%)';
        section.style.opacity = '0'; // Set initial opacity to 0
    });

    sideLinks.forEach(item => {
        item.addEventListener('click', function(event) {
            event.preventDefault(); // Stop the page from navigating
            const targetSection = document.getElementById(item.getAttribute('data-target'));

            // Remove active class from all side links
            sideLinks.forEach(i => {
                i.parentElement.classList.remove('active');
            });

            // Hide all sections with transition effect
            contentSections.forEach(section => {
                section.style.transition = 'transform 0.5s ease-in-out, opacity 0.5s ease-in-out'; // Add transition for transform and opacity
                section.style.transform = 'translateX(-100%)'; // Move section to the left
                section.style.opacity = '0'; // Fade out section
            });

            // Set active class on clicked side link
            item.parentElement.classList.add('active');

            // Show corresponding section with transition effect
            if (targetSection) {
                // Hide all sections first
                contentSections.forEach(section => {
                    section.style.display = 'none';
                });
                // Show the target section
                targetSection.style.display = 'block'; // Show section
                setTimeout(() => {
                    targetSection.style.transform = 'translateX(0)'; // Move section back to its original position
                    targetSection.style.opacity = '1'; // Fade in section
                }, 10); // Allow a tiny delay before starting transition
            }
        });
    });

    const searchBtn = document.querySelector('.content nav form .form-input button');
    const searchBtnIcon = document.querySelector('.content nav form .form-input button .bx');
    const searchForm = document.querySelector('.content nav form');

    searchBtn.addEventListener('click', function (e) {
        if (window.innerWidth < 576) {
            e.preventDefault;
            searchForm.classList.toggle('show');
            if (searchForm.classList.contains('show')) {
                searchBtnIcon.classList.replace('bx-search', 'bx-x');
            } else {
                searchBtnIcon.classList.replace('bx-x', 'bx-search');
            }
        }
    });

    const menuBar = document.querySelector('.content nav .bx.bx-menu');
const sideBar = document.querySelector('.sidebar');

menuBar.addEventListener('click', () => {
    sideBar.classList.toggle('close');
});

    window.addEventListener('resize', () => {
        if (window.innerWidth < 768) {
            sideBar.classList.add('close');
        } else {
            sideBar.classList.remove('close');
        }
        if (window.innerWidth > 576) {
            searchBtnIcon.classList.replace('bx-x', 'bx-search');
            searchForm.classList.remove('show');
        }
    });

    const toggler = document.getElementById('theme-toggle');

    toggler.addEventListener('change', function () {
        if (this.checked) {
            document.body.classList.add('dark');
        } else {
            document.body.classList.remove('dark');
        }
    });
});
