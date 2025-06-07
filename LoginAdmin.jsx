import React, { useState } from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';

const LoginAdmin = () => {
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');

  const handleSubmit = (e) => {
    e.preventDefault();

    fetch('http://localhost/student-portal-backend/login_admin.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ email, password }),
    })
      .then((res) => res.json())
      .then((data) => {
        if (data.success) {
          alert('Connexion Admin réussie');
          // هنا توجه المشرف إلى لوحة التحكم أو تحفظ التوكن
        } else {
          alert('Erreur: ' + data.message);
        }
      })
      .catch(() => alert('Erreur de connexion au serveur'));
  };

  return (
    <div className="d-flex justify-content-center align-items-center vh-100 bg-light">
      <div className="card shadow p-4" style={{ width: '100%', maxWidth: '400px' }}>
        <h3 className="text-center mb-4">Admin Login</h3>
        <form onSubmit={handleSubmit}>
          <div className="mb-3">
            <label htmlFor="adminEmail" className="form-label">Email address</label>
            <input
              type="email"
              className="form-control"
              id="adminEmail"
              placeholder="Enter admin email"
              value={email}
              onChange={(e) => setEmail(e.target.value)}
              required />
          </div>
          <div className="mb-3">
            <label htmlFor="adminPassword" className="form-label">Password</label>
            <input
              type="password"
              className="form-control"
              id="adminPassword"
              placeholder="Enter password"
              value={password}
              onChange={(e) => setPassword(e.target.value)}
              required />
          </div>
          <button type="submit" className="btn btn-primary w-100">Login</button>
        </form>
      </div>
    </div>
  );
};

export default LoginAdmin;
