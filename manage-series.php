<?php 
require_once '../includes/auth_middleware.php';
requireAdmin();
include '../includes/header.php'; 
?>

<div id="root"></div>

<script type="text/babel">
const ManageSeries = () => {
    const [series, setSeries] = React.useState([]);
    const [showModal, setShowModal] = React.useState(false);
    const [selectedSeries, setSelectedSeries] = React.useState(null);
    const [loading, setLoading] = React.useState(true);
    const [formData, setFormData] = React.useState({
        title: '',
        description: '',
        start_date: '',
        end_date: '',
        thumbnail: null,
        status: 'active'
    });

    React.useEffect(() => {
        fetchSeries();
    }, []);

    const fetchSeries = async () => {
        try {
            const response = await fetch('../api/admin/series.php');
            const data = await response.json();
            setSeries(data);
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
            let thumbnailPath = null;
            if (formData.thumbnail) {
                const uploadResponse = await handleFileUpload(formData.thumbnail, 'image');
                thumbnailPath = uploadResponse.file_path;
            }

            const seriesData = {
                ...formData,
                thumbnail_url: thumbnailPath || formData.thumbnail_url
            };

            const url = selectedSeries 
                ? `../api/admin/series.php?id=${selectedSeries.id}`
                : '../api/admin/series.php';
                
            const method = selectedSeries ? 'PUT' : 'POST';
            
            const response = await fetch(url, {
                method: method,
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(seriesData)
            });

            if (response.ok) {
                setShowModal(false);
                fetchSeries();
                resetForm();
            } else {
                throw new Error('Failed to save series');
            }
        } catch (error) {
            console.error('Error:', error);
        } finally {
            setLoading(false);
        }
    };

    // ... (similar handleDelete and resetForm functions as before)

    return (
        <div className="container-fluid py-4">
            {/* Header */}
            <div className="d-flex justify-content-between align-items-center mb-4">
                <h2>Manage Sermon Series</h2>
                <button 
                    className="btn btn-primary"
                    onClick={() => {
                        resetForm();
                        setShowModal(true);
                    }}
                >
                    Add New Series
                </button>
            </div>

            {/* Series Grid */}
            <div className="row">
                {series.map(item => (
                    <div key={item.id} className="col-md-4 mb-4">
                        <div className="card h-100">
                            <img 
                                src={item.thumbnail_url || '../assets/static/images/series-default.jpg'} 
                                className="card-img-top"
                                alt={item.title}
                                style={{height: '200px', objectFit: 'cover'}}
                            />
                            <div className="card-body">
                                <h5 className="card-title">{item.title}</h5>
                                <p className="card-text">{item.description}</p>
                                <p className="card-text">
                                    <small className="text-muted">
                                        {new Date(item.start_date).toLocaleDateString()} - 
                                        {item.end_date ? new Date(item.end_date).toLocaleDateString() : 'Present'}
                                    </small>
                                </p>
                            </div>
                            <div className="card-footer bg-white">
                                <button 
                                    className="btn btn-sm btn-primary me-2"
                                    onClick={() => {
                                        setSelectedSeries(item);
                                        setFormData(item);
                                        setShowModal(true);
                                    }}
                                >
                                    Edit
                                </button>
                                <button 
                                    className="btn btn-sm btn-danger"
                                    onClick={() => handleDelete(item.id)}
                                >
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                ))}
            </div>

            {/* Series Modal */}
            {showModal && (
                <SeriesModal 
                    formData={formData}
                    setFormData={setFormData}
                    handleSubmit={handleSubmit}
                    onClose={() => setShowModal(false)}
                    isEdit={!!selectedSeries}
                />
            )}
        </div>
    );
};

ReactDOM.render(<ManageSeries />, document.getElementById('root'));
</script>

<?php include '../includes/footer.php'; ?> 