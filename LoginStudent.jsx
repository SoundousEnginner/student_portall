import React, { useState } from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';

const LoginStudent = () => {
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');

  const handleSubmit = (e) => {
    e.preventDefault();

    fetch('http://localhost/student-portal-backend/login_student.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ email, password }),
    })
      .then((res) => res.json())
      .then((data) => {
        if (data.success) {
          alert('Connexion réussie');
          // توجيه المستخدم أو حفظ التوكن هنا
        } else {
          alert('Erreur: ' + data.message);
        }
      })
      .catch(() => alert('Erreur de connexion au serveur'));
  };

  return (
    <div className="d-flex justify-content-center align-items-center vh-100 bg-light">
      <div className="card shadow p-4" style={{ width: '100%', maxWidth: '400px' }}>
        <h3 className="text-center mb-4">Student Login</h3>
        <form onSubmit={handleSubmit}>
          <div className="mb-3">
            <label htmlFor="studentEmail" className="form-label">Email address</label>
            <input
              type="email"
              className="form-control"
              id="studentEmail"
              placeholder="Enter your email"
              value={email}
              onChange={(e) => setEmail(e.target.value)}
              required />
          </div>
          <div className="mb-3">
            <label htmlFor="studentPassword" className="form-label">Password</label>
            <input
              type="password"
              className="form-control"
              id="studentPassword"
              placeholder="Enter your password"
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

export default LoginStudent;
