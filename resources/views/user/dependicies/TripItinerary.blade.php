    <!-- Itinerary Section -->
    <section class="itinerary-section">
        <div class="container">
            <div class="section-header">
                <h2>Trip Itinerary</h2>
                <p>Day by day breakdown of your adventure</p>
            </div>

            <div class="itinerary-timeline">
                @foreach($package->itinerary as $index => $day)
                    <div class="timeline-item">
                        <div class="timeline-marker">
                            <span class="day-number">Day {{ $day->day }}</span>
                        </div>
                        <div class="timeline-content">
                            <h4>{{ $day->title }}</h4>
                            <p>{{ $day->description }}</p>
                            <div class="day-details">
                                @if($day->meals)
                                    <span class="detail-item">
                                        <i class="fas fa-utensils"></i>
                                        {{ $day->meals }}
                                    </span>
                                @endif
                                @if($day->accommodation)
                                    <span class="detail-item">
                                        <i class="fas fa-bed"></i>
                                        {{ $day->accommodation }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
