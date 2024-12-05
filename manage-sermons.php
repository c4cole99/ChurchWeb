<?php 
require_once '../includes/auth_middleware.php';
requireAdmin();
include '../includes/header.php'; 
?>

<div id="root"></div>

<script type="text/babel">
const ManageSermons = () => {
    const [sermons, setSermons] = React.useState([]);
    const [loading, setLoading] = React.useState(true);
    const [showModal, setShowModal] = React.useState(false);
    const [selectedSermon, setSelectedSermon] = React.useState(null);
    const [uploadProgress, setUploadProgress] = React.useState(0);
    const [formData, setFormData] = React.useState({
        title: '',
        speaker: '',
        date: '',
        series: '',
        description: '',
        bible_passage: '',
        audio_file: null,
        video_url: '',
        notes_file: null,
        thumbnail: null
    });

    React.useEffect(() => {
        fetchSermons();
    }, []);

    const fetchSermons = async () => {
        try {
            const response = await fetch('../api/admin/sermons.php');
            const data = await response.json();
            setSermons(data);
            setLoading(false);
        } catch (error) {
            console.error('Error:', error);
            setLoading(false);
        }
    };

    const handleFileUpload = async (file, type) => {
        const formData = new FormData();
        formData.append('file', file);
        formData.append('type', type);

        try {
            const response = await fetch('../api/admin/upload.php', {
                method: 'POST',
                body: formData,
                onUploadProgress: (progressEvent) => {
                    const percentCompleted = Math.round(
                        (progressEvent.loaded * 100) / progressEvent.total
                    );
                    setUploadProgress(percentCompleted);
                }
            });

            if (!response.ok) {
                throw new Error('Upload failed');
            }

            const data = await response.json();
            return data.file_path;
        } catch (error) {
            console.error('Error:', error);
            return null;
        }
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        setLoading(true);

        try {
            // Handle file uploads first
            let audioPath = null;
            let notesPath = null;
            let thumbnailPath = null;

            if (formData.audio_file) {
                audioPath = await handleFileUpload(formData.audio_file, 'audio');
            }
            if (formData.notes_file) {
                notesPath = await handleFileUpload(formData.notes_file, 'notes');
            }
            if (formData.thumbnail) {
                thumbnailPath = await handleFileUpload(formData.thumbnail, 'image');
            }

            // Prepare sermon data
            const sermonData = {
                ...formData,
                audio_url: audioPath || formData.audio_url,
                notes_url: notesPath || formData.notes_url,
                thumbnail_url: thumbnailPath || formData.thumbnail_url
            };

            // Save sermon
            const url = selectedSermon 
                ? `../api/admin/sermons.php?id=${selectedSermon.id}`
                : '../api/admin/sermons.php';
                
            const method = selectedSermon ? 'PUT' : 'POST';
            
            const response = await fetch(url, {
                method: method,
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(sermonData)
            });

            if (response.ok) {
                setShowModal(false);
                fetchSermons();
                resetForm();
            } else {
                throw new Error('Failed to save sermon');
            }
        } catch (error) {
            console.error('Error:', error);
        } finally {
            setLoading(false);
            setUploadProgress(0);
        }
    };

    const resetForm = () => {
        setFormData({
            title: '',
            speaker: '',
            date: '',
            series: '',
            description: '',
            bible_passage: '',
            audio_file: null,
            video_url: '',
            notes_file: null,
            thumbnail: null
        });
        setSelectedSermon(null);
    };

    return (
        <div className="container-fluid py-4">
            <div className="d-flex justify-content-between align-items-center mb-4">
                <h2>Manage Sermons</h2>
                <button 
                    className="btn btn-primary"
                    onClick={() => {
                        resetForm();
                        setShowModal(true);
                    }}
                >
                    Add New Sermon
                </button>
            </div>

            {/* Sermons List */}
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
                                <th>Speaker</th>
                                <th>Date</th>
                                <th>Series</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            {sermons.map(sermon => (
                                <tr key={sermon.id}>
                                    <td>{sermon.title}</td>
                                    <td>{sermon.speaker}</td>
                                    <td>{new Date(sermon.date).toLocaleDateString()}</td>
                                    <td>{sermon.series}</td>
                                    <td>
                                        <button 
                                            className="btn btn-sm btn-primary me-2"
                                            onClick={() => {
                                                setSelectedSermon(sermon);
                                                setFormData(sermon);
                                                setShowModal(true);
                                            }}
                                        >
                                            Edit
                                        </button>
                                        <button 
                                            className="btn btn-sm btn-danger"
                                            onClick={() => handleDelete(sermon.id)}
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

            {/* Sermon Modal */}
            {showModal && (
                <SermonModal 
                    formData={formData}
                    setFormData={setFormData}
                    handleSubmit={handleSubmit}
                    uploadProgress={uploadProgress}
                    onClose={() => setShowModal(false)}
                    isEdit={!!selectedSermon}
                />
            )}
        </div>
    );
};

// Sermon Modal Component
const SermonModal = ({ formData, setFormData, handleSubmit, uploadProgress, onClose, isEdit }) => (
    <div className="modal show d-block" style={{backgroundColor: 'rgba(0,0,0,0.5)'}}>
        <div className="modal-dialog modal-lg">
            <div className="modal-content">
                <div className="modal-header">
                    <h5 className="modal-title">{isEdit ? 'Edit Sermon' : 'Add New Sermon'}</h5>
                    <button type="button" className="btn-close" onClick={onClose}></button>
                </div>
                <div className="modal-body">
                    <form onSubmit={handleSubmit}>
                        {/* Basic Information */}
                        <div className="row mb-3">
                            <div className="col-md-6">
                                <label className="form-label">Title</label>
                                <input
                                    type="text"
                                    className="form-control"
                                    value={formData.title}
                                    onChange={(e) => setFormData({...formData, title: e.target.value})}
                                    required
                                />
                            </div>
                            <div className="col-md-6">
                                <label className="form-label">Speaker</label>
                                <input
                                    type="text"
                                    className="form-control"
                                    value={formData.speaker}
                                    onChange={(e) => setFormData({...formData, speaker: e.target.value})}
                                    required
                                />
                            </div>
                        </div>

                        {/* Continue with more form fields... */}
                        
                        {uploadProgress > 0 && (
                            <div className="progress mb-3">
                                <div 
                                    className="progress-bar" 
                                    role="progressbar" 
                                    style={{width: `${uploadProgress}%`}}
                                    aria-valuenow={uploadProgress} 
                                    aria-valuemin="0" 
                                    aria-valuemax="100"
                                >
                                    {uploadProgress}%
                                </div>
                            </div>
                        )}

                        <button type="submit" className="btn btn-primary">
                            Save Sermon
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
);

ReactDOM.render(<ManageSermons />, document.getElementById('root'));
</script>

<?php include '../includes/footer.php'; ?> 