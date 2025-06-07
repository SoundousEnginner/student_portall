import React, { useState } from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';

const AjouterAnnonce = () => {
  const [titre, setTitre] = useState('');
  const [contenu, setContenu] = useState('');

  const handleSubmit = (e) => {
    e.preventDefault();
    console.log({ titre, contenu });

    alert('Annonce ajoutée avec succès !');

    // Réinitialiser le formulaire
    setTitre('');
    setContenu('');
  };

  return (
    <div className="container mt-5">
      <h2 className="text-center mb-4">Ajouter une annonce</h2>
      <form onSubmit={handleSubmit} className="shadow p-4 bg-white rounded">
        <div className="mb-3">
          <label htmlFor="titre" className="form-label">Titre</label>
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
          <label htmlFor="contenu" className="form-label">Contenu de l’annonce</label>
          <textarea
            className="form-control"
            id="contenu"
            rows="4"
            value={contenu}
            onChange={(e) => setContenu(e.target.value)}
            required
          ></textarea>
        </div>

        <button type="submit" className="btn btn-primary w-100">Publier</button>
      </form>
    </div>
  );
};

export default AjouterAnnonce;
