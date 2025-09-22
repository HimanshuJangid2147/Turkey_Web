    <!-- Enhanced Gallery Section -->
    <section class="gallery-section">
        <div class="gallery-container">
            <div class="section-header">
                <h2>Photo Gallery</h2>
                <p>Explore the beauty of this destination</p>
            </div>

            <div class="gallery-grid">
                <div class="gallery-main">
                    <img src="{{ asset($package->main_image) }}" alt="Main gallery image" class="gallery-image">
                    <div class="gallery-overlay">
                        <button class="btn-view-gallery" onclick="openGallery(0)">
                            <i class="fas fa-expand"></i>
                            View Gallery
                        </button>
                    </div>
                </div>
                <div class="gallery-thumbnails">
                    @foreach ($package->gallery as $index => $image)
                        <div class="thumbnail-item" onclick="openGallery({{ $index + 1 }})">
                            <img src="{{ asset($image) }}" alt="Gallery image {{ $index + 1 }}">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Enhanced Gallery Modal -->
    <div id="galleryModal" class="gallery-modal">
        <div class="modal-container">
            <div class="modal-controls">
                <div class="image-counter"></div>
                <button class="close-modal" onclick="closeGallery()">&times;</button>
            </div>
            <img id="modalImage" src="" alt="Gallery image" class="modal-main-image">
            <button class="nav-btn prev-btn" onclick="previousImage()">&#10094;</button>
            <button class="nav-btn next-btn" onclick="nextImage()">&#10095;</button>
        </div>
    </div>
