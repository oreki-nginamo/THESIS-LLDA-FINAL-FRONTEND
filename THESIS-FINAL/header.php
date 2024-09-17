<header class="py-3">
    <div class="container d-flex justify-content-between align-items-center flex-wrap">
        <!-- Logo Section with Title and Tagline -->
        <div class="d-flex align-items-center flex-grow-1 flex-wrap logo-section">
            <img src="assets/llda-logo-21.png" alt="LLDA Logo" class="header-logo me-3">
            <div class="text-center">
                <img src="assets/updated-logo-v-5-no-bilog-10.png" alt="Text Logo" class="header-logo-center me-0">
            </div>
            <img src="assets/bagong-pinas-10.png" alt="PH Logo" class="header-logo me-3">
        </div>

        <!-- Navigation Links Section -->
        <nav id="nav-links" class="d-flex align-items-center flex-wrap">
            <ul class="d-flex align-items-center list-unstyled mb-0 flex-wrap">
                <li class="nav-item me-3"><a href="home.php" class="nav-link">Home</a></li>
                <li class="nav-item me-3"><a href="status.php" class="nav-link">Status</a></li>
                <li class="nav-item me-3"><a href="repositories.php" class="nav-link">Repositories</a></li>
                <li class="nav-item me-3"><a href="report.php" class="nav-link">Report</a></li>
            </ul>
        </nav>

        <!-- Button Section (default button) -->
        <div class="d-flex align-items-center ms-auto">
            <a href="#" id="dynamic-button" class="btn btn-success">Default Button</a>
        </div>
    </div>
</header>

<!-- Logout Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Confirm Logout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to log out?
            </div>
            <div class="modal-footer">
                <form action="">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Get the current page from the URL path
    const currentPage = window.location.pathname;

    // Function to set active page styles or adjust href based on the page
    function adjustHeaderForActivePage() {
        const registerLink = document.getElementById('register-link');
        const navLinks = document.getElementById('nav-links'); // Targeting nav-links div
        const dynamicButton = document.getElementById('dynamic-button');

        // If the current page is "home.php", add navigation links
        if (currentPage.includes("home.php")) {
            navLinks.innerHTML = `
                <ul class="d-flex list-unstyled mb-0">
                    <li class="nav-item me-3">
                        <a href="home.php" class="nav-link active">Home</a>
                    </li>
                    <li class="nav-item me-3">
                        <a href="status.php" class="nav-link">Status</a>
                    </li>
                    <li class="nav-item me-3">
                        <a href="repositories.php" class="nav-link">Repositories</a>
                    </li>
                    <li class="nav-item me-3">
                        <a href="report.php" class="nav-link">Report</a>
                    </li>
                </ul>
            `;
        }
        else if (currentPage.includes("status.php")) {
            navLinks.innerHTML = `
                <ul class="d-flex list-unstyled mb-0">
                    <li class="nav-item me-3">
                        <a href="home.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item me-3">
                        <a href="status.php" class="nav-link active">Status</a>
                    </li>
                    <li class="nav-item me-3">
                        <a href="repositories.php" class="nav-link">Repositories</a>
                    </li>
                    <li class="nav-item me-3">
                        <a href="report.php" class="nav-link">Report</a>
                    </li>
                </ul>
            `;
        }
        else if (currentPage.includes("repositories.php")) {
            navLinks.innerHTML = `
                <ul class="d-flex list-unstyled mb-0">
                    <li class="nav-item me-3">
                        <a href="home.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item me-3">
                        <a href="status.php" class="nav-link">Status</a>
                    </li>
                    <li class="nav-item me-3">
                        <a href="repositories.php" class="nav-link active">Repositories</a>
                    </li>
                    <li class="nav-item me-3">
                        <a href="report.php" class="nav-link">Report</a>
                    </li>
                </ul>
            `;
        }
        else if (currentPage.includes("report.php")) {
            navLinks.innerHTML = `
                <ul class="d-flex list-unstyled mb-0">
                    <li class="nav-item me-3">
                        <a href="home.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item me-3">
                        <a href="status.php" class="nav-link">Status</a>
                    </li>
                    <li class="nav-item me-3">
                        <a href="repositories.php" class="nav-link">Repositories</a>
                    </li>
                    <li class="nav-item me-3">
                        <a href="report.php" class="nav-link active">Report</a>
                    </li>
                </ul>
            `;
        }

        // Example: If the current page is "login.php", update the button
        if (currentPage.includes("login.php")) {
            dynamicButton.textContent = 'Register Here';
            dynamicButton.href = 'register.php';
            dynamicButton.removeAttribute('data-bs-toggle');
            dynamicButton.removeAttribute('data-bs-target');
        }
        else if (currentPage.includes("register.php")) {
            dynamicButton.textContent = 'Login Here';
            dynamicButton.href = 'login.php';
            dynamicButton.removeAttribute('data-bs-toggle');
            dynamicButton.removeAttribute('data-bs-target');
        }
        else {
            // Set Logout button for main pages
            dynamicButton.textContent = 'Logout';
            dynamicButton.href = 'login.php';  // Prevent default navigation
            dynamicButton.setAttribute('data-bs-toggle', 'modal');
            dynamicButton.setAttribute('data-bs-target', '#logoutModal')
        }
    }

    // Call the function to adjust the header based on the active page
    adjustHeaderForActivePage();
</script>