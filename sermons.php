<?php include 'includes/header.php'; ?>

<div id="root"></div>

<script type="text/babel">
const SermonsPage = () => {
    const [sermons, setSermons] = React.useState([]);
    const [loading, setLoading] = React.useState(true);
    const [filters, setFilters] = React.useState({
        search: '',
        speaker: '',
        series: '',
        date: ''
    });

    React.useEffect(() => {
        fetchSermons();
    }, [filters]);

    const fetchSermons = async () => {
        try {
            const queryString = new URLSearchParams(filters).toString();
            const response = await fetch(`api/sermons.php?${queryString}`);
            const data = await response.json();
            setSermons(data);
            setLoading(false);
        } catch (error) {
            console.error('Error:', error);
            setLoading(false);
        }
    };

    return (
        <>
            {/* Hero Section */}
            <div className="sermons-hero position-relative">
                <img 
                    src="assets/static/images/sermons-hero.jpg" 
                    className="w-100" 
                    style={{height: '400px', objectFit: 'cover'}} 
                    alt="Sermons Archive"
                />
                <div className="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" 
                     style={{background: 'rgba(0,0,0,0.6)'}}>
                    <div className="container text-white">
                        <h1 className="display-4 fw-bold">Sermons Archive</h1>
                        <p className="lead">Listen to Past Messages</p>
                    </div>
                </div>
            </div>

            {/* Search and Filter Section */}
            <section className="py-4 bg-light">
                <div className="container">
                    <div className="row">
                        <div className="col-md-6 mb-3">
                            <input
                                type="text"
                                className="form-control"
                                placeholder="Search sermons..."
                                value={filters.search}
                                onChange={(e) => setFilters({...filters, search: e.target.value})}
                            />
                        </div>
                        <div className="col-md-2 mb-3">
                            <select
                                className="form-select"
                                value={filters.speaker}
                                onChange={(e) => setFilters({...filters, speaker: e.target.value})}
                            >
                                <option value="">All Speakers</option>
                                {/* Add speaker options */}
                            </select>
                        </div>
                        <div className="col-md-2 mb-3">
                            <select
                                className="form-select"
                                value={filters.series}
                                onChange={(e) => setFilters({...filters, series: e.target.value})}
                            >
                                <option value="">All Series</option>
                                {/* Add series options */}
                            </select>
                        </div>
                        <div className="col-md-2 mb-3">
                            <input
                                type="month"
                                className="form-control"
                                value={filters.date}
                                onChange={(e) => setFilters({...filters, date: e.target.value})}
                            />
                        </div>
                    </div>
                </div>
            </section>

            {/* Sermons List */}
            <section className="py-5">
                <div className="container">
                    {loading ? (
                        <div className="text-center py-5">
                            <div className="spinner-border text-primary" role="status">
                                <span className="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    ) : (
                        <div className="row">
                            {sermons.map(sermon => (
                                <div key={sermon.id} className="col-md-6 col-lg-4 mb-4">
                                    <div className="card h-100 sermon-card">
                                        <div className="card-body">
                                            <h5 className="card-title">{sermon.title}</h5>
                                            <p className="card-text">
                                                <small className="text-muted">
                                                    <i className="fas fa-user me-2"></i>
                                                    {sermon.speaker}
                                                </small>
                                            </p>
                                            <p className="card-text">
                                                <small className="text-muted">
                                                    <i className="fas fa-calendar me-2"></i>
                                                    {new Date(sermon.date).toLocaleDateString()}
                                                </small>
                                            </p>
                                            <p className="card-text">{sermon.description}</p>
                                        </div>
                                        <div className="card-footer bg-white border-0">
                                            <div className="d-flex justify-content-between">
                                                <a href={sermon.audio_url} className="btn btn-outline-primary">
                                                    <i className="fas fa-headphones me-2"></i>
                                                    Listen
                                                </a>
                                                {sermon.video_url && (
                                                    <a href={sermon.video_url} className="btn btn-outline-primary">
                                                        <i className="fas fa-video me-2"></i>
                                                        Watch
                                                    </a>
                                                )}
                                                {sermon.notes_url && (
                                                    <a href={sermon.notes_url} className="btn btn-outline-primary">
                                                        <i className="fas fa-file-alt me-2"></i>
                                                        Notes
                                                    </a>
                                                )}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            ))}
                        </div>
                    )}

                    {!loading && sermons.length === 0 && (
                        <div className="text-center py-5">
                            <h4>No sermons found</h4>
                        </div>
                    )}
                </div>
            </section>
        </>
    );
};

ReactDOM.render(<SermonsPage />, document.getElementById('root'));
</script>

<?php include 'includes/footer.php'; ?> 