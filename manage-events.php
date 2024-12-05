<?php 
require_once '../includes/auth_middleware.php';
requireAdmin();
include '../includes/header.php'; 
?>

<div id="root"></div>

<script type="text/babel">
const ManageEvents = () => {
    const [events, setEvents] = React.useState([]);
    const [loading, setLoading] = React.useState(true);
    const [showModal, setShowModal] = React.useState(false);
    const [selectedEvent, setSelectedEvent] = React.useState(null);
    const [formData, setFormData] = React.useState({
        title: '',
        description: '',
        date: '',
        time: '',
        location: '',
        category: '',
        ministry_id: '',
        image: null
    });

    React.useEffect(() => {
        fetchEvents();
    }, []);

    const fetchEvents = async () => {
        try {
            const response = await fetch('../api/events.php');
            const data = await response.json();
            setEvents(data);
            setLoading(false);
        } catch (error) {
            console.error('Error:', error);
            setLoading(false);
        }
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        
        const formDataObj = new FormData();
        for (const key in formData) {
            formDataObj.append(key, formData[key]);
        }
        
        try {
            const url = selectedEvent 
                ? `../api/admin/events.php?id=${selectedEvent.id}`
                : '../api/admin/events.php';
                
            const method = selectedEvent ? 'PUT' : 'POST';
            
            const response = await fetch(url, {
                method: method,
                body: formDataObj
            });
            
            if (response.ok) {
                setShowModal(false);
                fetchEvents();
                setFormData({
                    title: '',
                    description: '',
                    date: '',
                    time: '',
                    location: '',
                    category: '',
                    ministry_id: '',
                    image: null
                });
                setSelectedEvent(null);
            } else {
                throw new Error('Failed to save event');
            }
        } catch (error) {
            console.error('Error:', error);
        }
    };

    const handleDelete = async (id) => {
        if (window.confirm('Are you sure you want to delete this event?')) {
            try {
                const response = await fetch(`../api/admin/events.php?id=${id}`, {
                    method: 'DELETE'
                });
                
                if (response.ok) {
                    fetchEvents();
                } else {
                    throw new Error('Failed to delete event');
                }
            } catch (error) {
                console.error('Error:', error);
            }
        }
    };

    return (
        <div className="container-fluid py-4">
            <div className="d-flex justify-content-between align-items-center mb-4">
                <h2>Manage Events</h2>
                <button 
                    className="btn btn-primary"
                    onClick={() => {
                        setSelectedEvent(null);
                        setShowModal(true);
                    }}
                >
                    Add New Event
                </button>
            </div>

            {loading ? (
                <div className="text-center">
                    <div className="spinner-border text-primary" role="status">
                        <span className="visually-hidden">Loading...</span>
                    </div>
                </div>
            ) : (
                <div className="table-responsive">
                    <table className="table table-striped">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Location</th>
                                <th>Category</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            {events.map(event => (
                                <tr key={event.id}>
                                    <td>{event.title}</td>
                                    <td>{new Date(event.date).toLocaleDateString()}</td>
                                    <td>{event.time}</td>
                                    <td>{event.location}</td>
                                    <td>{event.category}</td>
                                    <td>
                                        <button 
                                            className="btn btn-sm btn-primary me-2"
                                            onClick={() => {
                                                setSelectedEvent(event);
                                                setFormData(event);
                                                setShowModal(true);
                                            }}
                                        >
                                            Edit
                                        </button>
                                        <button 
                                            className="btn btn-sm btn-danger"
                                            onClick={() => handleDelete(event.id)}
                                        >
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            ))}
                        </tbody>
                    </table>
                </div>
            )}

            {/* Event Modal */}
            {showModal && (
                <div className="modal show d-block" style={{backgroundColor: 'rgba(0,0,0,0.5)'}}>
                    <div className="modal-dialog">
                        <div className="modal-content">
                            <div className="modal-header">
                                <h5 className="modal-title">
                                    {selectedEvent ? 'Edit Event' : 'Add New Event'}
                                </h5>
                                <button 
                                    type="button" 
                                    className="btn-close"
                                    onClick={() => setShowModal(false)}
                                ></button>
                            </div>
                            <div className="modal-body">
                                <form onSubmit={handleSubmit}>
                                    {/* Form fields */}
                                    <div className="mb-3">
                                        <label className="form-label">Title</label>
                                        <input
                                            type="text"
                                            className="form-control"
                                            value={formData.title}
                                            onChange={(e) => setFormData({...formData, title: e.target.value})}
                                            required
                                        />
                                    </div>
                                    {/* Add more form fields */}
                                    <button type="submit" className="btn btn-primary">
                                        Save Event
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            )}
        </div>
    );
};

ReactDOM.render(<ManageEvents />, document.getElementById('root'));
</script>

<?php include '../includes/footer.php'; ?> 