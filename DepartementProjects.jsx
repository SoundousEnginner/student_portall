import React from 'react';
import { useParams } from 'react-router-dom';
import 'bootstrap/dist/css/bootstrap.min.css';

const DepartementProjects = () => {
  const { nom } = useParams();

  // بيانات وهمية مؤقتة لمشاريع كل قسم
  const projets = {
    informatique: [
      'Système de gestion des étudiants',
      'Application mobile éducative',
      'Reconnaissance faciale',
    ],
    mathematiques: [
      'Modélisation des équations différentielles',
      'Théorie des graphes',
      'Statistiques avancées',
    ],
    physique: [
      'Simulation des particules',
      'Énergie renouvelable',
      'Optique quantique',
    ],
    chimie: [
      'Analyse spectroscopique',
      'Réactions catalytiques',
      'Nanochimie',
    ],
  };

  const projetsDuDepartement = projets[nom] || [];

  return (
    <div className="container mt-5">
      <h2 className="text-center mb-4">Projets - Département de {nom.charAt(0).toUpperCase() + nom.slice(1)}</h2>
      {projetsDuDepartement.length > 0 ? (
        <ul className="list-group">
          {projetsDuDepartement.map((projet, index) => (
            <li key={index} className="list-group-item">
              {projet}
            </li>
          ))}
        </ul>
      ) : (
        <p className="text-center text-muted">Aucun projet disponible pour ce département.</p>
      )}
    </div>
  );
};

export default DepartementProjects;
