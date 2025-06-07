import React from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';

const InformationEtudiant = () => {
  // Exemple de données fictives d’un étudiant
  const etudiant = {
    nom: "Ahmed Benali",
    email: "ahmed.benali@gmail.com",
    wishlist: ["Projet IA", "Application mobile", "Réseaux neuronaux"]
  };

  return (
    <div className="container mt-5">
      <h2 className="text-center mb-4">Informations de l’étudiant</h2>

      <div className="card shadow">
        <div className="card-body">
          <h5 className="card-title">Nom : {etudiant.nom}</h5>
          <h6 className="card-subtitle mb-2 text-muted">Email : {etudiant.email}</h6>
          <p className="card-text mt-3"><strong>Liste des projets souhaités :</strong></p>
          <ul className="list-group list-group-flush">
            {etudiant.wishlist.map((projet, index) => (
              <li key={index} className="list-group-item">{projet}</li>
            ))}
          </ul>
        </div>
      </div>
    </div>
  );
};

export default InformationEtudiant;
