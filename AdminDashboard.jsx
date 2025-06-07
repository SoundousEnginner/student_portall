import React, { useEffect, useState } from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';

const AdminDashboard = () => {
  const [stats, setStats] = useState({
    projects: 0,
    students: 0,
    announcements: 0,
  });

  useEffect(() => {
    fetch('http://localhost/student-portal-backend/get_stats.php')
      .then((res) => res.json())
      .then((data) => {
        if (!data.error) {
          setStats({
            projects: data.projects,
            students: data.students,
            announcements: data.announcements,
          });
        } else {
          console.error('Error fetching stats:', data.error);
        }
      })
      .catch((err) => console.error('Fetch error:', err));
  }, []);

  return (
    <div className="container mt-5">
      <h2 className="text-center mb-4">Tableau de bord de l'administrateur</h2>

      <div className="row g-4 mb-5">
        <div className="col-md-4">
          <div className="card h-100 shadow-sm">
            <div className="card-body text-center">
              <h5 className="card-title">Projets</h5>
              <p className="display-4">{stats.projects}</p>
            </div>
          </div>
        </div>

        <div className="col-md-4">
          <div className="card h-100 shadow-sm">
            <div className="card-body text-center">
              <h5 className="card-title">Étudiants</h5>
              <p className="display-4">{stats.students}</p>
            </div>
          </div>
        </div>

        <div className="col-md-4">
          <div className="card h-100 shadow-sm">
            <div className="card-body text-center">
              <h5 className="card-title">Annonces</h5>
              <p className="display-4">{stats.announcements}</p>
            </div>
          </div>
        </div>
      </div>

      <div className="row g-4">
        <div className="col-md-4">
          <div
            className="card h-100 shadow-sm"
            onClick={() => window.location.href = '/ajouter-projet'}
            style={{ cursor: 'pointer' }}
          >
            <div className="card-body text-center">
              <h5 className="card-title">Ajouter un projet</h5>
              <p className="card-text">Créer un nouveau sujet de projet</p>
            </div>
          </div>
        </div>

        <div className="col-md-4">
          <div
            className="card h-100 shadow-sm"
            onClick={() => window.location.href = '/ajouter-annonce'}
            style={{ cursor: 'pointer' }}
          >
            <div className="card-body text-center">
              <h5 className="card-title">Ajouter une annonce</h5>
              <p className="card-text">Publier une annonce pour les étudiants</p>
            </div>
          </div>
        </div>

        <div className="col-md-4">
          <div
            className="card h-100 shadow-sm"
            onClick={() => window.location.href = '/liste-etudiants'}
            style={{ cursor: 'pointer' }}
          >
            <div className="card-body text-center">
              <h5 className="card-title">Liste des étudiants</h5>
              <p className="card-text">Voir les souhaits et informations des étudiants</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default AdminDashboard;
