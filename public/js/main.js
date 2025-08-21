 window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
        function animateOnScroll() {
            const elements = document.querySelectorAll('.animate-on-scroll');
            elements.forEach(element => {
                const elementPosition = element.getBoundingClientRect().top;
                const screenPosition = window.innerHeight / 1.2;
                
                if (elementPosition < screenPosition) {
                    element.classList.add('animated');
                }
            });
        }
        
        window.addEventListener('scroll', animateOnScroll);
        document.addEventListener('DOMContentLoaded', animateOnScroll);

        document.querySelectorAll('.filter-nav .nav-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelectorAll('.filter-nav .nav-link').forEach(navLink => {
                    navLink.classList.remove('active');
                });
                this.classList.add('active');
  
                const filter = this.getAttribute('data-filter');
                const items = document.querySelectorAll('.gallery-item');
                
                items.forEach(item => {
                    if (filter === 'all' || item.getAttribute('data-category') === filter) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
        document.getElementById('load-more')?.addEventListener('click', function() {
            alert('In a real implementation, this would load more artwork from the server.');
        });
        
        document.getElementById('load-more-artists')?.addEventListener('click', function() {
            alert('In a real implementation, this would load more artists from the server.');
        });
        
        document.getElementById('contact-form')?.addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Thank you for your message! We will get back to you soon.');
            this.reset();
        });
    
        
        const uploadArea = document.querySelector('.upload-area');
        const uploadPreview = document.getElementById('upload-preview');
        
        if (uploadArea) {
            uploadArea.addEventListener('click', function() {
                simulateUpload();
            });
            
            // Drag and drop simulation
            uploadArea.addEventListener('dragover', function(e) {
                e.preventDefault();
                this.style.borderColor = 'var(--primary-color)';
                this.style.backgroundColor = 'rgba(108, 99, 255, 0.05)';
            });
            
            uploadArea.addEventListener('dragleave', function() {
                this.style.borderColor = '#ddd';
                this.style.backgroundColor = 'transparent';
            });
            
            uploadArea.addEventListener('drop', function(e) {
                e.preventDefault();
                this.style.borderColor = '#ddd';
                this.style.backgroundColor = 'transparent';
                simulateUpload();
            });
        }
        
        function simulateUpload() {
            // Clear previous previews
            uploadPreview.innerHTML = '';
            for (let i = 0; i < 3; i++) {
                const col = document.createElement('div');
                col.className = 'col-md-4 mb-3';
                
                const card = document.createElement('div');
                card.className = 'card';
                
                const img = document.createElement('img');
                img.src = `https://picsum.photos/300/200?random=${i}`;
                img.className = 'card-img-top';
                img.alt = 'Upload preview';
                
                const cardBody = document.createElement('div');
                cardBody.className = 'card-body p-2';
                
                const deleteBtn = document.createElement('button');
                deleteBtn.className = 'btn btn-sm btn-danger w-100';
                deleteBtn.innerHTML = '<i class="fas fa-trash me-1"></i> Remove';
                deleteBtn.addEventListener('click', function() {
                    col.remove();
                });
                
                cardBody.appendChild(deleteBtn);
                card.appendChild(img);
                card.appendChild(cardBody);
                col.appendChild(card);
                uploadPreview.appendChild(col);
            }
            
            // Show success message
            const successAlert = document.createElement('div');
            successAlert.className = 'alert alert-success mt-3';
            successAlert.innerHTML = '<i class="fas fa-check-circle me-2"></i> Images uploaded successfully! You can now publish your artwork.';
            uploadPreview.parentNode.insertBefore(successAlert, uploadPreview.nextSibling);
            
            // Remove alert after 5 seconds
            setTimeout(() => {
                successAlert.remove();
            }, 5000);
        }

        