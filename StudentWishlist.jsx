import React, { useEffect, useState } from 'react';
import { Container, Row, Col, Card, Button } from 'react-bootstrap';

const StudentWishlist = () => {
  const [wishlist, setWishlist] = useState([]);

  useEffect(() => {
    fetch('http://localhost/student-portal-backend/get_student_wishlist.php')
      .then(res => res.json())
      .then(data => setWishlist(data))
      .catch(err => {
        console.error(err);
        alert("Erreur de connexion au serveur.");
      });
  }, []);

  return (
    <Container className="mt-5">
      <h2 className="text-center mb-4">📋 Ma Liste de Souhaits</h2>
      <Row>
        {wishlist.map((projet) => (
          <Col md={6} lg={4} key={projet.id} className="mb-4">
            <Card className="h-100 shadow-sm">
              <Card.Body>
                <Card.Title>{projet.titre}</Card.Title>
                <Card.Text>{projet.description}</Card.Text>
                <Button variant="danger" className="w-100">
                  Retirer de la liste
                </Button>
              </Card.Body>
            </Card>
          </Col>
        ))}
      </Row>
    </Container>
  );
};

export default StudentWishlist;
