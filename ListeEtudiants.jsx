import React, { useEffect, useState } from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';

const ListeEtudiants = () => {
  const [etudiants, setEtudiants] = useState([]);
  const [error, setError] = useState(null);

  useEffect(() => {
    fetch('http://localhost/student-portal-backend/get_students.php')
      .then((response) => {
        if (!response.ok) {
          throw new Error('Erreur lors du chargement des étudiants');
        }
        return response.json();
      })
      .then((data) => {
        setEtudiants(data);
      })
      .catch((err) => {
        console.error(err);
        setError('Erreur de connexion au serveur.');
      });
  }, []);

  return (
    <div className="container mt-5">
      <h2 className="text-center mb-4">Liste des étudiants</h2>

      {error && <p className="text-danger text-center">{error}</p>}

      {etudiants.map((etudiant, index) => (
        <div key={index} className="card mb-4 shadow-sm">
          <div className="card-body">
            <h5 className="card-title">{etudiant.nom}</h5>
            <h6 className="card-subtitle mb-2 text-muted">{etudiant.email}</h6>
            <p className="card-text"><strong>Wish List :</strong></p>
            <ul>
              {etudiant.wishlist && etudiant.wishlist.map((projet, i) => (
                <li key={i}>{projet}</li>
              ))}
            </ul>
          </div>
        </div>
      ))}
    </div>
  );
};

export default ListeEtudiants;
