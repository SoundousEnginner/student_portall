import React from 'react';
import { Link } from 'react-router-dom';
import 'bootstrap/dist/css/bootstrap.min.css';

const Home = () => {
  const departments = [
    { name: 'Informatique', path: 'informatique', color: 'primary' },
    { name: 'Mathématiques', path: 'mathematiques', color: 'success' },
    { name: 'Physique', path: 'physique', color: 'danger' },
    { name: 'Chimie', path: 'chimie', color: 'warning' }
  ];

  return (
    <div className="container mt-5">
      <h1 className="text-center mb-5">Bienvenue au Portail Étudiant</h1>
      <div className="row justify-content-center">
        {departments.map((dept, index) => (
          <div key={index} className="col-md-5 col-lg-3 m-3">
            <Link to={`/departement/${dept.path}`} className={`btn btn-${dept.color} btn-lg w-100 shadow`}>
              {dept.name}
            </Link>
          </div>
        ))}
      </div>
    </div>
  );
};

export default Home;
