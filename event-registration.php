<?php include 'includes/header.php'; ?>

<div id="root"></div>

<script type="text/babel">
const EventRegistration = () => {
    const [event, setEvent] = React.useState(null);
    const [loading, setLoading] = React.useState(true);
    const [formData, setFormData] = React.useState({
        name: '',
        email: '',
        phone: '',
        number_of_guests: 1,
        special_requirements: ''
    });
    const [status, setStatus] = React.useState({ type: '', message: '' });

    React.useEffect(() => {
        const urlParams = new URLSearchParams(window.location.search);
        const eventId = urlParams.get('id');
        if (eventId) {
            fetchEvent(eventId);
        }
    }, []);

    const fetchEvent = async (id) => {
        try {
            const response = await fetch(`api/events.php?id=${id}`);
            const data = await response.json();
            setEvent(data);
            setLoading(false);
        } catch (error) {
            console.error('Error:', error);
            setLoading(false);
        }
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        setLoading(true);

        try {
            const response = await fetch('api/event-registration.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    ...formData,
                    event_id: event.id
                })
            });

            const data = await response.json();

            if (response.ok) {
                setStatus({
                    type: 'success',
                    message: 'Registration successful! Check your email for confirmation.'
                });
                setFormData({
                    name: '',
                    email: '',
                    phone: '',
                    number_of_guests: 1,
                    special_requirements: ''
                });
            } else {
                throw new Error(data.error || 'Registration failed');
            }
        } catch (error) {
            setStatus({
                type: 'error',
                message: error.message
            });
        } finally {
            setLoading(false);
        }
    };

    if (loading) {
        return (
            <div className="container py-5 text-center">
                <div className="spinner-border text-primary" role="status">
                    <span className="visually-hidden">Loading...</span>
                </div>
            </div>
        );
    }

    if (!event) {
        return (
            <div className="container py-5 text-center">
                <h2>Event not found</h2>
                <a href="events.php" className="btn btn-primary mt-3">View All Events</a>
            </div>
        );
    }

    return (
        <div className="container py-5">
            <div className="row">
                <div className="col-md-6">
                    <h2>{event.title}</h2>
                    <p className="lead">{event.description}</p>
                    <div className="mb-4">
                        <p><i className="fas fa-calendar-alt me-2 text-primary"></i> {new Date(event.date).toLocaleDateString()}</p>
                        <p><i className="fas fa-clock me-2 text-primary"></i> {event.time}</p>
                        <p><i className="fas fa-map-marker-alt me-2 text-primary"></i> {event.location}</p>
                    </div>
                </div>
                <div className="col-md-6">
                    <div className="card">
                        <div className="card-body">
                            <h3 className="card-title mb-4">Register for Event</h3>
                            {status.message && (
                                <div className={`alert alert-${status.type === 'success' ? 'success' : 'danger'}`}>
                                    {status.message}
                                </div>
                            )}
                            <form onSubmit={handleSubmit}>
                                <div className="mb-3">
                                    <label className="form-label">Name</label>
                                    <input
                                        type="text"
                                        className="form-control"
                                        value={formData.name}
                                        onChange={(e) => setFormData({...formData, name: e.target.value})}
                                        required
                                    />
                                </div>
                                <div className="mb-3">
                                    <label className="form-label">Email</label>
                                    <input
                                        type="email"
                                        className="form-control"
                                        value={formData.email}
                                        onChange={(e) => setFormData({...formData, email: e.target.value})}
                                        required
                                    />
                                </div>
                                <div className="mb-3">
                                    <label className="form-label">Phone</label>
                                    <input
                                        type="tel"
                                        className="form-control"
                                        value={formData.phone}
                                        onChange={(e) => setFormData({...formData, phone: e.target.value})}
                                        required
                                    />
                                </div>
                                <div className="mb-3">
                                    <label className="form-label">Number of Guests</label>
                                    <input
                                        type="number"
                                        className="form-control"
                                        value={formData.number_of_guests}
                                        onChange={(e) => setFormData({...formData, number_of_guests: e.target.value})}
                                        min="1"
                                        required
                                    />
                                </div>
                                <div className="mb-3">
                                    <label className="form-label">Special Requirements</label>
                                    <textarea
                                        className="form-control"
                                        value={formData.special_requirements}
                                        onChange={(e) => setFormData({...formData, special_requirements: e.target.value})}
                                        rows="3"
                                    ></textarea>
                                </div>
                                <button 
                                    type="submit" 
                                    className="btn btn-primary w-100"
                                    disabled={loading}
                                >
                                    {loading ? 'Registering...' : 'Register Now'}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};

ReactDOM.render(<EventRegistration />, document.getElementById('root'));
</script>

<?php include 'includes/footer.php'; ?> 