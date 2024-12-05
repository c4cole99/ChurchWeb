<?php 
require_once '../includes/auth_middleware.php';
requireAdmin();
include '../includes/header.php'; 
?>

<div id="root"></div>

<script type="text/babel">
const Dashboard = () => {
    const [stats, setStats] = React.useState({
        totalMembers: 0,
        totalBranches: 0,
        totalMinistries: 0,
        recentDonations: 0,
        pendingMessages: 0
    });
    const [loading, setLoading] = React.useState(true);

    React.useEffect(() => {
        fetch('../api/admin/dashboard_stats.php')
            .then(response => response.json())
            .then(data => {
                setStats(data);
                setLoading(false);
            })
            .catch(error => console.error('Error:', error));
    }, []);

    return (
        <div className="container-fluid py-4">
            <div className="row">
                <div className="col-md-3 mb-4">
                    <div className="card">
                        <div className="card-body">
                            <h5 className="card-title">Total Members</h5>
                            <h2>{stats.totalMembers}</h2>
                        </div>
                    </div>
                </div>
                <div className="col-md-3 mb-4">
                    <div className="card">
                        <div className="card-body">
                            <h5 className="card-title">Branches</h5>
                            <h2>{stats.totalBranches}</h2>
                        </div>
                    </div>
                </div>
                <div className="col-md-3 mb-4">
                    <div className="card">
                        <div className="card-body">
                            <h5 className="card-title">Ministries</h5>
                            <h2>{stats.totalMinistries}</h2>
                        </div>
                    </div>
                </div>
                <div className="col-md-3 mb-4">
                    <div className="card">
                        <div className="card-body">
                            <h5 className="card-title">Recent Donations</h5>
                            <h2>${stats.recentDonations}</h2>
                        </div>
                    </div>
                </div>
            </div>

            {/* Add more dashboard sections here */}
        </div>
    );
};

ReactDOM.render(<Dashboard />, document.getElementById('root'));
</script>

<?php include '../includes/footer.php'; ?> 