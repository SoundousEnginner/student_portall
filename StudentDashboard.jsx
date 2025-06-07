import React from 'react';
import { Link } from 'react-router-dom';
import 'bootstrap/dist/css/bootstrap.min.css';

const StudentDashboard = () => {
  return (
    <div className="container mt-5">
      <div className="text-center mb-4">
        <h2 className="fw-bold">Tableau de bord de l'étudiant</h2>
        <p className="text-muted">Bienvenue sur votre portail. Choisissez ce que vous souhaitez consulter 👇</p>
      </div>

      <div className="row justify-content-center">
        <div className="col-md-4 mb-3">
          <Link to="/departement/informatique" className="btn btn-outline-primary w-100 py-3">
            📚 Projets par département
          </Link>
        </div>
        <div className="col-md-4 mb-3">
          <Link to="/wishlist" className="btn btn-outline-success w-100 py-3">
             Liste de souhaits
          </Link>
        </div>
        <div className="col-md-4 mb-3">
          <Link to="/" className="btn btn-outline-secondary w-100 py-3">
             Retour à la page d'accueil
          </Link>
        </div>
      </div>
    </div>
  );
};

export default StudentDashboard;
