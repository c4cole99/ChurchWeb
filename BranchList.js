import React, { useState, useEffect } from 'react';
import { Container, Row, Col, Card } from 'react-bootstrap';
import axios from 'axios';

const BranchList = () => {
  const [branches, setBranches] = useState([]);

  useEffect(() => {
    const fetchBranches = async () => {
      try {
        const response = await axios.get('http://localhost/churchweb/api/branches.php');
        setBranches(response.data);
      } catch (error) {
        console.error('Error fetching branches:', error);
      }
    };

    fetchBranches();
  }, []);

  return (
    <Container className="py-5">
      <h2 className="text-center mb-4">Our Branches</h2>
      <Row>
        {branches.map((branch) => (
          <Col key={branch.id} md={4} className="mb-4">
            <Card>
              <Card.Body>
                <Card.Title>{branch.name}</Card.Title>
                <Card.Text>
                  <strong>Location:</strong> {branch.location}<br />
                  <strong>Pastor:</strong> {branch.pastor_name}<br />
                  <strong>Contact:</strong> {branch.contact_info}
                </Card.Text>
              </Card.Body>
            </Card>
          </Col>
        ))}
      </Row>
    </Container>
  );
};

export default BranchList; 