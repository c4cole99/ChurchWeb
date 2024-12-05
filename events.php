<?php include 'includes/header.php'; ?>

<div id="root"></div>

<script type="text/babel">
const EventsPage = () => {
    const [filter, setFilter] = React.useState('upcoming'); // upcoming, past, all
    const [searchTerm, setSearchTerm] = React.useState('');

    const events = [
        {
            id: 1,
            title: "Christmas Service",
            date: "2023-12-25",
            time: "9:00 AM - 11:00 AM",
            location: "Main Sanctuary",
            description: "Join us for our special Christmas service celebrating the birth of Jesus Christ.",
            image: "assets/images/events/christmas-service.jpg",
            category: "Special Service"
        },
        {
            id: 2,
            title: "Youth Conference",
            date: "2024-01-15",
            time: "2:00 PM - 6:00 PM",
            location: "Church Hall",
            description: "Annual youth conference focusing on spiritual growth and leadership.",
            image: "assets/images/events/youth-conference.jpg",
            category: "Conference"
        },
        // Add more events...
    ];

    const filteredEvents = events.filter(event => {
        const matchesSearch = event.title.toLowerCase().includes(searchTerm.toLowerCase()) ||
                            event.description.toLowerCase().includes(searchTerm.toLowerCase());
        const eventDate = new Date(event.date);
        const today = new Date();

        switch(filter) {
            case 'upcoming':
                return eventDate >= today && matchesSearch;
            case 'past':
                return eventDate < today && matchesSearch;
            default:
                return matchesSearch;
        }
    });

    return (
        <div className="events-page">
            {/* Hero Section */}
            <div className="hero-section" style={{backgroundImage: 'url(assets/images/events-hero.jpg)'}}>
                <div className="hero-overlay">
                    <div className="container text-center text-white">
                        <h1 className="display-4 fw-bold" data-aos="fade-down">Church Events</h1>
                        <div className="cross-divider">✟</div>
                        <p className="lead" data-aos="fade-up">Join us in worship and fellowship</p>
                    </div>
                </div>
            </div>

            {/* Events Section */}
            <section className="py-5">
                <div className="container">
                    {/* Filter Controls */}
                    <div className="row mb-5" data-aos="fade-up">
                        <div className="col-md-6">
                            <div className="btn-group">
                                <button 
                                    className={`btn ${filter === 'upcoming' ? 'btn-primary' : 'btn-outline-primary'}`}
                                    onClick={() => setFilter('upcoming')}
                                >
                                    Upcoming Events
                                </button>
                                <button 
                                    className={`btn ${filter === 'past' ? 'btn-primary' : 'btn-outline-primary'}`}
                                    onClick={() => setFilter('past')}
                                >
                                    Past Events
                                </button>
                                <button 
                                    className={`btn ${filter === 'all' ? 'btn-primary' : 'btn-outline-primary'}`}
                                    onClick={() => setFilter('all')}
                                >
                                    All Events
                                </button>
                            </div>
                        </div>
                        <div className="col-md-6">
                            <input
                                type="search"
                                className="form-control"
                                placeholder="Search events..."
                                value={searchTerm}
                                onChange={(e) => setSearchTerm(e.target.value)}
                            />
                        </div>
                    </div>

                    {/* Events Grid */}
                    <div className="row g-4">
                        {filteredEvents.map(event => (
                            <div key={event.id} className="col-md-6 col-lg-4" data-aos="fade-up">
                                <div className="event-card h-100">
                                    <div className="event-image">
                                        <img src={event.image} alt={event.title} className="img-fluid" />
                                        <div className="event-date">
                                            <span className="day">{new Date(event.date).getDate()}</span>
                                            <span className="month">
                                                {new Date(event.date).toLocaleString('default', { month: 'short' })}
                                            </span>
                                        </div>
                                    </div>
                                    <div className="event-content">
                                        <span className="badge bg-primary mb-2">{event.category}</span>
                                        <h3>{event.title}</h3>
                                        <p className="mb-2">
                                            <i className="fas fa-clock me-2"></i>{event.time}
                                        </p>
                                        <p className="mb-2">
                                            <i className="fas fa-map-marker-alt me-2"></i>{event.location}
                                        </p>
                                        <p className="event-description">{event.description}</p>
                                        <button className="btn btn-primary mt-3">Learn More</button>
                                    </div>
                                </div>
                            </div>
                        ))}
                    </div>
                </div>
            </section>
        </div>
    );
};

ReactDOM.render(<EventsPage />, document.getElementById('root'));
</script>

<style>
/* Event Card Styles */
.event-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}

.event-card:hover {
    transform: translateY(-5px);
}

.event-image {
    position: relative;
    height: 200px;
    overflow: hidden;
}

.event-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.event-date {
    position: absolute;
    top: 15px;
    right: 15px;
    background: var(--church-primary);
    color: white;
    padding: 10px;
    border-radius: 8px;
    text-align: center;
    min-width: 60px;
}

.event-date .day {
    display: block;
    font-size: 1.5rem;
    font-weight: bold;
    line-height: 1;
}

.event-date .month {
    display: block;
    font-size: 0.8rem;
    text-transform: uppercase;
}

.event-content {
    padding: 1.5rem;
}

.event-description {
    color: #666;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Filter Controls */
.btn-group .btn {
    border-radius: 0;
}

.btn-group .btn:first-child {
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;
}

.btn-group .btn:last-child {
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;
}
</style>

<?php include 'includes/footer.php'; ?> 