import { useEffect, useState } from "react";
import api from "../services/api";

export default function HealthCheck() {
  const [health, setHealth] = useState(null);
  const [error, setError] = useState(null);

  useEffect(() => {
    api
      .get("/health")
      .then((response) => {
        setHealth(response.data);
      })
      .catch((error) => {
        setError(error.message);
      });
  }, []);

  return (
    <main style={{ padding: "2rem", fontFamily: "Arial, sans-serif" }}>
      <h1>Service Desk LDR</h1>
      <h2>Validación React + Laravel API</h2>

      {error && (
        <p style={{ color: "red" }}>
          Error al conectar con Laravel API: {error}
        </p>
      )}

      {!health && !error && <p>Conectando con backend...</p>}

      {health && (
        <section>
          <p>
            <strong>Status:</strong> {health.status}
          </p>
          <p>
            <strong>Message:</strong> {health.message}
          </p>
          <p>
            <strong>Service:</strong> {health.service}
          </p>
          <p>
            <strong>Version:</strong> {health.version}
          </p>
        </section>
      )}
    </main>
  );
}