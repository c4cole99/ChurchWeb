<?php 
session_start();
include 'includes/header.php'; 
?>

<div id="root"></div>

<script type="text/babel">
const LoginPage = () => {
    const [formData, setFormData] = React.useState({
        email: '',
        password: ''
    });
    const [status, setStatus] = React.useState({ type: '', message: '' });
    const [loading, setLoading] = React.useState(false);

    const handleSubmit = async (e) => {
        e.preventDefault();
        setLoading(true);
        
        try {
            const response = await fetch('api/auth/login.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(formData)
            });
            
            const data = await response.json();
            
            if (response.ok) {
                window.location.href = 'admin/dashboard.php';
            } else {
                throw new Error(data.error || 'Invalid credentials');
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

    return (
        <div className="container py-5">
            <div className="row justify-content-center">
                <div className="col-md-6 col-lg-4">
                    <div className="card shadow">
                        <div className="card-body p-4">
                            <h3 className="text-center mb-4">Admin Login</h3>
                            {status.message && (
                                <div className="alert alert-danger">{status.message}</div>
                            )}
                            <form onSubmit={handleSubmit}>
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
                                    <label className="form-label">Password</label>
                                    <input
                                        type="password"
                                        className="form-control"
                                        value={formData.password}
                                        onChange={(e) => setFormData({...formData, password: e.target.value})}
                                        required
                                    />
                                </div>
                                <button 
                                    type="submit" 
                                    className="btn btn-primary w-100"
                                    disabled={loading}
                                >
                                    {loading ? 'Logging in...' : 'Login'}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};

ReactDOM.render(<LoginPage />, document.getElementById('root'));
</script>

<?php include 'includes/footer.php'; ?> 