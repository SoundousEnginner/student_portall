import React from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';
import { Link } from 'react-router-dom';

const DashboardEtudiant = () => {
  return (
    <div className="container mt-5">
      <h2 className="text-center mb-4">Bienvenue sur votre espace étudiant</h2>

      <div className="row">
        {/* Section pour consulter les projets */}
        <div className="col-md-6 mb-4">
          <div className="card shadow-sm h-100">
            <div className="card-body">
              <h5 className="card-title">Voir les projets disponibles</h5>
              <p className="card-text">Consultez les projets proposés par les enseignants dans votre spécialité.</p>
              <Link to="/departements" className="btn btn-outline-primary w-100">Voir les projets</Link>
            </div>
          </div>
        </div>

        {/* Section pour la wishlist */}
        <div className="col-md-6 mb-4">
          <div className="card shadow-sm h-100">
            <div className="card-body">
              <h5 className="card-title">Ma liste de souhaits</h5>
              <p className="card-text">Ajoutez vos projets préférés à votre liste de souhaits.</p>
              <Link to="/wishlist" className="btn btn-outline-success w-100">Accéder à ma wishlist</Link>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default DashboardEtudiant;
