<?php include 'includes/header.php'; ?>

<div id="root"></div>

<script type="text/babel">
const DonationsPage = () => {
    const [formData, setFormData] = React.useState({
        amount: '',
        donationType: 'tithe',
        paymentMethod: 'card',
        purpose: ''
    });
    const [loading, setLoading] = React.useState(false);
    const [status, setStatus] = React.useState({ type: '', message: '' });

    const handleSubmit = async (e) => {
        e.preventDefault();
        setLoading(true);
        
        try {
            const response = await fetch('api/donations.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(formData)
            });
            
            const data = await response.json();
            
            if (response.ok) {
                setStatus({
                    type: 'success',
                    message: 'Thank you for your donation!'
                });
                setFormData({
                    amount: '',
                    donationType: 'tithe',
                    paymentMethod: 'card',
                    purpose: ''
                });
            } else {
                throw new Error(data.error || 'Something went wrong');
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
        <>
            <div className="container py-5">
                <h2 className="text-center mb-4">Make a Donation</h2>
                <div className="row justify-content-center">
                    <div className="col-md-6">
                        <div className="card">
                            <div className="card-body">
                                {status.message && (
                                    <div className={`alert alert-${status.type === 'success' ? 'success' : 'danger'}`}>
                                        {status.message}
                                    </div>
                                )}
                                <form onSubmit={handleSubmit}>
                                    <div className="mb-3">
                                        <label className="form-label">Amount ($)</label>
                                        <input
                                            type="number"
                                            className="form-control"
                                            value={formData.amount}
                                            onChange={(e) => setFormData({...formData, amount: e.target.value})}
                                            required
                                        />
                                    </div>
                                    <div className="mb-3">
                                        <label className="form-label">Donation Type</label>
                                        <select
                                            className="form-select"
                                            value={formData.donationType}
                                            onChange={(e) => setFormData({...formData, donationType: e.target.value})}
                                        >
                                            <option value="tithe">Tithe</option>
                                            <option value="offering">Offering</option>
                                            <option value="project">Project Support</option>
                                            <option value="missions">Missions</option>
                                        </select>
                                    </div>
                                    <div className="mb-3">
                                        <label className="form-label">Payment Method</label>
                                        <select
                                            className="form-select"
                                            value={formData.paymentMethod}
                                            onChange={(e) => setFormData({...formData, paymentMethod: e.target.value})}
                                        >
                                            <option value="card">Credit/Debit Card</option>
                                            <option value="bank">Bank Transfer</option>
                                            <option value="mobile">Mobile Money</option>
                                        </select>
                                    </div>
                                    <div className="mb-3">
                                        <label className="form-label">Purpose/Note (Optional)</label>
                                        <textarea
                                            className="form-control"
                                            value={formData.purpose}
                                            onChange={(e) => setFormData({...formData, purpose: e.target.value})}
                                            rows="3"
                                        ></textarea>
                                    </div>
                                    <button 
                                        type="submit" 
                                        className="btn btn-primary w-100"
                                        disabled={loading}
                                    >
                                        {loading ? 'Processing...' : 'Make Donation'}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
};

ReactDOM.render(<DonationsPage />, document.getElementById('root'));
</script>

<?php include 'includes/footer.php'; ?> 