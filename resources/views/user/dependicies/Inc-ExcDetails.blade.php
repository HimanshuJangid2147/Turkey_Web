    <!-- Inclusions/Exclusions Section -->
    <section class="inclusions-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="inclusions-card">
                        <h3><i class="fas fa-check-circle"></i> What's Included</h3>
                        <ul class="inclusions-list">
                            @foreach($package->included as $item)
                                <li><i class="fas fa-check"></i> {{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="exclusions-card">
                        <h3><i class="fas fa-times-circle"></i> What's Excluded</h3>
                        <ul class="exclusions-list">
                            @foreach($package->excluded as $item)
                                <li><i class="fas fa-times"></i> {{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
