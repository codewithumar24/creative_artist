 // Toggle sidebar on mobile
        document.querySelector('.toggle-sidebar').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('active');
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.querySelector('.sidebar');
            const toggleBtn = document.querySelector('.toggle-sidebar');
            
            if (window.innerWidth <= 1199.98 && 
                !sidebar.contains(event.target) && 
                !toggleBtn.contains(event.target) && 
                sidebar.classList.contains('active')) {
                sidebar.classList.remove('active');
            }
        });

        // Simulate loading for stats cards
        document.querySelectorAll('.stat-value').forEach(el => {
            // In a real implementation, this would be animated from 0 to the final value
            el.style.opacity = '0';
            setTimeout(() => {
                el.style.opacity = '1';
            }, 300);
        });