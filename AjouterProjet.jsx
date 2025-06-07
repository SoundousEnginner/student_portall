import React, { useState } from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';

const AjouterProjet = () => {
  const [titre, setTitre] = useState('');
  const [description, setDescription] = useState('');
  const [domaine, setDomaine] = useState('');

  const handleSubmit = (e) => {
  e.preventDefault();

  fetch('http://localhost/student-portal-backend/add_project.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({ titre, description, domaine }),
  })
    .then((res) => res.json())
    .then((data) => {
      if (data.success) {
        alert('Projet ajouté avec succès !');

        // Réinitialiser le formulaire
        setTitre('');
        setDescription('');
        setDomaine('');
      } else {
        alert('Erreur : ' + (data.message || 'Impossible d\'ajouter le projet.'));
      }
    })
    .catch((error) => {
      console.error('Error:', error);
      alert('Erreur de connexion avec le serveur.');
    });
};

  return (
    <div className="container mt-5">
      <h2 className="mb-4 text-center">Ajouter un nouveau projet</h2>
      <form onSubmit={handleSubmit} className="shadow p-4 rounded bg-white">
        <div className="mb-3">
          <label htmlFor="titre" className="form-label">Titre du projet</label>
          <input
            type="text"
            className="form-control"
            id="titre"
            value={titre}
            onChange={(e) => setTitre(e.target.value)}
            required
          />
        </div>

        <div className="mb-3">
          <label htmlFor="description" className="form-label">Description</label>
          <textarea
            className="form-control"
            id="description"
            rows="4"
            value={description}
            onChange={(e) => setDescription(e.target.value)}
            required
          ></textarea>
        </div>

        <div className="mb-3">
          <label htmlFor="domaine" className="form-label">Domaine</label>
          <select
            className="form-select"
            id="domaine"
            value={domaine}
            onChange={(e) => setDomaine(e.target.value)}
            required
          >
            <option value="">Choisir...</option>
            <option value="Informatique">Informatique</option>
            <option value="Mathématiques">Mathématiques</option>
            <option value="Physique">Physique</option>
            <option value="Chimie">Chimie</option>
          </select>
        </div>

        <button type="submit" className="btn btn-success w-100">Ajouter</button>
      </form>
    </div>
  );
};

export default AjouterProjet;
